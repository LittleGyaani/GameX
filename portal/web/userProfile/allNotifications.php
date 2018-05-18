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
  $selectAllUserData = "SELECT * FROM user_info ui JOIN user_wallet_info uw ON ui.user_id = uw.userID WHERE ui.user_id = '$userID'";
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
  <title>battlestation - Play the best of your life! | All Notifications</title>

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
            <p><center><img src="https://cdn.dribbble.com/users/475393/screenshots/3099510/pulse.gif" height="390" width="512"/></center></p>
            <center><p><h3>Finding a <b>Match</b> for YOU<span id="dots"></span><h3></p></center>
            </div>

              <div id="quickMatchArea"><h4 class="g-mb-20"><div id="successtext"></div></h4></div>
              <center><button type="button" class="close btn btn-lg u-btn-outline-red u-btn-hover-v2-1 g-mr-10 g-mb-15" onclick="Custombox.modal.close();">Cancel</button></center>
          </div>
          <!-- End Quick Match modal window -->

          <!-- Qucik Head ON Match modal window -->
          <div id="quickheadOnMatch" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
            <button type="button" class="close closeHeadOnModal" onclick="Custombox.modal.close();">
              <i class="icon-close"></i>
            </button>

                  <form method="post" id="headonMatchForm" action="#" class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30">

                    <div class="form-inline">
                      <label class="mr-sm-3 mb-3 mb-lg-0" for="WhomtoChallenge">Whom to Challenge?</label>
                      <span class="input-group-addon justify-content-center" id="sizing-addon1">@</span>
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

          <!-- Profile Section -->

          <?php

          //Including Profile Sidebar
          include '../../../includes/common/template_profile_sidebar.php';

           ?>

           <!-- Profile Section End -->

          <!-- Profile Content -->
          <div class="col-lg-9">

            <!-- All Notification Panel -->
            <div class="text-center g-mb-50">
              <h2 class="h4">All
                <span class="g-color-primary g-ml-5">#NOTIFICATIONS</span>
              </h2>
            </div>

              <!--Notification Area Start -->
              <?php
                $getAllNotifications = "SELECT * FROM `user_notification_record` unr JOIN `user_info` usi ON unr.`userID` = usi.`user_id` WHERE unr.`userID` = $userID ORDER BY unr.`notification_sent_DTStamp` DESC";
                $rungetAllNotifications = $conn -> query($getAllNotifications);
                if($rungetAllNotifications -> num_rows >0){
                    while($fetchAllNotifications = $rungetAllNotifications -> fetch_assoc()){

               ?>
              <div class="shortcode-html">
                <div class="media g-mb-30">
                  <img class="d-flex g-width-60 g-height-60 rounded-circle g-mt-3 g-mr-20" src="../../../assets/img/profilePic/<?= $fetchAllNotifications['user_profile_pic'];?>" alt="<?=$fetchAllNotifications['user_fullname']?>">
                  <div class="media-body u-shadow-v22 g-bg-secondary g-pa-30">
                    <div class="g-mb-15">
                      <h5 class="d-flex justify-content-between align-items-center h5 g-color-gray-dark-v1 mb-0">
                        <span class="d-block g-mr-10"><?= $fetchAllNotifications['notification_title'] ?></span>
                        <a class="u-tags-v1 g-font-size-12 g-brd-around g-brd-gray-light-v4 g-bg-primary--hover g-brd-primary--hover g-color-black-opacity-0_8 g-color-white--hover rounded g-py-6 g-px-15" href="#!">Mark Read</a>
                      </h5>
                      <span class="g-color-gray-dark-v4 g-font-size-12"><?= get_time_ago(strtotime($fetchAllNotifications['notification_sent_DTStamp'])); ?></span>
                    </div>

                    <p><?= $fetchAllNotifications['notification_message'] ?></p>

                    <!-- <ul class="list-inline d-sm-flex my-0">
                      <li class="list-inline-item g-mr-20">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="shortcode-blocks-comments.html#!">
                          <i class="icon-like g-pos-rel g-top-1 g-mr-3"></i>
                          214
                        </a>
                      </li>
                      <li class="list-inline-item g-mr-20">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="shortcode-blocks-comments.html#!">
                          <i class="icon-dislike g-pos-rel g-top-1 g-mr-3"></i>
                          18
                        </a>
                      </li>
                      <li class="list-inline-item ml-auto">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="shortcode-blocks-comments.html#!">
                          <i class="icon-note g-pos-rel g-top-1 g-mr-3"></i>
                          Reply
                        </a>
                      </li>
                    </ul> -->
                  </div>
                </div>
              </div>
              <?php
            }
          }else{
               ?>
            <!-- Notification Area End -->
            <?php
              echo 'Nothing to show at the moment. Please do some activity';
            }
             ?>
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
