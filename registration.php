<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Group 8">

    <!-- External CSS stylesheets -->
    <link rel="stylesheet" href="http://localhost/Book-Review-and-Rating-website/CSS/registration.css" />
    
    <!-- External icons stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    <!-- External JavaScript file for form validation -->
    <script defer src="http://localhost/Book-Review-and-Rating-website/JS/registration.js"></script>

    <title>Register</title>
</head>

<body>
    <!-- Back button to return to index page -->
    <div class="back-button">
        <a href="http://localhost/Book-Review-and-Rating-website/index.php"><i class='bx bxs-left-arrow'></i></a>
    </div>

    <!-- Form container for registration -->
    <div class="formcontainer">
        <!-- Title -->
        <h1>Register</h1>
        <hr>
        
        <!-- Registration form -->
        <form action="http://localhost/Book-Review-and-Rating-website/includes/registration-inc.php" method="post" onsubmit="return validate();">
             <!-- Email field -->
            <div class="textfield">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" placeholder="Email">
                <div class="error"></div>
            </div>

            <!-- Username field -->
            <div class="textfield">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <div class="error"></div>
            </div>

              <!-- Password field -->
            <div class="textfield">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password">
                <div class="error"></div>
            </div>

            <!-- Retype password field -->
            <div class="textfield">
                <label for="pass2">Re-type Password</label>
                <input type="password" name="pass2" id="pass2" placeholder="Re-type Password">
                <div class="error"></div>
            </div>

            <!-- Terms and conditions checkbox -->
            <div class="checkbox">
                <input type="checkbox" name="terms" id="terms">
                <label for="terms">Agree to terms and conditions</label>
                <div class="error"></div>
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="submit">Sign-Up</button>
        </form>

        <!-- Login link -->
        <div class="login-link">
            <p>Already have an account? <a href="http://localhost/Book-Review-and-Rating-website/login.php">Login</a></p>
        </div>
    </div>
</body>
</html>