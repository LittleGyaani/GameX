<!-- <?php

/*This API is used for user profile picture update or change.*/
//*Description*//
//Allows user to update his/her profile picture

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  $userName = $_GET['username'];
  $userID = $_GET['userid'];
  $imageName = $_FILES['profile_photo']['tmp_name'];
  // $fileName = 'user'.'_'.basename($_FILES["profile_photo"]["name"]);
  $extnsn = explode(".", $_FILES["profile_photo"]["name"]);
  $newfilename = 'user_'. strtolower($userName) . '.' . end($extnsn);
  $uploadDir = "../../../assets/img/profilePic/";
  $targetPath = $uploadDir.$newfilename;
  $now = date("d-m-Y H:i");

  // echo $imageName.'</br>'.$fileName.'</br>'.$targetPath;
  // exit;
// if(file_exists($targetPath)){
//
//   chmod($targetPath,0755);
//   unlink($targetPath);

  if(move_uploaded_file($imageName, $targetPath)){

        //Update picture name in the database
        $updateProfilePicture = $conn -> query("UPDATE `user_info` SET `user_profile_pic` = '".$newfilename."' WHERE `user_name` = '$userName'");
        $updateActivityHistory = $conn -> query("INSERT INTO `user_activity_history`(`user_id`, `user_last_action`, `user_activity_DTStamp`) VALUES ($userID,'profile picture update','$now')");
        //Update status
        // if($update){
        //     $result = 1;
        // }
        echo 'SUCCESS';

  }else{

    echo 'Error';

  }

// }else{
//
//   echo 'Unable to update profile picture';
//
// } -->
<?php

/*This API is used for user profile picture update or change.*/
//*Description*//
//Allows user to update his/her profile picture

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  $userName = $_GET['username'];
  $userID = $_GET['userid'];
  $imageName = $_FILES['profile_photo']['tmp_name'];
   $fileName = 'user'.'_'.basename($_FILES["profile_photo"]["name"]);
  $extnsn = explode(".", $_FILES["profile_photo"]["name"]);
  $newfilename = 'user_'. strtolower($fileName) . '.' . end($extnsn);
  $uploadDir = "../../../assets/img/profilePic/";
  $targetPath = $uploadDir.$newfilename;
  $now = date("d-m-Y H:i");

  // echo $imageName.'</br>'.$fileName.'</br>'.$targetPath;
  // exit;
// if(file_exists($targetPath)){
//
//   chmod($targetPath,0755);
//   unlink($targetPath);

  if(move_uploaded_file($imageName, $targetPath)){

        //Update picture name in the database
        $updateProfilePicture = $conn -> query("UPDATE `user_info` SET `user_profile_pic` = '".$newfilename."' WHERE `user_name` = '$userName'");
        $updateActivityHistory = $conn -> query("INSERT INTO `user_activity_history`(`user_id`, `user_last_action`, `user_activity_DTStamp`) VALUES ($userID,'profile picture update','$now')");
        //Update status
        // if($update){
        //     $result = 1;
        // }
        echo 'SUCCESS';

  }else{

    echo 'Error';

  }

// }else{
//
//   echo 'Unable to update profile picture';
//
// }
