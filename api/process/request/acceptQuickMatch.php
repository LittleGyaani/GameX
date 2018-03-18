<?php

/*This API is used for accpeting the Quick Challenges created by the users and are available to join.*/
//*Description*//
//Allow user to join and open match ( basically a head-on)
//Allow user to create a quick match instead if no open challenge is available

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Define Base URL to be used globally
  $baseURL = "http://www.battlestation.live/";

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  $quickMatchID = $_POST['quickMatchID'];
  $acceptoruserID = $_POST['acceptoruserID'];
  $challengeruserID = $_POST['challengeruserID'];
  $challengeruserName = $_POST['challengeruserName'];
  $getUserDetails = $conn -> query("SELECT * FROM `user_info` WHERE `user_id` = $acceptoruserID");
  $fetchUserDetails = $getUserDetails -> fetch_assoc();
  $now = date("d-m-Y H:i");

  //Details to be used while sending the notifications
  $userName = $fetchUserDetails['user_fullname'];


  $updateAcceptedStatus    = "UPDATE `quick_user_match` SET `acceptor_id` = $acceptoruserID, `status_flag` = 1 WHERE `quickMatchID` = $quickMatchID";
  $runupdateAcceptedStatus = $conn -> query($updateAcceptedStatus);

  $pushNotificationforChallenger = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$challengeruserID','','Challenge accepted by $userName.', 'Please check Quick Challenge for more detils', 0, 'quickChallengeGame', '$userName', '$now')");
  $pushNotificationforAccepter   = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$acceptoruserID','','You have accepted challenge of $challengeruserName','Please check Quick Challenge for more detils', 0, 'quickChallengeGame', '$challengeruserName', '$now')");

  if($runupdateAcceptedStatus)
    echo "CA";
  else
    echo "Unable to handle the request at the moment";
