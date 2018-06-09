<?php

//*This php script closes the brige between User, Database and relatedely accessible files.*//

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../../includes/config/dbConnectivity.php';

//Declaring default Date and Time Zone for Stamps
date_default_timezone_set('Asia/Kolkata');

//Start a logout session
session_start();

//Declaring Varibale
$userID = $_SESSION['userID'];
$now = date("d-m-Y H:i");

//Destroy the global variable 'userID' from everywhere
unset($_SESSION['userID']);

//Change the login state of user
$conn -> query("UPDATE `user_info` SET `is_logged_in` = 0 WHERE `user_id` = $userID");

//Updating user Activity History
$updateActivityHistory = $conn -> query("INSERT INTO `user_activity_history`(`user_id`, `user_last_action`, `user_activity_DTStamp`) VALUES ($userID,'user logged out of account.','$now')");

//Destroy the entire session which makes sure no values EXISTS anywhere, anymeans
session_destroy();

//Closing Mysqli connection bridge
$conn -> close();

//Redirect back user to Login page
header('Location:../loginPage');
