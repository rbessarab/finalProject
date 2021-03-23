<?php
/**
 * This file is for validation purpose. Contains functions for validation.
 * model/validation.php
 */
class CapturedMomentsValidator
{

    /**
     * Checks if the hours given is greater than 1 and less than 4
     * @param $hours
     * @return bool
     */
    function validHours($hours)
    {
        return $hours >= 1 && $hours <= 4;
    }

    /**
     * The size of the family should be more then 1
     * @param $size of family
     * @return bool
     */
    function validSize($size)
    {
        return $size > 1;
    }

    /**
     * Checks if name is valid
     * @param $name
     * @return bool depends on valid or invalid name
     */
    function validName($name)
    {
        //name should not be empty and should contain only letters
        return !empty($name) && ctype_alpha($name);
    }

    /**
     * Checks if email is valid
     * @param $email
     * @return bool
     */
    function validEmail($email)
    {
        //using filter_var function we can check for valid email
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Checks if comment section if not empty
     * @param $comment
     * @return bool
     */
    function validateComments($comment) {
        //comments should at least contain something
        return !empty($comment);
    }

    /**
     * Using filter_var() function checks if the number is valid
     * @param $phone int
     * @return bool
     */
    function validPhone($phone)
    {
        //phone number should not be empty and can contain only numbers
        return !empty($phone) && filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * Checks if state is valid
     * @param $state
     * @return bool depends on valid or invalid name
     */
    function validState($state)
    {
        //state should not be empty and should contain only letters
        return !empty($state) && ctype_alpha($state);
    }
}
