<?php

function emptyInputRegistration($email, $username, $pass, $pass2)
{
    if (empty($email) || empty($username) || empty($pass) || empty($pass2)) {
        return true;
    } else {
        return false;
    }
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function invalidUsername($username)
{
    if (empty($username) || strlen($username) > 20) {
        return true;
    } else {
        return false;
    }
}

function passwordStrength($pass)
{
    if (strlen($pass) < 6 || !preg_match("/[A-Z]/", $pass) || !preg_match("/[a-z]/", $pass)) {
        return true;
    } else {
        return false;
    }

}

function passwordMatch($pass, $pass2)
{
    if ($pass !== $pass2) {
        return true;
    } else {
        return false;
    }
}

function userExists($con, $username, $email)
{
    $query = "SELECT * FROM users WHERE user_name = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../registration.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $dataResult = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($dataResult)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function createUser($con, $email, $username, $pass)
{
    $defaultImage = 'img/profile/default-avatar.png';
    $query = "INSERT INTO users (user_email, user_name, user_password, user_image) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../registration.php");
        exit();
    }

    $hashedpassword = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $email, $username, $hashedpassword, $defaultImage);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php");
}

function deleteUser($con, $user_id)
{
    $query = "DELETE FROM users WHERE user_id = ?";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: profile.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Check if the deleted user is the currently logged-in user
    session_start();
    if ($_SESSION['userid'] == $user_id) {
        // Clear session variables
        session_unset();
        // Destroy the session
        session_destroy();
        // Redirect the user to the login page or any other appropriate page
        header("location: index.php");
        exit();
    }
}

function emptyInputLogin($username, $pass)
{
    if (empty($username) || empty($pass)) {
        return true;
    } else {
        return false;
    }
}

function loginUser($con, $username, $pass)
{
    $userExists = userExists($con, $username, $username);

    if ($userExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $userExists["user_password"];
    $checkPassword = password_verify($pass, $passwordHashed);

    if ($checkPassword === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $userExists["user_id"];
        $_SESSION["username"] = $userExists["user_name"];
        header("location: ../index.php");
        exit();
    }
}


