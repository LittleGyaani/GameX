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
  $username = $_POST['username'];
  $password = $_POST['npass'];
  $vpassword = $_POST['vpass'];
  $phone = $_POST['phone'];
  $now = date("d-m-Y H:i");
  $userID = $_POST['userid'];

  if($_POST){
  
     $checkUser = $conn -> query("SELECT `user_name` FROM `user_info` WHERE `user_name`='$username'");

     if($checkUser -> num_rows > 0){

      echo "Exists";

     }else{

      $pushData = $conn -> query("UPDATE `user_info` SET `user_name` = '$username', `login_password` = '$password', `is_firsttime` = 0 WHERE `user_id` = $userID");
      $insertUserActivity = $conn -> query("INSERT INTO `user_activity_history`(`user_id`, `user_last_action`, `user_activity_DTStamp`) VALUES ($userID,'profile data update', '$now')");
      echo 'Updated';

     }
  }
