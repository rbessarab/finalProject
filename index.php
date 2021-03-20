<?php
/*
 * authors: Ruslan Bessarab, Nematu Ayaz
 * index.php
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
require('model/validation.php');

//instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//instantiate needed classes
$validator = new CapturedMomentsValidator();
$controller = new CapturedMomentsController($f3);

//default route (home page)
$f3->route('GET|POST /home', function ($f3) {
    global $controller;
    $controller->home();
});

// Packages Route
$f3->route('GET /packages', function() {
    global $controller;
    $controller->packages();
});


//Define an order route
$f3->route('GET /connect', function() {
    global $controller;
    $controller->connect();
});

$f3->run();