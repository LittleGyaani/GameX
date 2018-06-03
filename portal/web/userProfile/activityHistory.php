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
  <title>battlestation - Play the best of your life! | Activity History</title>

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

          <!-- Profile Section -->

          <?php

          //Including Profile Sidebar
          include '../../../includes/common/template_profile_sidebar.php';

           ?>

           <!-- Profile Section End -->

          <!-- Profile Content -->
          <div class="col-lg-9">

            <!-- Timeline Box -->
                        <ul class="row u-timeline-v2-wrap list-unstyled">
                          <?php

                            $getAllUserActivity = $conn -> query("SELECT * FROM `user_activity_history` WHERE `user_id` = $userID ORDER BY `user_activity_DTStamp` DESC");
                            if($getAllUserActivity -> num_rows > 0){
                                while($fetchAllUserActivity = $getAllUserActivity -> fetch_assoc()){
                                  $activityTime = explode(' ',$fetchAllUserActivity['user_activity_DTStamp'])
                           ?>
                          <li class="col-md-12 g-mb-40">
                            <div class="row">
                              <!-- Timeline Date -->
                              <div class="col-md-3 text-md-right g-pt-20--md g-pr-40--md g-mb-20">
                                <h5 class="h6 g-font-weight-700 mb-0"><?=$activityTime[0]?></h5>
                                <h4 class="h4 g-font-weight-300"><?=$activityTime[1]?></h4>
                              </div>
                              <!-- End Timeline Date -->

                              <!-- Timeline Content -->
                              <div class="col-md-9 g-orientation-left g-pl-40--md">
                                <!-- Timeline Dot -->
                                <div class="g-hidden-sm-down u-timeline-v2__icon g-top-35">
                                  <i class="d-block g-width-18 g-height-18 g-bg-primary g-brd-around g-brd-4 g-brd-gray-light-v4 rounded-circle"></i>
                                </div>
                                <!-- End Timeline Dot -->

                                <article class="g-pos-rel g-bg-gray-light-v5 g-pa-12">
                                  <!-- Timeline Arrow -->
                                  <div class="g-hidden-sm-down u-triangle-inclusive-v1--right g-top-30 g-z-index-2">
                                    <div class="u-triangle-inclusive-v1--right__back g-brd-gray-light-v5-right"></div>
                                  </div>
                                  <div class="g-hidden-md-up u-triangle-inclusive-v1--top g-left-20 g-z-index-2">
                                    <div class="u-triangle-inclusive-v1--top__back g-brd-gray-light-v5-bottom"></div>
                                  </div>
                                  <!-- End Timeline Arrow -->


                                  <p class="lead g-mb-20">
                                    <h3 class="g-font-weight-300"><?=ucwords($fetchAllUserActivity['user_last_action'])?></h3>
                                  </p>

                                </article>
                              </div>
                              <!-- End Timeline Content -->
                            </div>
                          </li>
                          <?php
                        }
                      }else{

                        echo 'No activity to show.';

                      }
                      ?>
                        </ul>
                        <!-- End Timeline Box -->
                      </div>

            </div>
            <!-- End Product Table Panel -->
          </div>
          <!-- End Profile Content -->
        </div>

      </div>

    </section>

    <!-- Headon Match Code Verification modal window -->
     <div id="headonMatchModal" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
       <button type="button" class="close" onclick="Custombox.modal.close();">
         <i class="fa fa-close"></i>
       </button>
       <h4 class="g-mb-20">Game Joining Code</h4>
       <p>
         <!-- Voucher Code Masking -->
         <div class="form-group g-mb-20">
           <label class="g-mb-10">Enter Joining Code</label>
           <b class="tooltip tooltip-top-right u-tooltip--v1">Some helpful information</b>
           <div class="input-group g-brd-primary--focus">
             <input id="gamejoincode" class="form-control form-control-md g-brd-right-none rounded-0" type="text" placeholder="BSLVHOMXXXXXX" data-mask="BSLVHOM999999">
             <div class="input-group-addon d-flex align-items-center g-color-gray-dark-v5 rounded-0">
               <i class="icon-credit-card"></i>
             </div>
           </div>
           <br>
           <button class="btn btn-md u-btn-outline-darkgray g-mr-10 g-mb-15" id="joingame">Join Game</button>
         </div>
         <!-- End Vocuher Card Masking -->
       </p>
     </div>
     <!-- Headon Match Code Verification modal window -->


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
