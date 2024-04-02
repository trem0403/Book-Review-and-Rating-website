<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Group 8">
    <link rel="stylesheet" href="http://localhost/Book-Review-and-Rating-website/CSS/registration.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script defer src="http://localhost/Book-Review-and-Rating-website/JS/registration.js"></script>

    <title>Register</title>
</head>

<body>

    <div class="back-button">
        <a href="http://localhost/Book-Review-and-Rating-website/index.php"><i class='bx bxs-left-arrow'></i></a>
    </div>

    <div class="formcontainer">
        <h1>Register</h1>
        <hr>
        <form action="http://localhost/Book-Review-and-Rating-website/registration.php" method="get" onsubmit="return validate();">
            <div class="textfield">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" placeholder="Email">
                <div class="error"></div>
            </div>

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

            <div class="textfield">
                <label for="pass2">Re-type Password</label>
                <input type="password" id="pass2" placeholder="Password">
                <div class="error"></div>
            </div>


            <div class="checkbox">
                <input type="checkbox" name="terms" id="terms">
                <label for="terms">Agree to terms and conditions</label>
                <div class="error"></div>
            </div>

            <button type="submit" class="submit">Sign-Up</button>

        </form>
        <div class="login-link">
            <p>Already have an account? <a href="http://localhost/Book-Review-and-Rating-website/login.php">Login</a></p>
        </div>
    </div>

</body>

</html>