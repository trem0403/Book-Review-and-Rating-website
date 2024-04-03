<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $pass = $_POST["pass"];

    require_once 'connections-inc.php';
    require_once 'functions-inc.php';

    if (emptyInputLogin($username, $pass) !== false) {
        header("location: ../login.php");
        exit();
    }

    loginUser($con, $username, $pass);

} else {
    header("location: ../login.php");
    exit();
}
