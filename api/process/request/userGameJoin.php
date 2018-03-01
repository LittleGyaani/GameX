<?php

//Hiding all errors and notices
error_reporting(0);

//Declaring default Date and Time Zone for Stamps
date_default_timezone_set('Asia/Kolkata');

session_start();

//Including the DB file
include '../../../includes/config/dbConnectivity.php';


$gameID = $_POST['gameID'];
$userID = $_POST['userID'];
$resp = array();
$now = date("d-m-Y H:i");

$checkUserTournament = "SELECT * FROM `tournament_fixture_info` WHERE `tournament_Game_ID` = $gameID AND `tournament_join_userID` = $userID";
$runcheckUserTournament = $conn -> query($checkUserTournament);

if($runcheckUserTournament -> num_rows > 0 ){

  $resp = array('response' => 'ERROR', 'messages' => 'You have already joined.');

}else{

  $insertUserTournament = "INSERT INTO `tournament_fixture_info`(`tournament_Game_ID`, `tournament_join_userID`, `lastUpdatedOn`) VALUES ($gameID, $userID, '$now')";
  $runinsertUserTournament = $conn -> query($insertUserTournament);

    if($runinsertUserTournament){

      $resp = array('response' => 'SUCCESS', 'messages' => 'You have successfully joined the tournament.');

    }

}

//Closing the bridge between Database
$conn -> close();

//Printing all the responses now
echo json_encode($resp, JSON_PRETTY_PRINT);
