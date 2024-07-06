<?php

namespace Controllers;

class ArticlesController extends BaseController
{
    public function details()
    {
        $id = (int)$this->params[0];
        if ($id < 1) {
            header('HTTP/1.0 404 Not Found');
            die();
        }
        echo "<br/>Executing " . get_called_class() . " -> " . __FUNCTION__ . "() with id=" . $id;
    }
}
