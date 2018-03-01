<?php

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Validating if the session exists or not
if(!empty($_SESSION['userID'])){

  // echo 'Welcome User'.$_SESSION['userNAME'];
  $userID = $_SESSION['userID'];
  //Selecting all user information basing upon the user's session id
  $selectAllUserData = "SELECT * FROM user_info ui JOIN user_wallet_info uw ON ui.user_id = uw.userID WHERE ui.user_id = '$userID'";
  $getAllUserDetails = $conn -> query($selectAllUserData);
  $selectUserInformations = $getAllUserDetails -> fetch_assoc();

} else{

  echo 'You are not authorized to access the page without logging in.';
  header('Location:../auth/loginPage.php');

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

    <!-- Promo Block -->
      <section class="g-bg-cover g-bg-pos-center g-bg-img-hero g-bg-bluegray-opacity-0_3--after g-py-150" style="background-image: url(https://i0.wp.com/www.celebsclothing.com/blog/wp-content/uploads/2016/10/League-of-Legends.jpg?fit=1920%2C1080&ssl=1);">
        <div class="container g-max-width-750 g-bg-cover__inner">
          <!-- Countdown v4 -->
          <div class="js-countdown text-center text-uppercase g-mb-40 g-mb-70--md" data-end-date="2018/01/01" data-month-format="%m" data-days-format="%D" data-hours-format="%H" data-minutes-format="%M" data-seconds-format="%S">
            <div class="d-inline-block g-color-white g-font-size-11 g-px-10 g-px-40--md g-py-10">
              <div class="js-cd-days g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">12</div>
              <span class="g-font-size-default">Days</span>
            </div>
            <div class="d-inline-block g-color-white g-font-size-11 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-40--md g-py-10">
              <div class="js-cd-hours g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">01</div>
              <span class="g-font-size-default">Hours</span>
            </div>
            <div class="d-inline-block g-color-white g-font-size-11 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-40--md g-py-10">
              <div class="js-cd-minutes g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">52</div>
              <span class="g-font-size-default">Minutes</span>
            </div>
            <div class="d-inline-block g-color-white g-font-size-11 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-40--md g-py-10">
              <div class="js-cd-seconds g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">52</div>
              <span class="g-font-size-default">Seconds</span>
            </div>
          </div>
          <!-- End Countdown v4 -->

          <h2 class="h2 g-color-white g-font-weight-700 g-font-size-40 g-font-size-55--md text-center text-uppercase g-mb-30 g-mb-70--md">The Next Game OPENS</h2>

          <div class="row g-mx-minus-5">
            <div class="col-md-4 g-px-5 g-mb-20 g-mb-0--md">
              <div class="media">
                <div class="d-flex align-self-center mr-3">
                  <i class="g-color-white-opacity-0_7 g-font-size-27 g-line-height-0_7 icon-education-124 u-line-icon-pro"></i>
                </div>
                <div class="media-body align-self-center g-color-white text-uppercase">
                  <span class="d-block g-color-white-opacity-0_7 g-font-size-default">When</span>
                  <span class="d-block text-uppercase g-font-weight-700 mb-0">18:30, 12 Jul, 2017</span>
                </div>
              </div>
            </div>

            <div class="col-md-5 g-px-5 g-mb-20 g-mb-0--md">
              <div class="media">
                <div class="d-flex align-self-center mr-3">
                  <i class="g-color-white-opacity-0_7 g-font-size-27 g-line-height-0_7 icon-hotel-restaurant-235"></i>
                </div>
                <div class="media-body align-self-center g-color-white text-uppercase">
                  <span class="d-block g-color-white-opacity-0_7 g-font-size-default">Where</span>
                  <span class="d-block text-uppercase g-font-weight-700 mb-0">Concert Hall, Los Angeles, USA</span>
                </div>
              </div>
            </div>

            <div class="col-md-3 text-md-right g-px-5">
              <a class="btn btn-lg u-btn-white g-color-primary--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15" href="shortcode-blocks-promo-demo-11.html#!">Play Now</a>
            </div>
          </div>
        </div>
      </section>
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
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="../../../assets/img/profilePic/img5.jpg" alt="Image Description">
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
                <a href="page-profile-comments-1.html" class="list-group-item list-group-item-action justify-content-between">
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
                <a href="#!" class="list-group-item list-group-item-action justify-content-between">
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

            <!-- Project Progress -->
            <div class="card border-0 rounded-0 g-mb-50">
              <!-- Panel Header -->
              <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                <h3 class="h6 mb-0">
                    <i class="icon-badge g-pos-rel g-top-1 g-mr-5"></i> Games in Progress
                  </h3>
              </div>
              <!-- End Panel Header -->

              <!-- Panel Body -->
              <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-300 g-pa-0">
                <!-- Web Design -->
                <div class="g-mb-20">
                  <h6 class="g-mb-10">Web Design <span class="float-right g-ml-10">68%</span></h6>
                  <div class="js-hr-progress-bar progress g-bg-black-opacity-0_1 rounded-0 g-mb-5">
                    <div class="js-hr-progress-bar-indicator progress-bar g-bg-cyan u-progress-bar--xs" role="progressbar" style="width: 68%;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small class="g-font-size-12">11% more than last week</small>
                </div>
                <!-- End Web Design -->

                <!-- Unify Project -->
                <div class="g-mb-20">
                  <h6 class="g-mb-10">Dribbble Shots <span class="float-right g-ml-10">62%</span></h6>
                  <div class="js-hr-progress-bar progress g-bg-black-opacity-0_1 rounded-0 g-mb-5">
                    <div class="js-hr-progress-bar-indicator progress-bar g-bg-pink u-progress-bar--xs" role="progressbar" style="width: 62%;" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small class="g-font-size-12">20% less than last week</small>
                </div>
                <!-- End Unify Project -->

                <!-- Unify Project -->
                <div class="g-mb-20">
                  <h6 class="g-mb-10">Unify Project <span class="float-right g-ml-10">93%</span></h6>
                  <div class="js-hr-progress-bar progress g-bg-black-opacity-0_1 rounded-0 g-mb-5">
                    <div class="js-hr-progress-bar-indicator progress-bar g-bg-primary u-progress-bar--xs" role="progressbar" style="width: 93%;" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small class="g-font-size-12">17% more than last week</small>
                </div>
                <!-- End Unify Project -->

                <!-- WordPress Coding -->
                <div class="g-mb-20">
                  <h6 class="g-mb-10">WordPress Coding <span class="float-right g-ml-10">74%</span></h6>
                  <div class="js-hr-progress-bar progress g-bg-black-opacity-0_1 rounded-0 g-mb-5">
                    <div class="js-hr-progress-bar-indicator progress-bar g-bg-black u-progress-bar--xs" role="progressbar" style="width: 74%;" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small class="g-font-size-12">35% more than last week</small>
                </div>
                <!-- End WordPress Coding -->

                <!-- Pixeel Ltd -->
                <div class="g-mb-20">
                  <h6 class="g-mb-10">Pixeel Ltd <span class="float-right g-ml-10">86%</span></h6>
                  <div class="js-hr-progress-bar progress g-bg-black-opacity-0_1 rounded-0 g-mb-5">
                    <div class="js-hr-progress-bar-indicator progress-bar g-bg-darkpurple u-progress-bar--xs" role="progressbar" style="width: 86%;" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small class="g-font-size-12">42% more than last week</small>
                </div>
                <!-- End Pixeel Ltd -->
              </div>
              <!-- End Panel Body -->
            </div>
            <!-- End Project Progress -->
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
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                      $selectGameInfo = "SELECT * FROM `game_registration_meta`";
                      $runselectGameInfo = $conn -> query($selectGameInfo);
                      $leftBrdColorArray = array("g-brd-red-left", "g-brd-black-left", "g-brd-yellow-left", "g-brd-green-left", "g-brd-pink-left", "g-brd-blue-left");
                      if($runselectGameInfo -> num_rows > 0){

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
                          <span class=" g-color-red g-rounded-20 g-px-10">Registration Ends <?=$getGameInfo['game_registration_end_date']?></span><br>
                          </p>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-blue g-rounded-20 g-px-10">Participants <?=$getGameInfo['game_participants']?></span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-pink g-rounded-20 g-px-10">Winning Prize ₹<?=$getGameInfo['game_winning_amount']?></span> <br>
                          <br>
                          <?php
                          $today = date("d-m-Y H:i");
                          // echo $today;
                              echo ($today < $getGameInfo['game_registration_end_date']) ? '<a href="javascript:void(0);" id="'." $gameID".'" class="joinGameButton btn btn-md u-btn-outline-darkgray g-rounded-50 g-mr-10 g-mb-15">Join Game</a>':'<input type="button" class="btn btn-md u-btn-outline-red g-rounded-50 g-mr-10 g-mb-15" value ="Registration Over" />';
                            ?>

                        </div>

                      </li>
                    </ul>
                    <?php
                    $i++;
                  }
                  }else{

                    echo 'No game to show at this moment.';

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
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <div class="dropdown g-mb-10 g-mb-0--md">
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                  <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-300 g-pa-0">
                    <?php
                      $selectUserNotifications = "SELECT * FROM `user_notification_record` WHERE `user_id` = $userID";
                      $runselectUserNotifications = $conn -> query($selectUserNotifications);
                      $colorArray = array("g-color-primary", "g-color-cyan", "g-color-orange");
                      $iconArray = array("");
                      // for($i = 0; $i < count($colorArray); $i++){
                      //   print "Colors"." ".$colorArray[$i]."<br>";
                      //
                      // }
                      //
                      // exit;
                     ?>
                    <!-- Alert Success -->
                    <div class="alert fade show g-bg-primary-opacity-0_1 g-color-primary rounded-0 g-mb-5" role="alert">
                      <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="media">
                        <div class="d-flex g-mr-10">
                          <img class="g-width-40 g-height-40 g-rounded-50x" src="../../../assets/img-temp/100x100/img5.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <p class="m-0"><strong>Jasica Coolman</strong> saved your pin.</p>
                          <span class="g-font-size-12 g-color-gray">2 hours ago</span>
                        </div>
                      </div>
                    </div>
                    <!-- End Alert Success -->

                    <!-- Alert Cyan -->
                    <div class="alert fade show g-bg-cyan-opacity-0_1 g-color-cyan rounded-0 g-mb-5" role="alert">
                      <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="media">
                        <div class="d-flex g-mr-10">
                          <img class="g-width-40 g-height-40 g-rounded-50x" src="../../../assets/img-temp/100x100/img14.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <p class="m-0"><strong>Jack Watson</strong> sent you a message.</p>
                          <span class="g-font-size-12">5 minutes ago</span>
                        </div>
                      </div>
                    </div>
                    <!-- End Alert Cyan -->

                    <!-- Alert Orange -->
                    <div class="alert fade show g-bg-orange-opacity-0_1 g-color-orange rounded-0 g-mb-5" role="alert">
                      <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="media">
                        <div class="d-flex g-mr-10">
                          <img class="g-width-40 g-height-40 g-rounded-50x" src="../../../assets/img-temp/100x100/img4.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <p class="m-0"><strong>Nelly</strong> is offering free cofee..</p>
                          <span class="g-font-size-12 g-color-gray">5 days ago</span>
                        </div>
                      </div>
                    </div>
                    <!-- End Alert Orange -->

                    <!-- Alert Purple -->
                    <div class="alert fade show g-bg-purple-opacity-0_1 g-color-purple rounded-0 g-mb-5" role="alert">
                      <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="media">
                        <div class="d-flex g-mr-10">
                          <span class="u-icon-v3 u-icon-size--sm g-bg-purple g-color-white g-rounded-50x">
                            <i class="icon-wallet"></i>
                          </span>
                        </div>
                        <div class="media-body">
                          <p class="m-0"><strong>Pixeel Ltd</strong> received $270 for logo.</p>
                          <span class="g-font-size-12 g-color-gray">2 hours ago</span>
                        </div>
                      </div>
                    </div>
                    <!-- End Alert Purple -->

                    <!-- Alert Red -->
                    <div class="alert fade show g-bg-red-opacity-0_1 g-color-lightred rounded-0 g-mb-5" role="alert">
                      <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="media">
                        <div class="d-flex g-mr-10">
                          <img class="g-width-40 g-height-40 g-rounded-50x" src="../../../assets/img-temp/100x100/img17.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <p class="m-0"><strong>Edmon Low</strong> saved your pin.</p>
                          <span class="g-font-size-12 g-color-gray">5 minutes ago</span>
                        </div>
                      </div>
                    </div>
                    <!-- End Alert Red -->

                    <!-- Alert Gray Lighter 5 -->
                    <div class="alert fade show g-bg-gray-light-v5 rounded-0 g-mb-5" role="alert">
                      <button type="button" class="close u-alert-close--light g-ml-10 g-mt-1" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                      <div class="media">
                        <div class="d-flex g-mr-10">
                          <img class="g-width-40 g-height-40 g-rounded-50x" src="../../../assets/img-temp/100x100/img1.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <p class="m-0"><strong>Htmlstream</strong> released a new update.</p>
                          <span class="g-font-size-12 g-color-gray">2 hours ago</span>
                        </div>
                      </div>
                    </div>
                    <!-- End Alert Gray Lighter 5 -->
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
                    <div class="dropdown g-mb-10 g-mb-0--md">
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                  <div class="js-scrollbar card-block  u-info-v1-1 g-bg-white-gradient-v1--after g-height-300 g-pa-0">
                    <!-- Article -->
                    <article class="media g-mb-20">
                      <a class="d-flex mr-3" href="#!">
                        <img class="rounded-circle g-width-80 g-height-80" src="../../../assets/img/icons/game-challenge.png" alt="CHALLENGE">
                      </a>

                      <div class="media-body">
                        <h3 class="h6">
                            <a class="g-color-black g-font-weight-600" href="#!">@Htmlstream</a> <span class="g-color-black-dark-v4">challenged</span> <a class="g-color-black g-font-weight-600" href="#!">@Htmlstream</a>
                            <br>
                            <div style="float:right; margin-right:11px;"><span class="g-color-red">26 minutes ago</span></div> <br>
                          </h3>
                        <p class="g-color-gray-dark-v4 g-mb-5">Sed ultrices velit vitae tortor posuere ultrices. Aliquam laoreet lorem et vulputate porta.</p>
                        <a href="#!">https://goo.gl/Zjd6Bj</a>
                      </div>
                    </article>
                    <!-- End Article -->

                    <hr class="g-brd-gray-light-v4 g-mt-15 g-mb-20">

                    <!-- Article -->
                    <article class="media g-mb-20">
                      <a class="d-flex mr-3" href="#!">
                        <img class="rounded-circle g-width-40 g-height-40" src="../../../assets/img-temp/100x100/img3.jpg" alt="Image Description">
                      </a>

                      <div class="media-body">
                        <h3 class="h6">
                            <span class="g-color-black g-font-weight-600">Pixeel</span>
                            <a class="g-color-gray-dark-v4 g-mr-5" href="#!">@PixeelStudio</a>
                            <span class="g-color-gray-dark-v4">3h</span>
                          </h3>
                        <p class="g-color-gray-dark-v4 g-mb-5">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
                        <a href="#!">https://goo.gl/Zjd6Bj</a>
                      </div>
                    </article>
                    <!-- End Article -->

                    <hr class="g-brd-gray-light-v4 g-mt-15 g-mb-20">

                    <!-- Article -->
                    <article class="media g-mb-20">
                      <a class="d-flex mr-3" href="#!">
                        <img class="rounded-circle g-width-40 g-height-40" src="../../../assets/img-temp/100x100/img2.jpg" alt="Image Description">
                      </a>

                      <div class="media-body">
                        <h3 class="h6">
                            <span class="g-color-black g-font-weight-600">Wrapbootstrap</span>
                            <a class="g-color-gray-dark-v4 g-mr-5" href="#!">@Wrapbootstrap</a>
                            <span class="g-color-gray-dark-v4">54m</span>
                          </h3>
                        <p class="g-color-gray-dark-v4 g-mb-5">Sed ultrices velit vitae tortor posuere ultrices. Aliquam laoreet lorem et vulputate porta.</p>
                        <a href="#!">https://goo.gl/Zjd6Bj</a>
                      </div>
                    </article>
                    <!-- End Article -->

                    <hr class="g-brd-gray-light-v4 g-mt-15 g-mb-20">

                    <!-- Article -->
                    <article class="media g-mb-20">
                      <a class="d-flex mr-3" href="#!">
                        <img class="rounded-circle g-width-40 g-height-40" src="../../../assets/img-temp/100x100/img4.jpg" alt="Image Description">
                      </a>

                      <div class="media-body">
                        <h3 class="h6">
                            <span class="g-color-black g-font-weight-600">Karina</span>
                            <a class="g-color-gray-dark-v4 g-mr-5" href="#!">@Karina</a>
                            <span class="g-color-gray-dark-v4">7h</span>
                          </h3>
                        <p class="g-color-gray-dark-v4 g-mb-5">Sed ultrices velit vitae tortor posuere ultrices. Aliquam laoreet lorem et vulputate porta.</p>
                        <a href="#!">https://goo.gl/Zjd6Bj</a>
                      </div>
                    </article>
                    <!-- End Article -->
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
                          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-cyan--hover" href="#!">
                            <i class="icon-trophy" data-toggle="tooltip" data-placement="top" title="Quick Challenge"></i>
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
                  <div style="float:right">Your Wallet Balance is ₹<b><?= $selectUserInformations['walletBalance'];?></b> | Last Updated On : <?= $selectUserInformations['lastUpdate_date_time_stamp'];?></div>
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

<?php
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

 ?>
