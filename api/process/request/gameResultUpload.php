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
   $winnderID = $_GET['winnderuserID'];
   $screenshot = $_FILES['screenshotUpload']['tmp_name'];
   $fileName = basename($_FILES["screenshotUpload"]["name"]);
   $extnsn = explode(".", $_FILES["screenshotUpload"]["name"]);
   $newfilename = 'result_'.$now. strtolower($fileName);
   $uploadDir = "../../../assets/img/matchResult/";
   $now = date("d-m-Y H:i");
   $targetPath = $uploadDir.$newfilename;

   if($requestType == 'uploadResult'){

     if(move_uploaded_file($screenshot, $targetPath)){

           //Update Head On Match Result
           $headOnMatchResult = $conn -> query("INSERT INTO `head_on_match_result`(`headONMatchID`, `winner_user_id`, `winning_score`, `amount_credited`, `credit_status`, `dispute_status`, `opponent_rating`, `match_result_proof`,`updated_on`) VALUES ($gameID,$winnderID,0,0,'awaiting confirmation',0,0,'$newfilename','$now')");
           $updateHeadonMatchResult = $conn -> query("UPDATE `head_on_match_request` SET `is_result_uploaded` = 'y' WHERE `headONMatchID` = $gameID");
           if($headOnMatchResult)
                echo 'SUCCESS';


     }else{

       echo 'Error';

     }


   }else{


     echo 'No Valid Request';

   }
