<?php
/**
 * This file is for establishing connection with Database.
 */
 $dbHost = "localhost";
 $dbUser = "root";
 $dbPass = "";
 $dbName = "gamex_db";

 //Establishing connection to Database using MySQLi
 $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
 // if($conn){
 //   echo 'Connection Established Successfuly.';
 // }else{
 //   echo 'Unable to Establish connection at this moment.'.mysql_erro_no($conn);
 // }
