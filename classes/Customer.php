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
    private $_package_id;
    private $_package_name;

    /**
     * Customer constructor.
     * @param string $_fname
     * @param string $_lname
     * @param string $_phone
     * @param string $_email
     * @param string $_state
     * @param string $_package_id
     * @param string $_package_name
     */
    public function __construct($_fname="null", $_lname="null", $_phone="null", $_email="null", $_state="null", $_package_id = "null", $_package_name="null")
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_phone = $_phone;
        $this->_email = $_email;
        $this->_state = $_state;
        $this->_package_id = $_package_id;
        $this->_package_name = $_package_name;
    }

    /**
     * @return string
     */
    public function getPackageName()
    {
        return $this->_package_name;
    }

    /**
     * @param string $package_name
     */
    public function setPackageName($package_name)
    {
        $this->_package_name = $package_name;
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
     * @return int
     */
    public function getPackageId()
    {
        return $this->_package_id;
    }

    /**
     * @param $package_id
     */
    public function setPackageId($package_id)
    {
        $this->_package_id = $package_id;
    }
}