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
  $selectAllUserData = "SELECT * FROM `user_info` WHERE `user_id` = '$userID'";
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
  <title>battlestation - Play the best of your life! | User Dashboard</title>

    <?php

      //Including Meta and Navigation
      include "../../../includes/common/template_header.php";

     ?>

    </header>
    <!-- End Header -->
    <div id ="internetActivity" class="col-md-12 col-md-6" style="background:white; background-position:center; color:black; height:100%; width:100%; position:fixed; z-index:10000; overflow:hidden; display:none;"><center><font class="g-color-gray" size="50">I and Internet aren't talking right now! Will be back soon. :(</font><br><br><br><br><img src="../../../assets/img/icons/no_internet.png"/></center></div>
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
                <a href="#" class="list-group-item list-group-item-action justify-content-between active">
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
                <a href="challengeRequests" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-fire g-pos-rel g-top-1 g-mr-8"></i> My Challenge Requests</span>
                </a>
                <!-- End History -->

                 <!-- Fixture -->
                <a href="fixture" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-game-controller g-pos-rel g-top-1 g-mr-8"></i> My Tournamnet Fixture</span>
                </a>
                <!-- End Fixture -->


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

            <!-- Projects & Activities Panels -->
            <div class="row g-mb-40">
              <div class="col-lg-6 g-mb-40 g-mb-0--lg">

                <!-- Latest Projects Panel -->
                <div class="card border-0">
                  <!-- Panel Header -->
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-grey border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-exclamation g-pos-rel g-top-1 g-mr-5"></i> Open Match Notifications
                      </h3>
                    <div class="dropdown g-mb-10 g-mb-0--md">
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" rel="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-options-vertical g-pos-rel g-top-1"></i>
                        </span>
                      <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-layers g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Quick Match
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-wallet g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Game Registration
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-fire g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Match Fixtures
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-settings g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Match Summary
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                        </a>
                      </div>
                    </div>
                  </div>
                  <!-- End Panel Header -->

                  <!-- Panel Body -->
                  <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-400 g-pa-0">
                    <?php

                      $selectGameInfo = "SELECT * FROM `tournament_registration_meta`";
                      $runselectGameInfo = $conn -> query($selectGameInfo);
                      $participantCountRows = $runselectGameInfo -> num_rows;
                      $leftBrdColorArray = array("g-brd-red-left", "g-brd-black-left", "g-brd-yellow-left", "g-brd-green-left", "g-brd-pink-left", "g-brd-blue-left");
                      if($participantCountRows > 0){

                        while($getGameInfo = $runselectGameInfo -> fetch_assoc()){

                          $timeonly = strtotime($getGameInfo['game_registration_start_date']);
                          $gameID = $getGameInfo['game_reg_ID'];
                          // echo $timeonly;
                          if($i > count($leftBrdColorArray) - 1) $i = 0;

                    ?>
                    <ul class="list-unstyled">
                      <li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 <?php echo $leftBrdColorArray[$i]; ?> rounded g-pa-20 g-mb-10">
                        <div class="d-flex g-mt-2 g-mr-15">
                          <img class="g-width-40 g-height-40 rounded-circle" src="../../../assets/img-temp/100x100/img1.jpg" alt="<?=$getGameInfo['game_name']?>">
                        </div>
                        <div class="media-body">
                          <div class="d-flex justify-content-between">
                            <h5 class="h6 g-font-weight-600 g-color-black"><?=$getGameInfo['game_name']?></h5>
                            <span class="small text-nowrap g-color-blue"><?php echo get_time_ago($timeonly);?></span>
                          </div>
                          <p><?=$getGameInfo['game_fixture_info']?><br>
                          <span class=" g-color-red g-rounded-20 g-px-10">Registration Open <?=$getGameInfo['game_registration_start_date']?></span><br>
                          <span class=" g-color-red g-rounded-20 g-px-10">Registration Ends &nbsp; <?=$getGameInfo['game_registration_end_date']?></span><br>
                          </p>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-blue g-rounded-20 g-px-10">Participants <?=$getGameInfo['game_participants']?></span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-pink g-rounded-20 g-px-10">Winning Prize ₹<?=$getGameInfo['game_winning_amount']?></span> <br>
                          <br>
                          <?php
                          $today = date("d-m-Y H:i");
                          $endDate = $getGameInfo['game_registration_end_date'];

                          //Get tournament registered counter
                          $getTournamentRegisterMeta = $conn -> query("SELECT * FROM `tournament_fixture_info` WHERE `tournament_Game_ID` = $gameID");
                          $getUserJoinStatus = $conn -> query("SELECT * FROM `tournament_fixture_info` WHERE `tournament_Game_ID` = $gameID AND `tournament_join_userID` = $userID");

                          if(!$getUserJoinStatus -> num_rows)
                              if(strtotime($endDate) >= strtotime($today))
                                if($participantCountRows >= $getTournamentRegisterMeta -> num_rows)
                                  echo '<a href="javascript:void(0);" id="'." $gameID".'" class="joinGameButton btn btn-md u-btn-outline-darkgray g-rounded-50 g-mr-10 g-mb-15">Join Game</a>';
                                else
                                  echo '<input type="button" class="btn btn-md u-btn-outline-yellow g-rounded-50 g-mr-10 g-mb-15" value ="User Limit Reached" disabled></input>';
                              else
                                echo '<input type="button" class="btn btn-md u-btn-outline-red g-rounded-50 g-mr-10 g-mb-15" value ="Registration Over" disabled> </input>';
                          else
                              echo '<input type="button" class="btn btn-md u-btn-outline-purple g-rounded-50 g-mr-10 g-mb-15" value ="Already Joined" disabled> </input>';

                            ?>

                        </div>

                      </li>
                    </ul>
                    <?php
                    $i++;
                  }
                  }else{

                    echo 'No game to show at this moment.<br>Please check back.';

                  }
                    ?>

                  </div>
                  <!-- End Panel Body -->
                </div>
                <!-- End Latest Projects Panel -->
              </div>

              <div class="col-lg-6">
                <!-- Activities Panel -->
                <div class="card border-0">
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-grey border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-directions g-pos-rel g-top-1 g-mr-5"></i> Global Leaderboard
                      </h3>
                    <div class="dropdown g-mb-10 g-mb-0--md">
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" rel="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-options-vertical g-pos-rel g-top-1"></i>
                        </span>
                      <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-layers g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Projects
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-wallet g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Wallets
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-fire g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Reports
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-settings g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Users Setting
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="js-scrollbar card-block  u-info-v1-1 g-bg-white-gradient-v1--after g-height-400 g-pa-0">
                    <ul class="list-unstyled">
                      <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-10">
                        <div class="g-mt-2">
                          <img class="g-width-50 g-height-50 rounded-circle" src="../../../assets/img-temp/100x100/img17.jpg" alt="Image Description">
                        </div>
                        <div class="align-self-center g-px-10">
                          <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                              <span class="g-mr-5">James Coolman</span>
                              <small class="g-font-size-12 g-color-blue">8k+ earned</small>
                            </h5>
                          <p class="m-0">Nulla ipsum dolor sit amet adipiscing</p>
                        </div>
                        <div class="align-self-center ml-auto">
                          <span class="u-label u-label--sm g-bg-blue g-rounded-20 g-px-10">$25 / hr</span>
                        </div>
                      </li>

                      <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-10">
                        <div class="g-mt-2">
                          <img class="g-width-50 g-height-50 rounded-circle" src="../../../assets/img-temp/100x100/img5.jpg" alt="Image Description">
                        </div>
                        <div class="align-self-center g-px-10">
                          <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                              <span class="g-mr-5">Alberta Watson</span>
                              <small class="g-font-size-12 g-color-pink">5k+ earned</small>
                            </h5>
                          <p class="m-0">Hac consectetur habitasse platea dictumst</p>
                        </div>
                        <div class="align-self-center ml-auto">
                          <span class="u-label u-label--sm g-bg-pink g-rounded-20 g-px-10">$32 / hr</span>
                        </div>
                      </li>

                      <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-10">
                        <div class="g-mt-2">
                          <img class="g-width-50 g-height-50 rounded-circle" src="../../../assets/img-temp/100x100/img14.jpg" alt="Image Description">
                        </div>
                        <div class="align-self-center g-px-10">
                          <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                              <span class="g-mr-5">David Lee</span>
                              <small class="g-font-size-12 g-color-teal">3k+ earned</small>
                            </h5>
                          <p class="m-0">Curabitur hendrerit dolor sit amet consectetur</p>
                        </div>
                        <div class="align-self-center ml-auto">
                          <span class="u-label u-label--sm g-bg-teal g-rounded-20 g-px-10">$28 / hr</span>
                        </div>
                      </li>

                      <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-10">
                        <div class="g-mt-2">
                          <img class="g-width-50 g-height-50 rounded-circle" src="../../../assets/img-temp/100x100/img4.jpg" alt="Image Description">
                        </div>
                        <div class="align-self-center g-px-10">
                          <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                              <span class="g-mr-5">Alberta Heller</span>
                              <small class="g-font-size-12 g-color-darkpurple">4k+ earned</small>
                            </h5>
                          <p class="m-0">Adipiscing elitut leosit amet, consectetur eleifend</p>
                        </div>
                        <div class="align-self-center ml-auto">
                          <span class="u-label u-label--sm g-bg-darkpurple g-rounded-20 g-px-10">$35 / hr</span>
                        </div>
                      </li>

                      <li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-10">
                        <div class="g-mt-2">
                          <img class="g-width-50 g-height-50 rounded-circle" src="../../../assets/img-temp/100x100/img17.jpg" alt="Image Description">
                        </div>
                        <div class="align-self-center g-px-10">
                          <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                              <span class="g-mr-5">James Coolman</span>
                              <small class="g-font-size-12 g-color-blue">8k+ earned</small>
                            </h5>
                          <p class="m-0">Nulla ipsum dolor sit amet adipiscing</p>
                        </div>
                        <div class="align-self-center ml-auto">
                          <span class="u-label u-label--sm g-bg-blue g-rounded-20 g-px-10">$25 / hr</span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- End Activities Panel -->
              </div>
            </div>
            <!-- End Projects & Activities Panels -->

            <!-- Projects & News Feeds Panels -->
            <div class="row g-mb-40">
              <div class="col-lg-6 g-mb-40 g-mb-0--lg">
                <!-- Notifications Panel -->
                <div class="card border-0">
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-list g-pos-rel g-top-1 g-mr-5"></i> Quick Notifications
                      </h3>
                    <!-- <div class="dropdown g-mb-10 g-mb-0--md">
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" rel="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-options-vertical g-pos-rel g-top-1"></i>
                        </span>
                      <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-layers g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Projects
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-wallet g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Wallets
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-fire g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Reports
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-settings g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Users Setting
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                        </a>
                      </div>
                    </div> -->
                  </div>

                  <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-300 g-pa-0">
                    <?php
                      $selectUserNotifications = "SELECT * FROM `user_notification_record` WHERE `userID` = $userID ORDER BY `notification_sent_DTStamp` DESC";
                      $runselectUserNotifications = $conn -> query($selectUserNotifications);
                      $colorArray = array("g-color-primary", "g-color-cyan", "g-color-orange", "g-color-purple", "g-color-lightred");
                      $iconArray = array("fa fa-wallet", "fa fa-arrow-circle");

                      if($runselectUserNotifications -> num_rows > 0){

                          while($getNotficationdetails = $runselectUserNotifications -> fetch_assoc()){

                     ?>

                    <!-- Alert Cyan -->
                    <div class="alert fade show g-bg-cyan-opacity-0_1 g-color-cyan rounded-0 g-mb-5" role="alert">
                      <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="media">
                        <div class="d-flex g-mr-10">
                          <img class="g-width-40 g-height-40 g-rounded-50x" src="" alt="<?= $getNotficationdetails['user_name']?>">
                        </div>
                        <div class="media-body">
                          <p class="m-0"><strong><?= ucwords($getNotficationdetails['notification_sent_by']);?></strong> sent you a message.</p>
                          <span class="g-font-size-12"><?=get_time_ago(strtotime($getNotficationdetails['notification_sent_DTStamp'])) ?></span>
                        </div>
                      </div>
                    </div>
                    <!-- End Alert Cyan -->
                    <?php
                  }
                }else{

                  echo 'No Notification to show at the moment.';
                }
                ?>
              </div>

                </div>
                <!-- End Notifications Panel -->
              </div>

              <div class="col-lg-6">
                <!-- News Feeds -->
                <div class="card border-0">
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-energy g-pos-rel g-top-1 g-mr-5"></i> Global Activities
                      </h3>
                    <!-- <div class="dropdown g-mb-10 g-mb-0--md">
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" rel="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-options-vertical g-pos-rel g-top-1"></i>
                        </span>
                      <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-layers g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Projects
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-wallet g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Wallets
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-fire g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Reports
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-settings g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Users Setting
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                        </a>
                      </div>
                    </div> -->
                  </div>

                  <div class="js-scrollbar card-block  u-info-v1-1 g-bg-white-gradient-v1--after g-height-300 g-pa-0">

                  <div id="globalActivities"></div>

                  </div>
                </div>
                <!-- End News Feeds -->
              </div>
            </div>
            <!-- End Projects & News Feeds Panels -->

            <!-- User Contacts Panel -->
            <div class="card border-0 rounded-0 g-mb-50">
              <!-- Panel Header -->
              <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                <h3 class="h6 mb-0">
                    <i class="icon-shield g-pos-rel g-top-1 g-mr-5"></i> Last Played Games with Players
                  </h3>
              </div>
              <!-- End Panel Header -->

              <!-- Panel Body -->
              <div class="card-block g-pa-0">
                <!-- User Contacts -->
                <div class="row">
                  <div class="col-md-4 g-mb-30 g-mb-0--md">
                    <!-- Figure -->
                    <figure class="g-bg-white g-brd-around g-brd-gray-light-v4 g-brd-cyan--hover g-transition-0_2 text-center">
                      <div class="g-py-40 g-px-20">
                        <!-- Figure Image -->
                        <img class="g-width-100 g-height-100 rounded-circle g-mb-20" src="../../../assets/img-temp/125x125/img1.jpg" alt="Image Description">
                        <!-- Figure Image -->

                        <!-- Figure Info -->
                        <h4 class="h5 g-mb-5">Mikel Andrews</h4>
                        <div class="d-block">
                          <span class="g-color-cyan g-font-size-default g-mr-3">
                            <i class="icon-user"></i>
                          </span>
                          <em class="g-color-gray-dark-v4 g-font-style-normal g-font-size-default">Employee</em>
                        </div>
                        <!-- End Figure Info -->
                      </div>

                      <hr class="g-brd-gray-light-v4 g-my-0">

                      <!-- Figure List -->
                      <ul class="row list-inline g-py-20 g-ma-0">
                        <li class="col g-brd-right g-brd-gray-light-v4">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-cyan--hover" href="#!" data-toggle="tooltip" data-placement="top" title="Quick Challenge">
                            <i class="icon-trophy"></i>
                          </a>
                        </li>
                        <li class="col g-brd-right g-brd-gray-light-v4">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-red--hover" href="#!">
                            <i class="icon-speech"data-toggle="tooltip" data-placement="top" title="Chat Now"></i>
                          </a>
                        </li>
                        <li class="col">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-purple--hover" href="#!">
                            <i class="icon-user-following"data-toggle="tooltip" data-placement="top" title="View Profile"></i>
                          </a>
                        </li>
                      </ul>
                      <!-- End Figure List -->
                    </figure>
                    <!-- End Figure -->
                  </div>

                  <div class="col-md-4 g-mb-30 g-mb-0--md">
                    <!-- Figure -->
                    <figure class="g-bg-white g-brd-around g-brd-gray-light-v4 g-brd-pink--hover g-transition-0_2 text-center">
                      <div class="g-py-40 g-px-20">
                        <!-- Figure Image -->
                        <img class="g-width-100 g-height-100 rounded-circle g-mb-20" src="../../../assets/img-temp/125x125/img2.jpg" alt="Image Description">
                        <!-- Figure Image -->

                        <!-- Figure Info -->
                        <h4 class="h5 g-mb-5">Natasha Kolnikova</h4>
                        <div class="d-block">
                          <span class="g-color-pink g-font-size-default g-mr-3">
                            <i class="icon-user"></i>
                          </span>
                          <em class="g-color-gray-dark-v4 g-font-style-normal g-font-size-default">Family</em>
                        </div>
                        <!-- End Figure Info -->
                      </div>

                      <hr class="g-brd-gray-light-v4 g-my-0">

                      <!-- Figure List -->
                      <ul class="row list-inline g-py-20 g-ma-0">
                        <li class="col g-brd-right g-brd-gray-light-v4">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-cyan--hover" href="#!">
                            <i class="icon-speech"></i>
                          </a>
                        </li>
                        <li class="col g-brd-right g-brd-gray-light-v4">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-red--hover" href="#!">
                            <i class="icon-envelope-letter"></i>
                          </a>
                        </li>
                        <li class="col">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-purple--hover" href="#!">
                            <i class="icon-screen-smartphone"></i>
                          </a>
                        </li>
                      </ul>
                      <!-- End Figure List -->
                    </figure>
                    <!-- End Figure -->
                  </div>

                  <div class="col-md-4">
                    <!-- Figure -->
                    <figure class="g-bg-white g-brd-around g-brd-gray-light-v4 g-brd-purple--hover g-transition-0_2 text-center">
                      <div class="g-py-40 g-px-20">
                        <!-- Figure Image -->
                        <img class="g-width-100 g-height-100 rounded-circle g-mb-20" src="../../../assets/img-temp/125x125/img3.jpg" alt="Image Description">
                        <!-- Figure Image -->

                        <!-- Figure Info -->
                        <h4 class="h5 g-mb-5">Frank Heller</h4>
                        <div class="d-block">
                          <span class="g-color-purple g-font-size-default g-mr-3">
                            <i class="icon-user"></i>
                          </span>
                          <em class="g-color-gray-dark-v4 g-font-style-normal g-font-size-default">Friend</em>
                        </div>
                        <!-- End Figure Info -->
                      </div>

                      <hr class="g-brd-gray-light-v4 g-my-0">

                      <!-- Figure List -->
                      <ul class="row list-inline g-py-20 g-ma-0">
                        <li class="col g-brd-right g-brd-gray-light-v4">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-cyan--hover" href="#!">
                            <i class="icon-speech"></i>
                          </a>
                        </li>
                        <li class="col g-brd-right g-brd-gray-light-v4">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-red--hover" href="#!">
                            <i class="icon-envelope-letter"></i>
                          </a>
                        </li>
                        <li class="col">
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-purple--hover" href="#!">
                            <i class="icon-screen-smartphone"></i>
                          </a>
                        </li>
                      </ul>
                      <!-- End Figure List -->
                    </figure>
                    <!-- End Figure -->
                  </div>
                </div>
                <!-- End User Contacts -->
              </div>
              <!-- End Panel Body -->
            </div>
            <!-- End User Contacts Panel -->

            <!-- Product Table Panel -->
            <div class="card border-0">
              <div class="card-header d-flex align-items-center justify-content-between g-bg-grey border-0 g-mb-15">
                <h3 class="h6 mb-0">
                    <i class="icon-calculator g-pos-rel g-top-1 g-mr-5"></i> My Wallet Transaction Reports
                  </h3>
                  <div style="float:right">Your Wallet Balance is ₹<b id="walletBalanceHere"></b> | Last Updated On : <span class="walletUpdated"></span></div>
              </div>


              <div class="card-block g-pa-0">
                <!-- Product Table -->
                <div class="table-responsive">
                  <table class="table table-bordered u-table--v2">
                    <?php

                      $selectWalletInfo = "SELECT * FROM `user_wallet_transaction_info` WHERE `userID` = $userID LIMIT 10";
                      $runselectWalletInfo = $conn -> query($selectWalletInfo);
                      if(($runselectWalletInfo -> num_rows) > 0){
                        ?>
                    <thead class="text-uppercase g-letter-spacing-1">
                      <tr>
                        <th class="g-font-weight-200 g-color-black">Wallet Tranx. ID</th>
                        <th class="g-font-weight-200 g-color-black">Remaining Balance (CWB-/+LUB)*</th>
                        <th class="g-font-weight-200 g-color-black">Wallet <br>Transaction <br>Type</th>
                        <th class="g-font-weight-200 g-color-black">Last Used Balance</th>
                        <th class="g-font-weight-200 g-color-black">Transaction Date & Time</th>
                        <th class="g-font-weight-200 g-color-black">Transaction Status</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                            while ($userWalletDetails = $runselectWalletInfo -> fetch_assoc()){
                      ?>
                      <tr>

                        <td class="align-middle">
                          <h4 class="h6 g-mb-2"><b>BSTRANS-<?=$userWalletDetails['walletTransactionID']?></b></h4>
                        </td>

                        <td class="align-middle text-nowrap">
                            <span>₹<b><?=$userWalletDetails['wallet_remaining_balance']?></b></span>
                        </td>

                        <td class="align-middle">
                          <span class="btn btn-block u-btn-primary g-rounded-50 g-py-5">
                            <i class="icon-check g-mr-5"></i> <?=ucwords($userWalletDetails['useType']);?>
                          </span>
                        </td>

                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <?php
                            if($userWalletDetails['useType'] == 'wallet credit' || $userWalletDetails['useType'] == 'wallet topup') {?>
                            +₹<b><?=$userWalletDetails['lastUsedBalance']?></b>
                            <?php
                          }else{ ?>
                            -₹<b><?=$userWalletDetails['lastUsedBalance']?></b>
                            <?php
                            }
                            ?>
                          </span>
                        </td>

                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <?=$userWalletDetails['date_time_stamp']?>
                          </span>

                        </td>

                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <?=ucfirst($userWalletDetails['transaction_status']);?>
                          </span>

                        </td>

                      </tr>

                      <?php  }
                       ?>
                      <strong><small>* CWB - Current Wallet Balance, LUB - Last Used Balance, TRANX. - Transaction</small></strong>
                      <div style="float:right;">
                      <a href="walletStatistics.php" class="btn btn-lg u-btn-blue g-mr-10 g-mb-15">
                      View Wallet <i class="fa fa-long-arrow-right g-mr-5"></i>
                      </a>
                    </div>
                      <?php


                      }else{

                        echo '<b>No transactions to show. Please do some purchase with your wallet balance.</b>';
                      }
                      ?>

                    </tbody>
                  </table>

              </div>

                </div>
                <!-- End Product Table -->

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
