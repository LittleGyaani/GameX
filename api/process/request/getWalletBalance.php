<?php

  /*This API is used for checking wallet balance.*/
  //*Description*//
  //This API throws back with user current wallet balance

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Allow Cross Access from Origin
  header("Access-Control-Allow-Origin: *");

  //Set Document type to JSON
  header("Content-Type:application/json");

  //Define Base URL to be used globally
  $baseURL = "http://www.battlestation.live/";

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  $userID = $_POST['userID'];
  $respArray = array();

  $getWalletBalance = "SELECT * FROM `user_wallet_info` WHERE `userID` = $userID";
  $rungetWalletBalance = $conn -> query($getWalletBalance);
  $walletmetaInfo = $rungetWalletBalance -> fetch_assoc();

  if($rungetWalletBalance)

    $respArray = array('code' => 'WBF', 'response' => 'Wallet Balance Available', 'msg' => $walletmetaInfo['walletBalance'], 'lastUpdatedOn' => $walletmetaInfo['lastUpdate_date_time_stamp']);

  else

    $respArray = array('code' => 'UFB', 'response' => 'Unable to Fetch User Balance', 'msg' => 'Facing trouble while fetching wallet info');

  //Printing JSON Response
  echo json_encode($respArray, JSON_PRETTY_PRINT);

  //Close the connection bridge
  $conn -> close();
