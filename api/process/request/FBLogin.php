<?php

/*This API checks for the Quick Challenges created by the users and are available to join.*/
//*Description*//
//Allow user to join and open match ( basically a head-on)
//Allow user to create a quick match instead if no open challenge is available

  //Hiding all errors and notices
  error_reporting(0);

  //Initializing the session
  session_start();

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  // print_r($_POST);

  //Declaring Variables
  $email = $_POST['email'];
  $name = $_POS['name'];

  $checkifEmailExists = $conn -> query("SELECT * FROM `user_info` WHERE `email_id` = '$email'");
  $getUserInformations = $checkifEmailExists -> fetch_assoc();

  if($checkifEmailExists -> num_rows > 0){

      echo 'EXISTS';

      //Sending session values back to page and redirect user to Dashboard page
      $_SESSION['userID'] = $getUserInformations['user_id'];

  }

  else{

    echo 'Signup Instead.';
    $insertUserDetails = "INSERT INTO `user_info`(`user_name`, `user_fullname`, `email_id`, `login_password`, `user_registration_date`, `channel_source`, `is_logged_in`, `is_firsttime`) VALUES ('','$name','$userEMAILID','', '$now','facebook',1,1)";
    $runInsertUserDetails = $conn -> query($insertUserDetails);
    $lastUserID = $conn -> insert_id;
    $_SESSION['userID'] = $lastUserID;
    $firstWelcomeMessage = $conn -> query("INSERT INTO `user_notification_record`(`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES ($lastUserID,0,'Welcome to battlestation.','Warm greetings on joining us, $name! Welcome to the platform, Enjoy the whole new world of batteling. Hope you will love it. Your sincere Admin!',0,'welcomemessage','admin','$now')");
    $createWalletforUser = $conn -> query("INSERT INTO `user_wallet_info`(`userID`, `walletBalance`, `created_date_time_stamp`, `lastUpdate_date_time_stamp`) VALUES ('$lastUserID',0,'$now','$now')");

  }
