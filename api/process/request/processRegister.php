<?php

//Hiding all errors and notices
error_reporting(0);

//Including the DB file
include '../../../includes/config/dbConnectivity.php';

//Declaring default Date and Time Zone for Stamps
date_default_timezone_set('Asia/Kolkata');

  /**
   * This API is for registering new user if login fails.
   *All the values are obtained from jQuery AJAX POST method
   *Accepted Parameters
   * userName , userPassword, userEMAILID, userFullName

   */

   //Declaring variables
   $userName = "";
   $userPassword = "";
   $userEMAILID = "";
   $userFullName = "";
   $resp = "";
   $now = date("d-m-Y H:i");
   $regDate = date("d-m-Y");

   //Getting values via POST method
   $userName = $_POST['userName'];
   $userPassword = $_POST['userPassword'];
   $userFullName = $_POST['userFullName'];
   $userEMAILID = $_POST['userEMAILID'];
   $retrieveUserDetails = "SELECT * from user_info WHERE user_name LIKE '$userName' OR email_id LIKE '$userEMAILID' AND login_password = '$userPassword'";
   $runUserRetrivalQuery = $conn -> query($retrieveUserDetails);

   //Checking if all the values are passed to this API or not
   if(!empty($_POST)){

     //Running the query and validating with the Database if the user exists or not
     if($runUserRetrivalQuery && (($runUserRetrivalQuery -> num_rows) > 0)){

       $resp = array('result' => 'EXISTS', 'resp' => 'User already exists.', 'msg' => 'Please login to access Dashboard.');

     }else{

       $insertUserDetails = "INSERT INTO `user_info`(`user_name`, `user_fullname`, `email_id`, `login_password`, `user_registration_date`) VALUES ('$userName','$userFullName','$userEMAILID','$userPassword', '$regDate')";
       $runInsertUserDetails = $conn -> query($insertUserDetails);
       $lastUserID = $conn -> insert_id;
       $createWalletforUser = $conn -> query("INSERT INTO `user_wallet_info`(`userID`, `walletBalance`, `created_date_time_stamp`, `lastUpdate_date_time_stamp`) VALUES ('$lastUserID',0,'$now','$now')");

         //Running the insertion query to push data to DB if the user doesn't exist
         if($runInsertUserDetails){

           $resp = array('result' => 'NEW', 'resp' => 'User Signup successful.', 'msg' => 'Please login to continue.');

         }else{

           $resp = array('result' => 'ERROR', 'resp' => 'Unable to signup the user.', 'msg' => 'Something went wrong.');

         }

     }

   }else {

       $resp = array('result' => 'EMPTY', 'resp' => 'No required values passed.', 'msg' => 'Please check your form and try again.');

   }

   //Closing the connection now
   mysqli_close($conn);

   //Printing the response obtained
   echo json_encode($resp,JSON_PRETTY_PRINT);
