<?php

//Hiding all errors and notices
error_reporting(0);

//Including the DB file
include '../../../includes/config/dbConnectivity.php';

  /*This API checks for the latest notification associated with user.*/

  //Accepted Parameters
  //#userID

  //Reading user from URL via GET
  $userID = $_GET['userID'];
  //Response array to throw response messages according to action
  $respArray = array();
  $unreadCount = 0;

  //Check if userID is passed to API or not
  if($userID){

    $getNotificationsCount = "SELECT *,count(*) AS COUNT FROM `user_notification_record` WHERE `userID` = $userID AND `notification_status` = 0";
    $getMessageCount = $conn -> query($getNotificationsCount);

      if($getMessageCount -> num_rows > 0){

        while($checkNotifications = $getMessageCount -> fetch_assoc()){

                $unreadCount = $checkNotifications['COUNT'];
                $messageTitle = $checkNotifications['notification_title'];
                $messageContent = $checkNotifications['notification_message'];

        }

        /*Put one if condition here */
        //Printing Response Array
        $respArray = array('message' => 'Unread Notifications.', "unreadcounts" => $unreadCount, "messagetitle" => $messageTitle, "messagecontent" => $messageContent);
        // echo json_encode($notificationCountArray, JSON_PRETTY_PRINT);
        // echo 'API WORKING SUCCESSFULLY';
        // exit;

      }else {

        //Printing Response Array
        $respArray = array('message' => 'All Caught-up!.', "unreadcounts" => $unreadCount);

      }

  }else{

    $respArray = array('message' => 'No userID Obtained via URL.');

  }

  //Closing the connection now
  mysqli_close($conn);

  //Printing Response Array
  echo json_encode($respArray,JSON_PRETTY_PRINT);
