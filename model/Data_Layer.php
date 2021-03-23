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

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Bind the parameters
        $statement->bindParam(':package_id', $customer->getPackageId(), PDO::PARAM_STR);
        $statement->bindParam(':fname', $customer->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $customer->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $customer->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':email', $customer->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':state', $customer->getState(), PDO::PARAM_STR);

        //Execute
        $statement->execute();
    }

    /**
     * Getting all customers from database
     */
    function getCustomers() {
        $sql = "SELECT * FROM customers";

        //prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //execute
        $statement->execute();

        //Get the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * JOIN query to see all needed data from both tables
     */
    function customerPackage() {
        $sql = "SELECT customers.package_id, customers.customer_id, customers.fname, customers.lname, customers.phone, customers.email, customers.state, packages.name
            FROM packages INNER JOIN customers ON packages.package_id = customers.package_id";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Execute
        $statement->execute();

        //Get the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}