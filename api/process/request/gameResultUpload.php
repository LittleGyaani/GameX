<?php

//Hiding all errors and notices
error_reporting(0);

//Initializing the session
session_start();

//Declaring default Date and Time Zone for Stamps
date_default_timezone_set('Asia/Kolkata');

//Including the DB file
include '../../../includes/config/dbConnectivity.php';

  /**
   * This API is for game result uploading.
   *All the values are obtained from jQuery AJAX POST method
   *Accepted Parameters
   * gameID, result and screenshot

   */

   // print_r($_GET);
   // print_r($_GET);
   $requestType = $_GET['request'];
   $gameID = $_GET['gameID'];
   $screenshot = $_FILES['screenshotUpload']['tmp_name'];
   $fileName = basename($_FILES["screenshotUpload"]["name"]);
   $extnsn = explode(".", $_FILES["screenshotUpload"]["name"]);
   $newfilename = 'result_'.$now. strtolower($fileName);
   $uploadDir = "../../../assets/img/matchResult/";
   $now = date("d-m-Y H:i");
   $targetPath = $uploadDir.$newfilename;

   if($requestType == 'uploadResult'){

     if(move_uploaded_file($screenshot, $targetPath)){

           //Update picture name in the database
           //$updateProfilePicture = $conn -> query("UPDATE `user_info` SET `user_profile_pic` = '".$newfilename."' WHERE `user_name` = '$userName'");
           //$updateActivityHistory = $conn -> query("INSERT INTO `user_activity_history`(`user_id`, `user_last_action`, `user_activity_DTStamp`) VALUES ($userID,'profile picture update','$now')");
           //Update status
           // if($update){
           //     $result = 1;
           // }
           echo 'SUCCESS';

     }else{

       echo 'Error';

     }


   }
