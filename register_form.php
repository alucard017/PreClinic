<?php

@include 'config.php';
require 'connection.php';
require 'function.inc.php';
if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   $select = " SELECT * FROM `register` WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($con,$select);

   if(mysqli_num_rows($result) > 0){

     $error[] = 'user already exist!';
      //alert("User Already Exists!");

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
         //alert("Password Not Matched!");
      }else{
         $insert = "INSERT INTO `register`(name, email, password, cpassword) VALUES('$name','$email','$pass','$cpass')";
         $data = mysqli_query($con,$insert);
         if($data == $data){
            alert("User Registered Sucessfully");
         }
         else{
            alert("User Registration failed");
         }
         
      }
   }
   

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Preclinic - Medical & Hospital</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Want to Back to Dashboard ? <a href="dashboard.php">CLICK HERE</a></p>
      <p>Already have an account ? <a href="index2.php">Login now</a></p>
   </form>

</div>

</body>
</html>