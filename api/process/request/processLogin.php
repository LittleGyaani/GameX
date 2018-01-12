<?php

//Hiding all errors and notices
error_reporting(0);


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
   $resp = "";

   //Getting values via POST method
   $userName = $_POST['userName'];
   $userPassword = $_POST['userPassword'];
   //Running query to validate the user with provided combination
   $retrieveUserDetails = "SELECT * from user_info WHERE (user_name = '$userName' OR email_id = '$userName') AND login_password = '$userPassword'";
   $runUserRetrivalQuery = $conn -> query($retrieveUserDetails);
   $getUserInformations = $runUserRetrivalQuery -> fetch_array();

   //Checking if all the values are passed to this API or not
   if(!empty($_POST)){

     //Running the query and validating with the Database if the user exists or not
     if($runUserRetrivalQuery && (mysqli_num_rows($runUserRetrivalQuery) > 0)){

       //Sending session values back to page and redirect user to Dashboard page
       $_SESSION['userID'] = $getUserInformations['user_id'];

       //Generting response
       $resp = array('result' => 'SUCCESS', 'resp' => 'User validated.', 'msg' => 'Redirecting you now to Dashboard.');

     }else{

       $resp = array('result' => 'ERROR', 'resp' => 'No such user exists.', 'msg' => 'Please create an Account before login.');
     }

   }else {

       $resp = array('result' => 'EMPTY', 'resp' => 'Please check username or EMAIL ID or Password.', 'msg' => 'Wrong combination provided.');

   }

   //Closing the connection now
   mysqli_close($conn);

   //Printing the response obtained
   echo json_encode($resp,JSON_PRETTY_PRINT);
