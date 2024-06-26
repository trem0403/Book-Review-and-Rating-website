<?php
session_start();
$user_id = $_SESSION['userid'];
include 'includes/connections-inc.php';
include 'includes/profile-inc.php'; // file containing profile update logic
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Group 8">
   <title>Update profile</title>

   <!-- External CSS stylesheets  -->
   <link rel="stylesheet" href="CSS/profile.css">
   <link rel="stylesheet" href="CSS/popUp-form.css">


   <!-- External JavaScript file  -->
   <script defer type="text/javascript" src="JS/profile.js"></script>


   <!-- External icons stylesheet -->
   <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

   <div class="update-profile">

      <?php
      // Fetch user data
      $select = mysqli_query($con, "SELECT * FROM `users` WHERE user_id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>

      <form action="" method="post" enctype="multipart/form-data">

         <!-- Back button to return to index page -->
         <div class="back-btn">
            <a href="index.php"><i class='bx bxs-left-arrow'></i></a>
         </div>

         <?php
         // Display user image
         if ($fetch['user_image'] == 'img/profile/default-avatar.png') {
            echo '<img src="img/profile/default-avatar.png">';
         } else {
            echo '<img src="img/uploaded_img/' . $fetch['user_image'] . '">';
         }
         // Display messages if any
         if (isset($message)) {
            foreach ($message as $message) {
               // Apply dynamic message box styling based on message type
               $messageClass = ($messageType === 'error') ? 'error' : 'success';
               echo '<div class="message ' . $messageClass . '">' . $message . '</div>';
            }
         }
         ?>

         <div class="flex">
            <div class="inputBox">
               <span>Username:</span>
               <input type="text" name="update_name" value="<?php echo $fetch['user_name']; ?>" class="box">
               <span>Email:</span>
               <input type="email" name="update_email" value="<?php echo $fetch['user_email']; ?>" class="box">
               <span>Update Profile Picture:</span>
               <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
            </div>
            <div class="inputBox">
               <span>Old Password:</span>
               <input type="password" name="old_pass" placeholder="Enter previous password" class="box">
               <span>New Password:</span>
               <input type="password" name="new_pass" placeholder="Enter new password" class="box">
               <span>Confirm Password:</span>
               <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
            </div>
         </div>
         <input type="submit" value="Update Profile" name="update_profile" class="btn">
         <button id="delete" type="button" class="delete-btn">Delete User</button>
         <!-- Popup form container -->
         <div id="myModal" class="modal">
            <div class="modal-content">
               <span class="close">&times;</span>
               <p>Are you sure you want to delete this user?</p>
               <form method="post">
                  <input type="submit" name="confirm" id="confirm" value="Yes" class="confirm-btn">
                  <button type="button" class="cancel-btn">No</button>
               </form>

               <?php

               if (array_key_exists('confirm', $_POST)) {

                  require_once 'includes/connections-inc.php';
                  require_once 'includes/functions-inc.php';

                  deleteUser($con, $user_id);
               }

               ?>

            </div>
         </div>
      </form>
   </div>



</body>

</html>