<?php
/*
 * authors: Ruslan Bessarab, Nematu Ayaz
 * index.php
 */

//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//session start
session_start();

//instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//instantiate needed classes
$validator = new CapturedMomentsValidator();
$controller = new CapturedMomentsController($f3);

//default route (home page)
$f3->route('GET|POST /', function () {
    global $controller;
    $controller->home();
});
$f3->route('GET /home', function () {
    global $controller;
    $controller->home();
});

// login
$f3->route('GET /login', function() {
    global $controller;
    $controller->login();
});

// Packages Route
$f3->route('GET /packages', function() {
    global $controller;
    $controller->packages();
});


//Define an order route
$f3->route('GET|POST /connect', function() {
    global $controller;
    $controller->connect();
});

//Define a wedding route
$f3->route('GET|POST /wedding', function() {
    global $controller;
    $controller->wedding();
});

//Define a family route
$f3->route('GET|POST /family', function() {
    global $controller;
    $controller->family();
});

$f3->run();