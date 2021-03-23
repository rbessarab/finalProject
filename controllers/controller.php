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
            $comment = $_POST['comments'];

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

            if($validator->validateComments($comment)) {
                $_SESSION['comment'] = $comment;
            }
            else {
                $this->_f3->set('errors["comments"]', "Please provide some comments");
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
        global $validator;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $state = $_POST['state'];
            $email = $_POST['email'];
            $package = $_POST['package'];
            $_SESSION['customer'] = new Customer();

            //package validation
            if($package == "none") {
                $this->_f3->set('errors["package"]', "Please choose one of the packages");
            }

            //if package is set, instantiate the appropriate package class
            else {
                if($package == "wedding") {
                    $_SESSION['package'] = new WeddingPackage();
                    $_SESSION['customer']->setPackageId(1);
                    $_SESSION['customer']->setPackageName("Wedding Package");
                }
                else {
                    $_SESSION['package'] = new FamilyPackage();
                    $_SESSION['customer']->setPackageId(2);
                    $_SESSION['customer']->setPackageName("Family Package");
                }
            }

            //first name validation
            if($validator->validName($fname)) {
                $_SESSION['customer']->setFname($fname);
            }
            else {
                $this->_f3->set('errors["fname"]', "Please provide your first name");
            }

            //last name validation
            if($validator->validName($lname)) {
                $_SESSION['customer']->setLname($lname);
            }
            else {
                $this->_f3->set('errors["lname"]', "Please provide your last name");
            }

            //phone number validation
            if($validator->validPhone($phone)) {
                $_SESSION['customer']->setPhone($phone);
            }
            else {
                $this->_f3->set('errors["phone"]', "Please provide your phone number");
            }

            //state validation
            if($validator->validState($state)) {
                $_SESSION['customer']->setState($state);
            }
            else {
                $this->_f3->set('errors["state"]', "Please provide your State");
            }

            //email validation
            if($validator->validEmail($email)) {
                $_SESSION['customer']->setEmail($email);
            }
            else {
                $this->_f3->set('errors["email"]', "Please provide your email address");
            }

            //check for agreement
            if(!isset($_POST['mail'])) {
                $this->_f3->set('errors["agree"]', "Please agree to our Terms and Conditions");
            }

            //if no errors, we decide where to go next
            if(empty($this->_f3->get('errors'))) {
                //if the package is Wedding, we will reroute to the wedding page
                if(is_a($_SESSION['package'], 'WeddingPackage')) {
                    $this->_f3->reroute('wedding');
                }
                //otherwise go to the family package page
                else {
                    $this->_f3->reroute('family');
                }
            }
        }

        //Display a view
        $view = new Template();
        echo $view->render('views/connect.html');
    }

    //wedding page
    function wedding()
    {
        //Display a view
        $view = new Template();
        echo $view->render('views/wedding.html');
    }

    //family page
    function family()
    {
        global $validator;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $familySize = $_POST['size'];
            $hours = $_POST['hours'];

            if($validator->validSize($familySize)) {
                $_SESSION['package']->setPeopleAmount($familySize);
            }
            else {
                $this->_f3->set('errors["size"]', "Family size should be more then 1");
            }

            if($validator->validHours($hours)) {
                $_SESSION['package']->setMinutes($hours);
            }
            else {
                $this->_f3->set('errors["hours"]', "Please book no more than 4 hours");
            }

            //if no errors, we decide where to go next
            if(empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('summary');
            }
        }

        //Display a view
        $view = new Template();
        echo $view->render('views/family.html');
    }

    function summary() {
        global $dataLayer;
        $dataLayer->insertCustomer($_SESSION['customer']);

        //Display a view
        $view = new Template();
        echo $view->render('views/summary.html');
    }

    // admin page
    function admin()
    {
        global $dataLayer;

        $customers_table = $dataLayer->customerPackage();
        $this->_f3->set('customers', $customers_table);

        //Display a login view
        $view = new Template();
        echo $view->render('views/admin.php');
    }
}