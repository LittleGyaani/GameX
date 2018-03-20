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
  $challengeduserName = explode('-',$_POST['challengedUserName']);
  $challengeduserFirstName = $challengeduserName[0];
  $userNameArray = explode('!',$_POST['userName']);
  $userName = $userNameArray[0];
  $now = date("d-m-Y H:i");
  $respArray = array();
  $errorCodes = array('NUM' => 'No UserID Mapped to Platforms', 'UCM' => 'Unable to create match at the moment', 'SCU' => 'Successfuly Challenged User');

  $getUserConnectionWithGame      = "SELECT * FROM `head_on_match_request` WHERE `challenged_by_userID` = $challengeruserID AND `challenge_gameID` = $challengedGame AND `game_status` = 1";
  $rungetUserConnectionWithGame   = $conn -> query($getUserConnectionWithGame);
  $fetchgetUserConnectionWithGame = $rungetUserConnectionWithGame -> fetch_assoc();

  $getAllGameInfoForChallenger = $conn -> query("SELECT * FROM `user_associated_game` WHERE `gameID` = $challengedGame AND `userID` = $challengeruserID");
  $getAllGameInfoForAccepter   = $conn -> query("SELECT * FROM `user_associated_game` WHERE `gameID` = $challengedGame AND `userID` = $challengedWhom");

    if(!$rungetUserConnectionWithGame -> num_rows > 0){

      if(($getAllGameInfoForChallenger -> num_rows > 0) && ($getAllGameInfoForAccepter -> num_rows > 0)){

          $insertforQuickHeadOnMatch = "INSERT INTO `head_on_match_request`(`challenge_gameID`, `invitation_code`, `challenged_whom`, `challenged_by_userID`, `challenge_amount`, `request_DTStamp`, `game_status`) VALUES ($challengedGame, '$invitationCode', $challengedWhom, $challengeruserID, $challengedAmount, '$now', 1)";
          $runinsertforQuickHeadOnMatch = $conn -> query($insertforQuickHeadOnMatch);
          $lastMatchId = $conn -> insert_id;

          if($runinsertforQuickHeadOnMatch){

            $pushNotificationforAccepter   = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$challengedWhom', '$challengeruserID','You have a new quick match request from $userName for match ID $lastMatchId.', 'Please check My Challenge Requests for more detils', 0, 'headONChallengeGame', '$userName', '$now')");
            $pushNotificationforChallenger = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$challengeruserID','0','You have challenged $challengeduserFirstName','Please share this <i>$invitationCode</i> invitation code with $challengeduserFirstName for match ID $lastMatchId', 0, 'headONChallengeGame', 'admin', '$now')");

            //Generating Response to perform action
            $respArray = array('result' => 'You have successfully challenged "'.$challengeduserFirstName.'"', 'msg' => "Please ask to join with your promo code and wait for match.", 'code' => 'UCS');

          }

      }else{

        //Generating Response to perform action
        $respArray = array('result' => 'No User ID Mapped to platforms or no common games found.', 'msg' => "Please add platforms / more platform userid/names before challenging someone.", 'code' => 'UCM');

      }

    }else{

      //Generating Response to perform action
      $respArray = array('result' => 'You have already challenged the user.', 'msg' => "Please wait while he/she joins your match and then retry.", 'code' => 'WFA');

    }

  //Printing JSON Response
  echo json_encode($respArray, JSON_PRETTY_PRINT);

  //Close the connection bridge
  $conn -> close();
