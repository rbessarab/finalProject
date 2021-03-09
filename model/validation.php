<?php

function validName($name)
{
    //name should not be empty and should contain only letters
    return !empty($name) && ctype_alpha($name);
}

function validEmail($email)
{
    //using filter_var function we can check for valid email
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}
