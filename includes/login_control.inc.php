<?php

declare(strict_types=1);
session_start();

function is_input_empty(string $username, string $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function is_username_wrong($result)
{
    // If $result is false or not an array, username is considered wrong
    if (!$result || !is_array($result)) {
        return true;
    } else {
        return false;
    }
}


function is_password_wrong(string $pwd, string $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}