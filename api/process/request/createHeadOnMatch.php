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

  
