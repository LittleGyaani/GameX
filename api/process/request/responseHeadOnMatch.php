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

  $headOnMatchID = $_POST['headOnGameID'];
  $requestType = $_GET['request'];
  $now = date("d-m-Y H:i");

  if($requestType == 'accept'){

    $getHeadOnMatchData = $conn -> query("SELECT * FROM `head_on_match_request` WHERE `headonMatchID` = $headOnMatchID");
    $fetchHeadOnMatchData = $getHeadOnMatchData -> fetch_assoc();
    $challengeruserID = $fetchHeadOnMatchData['challenged_by_userID'];
    $challengedWhomuserID = $fetchHeadOnMatchData['challenged_whom'];
    $challengedGameID = $fetchHeadOnMatchData['challenge_gameID'];
    $challengeAmont = $fetchHeadOnMatchData['challenge_amount'];


    if($getHeadOnMatchData){

      $insertQuickHeadOnMatchResponse = $conn -> query("INSERT INTO `head_on_match_response`(`headonMatchID`, `userID`, `gameID`, `opponentID`, `challenge_amount`, `response_DT_Stamp`, `has_accepted_flag`, `dispute_status`, `amount_hold_challenger`, `amount_hold_accepter`) VALUES ($headOnMatchID,$challengeruserID,$challengedGameID,$challengedWhomuserID,$challengeAmont,'$now',1,0,$challengeAmont,$challengeAmont)");

      if($insertQuickHeadOnMatchResponse){
        $updateHeadOnMatchData = $conn -> query("UPDATE `head_on_match_request` SET `game_status` = 0 WHERE `headonMatchID` = $headOnMatchID");
        $rungetWalletInfoForChallenger = $conn -> query("SELECT * FROM `user_wallet_info` uwi JOIN `user_info` usi ON usi.user_id = uwi.userID WHERE `userID` = $challengeruserID");
        $fetchWalletInfoForChallenger = $rungetWalletInfoForChallenger -> fetch_assoc();
        $rungetWalletInfoForAccepter = $conn -> query("SELECT * FROM `user_wallet_info` uwi JOIN `user_info` usi ON usi.user_id = uwi.userID WHERE `userID` = $challengedWhomuserID");
        $fetchWalletInfoForAccepter = $rungetWalletInfoForAccepter -> fetch_assoc();
        $challengerWalletBalance = $fetchWalletInfoForChallenger['walletBalance'];
        $AccepterWalletBalance = $fetchWalletInfoForAccepter['walletBalance'];
        $challengerName = $fetchWalletInfoForChallenger['user_fullname'];
        $accepterName = $fetchWalletInfoForAccepter['user_fullname'];
        $challengerWalletID = $fetchWalletInfoForChallenger['walletID'];
        $accepterWalletID =  $fetchWalletInfoForAccepter['walletID'];
        $challengerREMBalance = $challengerWalletBalance-$challengeAmont;
        $AccepterREMBalance = $AccepterWalletBalance-$challengeAmont;
        $updateChallengerWalletBalance = $conn -> query("UPDATE `user_wallet_info` SET `walletBalance`=$challengerWalletBalance-$challengeAmont,`lastUpdate_date_time_stamp`='$now' WHERE `userID` = $challengeruserID");
        $updateAccepterWalletBalance = $conn -> query("UPDATE `user_wallet_info` SET `walletBalance`=$AccepterWalletBalance-$challengeAmont,`lastUpdate_date_time_stamp`='$now' WHERE `userID` = $challengedWhomuserID");
        $pushNotificationforAccepter   = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$challengedWhomuserID', '$challengeruserID','You have accepted match request id $headOnMatchID by $challengerName.', 'Your wallet is debited with ₹$challengeAmont and remaining wallet balance is ₹$AccepterREMBalance. Please proceed with gameplay.', 0, 'headONChallengeGame', '$challengerName', '$now')");
        $pushNotificationforChallenger = $conn -> query("INSERT INTO `user_notification_record` (`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES('$challengeruserID','$challengedWhomuserID','Congratulations! $accepterName has accepted your challenge for match id $headOnMatchID.','Your wallet is debited with ₹$challengeAmont and remaining wallet balance is ₹$challengerREMBalance. Please proceed with gameplay.', 0, 'headONChallengeGame', '$accepterName', '$now')");
        $pushChallengerWalletStatistics = $conn -> query ("INSERT INTO `user_wallet_transaction_info`(`userID`, `user_wallet_id`, `lastUsedBalance`, `wallet_remaining_balance`, `useType`, `transaction_status`, `date_time_stamp`) VALUES ($challengeruserID,$challengerWalletID,$challengeAmont,$challengerREMBalance,'headOnMatchPayment','completed','$now')");
        $pushAccepterWalletStatistics = $conn -> query ("INSERT INTO `user_wallet_transaction_info`(`userID`, `user_wallet_id`, `lastUsedBalance`, `wallet_remaining_balance`, `useType`, `transaction_status`, `date_time_stamp`) VALUES ($challengedWhomuserID,$accepterWalletID,$challengeAmont,$AccepterREMBalance,'headOnMatchPayment','completed','$now')");

        //Generate and throw Response for functions to work
        $respArray = array('code' => 'HMA', 'msg' => 'Head on match accepted by "'.$accepterName.'"', 'resp' => 'Please proceed with game playing.');

      }

    }else{

      echo 'Unable to handle request';

    }


  }else{

    echo 'None';

  }

  //Printing JSON Response
  echo json_encode($respArray, JSON_PRETTY_PRINT);

  //Close the connection bridge
  $conn -> close();
