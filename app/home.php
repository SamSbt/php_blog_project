<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<?php
include_once "./configs/db.config.php";
$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
$user = DB_USER;
$pass = DB_PASSWORD;

// débogage du code suite à des erreurs de frappe
echo "DSN: $dsn<br>";
try {
  $db = new PDO(
    $dsn,
    $user,
    $pass,
    array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    )
  );

$db = new PDO(
  $dsn,
  $user,
  $pass,
  array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
);
$sql = "SELECT * FROM article ORDER BY ? DESC LIMIT 12";
// protection contre les injections SQL
$stmt = $db->prepare($sql);
  $stmt->execute(['publised_at']);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  exit;
}

?>

<body>
  <div class="container-lg bg-light">
    <?php include_once "navbar.php"; ?>
    <main class="mt-5 pt-3 row">

    <?php foreach ($articles as $article){ ?>
      <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch justify-content-center">
        <div class="card mb-3" style="width: 18rem;">
          <img src="<?= $article['img_src'] ?>" class="card-img-top" alt="<?= $article['title'] ?>">
          <div class="card-body text-center">
            <h5 class="card-title"><?= $article['title'] ?></h5>
            <p class="card-text text-justify"><?= $article['summary'] ?></p>
            <a href="article.php?id=<?= $article['id_article'] ?>" class="btn btn-primary">Lire</a>
          </div>
        </div>
      </div>
    <?php } ?>

    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>