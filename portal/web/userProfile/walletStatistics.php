<?php

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Validating if the session exists or not
if(isset($_SESSION['userID'])){

    // echo 'Welcome User'.$_SESSION['userNAME'];
    $userID = $_SESSION['userID'];
    //Selecting all user information basing upon the user's session id
    $getAllUserDetails = $conn -> query("SELECT * FROM user_info ui JOIN user_wallet_info uw ON ui.user_id = uw.userID WHERE ui.user_id = '$userID'");
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
    <title>battlestation - Play the best of your life! | Wallet Statistics</title>

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
                        <a href="userDashboard.php" class="list-group-item list-group-item-action justify-content-between">
                            <span><i class="icon-home g-pos-rel g-top-1 g-mr-8"></i> My Dashboard Area</span>
                        </a>
                        <!-- End Overall -->

                        <!-- Profile -->
                        <a href="myProfile.php" class="list-group-item list-group-item-action justify-content-between">
                            <span><i class="icon-user g-pos-rel g-top-1 g-mr-8"></i> My Profile Informations</span>
                        </a>
                        <!-- End Profile -->

                        <!-- Users Contacts -->
                        <a href="#" class="list-group-item list-group-item-action justify-content-between">
                            <span><i class="icon-game-controller g-pos-rel g-top-1 g-mr-8"></i> My Game Platforms</span>
                        </a>
                        <!-- End Users Contacts -->

                        <!-- My Projects -->
                        <a href="#" class="list-group-item list-group-item-action justify-content-between active">
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
                                <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Game Progress
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

                <!-- Game Platform Area -->
                <div class="col-lg-9">
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-grey border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-credit-card g-pos-rel g-top-1 g-mr-5"></i> My Wallet Transaction Reports
                      </h3>
                  </div>

                  <!--Basic Table-->
                      <div class="table-responsive">
                        <table class="table table-bordered u-table--v2">
                          <?php

                            $selectWalletInfo = "SELECT * FROM `user_wallet_transaction_info` WHERE `userID` = $userID";
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
                            <strong><small>* CWB - Current Wallet Balance, LUB - Last Used Balance, TRANX. - Transaction</small></strong><br>
                            <h4>Your Current Wallet Balance is ₹<b><?= $selectUserInformations['walletBalance'];?></b> | Last Updated On : <?= $selectUserInformations['lastUpdate_date_time_stamp'];?></h4>
                            <?php


                            }else{

                              echo '<b>No transactions to show. Please do some purchase with your wallet balance.</b>';
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <!--End Basic Table-->

                </div>

        </section>

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
