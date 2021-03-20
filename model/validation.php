<?php
/**
 * This file is for validation purpose. Contains functions for validation.
 * model/validation.php
 */
class CapturedMomentsValidator
{
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
}
