<?php

//Hiding all errors and notices
error_reporting(0);

//Start the session and let user data to be read in the page
session_start();

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Validating if the session exists or not
if(isset($_SESSION['userID'])){

    // echo 'Welcome User'.$_SESSION['userNAME'];
    $userID = $_SESSION['userID'];

    //Selecting all user information basing upon the user's session id
    $getAllUserDetails = $conn -> query("SELECT * FROM user_info ui JOIN user_wallet_info uw ON ui.user_id = uw.userID WHERE ui.user_id = '$userID'");
    $selectUserInformations = $getAllUserDetails -> fetch_assoc();

}else{

    echo 'You are not authorized to access the page without logging in.';
    header('Location:../auth/loginPage.php?redirectback='.urlencode($_SERVER['REQUEST_URI']));

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>battlestation - Play the best of your life! | Game Platform Profile</title>

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
                    <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Home</a>
                    <i class="fa fa-angle-right g-ml-7"></i>
                </li>
                <li class="list-inline-item g-mr-7">
                    <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pages</a>
                    <i class="fa fa-angle-right g-ml-7"></i>
                </li>
                <li class="list-inline-item g-color-primary">
                    <span>Profile Settings</span>
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

                <!-- Game Platform Area -->
                <div class="col-lg-9">



                    <!-- Platform Box Start -->
                    <section class="g-py-100">
                        <div class="container">
                            <header class="text-center g-width-60x--md mx-auto g-mb-50">
                                <h2 class="h1 g-color-gray-dark-v1 g-font-weight-300">Game Platforms</h2>
                                <p class="lead">Add your <b>userid/username</b> associated with the <strong>games/platforms</strong> you have.</p>
                            </header>

                            <input id="gameFilter" type="text" placeholder="Search..." class="btn btn-md u-btn-outline-yellow g-rounded-50 g-mr-10 g-mb-15">

                            <div class="row g-mb-30">

                          <?php
                              $selectAllGamePlatforms = "SELECT * FROM profile_platform_games WHERE `game_status` = '1' ORDER BY `game_name` ASC";
                              $getAllGameInfo = $conn -> query($selectAllGamePlatforms);
                              if($getAllGameInfo && (($getAllGameInfo -> num_rows) > 0)){
                                  while ($getGameMeta = $getAllGameInfo -> fetch_assoc()){

                          ?>

                             <div class="col-lg-6 g-mb-40 g-mb-0--lg" id="gamePlatformArea">

                                    <ul class="list-unstyled mb-0">

                                        <li class="media u-shadow-v11 rounded g-pa-20 g-mb-10">
                                            <div class="d-flex align-self-center g-mt-3 g-mr-15">
                                                <img class="g-width-90 g-height-80" src="../../../assets/img/platforms/<?=$getGameMeta['game_image']?>" alt="<?=$getGameMeta['game_name'] ?>">
                                            </div>

                                            <div class="media-body">
                                                <a class="d-block u-link-v5 g-color-main g-color-primary--hover g-font-weight-600 g-mb-3" id ="<?=$getGameMeta['gameID'] ?>"><?=$getGameMeta['game_name'] ?></a>
                                                <span class="g-font-size-13 g-color-green g-mr-15">
                                                  <i class="icon-location-pin g-pos-rel g-top-1 mr-1"></i> <b><?=$getGameMeta['game_sponsor']?></b> </br>
                                                </span>
                                                <span class="g-font-size-13 g-color-pink g-mr-5">
                                                  <i class="icon-directions g-pos-rel g-top-1 mr-1"></i> <?=$getGameMeta['game_developer_company'];?>
                                                </span> <br>
                                                <?php
                                                  $gameID = $getGameMeta['gameID'];
                                                  $getUserID = "SELECT * FROM `user_associated_game` WHERE `gameID` = '$gameID' AND `userID` = $userID";
                                                  $getUserName = $conn -> query($getUserID);
                                                  $getUserCount = $getUserName -> num_rows;

                                                  if($getUserCount){

                                                    while ($getUserMeta = $getUserName -> fetch_assoc()){

                                                  ?>

                                                <span class="g-font-size-13 g-color-blue g-mr-15">
                                                  <i class="icon-user g-pos-rel g-top-1 mr-1"></i><b><?= $getUserMeta['platform_user_name'] ?></b>
                                                </span>

                                            </li>


                                            <!--UPDATE USERNAME/USERID of the GAME/Platform-->
                                            <div class="text-center">
                                                <button type="button" id="<?=$getGameMeta['gameID'] ?>" data-user-id="<?php echo $userID; ?>" data-platform-user-name ="<?= $getUserMeta['platform_user_name'] ?>" class="platformIDUpdate btn btn-md u-btn-outline-cyan g-mr-10 g-mb-15 u-btn-hover-v1-4 g-mr-10 g-mb-15" data-modal-target="#usernameUpdate" data-modal-effect="fadein">
                                                    <i class="fa fa-pencil g-mr-5" ></i>UPDATE USERID
                                                </button>
                                            </div>
                                            <!--END ADD USERNAME/USERID of the GAME/Platform-->

                                                <?php
                                              }
                                            }else{ ?>

                                                  <span class="g-font-size-13 g-color-red g-mr-15">
                                                    <i class="icon-user g-pos-rel g-top-1 mr-1"></i> <strong>No UserID Mapped</strong>
                                                  </span>
                                            </div>
                                        </li>


                                        <!--ADD USERNAME/USERID of the GAME/Platform-->
                                        <div class="text-center">
                                            <button type ="button" data-game-id="<?=$getGameMeta['gameID'] ?>" data-user-id ="<?php echo $userID; ?>" class="platformIDMapping btn btn-md u-btn-outline-black g-mr-10 g-mb-15 u-btn-hover-v1-4 g-mr-10 g-mb-15" data-modal-target="#usernameMapping" data-modal-effect="fadein">
                                                <i class="fa fa-check-circle g-mr-5"></i>ADD USERID
                                            </button>
                                        </div>
                                        <!--END ADD USERNAME/USERID of the GAME/Platform-->

                                        <?php
                                        }
                                         ?>

                                        <br>

                                    </ul>


                                </div>

                                <?php

                                        }
                                    }

                                ?>

                              </div>
                              <!-- Game Platform Content -->

                            </div>
                        </div>
                    </section>
                    <!-- End Platform Boxes -->


                            <!-- Username/UserID update modal window -->
                            <div id="usernameUpdate" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
                              <button type="button" class="close" onclick="Custombox.modal.close();">
                                <i class="fa fa-close" id="closeModal"></i>
                              </button>

                              <div class="details"></div>
                              <div class="form-group g-mb-20">
                                <label class="g-mb-10"><h6 class="g-mb-20" id="platformName"></h6></label>

                                      <form action = "" method ="post">
                                        <div class="form-group g-mb-20">
                                            <div class="input-group g-brd-primary--focus">
                                              <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                <i class="icon-user"></i>
                                              </div>
                                              <input class="form-control form-control-md rounded-0" type="text" placeholder="" value="" id="platformUserName" />
                                              <input type="hidden" id="gameID" value="" />
                                            </div>
                                          </div>

                                          <div class="form-group g-mb-20">
                                              <div class="input-group g-brd-primary--focus">
                                                <button type="submit" id="userIDUpdate" class="btn btn-primary">SAVE</button>
                                              </div>
                                            </div>
                                      </form>

                              </div>
                            </div>
                            <!-- End Username/UserID update modal window -->

                            <!-- Username/UserID add modal window -->
                            <div id="usernameMapping" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
                              <button type="button" class="close" onclick="Custombox.modal.close();">
                                <i class="fa fa-close g-color-gray-light-v1" id="closeAddModal"></i>
                              </button>

                              <div class="details"></div>
                              <div class="form-group g-mb-20">
                                <label class="g-mb-10"><h6 class="g-mb-20" id="gamename"></h6></label>

                                      <form action = "" method ="post">
                                        <div class="form-group g-mb-20">
                                            <div class="input-group g-brd-primary--focus">
                                              <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                <i class="icon-user"></i>
                                              </div>
                                              <input class="form-control form-control-md rounded-0" type="text" placeholder="" value="" id="addPlatformUserName" />
                                                <input type="hidden" value="" id="gamePID" />
                                                <input type="hidden" value="" id="userID" />
                                                <input type="hidden" value="" id="hiddenGameName" />
                                            </div>
                                          </div>

                                          <div class="form-group g-mb-20">
                                              <div class="input-group g-brd-primary--focus">
                                                <button type="submit" id="mapUserID" class="btn btn-primary">SAVE</button>
                                              </div>
                                            </div>
                                      </form>
                              </div>
                            </div>
                            <!-- End Username/UserID add modal window -->
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
