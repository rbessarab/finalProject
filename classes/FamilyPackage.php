<?php


class FamilyPackage extends Package
{
    private $_peopleAmount;
    private $_minutes;

    /**
     * @return int
     */
    public function getPeopleAmount()
    {
        return $this->_peopleAmount;
    }

    /**
     * @param int $peopleAmount
     */
    public function setPeopleAmount($peopleAmount)
    {
        $this->_peopleAmount = $peopleAmount;
    }

    /**
     * @return int
     */
    public function getMinutes()
    {
        return $this->_minutes;
    }

    /**
     * @param int $minutes
     */
    public function setMinutes($minutes)
    {
        $this->_minutes = $minutes;
    }
}