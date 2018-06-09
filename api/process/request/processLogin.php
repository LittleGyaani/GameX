<?php

//Hiding all errors and notices
error_reporting(0);

//Initializing the session
session_start();

//Including the DB file
include '../../../includes/config/dbConnectivity.php';

  /**
   * This API is for validation of the credentials given by the user for successful login.
   *All the values are obtained from jQuery AJAX POST method
   *Accepted Parameters
   * userName and userPassword

   */

   //Declaring variables
   $userName = "";
   $userPassword = "";
   $resp = array();

   //Getting values via POST method
   $userName = $_POST['userName'];
   $userPassword = $_POST['userPassword'];

   //Running query to validate the user with provided combination
   $retrieveUserDetails = "SELECT * from `user_info` WHERE `user_name` LIKE '$userName' OR `email_id` LIKE '$userName' ";
   $runUserRetrivalQuery = $conn -> query($retrieveUserDetails);

   // print_r($getUserInformations);
   // exit;

   //Checking if all the values are passed to this API or not
   if(!empty($_POST)){

     //Running the query and validating with the Database if the user exists or not
     if(($runUserRetrivalQuery && ($runUserRetrivalQuery -> num_rows) > 0)){

       //Generting response
       $resp = array('result' => 'VALID', 'resp' => 'Username or email id exists.', 'msg' => 'Lets Check for Password.');

       //Check for all existing data in datbaase
       while($getUserInformations = $runUserRetrivalQuery -> fetch_assoc()){

           //Checking if Password matches with the stored value in Database
           if($userPassword == $getUserInformations['login_password']){

             //Sending session values back to page and redirect user to Dashboard page
             $_SESSION['userID'] = $getUserInformations['user_id'];

             //Update Login State in DB
             //$conn -> query("UPDATE `user_info` SET `is_logged_in` = 1");

             //Generting response
             $resp = array('result' => 'SUCCESS', 'resp' => 'User validated.', 'msg' => 'Redirecting you now to Dashboard.');
             $updateActivityHistory = $conn -> query("INSERT INTO `user_activity_history`(`user_id`, `user_last_action`, `user_activity_DTStamp`) VALUES ($getUserInformations['user_id'],'user logged into the account using credentials.','$now')");

           }else{

             //Generting response
             $resp = array('result' => 'PASSERROR', 'resp' => 'Wrong password used.', 'msg' => 'Please retype password.');

           }

       }//End while loop

      }else{

         //Generting response
         $resp = array('result' => 'USERERROR', 'resp' => 'No Such user exists.', 'msg' => 'Please signup before continuing.');

       }

   }else {

       //Generting response
       $resp = array('result' => 'EMPTY', 'resp' => 'Please check username or EMAIL ID or Password.', 'msg' => 'Wrong combination provided.');

   }

   //Closing the Mysqli connection now
   $conn -> close();

   //Printing the response obtained
   echo json_encode($resp,JSON_PRETTY_PRINT);
