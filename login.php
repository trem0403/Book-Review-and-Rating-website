<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Group 8">
    <link rel="stylesheet" href="http://localhost/Book-Review-and-Rating-website/CSS/login.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script defer src="/JS/login.js"></script>

    <title>Sign-in</title>
</head>

<body>

    <div class="back-button">
        <a href="http://localhost/Book-Review-and-Rating-website/index.php"><i class='bx bxs-left-arrow'></i></a>
    </div>

    <div class="formcontainer">
        <h1>Login</h1>
        <hr>
        <form action="login.html" method="get" onsubmit="return validate();">
            <div class="textfield">
                <label for="username">User Name</label>
                <input type="text" name="username" id="username" placeholder="User name">
                <div class="error"></div>
            </div>

            <div class="textfield">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password">
                <div class="error"></div>
            </div>

            <div class="forgot-link">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="submit">Sign-in</button>

        </form>
        <div class="login-link">
            <p>Don't have an account? <a href="http://localhost/Book-Review-and-Rating-website/registration.php">Register</a></p>
        </div>
    </div>


</body>

</html>