<?php
/*
 * authors: Ruslan Bessarab, Nematu Ayaz
 * index.php
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//default route (home page)
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->run();