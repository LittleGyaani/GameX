<?php

/*This API is used for user who signedup via facebook and a first time user, need to set user name and password.*/
//*Description*//
//Allows user to update his/her profile username and password

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  //Declaring variable and assign value received via post
  $userName = $_POST['username'];

  if($_POST){

     $checkUser = $conn -> query("SELECT `user_name` FROM `user_info` WHERE `user_name`='$userName'");

     if($checkUser -> num_rows > 0){

      echo "<span style='color:red;'>Sorry username already taken</span>";

     }else{

      echo "<span style='color:green;'>available</span>";

     }
  }
