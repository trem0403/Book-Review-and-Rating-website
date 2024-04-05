<?php

if (isset($_POST['update_profile'])) {

    require_once 'connections-inc.php';
    require_once 'functions-inc.php';


    // Fetch user data
    $select = mysqli_query($con, "SELECT * FROM `users` WHERE user_id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }

    $username = $_SESSION['username'];
    $old_pass = $_POST["old_pass"];
    $hashed_password = $fetch['user_password'];

    $update_name = $_POST['update_name'];
    $update_email = $_POST['update_email'];

    // Check if new username or email already exists
    $existingUser = userExists($con, $update_name, $update_email);
    if ($existingUser && $existingUser['user_id'] !== $user_id) {
        $message[] = 'Username or email already exists. Please choose a different one.';
    } else {
        // Proceed with updating the profile if username and email are unique
        mysqli_query($con, "UPDATE `users` SET user_name = '$update_name', user_email = '$update_email' WHERE user_id = '$user_id'") or die('query failed');
    }

    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if (!password_verify($old_pass, $hashed_password)) {
            $message[] = 'Old password is not correct';
            $messageType = 'error';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm password does not match new password';
            $messageType = 'error';
        } elseif (passwordStrength($confirm_pass) !== false) {
            $message[] = 'New password requires 1 uppercase, 1 lowercase, and 6 characters';
            $messageType = 'error';
        } else {
            $hashedpassword = password_hash($confirm_pass, PASSWORD_DEFAULT);
            mysqli_query($con, "UPDATE `users` SET user_password = '$hashedpassword' WHERE user_id = '$user_id'") or die('query failed');
            $message[] = 'Password updated successfully!';
            $messageType = 'success';
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'img/uploaded_img/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image is too large';
            $messageType = 'error';
        } else {
            $image_update_query = mysqli_query($con, "UPDATE `users` SET user_image = '$update_image' WHERE user_id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'Image updated succssfully!';
            $messageType = 'success';
        }
    }

}
