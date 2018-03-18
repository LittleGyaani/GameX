<?php

/*This API is used for creating a head on match particularly challenging a user for the game.*/
//*Description*//
//Allow user to join and private match ( basically a head-on with Invitation Code)

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Define Base URL to be used globally
  $baseURL = "http://www.battlestation.live/";

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  //Converting Serialized Data into Actual Data Strings and Single ArrayObject
  parse_str($_POST['headonMatchData'], $quickMatchData);

  $challengeruserID = $_POST['userID'];
  $challengedWhom = $quickMatchData['userSelect'];
  $challengedGame = $quickMatchData['gameSelect'];
  $challengedAmount = $quickMatchData['challengeAmount'];
  $invitationCode = $_POST['InvitationCode'];
  $now = date("d-m-Y H:i");
  $respArray = array();
  $errorCodes = array('NUM' => 'No UserID Mapped to Platforms', 'UCM' => 'Unable to create match at the moment', 'SCU' => 'Successfuly Challenged User');

  $getUserConnectionWithGame = "SELECT * FROM `user_associated_game` WHERE `userID` = $challengeruserID";
  $rungetUserConnectionWithGame = $conn -> query($getUserConnectionWithGame);

  $getAllGameInfo = $conn -> query("SELECT * FROM `profile_platform_games` WHERE `gameID` = $challengedGame");
  $allGameData = $getAllGameInfo -> fetch_assoc();

  if($rungetUserConnectionWithGame -> num_rows > 0){

      // $respArray = array('result' => 'You can challenge', 'msg' => "You are able to challenge the user.");

      $insertforQuickHeadOnMatch = "INSERT INTO `head_on_match_request`(`challenge_gameID`, `invitation_code`, `challenged_whom`, `challenged_by_userID`, `challenge_amount`, `request_DTStamp`, `game_status`) VALUES ($challengedGame, '$invitationCode', $challengedWhom, $challengeruserID, $challengedAmount, '$now', 1)";
      $runinsertforQuickHeadOnMatch = $conn -> query($insertforQuickHeadOnMatch);
      $lastMatchId = $runinsertforQuickHeadOnMatch -> insert_id;

      if($rungetUserConnectionWithGame){

        $pushNotificationforAccepter = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$challengedWhom', 'You have a new quick match request $userName.', 'Please check Quick Challenge for more detils', 0, 'quickChallengeGame', '$userName', '$now')");
        $pushNotificationforChallenger = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$challengeruserID','You have accepted challenge of $challengeruserName','Please check Quick Challenge for more detils', 0, 'quickChallengeGame', '$challengeruserName', '$now')");

      }

  }else{

    $respArray = array('result' => 'No User ID Mapped to platforms', 'msg' => "Please add platforms before challenging someone.", 'code' => 'UCM');

}

  echo json_encode($respArray, JSON_PRETTY_PRINT);
