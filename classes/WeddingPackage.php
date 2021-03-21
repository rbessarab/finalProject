<?php

/**
 * Class WeddingPackage
 */
class WeddingPackage extends Package
{
    private $_location;
    private $_isTravel;

    /**
     * @return String
     */
    public function getLocation()
    {
        return $this->_location;
    }

    /**
     * @param String $location
     */
    public function setLocation($location)
    {
        $this->_location = $location;
    }

    /**
     * @return boolean
     */
    public function getIsTravel()
    {
        return $this->_isTravel;
    }

    /**
     * @param boolean $isTravel
     */
    public function setIsTravel($isTravel)
    {
        $this->_isTravel = $isTravel;
    }


}