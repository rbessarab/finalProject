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

//default route (home page)
$f3->route('GET|POST /', function ($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];

        if(validName($name)) {
            $_SESSION['name'] = $name;
        }
        else {
            $f3->set('errors["name"]', "Please provide your name");
        }

        if(validEmail($email)) {
            $_SESSION['email'] = $email;
        }
        else {
            $f3->set('errors["email"]', "Please provide your email");
        }

        if(empty($f3->get('errors'))) {
            echo "Everything valid";
        }
    }

    $view = new Template();
    echo $view->render('views/home.html');

});

// Packages Route
$f3->route('GET /packages', function() {

    //Display a view
    $view = new Template();
    echo $view->render('views/packages.html');
});

//Define an order route
$f3->route('GET /connect', function() {

   //Display a view
   $view = new Template();
  echo $view->render('views/connect.html');
});

$f3->run();