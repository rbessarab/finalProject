<?php

/**
 * Class Controller represents the controller for Captured Moments project
 */
class CapturedMomentsController
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    //home page
    function home()
    {
        global $validator;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if($validator->validName($name)) {
                $_SESSION['name'] = $name;
            }
            else {
                $this->_f3->set('errors["name"]', "Please provide your name");
            }

            if($validator->validEmail($email)) {
                $_SESSION['email'] = $email;
            }
            else {
                $this->_f3->set('errors["email"]', "Please provide your email");
            }

            if(empty($this->_f3->get('errors'))) {
                echo "Everything valid";
            }
        }

        $view = new Template();
        echo $view->render('views/home.html');
    }

    //packages page
    function packages()
    {
        //Display a view
        $view = new Template();
        echo $view->render('views/packages.html');
    }

    //connect page
    function connect()
    {
        //Display a view
        $view = new Template();
        echo $view->render('views/connect.html');
    }
}