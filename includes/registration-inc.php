<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $pass2 =  $_POST["pass2"];

   
    require_once 'connections-inc.php';
    require_once 'functions-inc.php';

    if (emptyInputRegistration($email, $username, $pass, $pass2) !== false)
    {
        header("location: ../registration.php");
        exit();
    } 

    if (invalidEmail($email) !== false)
    {
        header("location: ../registration.php");
        exit();
    } 

    
    if (invalidUsername($username) !== false)
    {
        header("location: ../registration.php");
        exit();
    } 

    if (passwordStrength($pass) !== false)
    {
        header("location: ../registration.php");
        exit();
    } 

    if (passwordMatch($pass, $pass2) !== false)
    {
        header("location: ../registration.php");
        exit();
    } 

    
    if (usernameExists($con, $username, $email) !== false)
    {
        header("location: ../registration.php");
        exit();
    } 

    createUser($con, $email, $username, $pass);

}
else {
    header("location: ../registration.php");
    exit();
}