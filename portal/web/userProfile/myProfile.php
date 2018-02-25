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
  <title>battlestation - Play the best of your life! | My Profile</title>


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
                  <a class="btn btn-sm u-btn-primary rounded-0" href="#!"><b><?=$selectUserInformations['user_fullname']?></b></a>
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
                <a href="#" class="list-group-item list-group-item-action justify-content-between active">
                    <span><i class="icon-user g-pos-rel g-top-1 g-mr-8"></i> My Profile Informations</span>
                </a>
                <!-- End Profile -->

                <!-- Users Contacts -->
                <a href="gamePlatforms.php" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-game-controller g-pos-rel g-top-1 g-mr-8"></i> My Game Platforms</span>
                </a>
                <!-- End Users Contacts -->

                <!-- My Projects -->
                <a href="page-profile-projects-1.html" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-wallet g-pos-rel g-top-1 g-mr-8"></i> My Wallet Statistics</span>
                    <span class="u-label g-font-size-11 g-bg-primary g-rounded-20 g-px-10">9</span>
                </a>
                <!-- End My Projects -->

                <!-- Comments -->
                <a href="page-profile-comments-1.html" class="list-group-item list-group-item-action justify-content-between">
                    <span><i class="icon-bell g-pos-rel g-top-1 g-mr-8"></i> My Notifications Area</span>
                    <span class="u-label g-font-size-11 g-bg-black g-rounded-20 g-px-8">24</span>
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

          <!-- Profle Content -->
          <div class="col-lg-9">
            <!-- Nav tabs -->
            <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
              <li class="nav-item">
                <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--1" role="tab">Edit Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--2" role="tab">Security Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link g-py-10" data-toggle="tab" href="#pmntPage" role="tab">Payment Options</a>
              </li>
              <li class="nav-item">
                <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--4" role="tab">Notification Settings</a>
              </li>
            </ul>
            <!-- End Nav tabs -->

            <!-- Tab panes -->
            <div id="nav-1-1-default-hor-left-underline" class="tab-content">
              <!-- Edit Profile -->
              <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
                <h2 class="h4 g-font-weight-300">Manage your Profile detils here.</h2>
                <p>Below are name, email addresse, contacts and more on file for your account.</p>

                <ul class="list-unstyled g-mb-30">
                  <!-- Name -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Name</strong>
                      <span class="align-top"><?=$selectUserInformations['user_fullname']?></span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Name -->

                  <!-- Your ID -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Your ID</strong>
                      <span class="align-top">GXID-<?=$selectUserInformations['user_id']?></span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Your ID -->

                  <!-- Position -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Level</strong>
                      <span class="align-top">Pro Gamer</span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Position -->

                  <!-- Primary Email Address -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">EMAIL ID</strong>
                      <span class="align-top"><?=$selectUserInformations['email_id']?></span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Primary Email Address -->

                  <!-- Linked Account -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Linked accounts</strong>
                      <span class="align-top">Facebook</span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Linked Account -->

                  <!-- Phone Number -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Phone number</strong>
                      <span class="align-top">(+123) 456 7890</span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Phone Number -->

                  <!-- Address -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Address</strong>
                      <span class="align-top">Jatani, Khordha, Bhubaneswar, ODISHA - 752050 </span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Address -->
                  <!-- Address -->
                  <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                    <div class="g-pr-10">
                      <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Joined ON</strong>
                      <span class="align-top"><?=$selectUserInformations['user_registration_date']?></span>
                    </div>
                    <span>
                        <i class="icon-pencil g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                  </li>
                  <!-- End Address -->

                </ul>

                <div class="text-sm-right">
                  <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#!">Reset</a>
                  <a class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#!" id="actionBtn">Save Changes</a>
                </div>
              </div>
              <!-- End Edit Profile -->

              <!-- Security Settings -->
              <div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--2" role="tabpanel">
                <h2 class="h4 g-font-weight-300">Security Settings</h2>
                <p class="g-mb-25">Reset your password, change verifications and so on.</p>

                <form>
                  <!-- Current Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Current password</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="password" placeholder="Current password">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Current Password -->

                  <!-- New Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">New password</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="password" placeholder="New password">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End New Password -->

                  <!-- Verify Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Verify password</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="password" placeholder="Verify password">
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Verify Password -->

                  <!-- Login Verification -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Login verification</label>
                    <div class="col-sm-9">
                      <label class="form-check-inline u-check g-pl-25">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                        <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                          <i class="fa" data-check-icon="&#xf00c;" aria-hidden="true"></i>
                        </div>
                        Verify login requests
                      </label>
                      <small class="d-block text-muted">You need to add a phone to your profile account to enable this feature.</small>
                    </div>
                  </div>
                  <!-- End Login Verification -->

                  <!-- Password Reset -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Password reset</label>
                    <div class="col-sm-9">
                      <label class="form-check-inline u-check g-pl-25">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                        <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                          <i class="fa" data-check-icon="&#xf00c;"></i>
                        </div>
                        Require personal information to reset my password
                      </label>
                      <small class="d-block text-muted">When you check this box, you will be required to verify additional information before you can request a password reset with just your email address.</small>
                    </div>
                  </div>
                  <!-- End Password Reset -->

                  <!-- Save Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Save password</label>
                    <div class="col-sm-9">
                      <label class="form-check-inline u-check mx-0">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="savePassword" type="checkbox">
                        <div class="u-check-icon-radio-v7">
                          <i class="d-inline-block"></i>
                        </div>
                      </label>
                      <small class="d-block text-muted">When you check this box, you will be saved automatically login to your profile account. Also, you will be always logged in all our services.</small>
                    </div>
                  </div>
                  <!-- End Save Password -->

                  <hr class="g-brd-gray-light-v4 g-my-25">

                  <div class="text-sm-right">
                    <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#!">Cancel</a>
                    <a class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#!">Save Changes</a>
                  </div>
                </form>
              </div>
              <!-- End Security Settings -->

              <!-- Payment Options -->
              <div class="tab-pane fade" id="pmntPage" role="tabpanel">
                <h2 class="h4 g-font-weight-300">Manage your Payment Settings</h2>
                <p class="g-mb-25">Below are the payment options for your account.</p>

                <form>
                  <!-- Payment Options -->
                  <div class="row">
                    <!-- Visa Card -->
                    <div class="col-md-3">
                      <label class="u-check w-100 g-mb-25">
                        <strong class="d-block g-color-gray-dark-v2 g-font-weight-700 g-mb-10">Visa card</strong>
                        <input class="g-hidden-xs-up g-pos-abs g-top-10 g-right-10" type="radio" name="profilePayments" checked="">

                        <div class="g-brd-primary--checked g-bg-primary-opacity-0_2--checked g-brd-around g-brd-gray-light-v2 g-rounded-5">
                          <div class="media g-pa-12">
                            <div class="media-body align-self-center g-color-blue">
                              <i class="fa fa-cc-visa g-font-size-30 align-self-center mx-auto"></i>
                            </div>

                            <div class="d-flex align-self-center g-width-20 g-ml-15">
                              <div class="u-check-icon-radio-v5 g-pos-rel g-width-20 g-height-20"><i></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </label>
                    </div>
                    <!-- End Visa Card -->

                    <!-- Master Card -->
                    <div class="col-md-3">
                      <label class="u-check w-100 g-mb-25">
                        <strong class="d-block g-color-gray-dark-v2 g-font-weight-700 g-mb-10">Master card</strong>
                        <input class="g-hidden-xs-up g-pos-abs g-top-10 g-right-10" type="radio" name="profilePayments">

                        <div class="g-brd-primary--checked g-bg-primary-opacity-0_2--checked g-brd-around g-brd-gray-light-v2 g-rounded-5">
                          <div class="media g-pa-12">
                            <div class="media-body align-self-center g-color-lightred">
                              <i class="fa fa-cc-mastercard g-font-size-30 align-self-center mx-auto"></i>
                            </div>

                            <div class="d-flex align-self-center g-width-20 g-ml-15">
                              <div class="u-check-icon-radio-v5 g-pos-rel g-width-20 g-height-20"><i></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </label>
                    </div>
                    <!-- End Master Card -->

                    <!-- Amazon Payments -->
                    <div class="col-md-3">
                      <label class="u-check w-100 g-mb-25">
                        <strong class="d-block g-color-gray-dark-v2 g-font-weight-700 g-mb-10">Amazon payments</strong>
                        <input class="g-hidden-xs-up g-pos-abs g-top-10 g-right-10" type="radio" name="profilePayments">

                        <div class="g-brd-primary--checked g-bg-primary-opacity-0_2--checked g-brd-around g-brd-gray-light-v2 g-rounded-5">
                          <div class="media g-pa-12">
                            <div class="media-body align-self-center g-color-orange">
                              <i class="fa fa-amazon g-font-size-30 align-self-center mx-auto"></i>
                            </div>

                            <div class="d-flex align-self-center g-width-20 g-ml-15">
                              <div class="u-check-icon-radio-v5 g-pos-rel g-width-20 g-height-20"><i></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </label>
                    </div>
                    <!-- End Amazon Payments -->

                    <!-- Paypal -->
                    <div class="col-md-3">
                      <label class="u-check w-100 g-mb-25">
                        <strong class="d-block g-color-gray-dark-v2 g-font-weight-700 g-mb-10">Paypal</strong>
                        <input class="g-hidden-xs-up g-pos-abs g-top-10 g-right-10" type="radio" name="profilePayments">

                        <div class="g-brd-primary--checked g-bg-primary-opacity-0_2--checked g-brd-around g-brd-gray-light-v2 g-rounded-5">
                          <div class="media g-pa-12">
                            <div class="media-body align-self-center g-color-darkblue">
                              <i class="fa fa-paypal g-font-size-30 align-self-center mx-auto"></i>
                            </div>

                            <div class="d-flex align-self-center g-width-20 g-ml-15">
                              <div class="u-check-icon-radio-v5 g-pos-rel g-width-20 g-height-20"><i></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </label>
                    </div>
                    <!-- End Paypal -->
                  </div>
                  <!-- End Payment Options -->

                  <!-- Card Name and Number -->
                  <div class="row">
                    <!-- Card Name -->
                    <div class="col-md-6">
                      <div class="form-group g-mb-20">
                        <label class="g-color-gray-dark-v2 g-font-weight-700 g-mb-10" for="inputGroup1_1">Name on card</label>
                        <div class="input-group g-brd-primary--focus">
                          <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="text" placeholder="John Doe">
                          <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                            <i class="icon-user"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Card Name -->

                    <!-- Card Number -->
                    <div class="col-md-6">
                      <div class="form-group g-mb-20">
                        <label class="g-color-gray-dark-v2 g-font-weight-700 g-mb-10" for="inputGroup1_1">Card number</label>
                        <div class="input-group g-brd-primary--focus">
                          <input id="inputGroup1_3" class="form-control form-control-md g-brd-right-none rounded-0 g-py-13" type="text" placeholder="XXXX-XXXX-XXXX-XXXX" data-mask="9999-9999-9999-9999">
                          <div class="input-group-addon d-flex align-items-center g-color-gray-dark-v5 rounded-0">
                            <i class="icon-credit-card"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Card Number -->
                  </div>
                  <!-- End Card Name and Number -->

                  <!-- Card Expiration Dates and CVV Code -->
                  <div class="row">
                    <!-- Expiration Month -->
                    <div class="col-md-4">
                      <label class="g-color-gray-dark-v2 g-font-weight-700 g-mb-10" for="inputGroup1_1">Expiration month</label>
                      <select class="js-custom-select u-select-v1 g-brd-gray-light-v2 g-color-gray-dark-v5 w-100 g-pt-11 g-pb-10" data-placeholder="Month" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                        <option selected="">Month</option>
                        <option value="1">January</option>
                        <option value="1">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </div>
                    <!-- End Expiration Month -->

                    <!-- Expiration Year -->
                    <div class="col-md-4">
                      <div class="form-group g-mb-20">
                        <label class="g-color-gray-dark-v2 g-font-weight-700 g-mb-10" for="inputGroup1_1">Expiration year</label>
                        <div class="input-group g-brd-primary--focus">
                          <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="text" placeholder="2021">
                          <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                            <i class="icon-calendar"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Expiration Year -->

                    <!-- CVV Code -->
                    <div class="col-md-4">
                      <div class="form-group g-mb-20">
                        <label class="g-color-gray-dark-v2 g-font-weight-700 g-mb-10" for="inputGroup1_1">CVV code</label>
                        <div class="input-group g-brd-primary--focus">
                          <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="text" placeholder="2021">
                          <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                            <i class="icon-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End CVV Code -->
                  </div>
                  <!-- End Card Expiration Dates and CVV Code -->

                  <!-- Billing Address -->
                  <div class="form-group">
                    <label class="d-block g-color-gray-dark-v2 g-font-weight-700 1text-sm-right g-mb-10">Billing address</label>
                    <label class="u-check g-pl-25 mb-0">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                      <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon="&#xf00c;"></i>
                      </div>
                      Same as shipping address?
                    </label>
                  </div>
                  <!-- End Billing Address -->

                  <hr class="g-brd-gray-light-v4 g-my-25">

                  <div class="text-sm-right">
                    <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#!">Cancel</a>
                    <a class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#!">Save Changes</a>
                  </div>
                </form>
              </div>
              <!-- End Payment Options -->

              <!-- Notification Settings -->
              <div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--4" role="tabpanel">
                <h2 class="h4 g-font-weight-300">Manage your Notifications</h2>
                <p class="g-mb-25">Below are the notifications you may manage.</p>

                <form>
                  <!-- Email Notification -->
                  <div class="form-group">
                    <label class="d-flex align-items-center justify-content-between">
                      <span>Email notification</span>
                      <div class="u-check">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="emailNotification" type="checkbox" checked>
                        <div class="u-check-icon-radio-v7">
                          <i class="d-inline-block"></i>
                        </div>
                      </div>
                    </label>
                  </div>
                  <!-- End Email Notification -->

                  <hr class="g-brd-gray-light-v4 g-my-20">

                  <!-- Comments Notification -->
                  <div class="form-group">
                    <label class="d-flex align-items-center justify-content-between">
                      <span>Send me email notification when a user comments on my blog</span>
                      <div class="u-check">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="commentNotification" type="checkbox">
                        <div class="u-check-icon-radio-v7">
                          <i class="d-inline-block"></i>
                        </div>
                      </div>
                    </label>
                  </div>
                  <!-- End Comments Notification -->

                  <hr class="g-brd-gray-light-v4 g-my-20">

                  <!-- Update Notification -->
                  <div class="form-group">
                    <label class="d-flex align-items-center justify-content-between">
                      <span>Send me email notification for the latest update</span>
                      <div class="u-check">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="updateNotification" type="checkbox" checked>
                        <div class="u-check-icon-radio-v7">
                          <i class="d-inline-block"></i>
                        </div>
                      </div>
                    </label>
                  </div>
                  <!-- End Update Notification -->

                  <hr class="g-brd-gray-light-v4 g-my-25">

                  <!-- Message Notification -->
                  <div class="form-group">
                    <label class="d-flex align-items-center justify-content-between">
                      <span>Send me email notification when a user sends me message</span>
                      <div class="u-check">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="messageNotification" type="checkbox" checked>
                        <div class="u-check-icon-radio-v7">
                          <i class="d-inline-block"></i>
                        </div>
                      </div>
                    </label>
                  </div>
                  <!-- End Message Notification -->

                  <hr class="g-brd-gray-light-v4 g-my-25">

                  <!-- Newsletter Notification -->
                  <div class="form-group">
                    <label class="d-flex align-items-center justify-content-between">
                      <span>Receive our monthly newsletter</span>
                      <div class="u-check">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="newsletterNotification" type="checkbox">
                        <div class="u-check-icon-radio-v7">
                          <i class="d-inline-block"></i>
                        </div>
                      </div>
                    </label>
                  </div>
                  <!-- End Newsletter Notification -->

                  <hr class="g-brd-gray-light-v4 g-my-25">

                  <div class="text-sm-right">
                    <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#!">Cancel</a>
                    <a class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#!">Save Changes</a>
                  </div>
                </form>
              </div>
              <!-- End Notification Settings -->
            </div>
            <!-- End Tab panes -->
          </div>
          <!-- End Profle Content -->
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
