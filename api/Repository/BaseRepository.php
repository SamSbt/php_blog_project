<?php namespace Repository;
    use Core\HttpReqAttr;
    use Core\HttpRequest;
    use Entity\BaseEntity;
    use PDO;
    use PDOException;

class BaseRepository
{
    private static $connection = null;
    private function connect() : PDO
    {
        if (self::$connection == null) {
            include_once "./configs/db.config.php";
            $dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
            $user = DB_USER;
            $pass = DB_PASSWORD;
            try {
                $connection = new PDO(
                    $dsn,
                    $user,
                    $pass,
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    )
                );
            } catch (PDOException $e) {
                $errorMessage = $e->getMessage();
                die("Erreur de connexion à la base de données : $errorMessage");
            }
            self::$connection = $connection;
        }
        return self::$connection;
    }
    protected function preparedQuery($sql, $params = []) : object
    {
        $statement = $this->connect()->prepare($sql);
        $result = $statement->execute($params);
        return (object)['result' => $result, 'statement' => $statement];
    }

    private function getBaseClassName() : string
    {
        $baseClassName = str_replace("Repository", "", get_called_class());
        return str_replace("\\", "", $baseClassName);
    }
    private function getTableName() : string
    {
        return lcfirst($this->getBaseClassName());
    }

    private function getEntityClassName() : string
    {
        return "Entity\\" . $this->getBaseClassName();
    }

    public function getAll(array $params) : array
    {
        $sql = "SELECT * FROM ".$this->getTableName();
        if(isset($params['where'])){
            $sql .= " WHERE " . $params['where'];
        }
        if(isset($params['orderby'])){
            $sql .= " ORDER BY ".$params['orderby'];
            if(isset($params['sort'])){
                $sql .= " " . $params['sort'];
            }
        }
        if(isset($params['limit'])){
            $sql .= " LIMIT " . $params['limit'];
        }
        $queryResponse = $this->preparedQuery($sql);
        $entities = $queryResponse->statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->getEntityClassName());
        return $entities;
    }
 // FETCH_PROPS_LATE permet que constructeur soit exécuté avant affectation des valeurs en DB
    public function getOneById(int $id) : BaseEntity | null
    {
        $tableName = $this->getTableName();
        $entityClassName = $this->getEntityClassName();
        $queryResponse = $this->preparedQuery("SELECT * FROM $tableName WHERE id_$tableName = ?", [$id]);
        $assocArray = $queryResponse->statement->fetch(PDO::FETCH_ASSOC);
        if(!$assocArray){
            return null;
        } 
        $entity = new $entityClassName($assocArray);
        return $entity;
    }

    public function insert() : BaseEntity | false
    {
        $tableName = $this->getTableName();
        $requestBody = HttpRequest::get(HttpReqAttr::BODY);
        $entityClassName = $this->getEntityClassName();
        $entity = new $entityClassName($requestBody);
        $entity->{"id_$tableName"} = null;
        $entityArray = get_object_vars($entity);
        $columns = implode(",", array_keys($entityArray));
        $values = implode(",", array_map(function (){ return "?"; }, $entityArray));
        $params = array_values($entityArray);
        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
        $queryResponse = $this->preparedQuery($sql, $params);
        if($queryResponse->result && $queryResponse->statement->rowCount() == 1){
            $lastInsertId = self::$connection->lastInsertId();
            $entity = $this->getOneById($lastInsertId);
            return $entity;
        }
        return false;
    }

    public function update(int $id) : BaseEntity | false
    {
        $tableName = $this->getTableName();
        $requestBody = HttpRequest::get(HttpReqAttr::BODY);
        $entityClassName = $this->getEntityClassName();
        $entity = new $entityClassName($requestBody);
        $where = "id_$tableName = ?";
        $entityArray = get_object_vars($entity);
        unset($entityArray["id_$tableName"]);
        $set = implode(",", array_map(function ($item){ return $item."=?"; }, array_keys($entityArray)));
        $params = array_values($entityArray);
        array_push($params, $id);
        $sql = "UPDATE $tableName SET $set WHERE $where";
        $resp = $this->preparedQuery($sql, $params);
        if($resp->result && $resp->statement->rowCount() <= 1){
            $entity = $this->getOneById($id);
            return $entity;
        }
        return false;
    }

    public function delete(int $id) : bool
    {
        $tableName = $this->getTableName();
        $where = "id_$tableName = ?";
        $sql = "DELETE FROM $tableName WHERE $where";
        $resp = $this->preparedQuery($sql, [$id]);
        if($resp->result && $resp->statement->rowCount() <= 1){
            $entity = $this->getOneById($id);
            return !isset($entity);
        }
        return false;
    }
}