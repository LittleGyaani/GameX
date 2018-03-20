<?php

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Defining Default Time DateTimeZone
date_default_timezone_set('Asia/Kolkata');

//Validating if the session exists or not
if(!empty($_SESSION['userID'])){

  // echo 'Welcome User'.$_SESSION['userNAME'];
  $userID = $_SESSION['userID'];
  //Selecting all user information basing upon the user's session id
  $selectAllUserData = "SELECT * FROM user_info WHERE `user_id` = '$userID'";
  $getAllUserDetails = $conn -> query($selectAllUserData);
  $selectUserInformations = $getAllUserDetails -> fetch_assoc();

}else{

  echo 'You are not authorized to access the page without logging in.';
  header('Location:../auth/loginPage.php?redirectback=' . urlencode($_SERVER['REQUEST_URI']));


}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>battlestation - Play the best of your life! | Challenge Requests</title>

    <?php

      //Including Meta and Navigation
      include "../../../includes/common/template_header.php";

     ?>

    </header>
    <!-- End Header -->

    <!-- Promo Block -->
    <div class="container g-pt-100">
        <div class="row justify-content-lg-between">
          <div class="col-lg-4 g-pt-50--lg">
            <div class="mb-5">
              <h1 class="g-color-black g-font-size-45 mb-4">Welcome Back!</h1>
              <p>Explore all the September events and back-to-school resources to welcome you to campus.</p>
              <span class="u-icon-v1 g-mb-10"><a class="js-go-to btn u-shadow-v33 g-color-white g-bg-primary u-btn-hover-v2-2 g-bg-cyan--hover g-rounded-30 g-px-35 g-py-10 quickMatchModal" href="#quickMatch" data-modal-target="#quickMatch" data-modal-effect="blur">
                  <i class="icon-energy"></i> Quick Match</a>
                </span>
                <br>
                <span class="u-icon-v1 g-mb-10"><a class="js-go-to btn u-shadow-v33 g-color-white g-bg-purple u-btn-hover-v2-2 g-bg-orange--hover g-rounded-30 g-px-35 g-py-10 quickHeadOnMatchModal" href="#quickheadOnMatch" data-modal-target="#quickheadOnMatch" data-modal-effect="blur">
                    <i class="icon-puzzle"></i> Quick Head On Match</a>
                  </span>

            </div>
          </div>

          <!-- Qucik Match modal window -->
          <div id="quickMatch" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
            <button type="button" class="close" onclick="Custombox.modal.close();">
              <i class="icon-close"></i>
            </button>
            <div id="findQuickMatch">
            <p><center><img src="https://cdn.dribbble.com/users/475393/screenshots/3099510/pulse.gif" height="290" width="388"/></center></p><br>
            <center><p><h5>Finding a <b>Match</b> for YOU<span id="dots"></span><h5></p></center>
            </div>

              <div id="quickMatchArea"><h4 class="g-mb-20"><div id="successtext"></div></h4></div>
              <center><button type="button" class="close btn btn-lg u-btn-outline-red u-btn-hover-v2-1 g-mr-10 g-mb-15" onclick="Custombox.modal.close();">Cancel</button></center>
          </div>
          <!-- End Quick Match modal window -->

          <!-- Qucik Head ON Match modal window -->
          <div id="quickheadOnMatch" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20"  tabindex="-1" data-backdrop="false" style="display: none;">
            <button type="button" class="close closeHeadOnModal" onclick="Custombox.modal.close();">
              <i class="icon-close"></i>
            </button>

                  <form method="post" id="headonMatchForm" action="#" class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30">

                    <div class="form-inline">
                      <label class="mr-sm-3 mb-3 mb-lg-0" for="WhomtoChallenge">Whom to Challenge?</label>
                      <select id="userSelect" name="userSelect" class="custom-select mr-sm-3 mb-3 mb-lg-0">
                        <option value="null" selected disabled>Choose an User</option>
                    <?php
                      $selectUserData = "SELECT * FROM `user_info` WHERE `user_id` != $userID";
                      $runselectUserData = $conn -> query($selectUserData);
                      if($runselectUserData && ($runselectUserData -> num_rows > 0)){

                          while ($fetchuserData = $runselectUserData -> fetch_assoc()){
                    ?>
                          <option value="<?= $fetchuserData['user_id']; ?>"><?= $fetchuserData['user_fullname']; ?> - <?= $fetchuserData['user_name']; ?></option>
                    <?php
                  }
                }
                    ?>
                      </select>

                    </div>

                    <br>

                    <div class="form-inline" id ="gamePlatformChoose" style="display:none">
                      <label class="mr-sm-3 mb-3 mb-lg-0" for="WhomtoChallenge">What game to Challenge?</label>
                      <select id="gameSelect" name="gameSelect" class="custom-select mr-sm-3 mb-3 mb-lg-0">
                        <option value="null" selected disabled>Choose Game</option>
                    <?php
                      $selectGameData = "SELECT * FROM `profile_platform_games` WHERE `game_status`= 1";
                      $runselectGameData = $conn -> query($selectGameData);
                      if($runselectGameData && ($runselectGameData -> num_rows > 0)){

                          while ($fetchgameData = $runselectGameData -> fetch_assoc()){
                    ?>
                          <option value="<?= $fetchgameData['gameID']; ?>"><?= $fetchgameData['game_name']; ?> - <?= $fetchgameData['game_developer_company']; ?></option>
                    <?php
                  }
                }
                    ?>
                      </select>

                    </div>

                      <br>

                    <div id="challengeAmountSection" class="form-inline" style="display:none">
                      <label class="mr-sm-3 mb-3 mb-lg-0" for="HowMuchforChallenge">Choose Challenge Amount?</label>
                      <select id="challengeAmount" name="challengeAmount" class="custom-select mr-sm-3 mb-3 mb-lg-0">
                        <option value="0" selected disabled>Choose an Amount</option>
                        <option value="50">₹50</option>
                        <option value="100">₹100</option>
                        <option value="150">₹150</option>
                        <option value="200">₹200</option>
                        <option value="250">₹250</option>
                        <option value="500">₹500</option>
                        <option value="1000">₹1000</option>
                      </select>
                    </div>

                    <br>

                    <center>  <button type="submit" class="btn btn-md u-btn-primary rounded-0" id="headonMatch">Challenge Now</button> </center>
                    <center>  <a href="#" class="btn btn-md u-btn-red rounded-0" id="addMoney">Add Money</a> </center>

                  </form>

          </div>
          <!-- End Quick Head On Match modal window -->

          <div class="col-lg-8 align-self-end">
            <div class="u-shadow-v40 g-brd-around g-brd-7 g-brd-white rounded">
              <img class="img-fluid rounded" src="<?php echo $baseURL;?>assets/img/bg/quick_match.png" alt="Image Description">
            </div>
          </div>
        </div>
      <!-- End Promo Block -->

    <!-- Breadcrumb -->
    <section class="g-my-30">
      <div class="container">
        <ul class="u-list-inline">
          <li class="list-inline-item g-mr-7">
            <a class="u-link-v5 g-color-main g-color-primary--hover" href="../../../index.php">Home</a>
            <i class="fa fa-angle-right g-ml-7"></i>
          </li>
          <li class="list-inline-item g-mr-7">
            <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pages</a>
            <i class="fa fa-angle-right g-ml-7"></i>
          </li>
          <li class="list-inline-item g-color-primary">
            <span>Profile</span>
          </li>
        </ul>
      </div>
    </section>
    <!-- End Breadcrumb -->

    <section class="g-mb-100">
      <div class="container">
        <div class="row">
          <!-- Profile Sidebar -->
          <div class="col-lg-3 g-mb-50 g-mb-0--lg">
            <!-- User Image -->
            <div class="u-block-hover g-pos-rel">
              <figure>
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="../../../assets/img/profilePic/<?= $selectUserInformations['user_profile_pic'];?>" alt="<?= $selectUserInformations['user_fullname'];?>">
              </figure>

              <!-- User Info -->
              <span class="g-pos-abs g-top-20 g-left-0">
                <a class="btn btn-sm u-btn-primary rounded-0" href="#!"><b><?= $selectUserInformations['user_fullname'];?></b></a>
                <small class="d-block g-bg-black g-color-white g-pa-5"><strong>Pro GAMER</strong></small>
              </span>
              <!-- End User Info -->

            </div>
            <!-- User Image -->

            <!-- Sidebar Navigation -->
            <div class="list-group list-group-border-0 g-mb-40">
                <!-- Overall -->
                <a href="#" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-home g-pos-rel g-top-1 g-mr-8"></i> My Dashboard Area</span>
                </a>
                <!-- End Overall -->

                <!-- Profile -->
                <a href="myProfile.php" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-user g-pos-rel g-top-1 g-mr-8"></i> My Profile Informations</span>
                </a>
                <!-- End Profile -->

                <!-- Users Contacts -->
                <a href="gamePlatforms.php" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-game-controller g-pos-rel g-top-1 g-mr-8"></i> My Game Platforms</span>
                </a>
                <!-- End Users Contacts -->

                <!-- My Projects -->
                <a href="walletStatistics.php" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-wallet g-pos-rel g-top-1 g-mr-8"></i> My Wallet Statistics</span>
                </a>
                <!-- End My Projects -->

                <!-- Comments -->
                <a href="allNotifications" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-bell g-pos-rel g-top-1 g-mr-8"></i> My Notifications Area</span>
                    <span class="u-label g-font-size-11 g-bg-black g-rounded-20 g-px-8"><div id="notificationCounts"></div></span>
                </a>
                <!-- End Comments -->

                <!-- Reviews -->
                <a href="page-profile-reviews-1.html" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-feed g-pos-rel g-top-1 g-mr-8"></i> My Battle History</span>
                </a>
                <!-- End Reviews -->

                <!-- History -->
                <a href="#!" class="list-group-item list-group-item-action justify-content-between active">
                    <span><i class="icon-fire g-pos-rel g-top-1 g-mr-8"></i> My Challenge Requests</span>
                </a>
                <!-- End History -->

                <!-- Settings -->
                <a href="#" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-settings g-pos-rel g-top-1 g-mr-8"></i> Settings</span>
                    <span class="u-label g-font-size-11 g-bg-red g-color-white g-rounded-20 g-px-8">3</span>
                </a>
                <!-- End Settings -->

                <!-- Logout -->
                <a href="../auth/controller/userLogout.php" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-power g-pos-rel g-top-1 g-mr-8"></i> Logout</span>
                </a>
                <!-- End Logout -->
            </div>
            <!-- End Sidebar Navigation -->

            <!-- Project progres area, Copy from template_project_area.php -->

          </div>
          <!-- End Profile Sidebar -->

          <!-- Profile Content -->
          <div class="col-lg-9">

            <!-- User Blocks v16 -->
                  <div class="container">
                    <div class="text-center g-mb-50">
                      <h2 class="h4">All your
                        <span class="g-color-primary g-ml-5">#ChallengeRequests</span>
                      </h2>

                    <div id="shortcode16">
                      <div class="shortcode-html">
                        <!-- Users -->
                        <div class="row g-mb-70">
                          <?php
                          $getAllChallengeRequests = "SELECT * FROM `head_on_match_request` WHERE `challenged_whom` = $userID AND `game_status` = 1";
                          $rungetAllChallengeRequests = $conn -> query($getAllChallengeRequests);
                          if($rungetAllChallengeRequests -> num_rows > 0){
                            while($getAllChallengeInfo = $rungetAllChallengeRequests -> fetch_assoc()){
                              $challengedBy = $getAllChallengeInfo['challenged_by_userID'];
                              $challengedGame = $getAllChallengeInfo['challenge_gameID'];
                              $fetchAllMetaInfo = $conn -> query("SELECT * FROM `profile_platform_games` ppg JOIN `user_associated_game` uag ON uag.gameID = ppg.gameID JOIN `user_info` usi ON uag.userID = usi.user_id JOIN `head_on_match_request` hmr ON hmr.challenge_gameID = ppg.gameID WHERE usi.user_id = $challengedBy AND hmr.game_status = 1  AND ppg.gameID = $challengedGame");
                              $returnfetchAllMetaInfo = $fetchAllMetaInfo -> fetch_assoc();
                          ?>

                          <div class="col-md-4 g-mb-30">
                            <!-- Listing - Agents -->
                            <div class="u-shadow-v11 text-center">
                              <div class="g-bg-white g-pa-20">
                                <div class="g-width-90 g-height-700 mx-auto">
                                  <img class="g-width-130 g-height-130 img-fluid g-brd-around g-brd-3 g-brd-gray-light-v3 rounded-circle" src="../../../assets/img/profilePic/<?= $returnfetchAllMetaInfo['user_profile_pic'];?>" alt="<?= $returnfetchAllMetaInfo['user_fullname'];?>">
                                </div>
                                <div class="mb-3">
                                  <h3 class="h5"><a class="g-color-black" href="shortcode-blocks-users.html#"></a></h3>
                                  <span class="u-label g-rounded-20 g-bg-indigo g-px-15 g-mr-10 g-mb-15">
                                    <span class="d-block g-color-white-dark-v5 g-font-size-13 mb-1">Challengd By <strong><?=$returnfetchAllMetaInfo['user_name']?></strong></span>
                                </span>
                                <span class="u-label g-rounded-20 g-bg-purple g-px-15 g-mr-10 g-mb-15">
                                  <span class="d-block g-color-white-dark-v5 g-font-size-13 mb-1">Challengd Amount <strong id="challengeRequestAmount">₹<?=$returnfetchAllMetaInfo['challenge_amount']?></strong></span>
                                </span>
                                <span class="u-label g-rounded-20 g-bg-black g-px-10 g-mr-10 g-mb-15">
                                  <span class="d-block g-color-white-dark-v5 g-font-size-13 mb-1">Challengd On <strong><?=$returnfetchAllMetaInfo['request_DTStamp']?></strong></span>
                                </span>
                                  <br>
                                  <img class="g-width-90 g-height-70 mx-auto" src="../../../assets/img/platforms/<?= $returnfetchAllMetaInfo['game_image'];?>" alt="<?= $returnfetchAllMetaInfo['game_name'];?>"><br>
                                  <br>
                                  <span class="d-inline-block u-icon-v3 u-icon-size--xl g-bg-primary g-color-white rounded-circle g-mb-30">
                                    <i class="icon-sport-175 u-line-icon-pro"></i>
                                  </span>
                                  <span class="d-block g-font-weight-500 g-font-size-13">Game Name <b><?=$returnfetchAllMetaInfo['game_name']?></b></span>
                                  <span class="d-block g-font-weight-500 g-font-size-13">Challenger <?=$returnfetchAllMetaInfo['game_placeholder_value']?> <br><b><?=$returnfetchAllMetaInfo['platform_user_name']?></b></span>
                                </div>
                              </div>
                              <a class="acceptHeadOnChallenge btn btn-block g-color-white g-bg-indigo g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15" href="#!" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>">
                              <i class="icon icon-check"></i>  Accept Challenge Request
                              </a>
                              <a class="dismissHeadOnChallenge btn btn-block g-color-white g-bg-purple g-bg-secondary-dark-light-v1--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15 mt-0" href="#!" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>">
                              <i class="icon icon-close"></i> Decline Challenge Request</a>
                            </div>
                            <!-- End Listing - Agents -->
                          </div>
                          <?php
                        }
                      }else{
                        echo 'No Challenge Requests to show at the moment.';
                        echo 'Please challenge someone instead.';
                      } ?>
                        </div>
                        <!-- End Users -->
                      </div>
                    </div>

                  </div>

                </section>
                <!-- End User Blocks v16 -->

              </div>
            </div>
            <!-- End Product Table Panel -->
          </div>
          <!-- End Profile Content -->
        </div>

      </div>

    </section>

    <?php

      //Footer Section
      include "../../../includes/common/template_footer.php";

     ?>

  </main>

  <div class="u-outer-spaces-helper"></div>


  <?php

    //Footer Section
    include "../../../includes/common/template_scripts.php";

   ?>

</body>

</html>
