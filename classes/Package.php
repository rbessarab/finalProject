<?php

/**
 * Class Package represents a general package
 */
class Package
{
    private $_price;
    private $_hours;
    private $_photoAmount;

    /**
     * Package constructor
     * @param $_price
     * @param $_hours
     * @param $_photoAmount
     */
    public function __construct($_price="null", $_hours="null", $_photoAmount="null")
    {
        $this->_price = $_price;
        $this->_hours = $_hours;
        $this->_photoAmount = $_photoAmount;
    }

    //getters and setters

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param double $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /**
     * @return int
     */
    public function getHours()
    {
        return $this->_hours;
    }

    /**
     * @param int $hours
     */
    public function setHours($hours)
    {
        $this->_hours = $hours;
    }

    /**
     * @return int
     */
    public function getPhotoAmount()
    {
        return $this->_photoAmount;
    }

    /**
     * @param int $photoAmount
     */
    public function setPhotoAmount($photoAmount)
    {
        $this->_photoAmount = $photoAmount;
    }
}