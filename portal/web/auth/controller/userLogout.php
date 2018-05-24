<?php

//*This php script closes the brige between User, Database and relatedely accessible files.*//

//Hiding all errors and notices
error_reporting(0);

//Start a logout session
session_start();

//Destroy the global variable 'userID' from everywhere
unset($_SESSION['userID']);

//Change the login state of user


//Destroy the entire session which makes sure no values EXISTS anywhere, anymeans
session_destroy();

//Redirect back user to Login page
header('Location:../loginPage');
