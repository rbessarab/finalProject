<?php

/**
 * Class Customer represents a customer
 */
class Customer
{
    private $_fname;
    private $_lname;
    private $_phone;
    private $_email;
    private $_state;
    private $_package;

    /**
     * Customer constructor.
     * @param $_fname
     * @param $_lname
     * @param $_phone
     * @param $_email
     * @param $_state
     * @param $_package
     */
    public function __construct($_fname="null", $_lname="null", $_phone="null", $_email="null", $_state="null", $_package = "null")
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_phone = $_phone;
        $this->_email = $_email;
        $this->_state = $_state;
        $this->_package = $_package;
    }

    /**
     * @return string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return WeddingPackage|FamilyPackage
     */
    public function getPackage()
    {
        return $this->_package;
    }

    /**
     * @param WeddingPackage|FamilyPackage $package
     */
    public function setPackage($package)
    {
        $this->_package = $package;
    }
}