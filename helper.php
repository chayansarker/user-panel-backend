<?php
session_start();
function checkUserIsLoggedIn()
{
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && !empty($_SESSION['user_id']) && !empty($_SESSION['user_email'])) {
        return true;
    }

    return false;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function displayValidationError($name = null)
{
    if (isset($_SESSION['validationErrors'][$name])) {//print_r($name);
        return '<small class="text-danger position-absolute">' . $_SESSION['validationErrors'][$name] . '</small>';
    }
    return '';
}

function clearValidationErrorsFromSession()
{
    unset($_SESSION['validationErrors']);
}