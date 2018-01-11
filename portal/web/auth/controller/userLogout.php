<?php

//Hiding all errors and notices
error_reporting(0);

session_start();
session_destroy();
unset($_SESSION['userID']);
header('Location:../loginPage.php');
