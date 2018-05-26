<?php

  /*This API is used for checking wallet balance.*/
  //*Description*//
  //This API throws back with user current wallet balance

  //Hiding all errors and notices
  error_reporting(0);

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Declaring File Header for better and basically Json Content
  header('Content-Type: application/json');

  //Allow Cross Access from Origin
  header("Access-Control-Allow-Origin: *");

  //Define Base URL to be used globally
  $baseURL = "http://www.battlestation.live/";

  function get_time_ago( $time )
  {
      $time_difference = time() - $time;

      if( $time_difference < 1 ) { return '1 second ago'; }
      $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                  30 * 24 * 60 * 60       =>  'month',
                  24 * 60 * 60            =>  'day',
                  60 * 60                 =>  'hour',
                  60                      =>  'minute',
                  1                       =>  'second'
      );

      foreach( $condition as $secs => $str )
      {
          $d = $time_difference / $secs;

          if( $d >= 1 )
          {
              $t = round( $d );
              return  $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
          }
      }
  }

  $userID = $_POST['userID'];
  $respArray = array();

  $getNotficationinPanel = $conn -> query("SELECT * FROM `user_notification_record` WHERE `userID` = $userID AND `notification_status` = 0 ORDER BY `notification_sent_DTStamp` DESC");

    if($getNotficationinPanel -> num_rows > 0){

      while ($showNotificationsinPanel = $getNotficationinPanel -> fetch_assoc()) {

        $notificationID       = $showNotificationsinPanel['notificationID'];
        $notificationTitle    = $showNotificationsinPanel['notification_title'];
        $notificationMessage  = $showNotificationsinPanel['notification_message'];
        $notificationSentBy   = $showNotificationsinPanel['notification_sent_by'];
        $notificationSentOn   = get_time_ago(strtotime($showNotificationsinPanel['notification_sent_DTStamp']));

    echo $messages = '<div class="row">
                        <div class="col-md-12">
                          <!-- Messages with Box  -->
                            <div class="alert fade show u-shadow-v1-3 g-pa-20" role="alert">
                              <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                                <span class="readNotification" aria-hidden="true" id ='."$notificationID".'>×</span>
                              </button>';

      echo $messages = '<div class="media">
                                <div class="d-flex g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--sm g-bg-white g-color-red">
                                    <i class="icon-speech icon-notifications-bell"></i>
                                  </span>
                                </div>
                                <div class="media-body">
                                  <div class="d-flex justify-content-between">
                                    <p class="m-0">'."$notificationTitle".'</p>
                                    <p class="m-0">sent by '."$notificationSentBy".'</p>
                                    <p class="m-0"><span class="float-right small g-mx-10">'."$notificationSentOn".'</span></p>
                                  </div>
                                  </br>
                                  <p class="m-0 g-font-size-14">'."$notificationMessage".'</p>
                                </div>
                              </div>';

      echo $messages = '</div>
                              <!-- Messages with Box Shadow -->
                            </div>
                          </div>';

      }
      echo $messages;

    }else{

        echo $messages = '<div class="row">
                          <div class="col-md-12">';
        echo $messages = '<center><img src="../../../assets/img/icons/no-notifications.png" height="225" width="225" alt="No Notifications - battlestation"/><br>';
        echo $messages =  "<span class='g-color-primary'>All caught up!</span> <br>Nothing to show at the moment. :)</center>";
        echo $messages = "</div></div>";

      }

  //Close the connection bridge
  $conn -> close();
