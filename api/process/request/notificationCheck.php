<?php

    //Hiding all errors and notices
    error_reporting(0);

    //Allow Cross Access from Origin
    header("Access-Control-Allow-Origin: *");

    //Define Base URL to be used globally
    $baseURL = "http://www.battlestation.live/";

    //Including the DB file
    include "../../../includes/config/dbConnectivity.php";

    //Setting Header Type for JSON Output
    header('Content-Type:application/json');

  /*This API checks for the latest notification associated with user.*/

      //Accepted Parameters
      //#userID
     //#notificationCount

    //Reading user from URL via POST
    $userID = $_POST['userID'];
    $notificationCount = $_POST['notification_count'];
    $secureToken = $_POST['token'];

  //Response array to throw response messages according to action
  $respArray = array();
  $unreadCount = 0;

  if($secureToken){

      //Check if userID is passed to API or not
      if($userID){

        $getNotificationsCount = "SELECT * FROM `user_notification_record` WHERE `userID` = $userID AND `notification_status` = 0";
        $getMessageCount = $conn -> query($getNotificationsCount);
        $unreadCount = $getMessageCount -> num_rows;

          if($getMessageCount){

            //Printing Response Array
            if($unreadCount > $notificationCount){

                $respArray = array('message' => 'New Unread Notifications.', "unreadcounts" => $unreadCount, 'response' => 'NUN');

            }else if($unreadCount == 0){

                $respArray = array('message' => 'All caught up.', "unreadcounts" => $unreadCount, 'response' => 'NNN');

            }else if ($notificationCount == $unreadCount){

                $respArray = array('message' => 'You have unread notifications.', "unreadcounts" => $unreadCount, 'response' => 'NPR');

            }

            //NUN - New Unread Notifications, NNN - No New Notifications, NPR - Notification Pending to Read

          }else {

            //Printing Response Array
            $respArray = array('message' => 'Unable to get new notifications.');

          }

      }else{

        $respArray = array('message' => 'No userID Obtained via URL.');

      }

    }else{

        $respArray['response'][] = array('message' => "Invalid Secure Token Passed.", 'response' => "You are not authorized or no secure method obtained. Recording your IP Now.");

    }

  //Closing the connection now
  $conn -> close();

  //Printing Response Array
  echo json_encode($respArray,JSON_PRETTY_PRINT);
