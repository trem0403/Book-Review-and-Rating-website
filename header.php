<?php
    session_start();
    $currentPage = basename($_SERVER['PHP_SELF']); // Get the current page filename
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Group 8">

    <!-- External CSS stylesheets -->
    <link rel="stylesheet" href="CSS/navbar.css" />
    <link rel="stylesheet" href="CSS/footer.css" />
    <link rel="stylesheet" href="CSS/index.css" />

    <!-- External icons stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
</head>

<body>

    <!-- Header section -->
    <header>
    
        <!-- Logo and site name -->
        <a href="#" class="logo"><i class="ri-book-open-line"></i><span>Let's Review</span>
        </a>

        
        <!-- Navigation links -->
        <ul class="navbar">
        <li <?php if ($currentPage == 'index.php') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
        <li <?php if ($currentPage == 'reviews.php') echo 'class="active"'; ?>><a href="reviews.php">Reviews</a></li>
        <li <?php if ($currentPage == 'services.php') echo 'class="active"'; ?>><a href="services.php">Services</a></li>
        <li <?php if ($currentPage == 'blog.php') echo 'class="active"'; ?>><a href="blog.php">Blog</a></li>
        <li <?php if ($currentPage == 'contact.php') echo 'class="active"'; ?>><a href="contact.php">Contact</a></li>
        </ul>
        </ul>

        <!-- User section -->
        <div class="user-section">
             <!-- Sign-in and Register links -->
            <?php 
                if (isset($_SESSION["username"])) {
                   echo "<a href='profile.php'>Profile</a>";
                   echo "<a href='includes/logout-inc.php'>Logout</a>";
                }
                else {
                    echo "<a href='login.php' class='user'><i class='ri-user-fill'></i>Sign in</a>";
                    echo "<a href='registration.php'>Register</a>";
                }
            ?>
            
            <!-- Menu icon for mobile view -->
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>