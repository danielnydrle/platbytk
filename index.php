<?php

mb_internal_encoding("UTF-8");

function autoload($class)
{
    if (preg_match('/Controller$/', $class))
        require("controllers/" . $class . ".php");
    else
        require("models/" . $class . ".php");
}

spl_autoload_register("autoload");

Db::open("localhost", "root", "pass", "platby_tk");

Ssn::start();

$router = new RouterController();

$router->process([$_SERVER["REQUEST_URI"]]);

$router->render();

?>