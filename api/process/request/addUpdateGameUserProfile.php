<?php

//Hiding all errors and notices
error_reporting(0);

//Including the DB file
include '../../../includes/config/dbConnectivity.php';

  /*This API checks for the latest notification associated with user.*/

  //Accepted Parameters
  //#gamePlatforUserID
  //#gameID

  $platformUSERName = $_POST['platformUserName'];
  $gamePlatformID = $_POST['platformGameID'];
  $userID = $_POST['userID'];
  $requestType = $_GET['request'];
  $resp = array();

if($requestType == 'getUserName'){

  $checkUserID = "SELECT * FROM `user_associated_game` WHERE `platform_user_name` = '$platformUSERName' AND `gameID` = $gamePlatformID AND `userID` = $userID";
  $runCheckUserID = $conn -> query($checkUserID);
  $getPlatformUserDetails = $runCheckUserID -> fetch_assoc();

  if(($runCheckUserID -> num_rows) > 0){

      $resp = array('status' => 'fetched', "userName" =>  $getPlatformUserDetails['platform_user_name'], "gameID" => $gamePlatformID);

  }

}else if($requestType == 'updateUserName'){

    $checkUserExistance = $conn -> query("SELECT * FROM `user_associated_game` WHERE `platform_user_name` = '$platformUSERName'");

    if($checkUserExistance -> num_rows > 0){

      $resp = array('message' => 'SAME');

    }else{


      $updateUserID = "UPDATE `user_associated_game` SET `platform_user_name` = '$platformUSERName' WHERE `gameID` = $gamePlatformID AND `userID` = $userID";
      $runUpdateUserID = $conn -> query($updateUserID);

      if($runUpdateUserID)

        $resp = array('message' => 'UPDATED');

    }

}else{

    $resp = array("status" => 'ERROR', 'message' => 'Please provide valid request.');

}

//Closing the connection now
mysqli_close($conn);

//Printing the response obtained
echo json_encode($resp,JSON_PRETTY_PRINT);
