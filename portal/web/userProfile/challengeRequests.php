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

          <!-- Profile Section -->

          <?php

          //Including Profile Sidebar
          include '../../../includes/common/template_profile_sidebar.php';

           ?>

           <!-- Profile Section End -->

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
                          $getAllChallengeRequests = "SELECT * FROM `head_on_match_request` WHERE `challenged_whom` = $userID ORDER BY `headonMatchID` DESC";
                          $rungetAllChallengeRequests = $conn -> query($getAllChallengeRequests);
                          if($rungetAllChallengeRequests -> num_rows > 0){
                            while($getAllChallengeInfo = $rungetAllChallengeRequests -> fetch_assoc()){

                              $challengedBy = $getAllChallengeInfo['challenged_by_userID'];
                              $challengedGame = $getAllChallengeInfo['challenge_gameID'];

                              $fetchAllMetaInfo = $conn -> query("SELECT * FROM `profile_platform_games` ppg JOIN `user_associated_game` uag ON uag.gameID = ppg.gameID JOIN `user_info` usi ON uag.userID = usi.user_id JOIN `head_on_match_request` hmr ON hmr.challenge_gameID = ppg.gameID WHERE usi.user_id = $challengedBy AND ppg.gameID = $challengedGame AND hmr.challenged_by_userID = $challengedBy"); //SELECT * FROM `profile_platform_games` ppg JOIN `user_associated_game` uag ON uag.gameID = ppg.gameID JOIN `user_info` usi ON uag.userID = usi.user_id JOIN `head_on_match_request` hmr ON hmr.challenge_gameID = ppg.gameID WHERE usi.user_id = $challengedBy AND ppg.gameID = $challengedGame
                              $returnfetchAllMetaInfo = $fetchAllMetaInfo -> fetch_assoc();
                              // print_r("SELECT * FROM `profile_platform_games` ppg JOIN `user_associated_game` uag ON uag.gameID = ppg.gameID JOIN `user_info` usi ON uag.userID = usi.user_id JOIN `head_on_match_request` hmr ON hmr.challenge_gameID = ppg.gameID WHERE usi.user_id = $challengedBy AND ppg.gameID = $challengedGame AND hmr.challenged_by_userID = $challengedBy");
                          ?>

                          <div class="col-md-4 g-mb-30">
                            <!-- Listing - Agents -->
                            <div class="u-shadow-v11 text-center">
                              <div class="g-bg-white g-pa-20">
                                <div class="g-width-90 g-height-700 mx-auto">
                                  <img class="g-width-130 g-height-130 img-fluid g-brd-around g-brd-3 g-brd-gray-light-v3 rounded-circle" src="../../../assets/img/profilePic/<?= !empty($returnfetchAllMetaInfo['user_profile_pic']) ? $returnfetchAllMetaInfo['user_profile_pic'] : 'user_default_avatar.png';?>" alt="<?= $returnfetchAllMetaInfo['user_fullname'];?>">
                                </div>
                                <div class="mb-3">
                                  <h3 class="h5"><a class="g-color-black" href="shortcode-blocks-users.html#"></a></h3>
                                  <span class="u-label g-rounded-20 g-bg-indigo g-px-15 g-mr-10 g-mb-15">
                                    <span class="d-block g-color-white-dark-v5 g-font-size-13 mb-1">Challenged By <strong><?=$returnfetchAllMetaInfo['user_name']?></strong></span>
                                </span>
                                <span class="u-label g-rounded-20 g-bg-purple g-px-15 g-mr-10 g-mb-15">
                                  <span class="d-block g-color-white-dark-v5 g-font-size-13 mb-1">Challenge Amount <strong id="challengeRequestAmount">₹<?=$returnfetchAllMetaInfo['challenge_amount']?></strong></span>
                                </span>
                                <span class="u-label g-rounded-20 g-bg-black g-px-10 g-mr-10 g-mb-15">
                                  <span class="d-block g-color-white-dark-v5 g-font-size-13 mb-1">Challenged On <strong><?=$returnfetchAllMetaInfo['request_DTStamp']?></strong></span>
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
                              <?php
                                if($getAllChallengeInfo['has_accepted'] == 0 && $getAllChallengeInfo['game_status'] != 0){
                               ?>
                              <a class="acceptHeadOnChallenge btn btn-block g-color-white g-bg-indigo g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>" data-amount="<?=$returnfetchAllMetaInfo['challenge_amount']?>" href="#headonMatchModal" data-modal-target="#headonMatchModal" data-modal-effect="blur">
                              <i class="icon icon-check"></i>  Accept Challenge Request
                              </a>
                              <a class="dismissHeadOnChallenge btn btn-block g-color-white g-bg-purple g-bg-secondary-dark-light-v1--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15 mt-0" href="#!" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>">
                              <i class="icon icon-close"></i> Decline Challenge Request</a>
                            <?php
                          }else if($getAllChallengeInfo['has_accepted'] == 1 && $getAllChallengeInfo['game_status'] != 0){
                            ?>
                                <?php
                                  if($getAllChallengeInfo['is_result_uploaded'] == 'n'){
                                ?>
                                <a class="uploadscreenshot btn btn-block g-color-white g-bg-blue g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15" href="#!" data-game-name="<?= $returnfetchAllMetaInfo['game_name'];?>" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>" href="#matchResultUploadModal" data-modal-target="#matchResultUploadModal" data-modal-effect="blur">
                                <i class="icon icon-cloud-upload"></i>  Upload Result
                                </a>
                                <?php
                              }else{
                                ?>
                                <a class="viewresult btn btn-block g-color-white g-bg-orange g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15" href="#!" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>">
                                <i class="icon icon-eye"></i>  View Result
                                </a>
                                <a class="claimadispute btn btn-block g-color-white g-bg-pink g-bg-secondary-dark-light-v1--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15 mt-0" href="#!" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>">
                                <i class="icon icon-close"></i> Raise Dispute</a>
                                <?php
                              }
                                ?>
                          <?php
                        }else{
                          ?>
                          <button class=" btn btn-block g-color-white g-bg-green g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15" href="#!" id="<?= $returnfetchAllMetaInfo['headonMatchID'];?>">
                          <i class="icon icon-check"></i>  Game Finished
                        </button>
                        <?php
                        }
                          ?>
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

    <!-- Headon Match Code Verification modal window -->
     <div id="headonMatchModal" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
       <button type="button" class="close hm-modal-close" onclick="Custombox.modal.close();">
         <i class="fa fa-close"></i>
       </button>
       <h4 class="g-mb-20">Game Joining Code</h4>
       <p>
         <!-- Joining Code Code Masking -->
         <div class="form-group g-mb-20">
           <label class="g-mb-10">Enter Joining Code</label>
           <b class="tooltip tooltip-top-right u-tooltip--v1">Some helpful information</b>
           <div class="input-group g-brd-primary--focus">
             <input id="gamejoincode" class="form-control form-control-md g-brd-right-none rounded-0" type="text" placeholder="BSLVHOMXXXXXX" data-mask="BSLVHOM999999" required>
             <div class="input-group-addon d-flex align-items-center g-color-gray-dark-v5 rounded-0">
               <i class="icon-credit-card"></i>
             </div>
           </div>
           <br>
           <button class="btn btn-md u-btn-outline-darkgray g-mr-10 g-mb-15" id="joingame">Join Game</button>
         </div>
         <!-- End Game Joining Code Masking -->
       </p>
     </div>
     <!-- Headon Match Code Verification modal window -->

     <!-- Upload Screenshot modal window -->
      <div id="matchResultUploadModal" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
        <button type="button" class="close hm-modal-close" onclick="Custombox.modal.close();">
          <i class="fa fa-close"></i>
        </button>
        <h4 class="g-mb-20">Result Upload for Match</h4>
        <p>
          <!-- Start Result Upload -->
          <center>
            <div class="form-group g-mb-20">

            <label class="g-mb-10">Upload Result for <div id="gameName"></div></label>

                <div class="col-md-6">
                  <!-- User Image -->
                  <div class="g-mb-20">
                    <img id ="matchScreenshot" class="img-fluid w-100 u-block-hover__main--zoom-v1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Solid_white_bordered.svg/500px-Solid_white_bordered.svg.png" height="200px" width="200px">
                  </div>

                  <!-- User Image -->
                </div>
              </div>
              <div class="col-md-12">
              <!-- User Contact Buttons -->
              <a class="btn btn-block u-btn-darkgray g-rounded-150 g-py-12 g-mb-10" href="javascript:void(0);" id="chooseScreenshot">
                <i class="icon icon-screen-smartphone g-pos-rel g-top-1 g-mr-5"></i> Choose Screenshot
              </a>
              </div>
              <form id="resultscreenshot" action="javascript:void(0);" method="post" enctype="multipart/form-data">
                  <!-- <input id="matchScore" name="matchScore" class="form-control form-control-md rounded-0" type="number" value="" placeholder="Type the score" width="50" required/> -->
                  <input id="resultgameID" type="number" value=""/ hidden>
                  <input id="screenshotUpload" name="screenshotUpload" accept="image/*" type="file" name="result_screenshot" required="" capture hidden/>
                  </br>
                  <button class="btn btn-md u-btn-outline-darkgray g-mr-10 g-mb-15" id="uploadscreenshot">Upload</button>
                  <!-- <input type="reset" value="reset"> -->
            </form>
            </center>
          </div>
          <!-- End Game Result Upload -->
        </p>
      </div>
      <!-- End Screenshot modal window -->


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
