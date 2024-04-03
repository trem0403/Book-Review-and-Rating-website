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
    $result;

    $query = "SELECT * FROM users WHERE user_name = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: ../registration.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $dataResult = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($dataResult))
    {
        return row;
    }
    else
    {
        $result = false;
        return $result;  
    }

    mysqli_stmt_close($stmt);
    
}

function createUser($con, $email, $username, $pass)
{
    $query = "INSERT INTO users (user_email, user_name, user_password) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: ../registration.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../registration.php?error=none");

}

