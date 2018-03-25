<?php

/*This API is used for creating a head on match particularly challenging a user for the game.*/
//*Description*//
//Allow user to join and private match ( basically a head-on with Invitation Code)

  //Hiding all errors and notices
  error_reporting(0);

  //Declaring default Date and Time Zone for Stamps
  date_default_timezone_set('Asia/Kolkata');

  //Allow Cross Access from Origin
  header("Access-Control-Allow-Origin: *");

  //Generate Random String to use as token for secure AJAX calls
  function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

      for ($i = 0; $i < $length; $i++) {
          $key .= $keys[array_rand($keys)];
      }

      return $key;
    }

    //Custom php function to get time ago

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

  //Define Base URL to be used globally
  $baseURL = "http://www.battlestation.live/";

  //Including the DB file
  include "../../../includes/config/dbConnectivity.php";

  $getTournamentActivities = "SELECT * FROM `tournament_fixture_info` tfi JOIN `user_info` usi ON tfi.tournament_join_userID = usi.user_id JOIN `profile_platform_games` ppg ON ppg.gameID = tfi.tournament_Game_ID";
  $rungetTournamentActivities = $conn -> query($getTournamentActivities);
  $getHOMActivities = "SELECT * FROM `head_on_match_request` hmr JOIN profile_platform_games ppg ON hmr.challenge_gameID = ppg.gameID ORDER BY hmr.request_DTStamp DESC"; //SELECT * FROM `head_on_match_request` hmr JOIN profile_platform_games ppg ON hmr.challenge_gameID = ppg.gameID JOIN `user_info` usi ON usi.user_id = hmr.challenged_by_userID WHERE usi.user_id = hmr.challenged_by_userID AND usi.user_id = hmr.challenged_whom
  $rungetHOMActivities = $conn -> query($getHOMActivities);

  if($rungetHOMActivities -> num_rows > 0){

    while ($fetchgetHOMActivities = $rungetHOMActivities -> fetch_assoc()) {

        $selectChallenger = $conn -> query("SELECT * FROM `user_info` WHERE `user_id` = '".$fetchgetHOMActivities['challenged_by_userID']."'");
        $selectChallengerData = $selectChallenger -> fetch_assoc();
        $selectChallengerName = $selectChallengerData['user_name'];
        $selectChallengerPic = $selectChallengerData['user_profile_pic'];
        $selectChallengedWhom = $conn -> query("SELECT * FROM `user_info` WHERE `user_id` = '".$fetchgetHOMActivities['challenged_whom']."'");
        $selectChallengedWhomData = $selectChallengedWhom -> fetch_assoc();
        $selectChallengedWhomName = $selectChallengedWhomData['user_name'];
        $challengeRequestTime = get_time_ago(strtotime($fetchgetHOMActivities['request_DTStamp']));
        $challengedForGame = $fetchgetHOMActivities['game_name'];
        $challengeAmont = $fetchgetHOMActivities['challenge_amount'];

        echo $globalActivities = '<article class="media g-mb-20">
                                    <a class="d-flex mr-3" href="#!">
                                      <img class="rounded-circle g-width-40 g-height-40" src="../../../assets/img/profilePic/'."$selectChallengerPic".'" alt='."$selectChallengerName".'>
                                    </a>

                                    <div class="media-body">
                                      <h3 class="h6">
                                          <a class="g-color-black g-font-weight-600" href="#!">@'."$selectChallengerName".'</a> <span class="g-color-black-dark-v4">challenged</span> <a class="g-color-black g-font-weight-600" href="#!">@'."$selectChallengedWhomName".'</a>
                                          <br>
                                          <div style="float:right; margin-right:11px;"><span class="g-color-red">'."$challengeRequestTime".'</span></div> <br>
                                        </h3>
                                        <center><img src="../../../assets/img/icons/game-challenge.png" height="80" width="80" /></center>
                                      <p class="g-color-gray-dark-v4 g-mb-5">The challenge is for <b>'."$challengedForGame".'</b> for an amount of ₹'."$challengeAmont".'.</p>
                                    </div>
                                  </article>';
        echo $globalActivities ='<hr class="g-brd-gray-light-v4 g-mt-15 g-mb-20">';
    }

  }else{

      echo '<img src="../../../assets/img/icons/game-challenge.png" />';
      echo 'No activities to show at the moment';

  }

  //Close the connection bridge
  $conn -> close();
