<?php

/**
 * Class Data_Layer represents a dataLayer for Capture Moments website
 * The purpose of this class is insertion customers to database with PDO
 */
class Data_Layer
{
    private $_dbh;

    /**
     * DataLayer constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }

    /**
     * Inserts customer to the database
     * @param $customer
     */
    function insertCustomer($customer) {
        //define the query
       $sql = "INSERT INTO `customers`(`package_id`, `fname`, `lname`, `phone`, `email`, `state`)
                  VALUES (:package_id, :fname, :lname, :phone, :email, :state)";


         //  $sql = "INSERT INTO customers(fname, lname, phone, email, state, package, fsize, hours)
        // VALUES(:fname, :lname, :phone, :email, :state, :package, :size, :hours)";



        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Bind the parameters
        $statement->bindParam(':package_id', $customer->getPackageId(), PDO::PARAM_STR);
        $statement->bindParam(':fname', $customer->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $customer->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $customer->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':email', $customer->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':state', $customer->getState(), PDO::PARAM_STR);

      // $statement->bindParam(':package', $customer->getPackage(), PDO::PARAM_STR);
      //  $statement->bindParam(':size', $customer->getSize(), PDO::PARAM_STR);
       // $statement->bindParam(':state', $customer->getHours(), PDO::PARAM_STR);

        //Execute
        $statement->execute();
    }

    /**
     * Getting all customers from database
     */
    function getCustomers() {
        $sql = "SELECT * FROM customer";

        //prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //execute
        $statement->execute();

        //Get the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}