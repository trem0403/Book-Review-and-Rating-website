<?php
include 'includes/connections-inc.php';
session_start();
$user_id = $_SESSION['userid'];

include 'includes/profile-inc.php'; // Include the file containing profile update logic

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

</head>
<body>
   
<div class="update-profile">

   <?php
      // Fetch user data
      $select = mysqli_query($con, "SELECT * FROM `users` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         // Display user image
         if($fetch['user_image'] == 'img/profile/default-avatar.png'){
            echo '<img src="img/profile/default-avatar.png">';
         }else{
            echo '<img src="img/uploaded_img/'.$fetch['user_image'].'">';
         }
         // Display messages if any
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
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
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="index.php" class="delete-btn">Home Page</a>
   </form>

</div>

</body>
</html>
