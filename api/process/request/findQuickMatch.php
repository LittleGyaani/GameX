<?php

/*This API checks for the Quick Challenges created by the users and are available to join.*/
//*Description*//
//Allow user to join and open match ( basically a head-on)
//Allow user to create a quick match instead if no open challenge is available

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Define Base URL to be used globally
  $baseURL = "http://www.battlestation.live/";

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  $secureToken = $_POST['token'];
  $userID = $_POST['userid'];

  echo $output = '<div class="row">';

  if($secureToken){

      $getAllOpenQuickChallenge = "SELECT * FROM `quick_user_match`  qum JOIN `profile_platform_games` ppg ON qum.`challenged_game_platform` = ppg.`gameID` WHERE qum.`creator_id` != $userID";
      // SELECT * FROM `quick_user_match` qum JOIN `profile_platform_games` ppg ON qum.`challenged_game_platform` = ppg.`gameID` JOIN `user_info` usi ON qum.`creator_id` = usi.`user_id` JOIN `user_associated_game` uag ON uag.`userID` = usi.`user_id` WHERE ppg.`gameID` = uag.`gameID`
      $rungetAllOpenQuickChallenge = $conn -> query($getAllOpenQuickChallenge);

      if($rungetAllOpenQuickChallenge -> num_rows > 0){

        while($fetchAllOpenQuickChallenge = $rungetAllOpenQuickChallenge -> fetch_assoc()){

            $gameImage = $fetchAllOpenQuickChallenge['game_image'];
            $gameName = $fetchAllOpenQuickChallenge['game_name'];
            $challengeAmount = $fetchAllOpenQuickChallenge['challenge_amount'];
            $creatorID = $fetchAllOpenQuickChallenge['creator_id'];
            $quickMatchID = $fetchAllOpenQuickChallenge['quickMatchID'];
            $quickMatchStatus = $fetchAllOpenQuickChallenge['status_flag'];

              $getUsersMeta = $conn -> query("SELECT * FROM `user_info` WHERE `user_id` = $creatorID");
              $fetchDetails = $getUsersMeta -> fetch_assoc();
              $challengeByName = $fetchDetails['user_fullname'];

            echo $output = '<div class="col-md-3 col-sm-8">

            <div class="media g-mb-22">

                <div class="mx-auto g-width-230 g-height-230 g-mb-15 g-py-40 g-px-20">
                   <img class="g-width-210 g-height-100 rounded-circle g-mb-10 u-info-v7-1__item-child-v1 rounded-circle g-mb-20" src="../../../assets/img/platforms/'."$gameImage".'"/>
                  </div>
            </div>
            <div class="mb-1">
                  <h3 class="h5"><b>'."$gameName".'</b></h3>
                  <em class="d-block g-color-primary g-font-style-normal g-font-size-default">Challenge by '."$challengeByName".'</em>
                </div>';
        if($quickMatchStatus == 0)
            echo $output = '<p class="g-color-gray-dark-v4">We strive to embrace and drive change in our industry which allows us to keep our clients relevant.</p>
            <button type="submit" class="btn u-btn-primary g-color-white--hover g-bg-secondary-dark-light-v1--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15 acceptChallenge" id='."$quickMatchID".' data-id = '."$creatorID".' name='."$challengeByName".'>
            <i class="fa fa-check-circle"></i> Accept Challenge
            </button>';
        else
            echo $output = '<p class="g-color-gray-dark-v4">We strive to embrace and drive change in our industry which allows us to keep our clients relevant.</p>
            <button type="submit" class="btn u-btn-red g-color-white--hover g-bg-secondary-dark-light-v1--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15">
            <i class="fa fa-check-circle"></i> Not Accept Challenge
            </button>';


          echo $output = '</div>';
        }

        echo $output = '</div>';
        echo $output;

      }else{

          echo 'Please Add Some game';

      }

    }else{

      echo 'You are not a valid requester.';
      echo '<br>Recording your IP';

    }
