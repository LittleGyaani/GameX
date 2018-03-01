<?php

//Hiding all errors and notices
error_reporting(0);

//Initializing the session to make sure that it prevents unauthorize access to the script
session_start();

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
   $resp = array();
   $now = date("d-m-Y H:i");
   $regDate = date("d-m-Y");
   $requestType = $_GET['request'];

   //Getting values via POST method
   $userName = $_POST['userName'];
   $userPassword = $_POST['userPassword'];
   $userFullName = ucwords($_POST['userFullName']);
   $userEMAILID = $_POST['userEMAILID'];

   //Checking if all the values are passed to this API or not
   if($_POST){

     if($requestType == 'checkUserName'){

       $checkUserName = "SELECT * FROM `user_info` WHERE `user_name` = '$userName'";
       $runCheckUserNameQuery = $conn -> query($checkUserName);

       //Running the query and validating with the Database if the user exists or not
       if($runCheckUserNameQuery -> num_rows > 0){

         $resp = array('result' => 'USABLE', 'resp' => 'Username exists.', 'msg' => 'TAKEN.');

       }else{

         $resp = array('result' => 'AVAILABLE', 'resp' => 'Username can be used.', 'msg' => 'AVAILABLE.');

       }


     }else if($requestType == 'registerUser'){

       $checkforUserData = $conn -> query("SELECT * from `user_info` WHERE `user_name` LIKE '$userName' OR `email_id` LIKE '$userEMAILID'");

       if($checkforUserData -> num_rows > 0){

          $resp = array('result' => 'EXISTS', 'resp' => 'User account already exists.', 'msg' => 'Try logging in or resetting the password.');

       }else{

          $insertUserDetails = "INSERT INTO `user_info`(`user_name`, `user_fullname`, `email_id`, `login_password`, `user_registration_date`) VALUES ('$userName','$userFullName','$userEMAILID','$userPassword', '$regDate')";
          $runInsertUserDetails = $conn -> query($insertUserDetails);
          $lastUserID = $conn -> insert_id;
          $createWalletforUser = $conn -> query("INSERT INTO `user_wallet_info`(`userID`, `walletBalance`, `created_date_time_stamp`, `lastUpdate_date_time_stamp`) VALUES ('$lastUserID',0,'$now','$now')");

            //Running the insertion query to push data to DB if the user doesn't exist
            if($runInsertUserDetails){

              //Sending session values back to page and redirect user to Dashboard page
              $_SESSION['userID'] = $getUserInformations['user_id'];

              $resp = array('result' => 'NEW', 'resp' => 'User Signup successful.', 'msg' => 'Please login to continue.');

            }else{

              $resp = array('result' => 'ERROR', 'resp' => 'Unable to signup the user.', 'msg' => 'Something went wrong.');

            }

       }

     }

   }else{

       $resp = array('result' => 'EMPTY', 'resp' => 'No required values passed.', 'msg' => 'Please check your form and try again.');

   }

   //Closing the connection now
   $conn -> close();

   //Printing the response obtained
   echo json_encode($resp,JSON_PRETTY_PRINT);
