

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Group 8">

     <!-- External CSS stylesheet -->
    <link rel="stylesheet" href="http://localhost/Book-Review-and-Rating-website/CSS/login.css" />
    
    <!-- External icons stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    <!-- External JavaScript file for form validation -->
    <script defer src="/JS/login.js"></script>

    <title>Sign-in</title>
</head>

<body>
    <!-- Back button to return to index page -->
    <div class="back-button">
        <a href="http://localhost/Book-Review-and-Rating-website/index.php"><i class='bx bxs-left-arrow'></i></a>
    </div>

     <!-- Form container for login -->
    <div class="formcontainer">
         <!-- Title -->
        <h1>Login</h1>
        <hr>

        <!-- Login form -->
        <form action="http://localhost/Book-Review-and-Rating-website/includes/login-inc.php" method="post" onsubmit="return validate();">
            <!-- Username field -->
            <div class="textfield">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username/Email">
                <div class="error"></div>
            </div>

             <!-- Password field -->
            <div class="textfield">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password">
                <div class="error"></div>
            </div>

            <!-- Forgot password link -->
            <div class="forgot-link">
                <a href="#">Forgot password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" class="submit">Sign-in</button>
        </form>

        <!-- Registration link -->
        <div class="login-link">
            <p>Don't have an account? <a href="http://localhost/Book-Review-and-Rating-website/registration.php">Register</a></p>
        </div>
    </div>
</body>
</html>