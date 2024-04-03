<?php

function emptyInputRegistration ($email, $username, $pass, $pass2)
{
    $result;

    if(empty($email) || empty($username) || empty($pass) || empty($pass2))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidEmail ($email)
{
    $result;

    if(filter_var(!$email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidUsername ($username)
{
    $result;

    if(empty($username) || strlen($username) < 20)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function passwordStrength ($pass)
{
    $result;

    if(strlen($pass) < 6 || !preg_match("/[A-Z]/", $pass) || !preg_match("/[a-z]/", $pass))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
    
}

function passwordMatch ($pass, $pass2)
{
    $result;

    if($pass !== $pass2)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
    
}

function usernameExists($con, $username, $email)
{
    $query = "SELECT * FROM users WHERE user_name = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    
}

function createUser($con, $email, $username, $pass)
{
    
}

