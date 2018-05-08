<?php

//Hiding all errors and notices
error_reporting(0);

/**
 * This file is for establishing connection with Database.
 */
 $dbHost = "localhost";
 $dbUser = "root";
 $dbPass = "";
 $dbName = "battle_station_DB";

 //Establishing connection to Database using MySQLi
 $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
 // if($conn){
 //   echo 'Connection Established Successfuly.';
 // }else{
 //   echo 'Unable to Establish connection at this moment.'.mysql_erro_no($conn);
 // }
