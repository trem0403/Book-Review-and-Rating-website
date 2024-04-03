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
        header("location: ../registration.php?error=emptyinput");
        exit();
    } 

    if (invalidEmail($email) !== false)
    {
        header("location: ../registration.php?error=invalidEmail");
        exit();
    } 

    
    if (invalidUsername($username) !== false)
    {
        header("location: ../registration.php?error=invalidusername");
        exit();
    } 

    if (passwordStrength($pass) !== false)
    {
        header("location: ../registration.php?error=passwordtooweak");
        exit();
    } 

    if (passwordMatch($pass, $pass2) !== false)
    {
        header("location: ../registration.php?error=passwordsnotmatching");
        exit();
    } 

    
    if (usernameExists($con, $username, $email) !== false)
    {
        header("location: ../registration.php?error=usernametaken");
        exit();
    } 

    createUser($con, $email, $username, $pass);

}
else {
    header("location: ../registration.php");
    exit();
}