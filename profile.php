<?php

include 'includes/connections-inc.php';
session_start();
$user_id = $_SESSION['userid'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($con, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($con, $_POST['update_email']);

   mysqli_query($con, "UPDATE `users` SET user_name = '$update_name', user_email = '$update_email' WHERE user_id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($con, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($con, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($con, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($con, "UPDATE `users` SET user_password = '$confirm_pass' WHERE user_id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'img/uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image is too large';
      }else{
         $image_update_query = mysqli_query($con, "UPDATE `users` SET user_image = '$update_image' WHERE user_id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($con, "SELECT * FROM `users` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['user_image'] == 'img/profile/default-avatar.png'){
            echo '<img src="img/profile/default-avatar.png">';
         }else{
            echo '<img src="img/uploaded_img/'.$fetch['user_image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['user_name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['user_email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['user_password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="index.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>