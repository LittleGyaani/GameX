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
  $getAllUserDetails = $conn -> query("SELECT * FROM user_info WHERE user_id = '$userID'");
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
  <title>Game X - Play the best of your life! | User Dashboard</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../../favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="../../../assets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <!-- <link rel="stylesheet" href="../../../assets/vendor/icon-awesome/css/font-awesome.min.css"> -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="http://simplelineicons.com/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../../assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="../../../assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="../../../assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="../../../assets/vendor/animate.css">
  <link rel="stylesheet" href="../../../assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="../../../assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="../../../assets/vendor/hamburgers/hamburgers.min.css">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="../../../assets/css/unify-core.css">
  <link rel="stylesheet" href="../../../assets/css/unify-components.css">
  <link rel="stylesheet" href="../../../assets/css/unify-globals.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="../../../assets/css/custom.css">
</head>

<body>
  <main>



    <!-- Header -->
    <header id="js-header" class="u-header u-header--static">
      <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
          <div class="container">
            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
            </button>
            <!-- End Responsive Toggle Button -->

            <!-- Logo -->
            <a href="../../../index.php" class="navbar-brand d-flex">
              <h2><font color="green"><b>GAME</b>-<strong>X</strong></font></h2>
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
              <ul class="navbar-nav text-uppercase g-pos-rel g-font-weight-600 ml-auto">

                <!-- Home -->
                <li class="hs-has-mega-menu nav-item active g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut" data-max-width="60%" data-position="left">
                  <a id="mega-menu-home" class="nav-link g-py-7 g-px-0" href="../../../index.php" aria-haspopup="true" aria-expanded="false">Home-X</a>
                </li>
                <!-- End Home -->
              </ul>
            </div>
            <!-- End Navigation -->

            <?php
            if(!($_SESSION['userID'])){ ?>
            <div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
              <a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15" href="portal/web/auth/loginPage.php">Login/Signup</a>
            </div>
          </div>
        </nav>
      </div>
    <?php } else{ ?>
      <div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
        <a class="btn btn-md u-btn-outline-cyan g-brd-2 g-mr-10 g-mb-15" href="myProfile.php">Welcome <b><?= $selectUserInformations['user_fullname'];?></b></a> <a href="../auth/controller/userLogout.php" class="btn btn-md u-btn-outline-lightred g-mr-10 g-mb-15">Logout</a>
      </div>
    </div>
  </nav>
</div>
     <?php } ?>

          </div>
        </nav>
      </div>
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
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="../../../assets/img-temp/400x450/img5.jpg" alt="Image Description">
              </figure>

              <!-- User Info -->
              <span class="g-pos-abs g-top-20 g-left-0">
                  <a class="btn btn-sm u-btn-primary rounded-0" href="#!"><b><?=$_SESSION['userNAME'];?></b></a>
                  <small class="d-block g-bg-red g-color-black g-pa-5">Pro Champ</small>
                </span>
              <!-- End User Info -->
            </div>
            <!-- User Image -->

            <!-- Sidebar Navigation -->
            <div class="list-group list-group-border-0 g-mb-40">
              <!-- Overall -->
              <a href="#" class="list-group-item justify-content-between active">
                <span><i class="icon-home g-pos-rel g-top-1 g-mr-8"></i> My Dashboard</span>
                <!-- <span class="u-label g-font-size-11 g-bg-white g-color-main g-rounded-20 g-px-10">2</span> -->
              </a>
              <!-- End Overall -->

              <!-- Profile -->
              <a href="myProfile.php" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-cursor g-pos-rel g-top-1 g-mr-8"></i> Profile</span>
              </a>
              <!-- End Profile -->

              <!-- Users Contacts -->
              <a href="page-profile-users-1.html" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-notebook g-pos-rel g-top-1 g-mr-8"></i> Users Contacts</span>
              </a>
              <!-- End Users Contacts -->

              <!-- My Projects -->
              <a href="page-profile-projects-1.html" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-layers g-pos-rel g-top-1 g-mr-8"></i> My Projects</span>
                <span class="u-label g-font-size-11 g-bg-primary g-rounded-20 g-px-10">9</span>
              </a>
              <!-- End My Projects -->

              <!-- Comments -->
              <a href="page-profile-comments-1.html" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-bubbles g-pos-rel g-top-1 g-mr-8"></i> Comments</span>
                <span class="u-label g-font-size-11 g-bg-pink g-rounded-20 g-px-8">24</span>
              </a>
              <!-- End Comments -->

              <!-- Reviews -->
              <a href="page-profile-reviews-1.html" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-heart g-pos-rel g-top-1 g-mr-8"></i> Reviews</span>
              </a>
              <!-- End Reviews -->

              <!-- History -->
              <a href="page-profile-history-1.html" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-fire g-pos-rel g-top-1 g-mr-8"></i> History</span>
              </a>
              <!-- End History -->

              <!-- Settings -->
              <a href="page-profile-settings-1.html" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-settings g-pos-rel g-top-1 g-mr-8"></i> Settings</span>
                <span class="u-label g-font-size-11 g-bg-cyan g-rounded-20 g-px-8">3</span>
              </a>
              <!-- End Settings -->

              <!-- Logout -->
              <a href="../auth/controller/userLogout.php" class="list-group-item list-group-item-action justify-content-between">
                <span><i class="icon-settings g-pos-rel g-top-1 g-mr-8"></i> Logout</span>
              </a>
              <!-- End Logout -->
            </div>
            <!-- End Sidebar Navigation -->

            <!-- Project Progress -->
            <div class="card border-0 rounded-0 g-mb-50">
              <!-- Panel Header -->
              <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                <h3 class="h6 mb-0">
                    <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Games in Progress
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

          <!-- Profile Content -->
          <div class="col-lg-9">

            <!-- Projects & Activities Panels -->
            <div class="row g-mb-40">
              <div class="col-lg-6 g-mb-40 g-mb-0--lg">
                <!-- Latest Projects Panel -->
                <div class="card border-0">
                  <!-- Panel Header -->
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-green border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-layers g-pos-rel g-top-1 g-mr-5"></i> Matches open to join
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
                  <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-400 g-pa-0">
                    <ul class="list-unstyled">
                      <li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 g-brd-blue-left rounded g-pa-20 g-mb-10">
                        <div class="d-flex g-mt-2 g-mr-15">
                          <img class="g-width-40 g-height-40 rounded-circle" src="../../../assets/img-temp/100x100/img1.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <div class="d-flex justify-content-between">
                            <h5 class="h6 g-font-weight-600 g-color-black">Unify Template</h5>
                            <span class="small text-nowrap g-color-blue">2 min ago</span>
                          </div>
                          <p>Curabitur hendrerit dolor sit amet consectetur. Adipiscing elitut leosit amet, consectetur eleifend.</p>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">HTML</span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">AnhularJS</span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">PHP</span>
                        </div>
                      </li>

                      <li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 g-brd-pink-left rounded g-pa-20 g-mb-10">
                        <div class="d-flex g-mt-2 g-mr-15">
                          <img class="g-width-40 g-height-40 rounded-circle" src="../../../assets/img-temp/100x100/img5.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <div class="d-flex justify-content-between">
                            <h5 class="h6 g-font-weight-600 g-color-black">UX/UI Design and Backend</h5>
                            <span class="small text-nowrap g-color-pink">16 min ago</span>
                          </div>
                          <p>Hac consectetur habitasse platea dictumst, adipiscing elitut leosit amet, consectetur eleifend.</p>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">CSS</span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-color-black g-rounded-20 g-px-10">JavaScript</span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">Ruby</span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">ASP.NET</span>
                        </div>
                      </li>

                      <li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 g-brd-black-left rounded g-pa-20 g-mb-10">
                        <div class="d-flex g-mt-2 g-mr-15">
                          <img class="g-width-40 g-height-40 rounded-circle" src="../../../assets/img-temp/100x100/img4.jpg" alt="Image Description">
                        </div>
                        <div class="media-body">
                          <div class="d-flex justify-content-between">
                            <h5 class="h6 g-font-weight-600 g-color-black">React Native App</h5>
                            <span class="small text-nowrap g-color-blue">2 min ago</span>
                          </div>
                          <p>Curabitur hendrerit dolor sit amet consectetur. Adipiscing elitut leosit amet, consectetur eleifend.</p>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">ReactJS</span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">CSS</span>
                          <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">HTML</span>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!-- End Panel Body -->
                </div>
                <!-- End Latest Projects Panel -->
              </div>

              <div class="col-lg-6">
                <!-- Activities Panel -->
                <div class="card border-0">
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-cyan border-0 g-mb-15">
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
                        <i class="icon-list g-pos-rel g-top-1 g-mr-5"></i> Notifications
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
                        <i class="icon-directions g-pos-rel g-top-1 g-mr-5"></i> Activities
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
                        <img class="rounded-circle g-width-40 g-height-40" src="../../../assets/img-temp/100x100/img1.jpg" alt="Image Description">
                      </a>

                      <div class="media-body">
                        <h3 class="h6">
                            <span class="g-color-black g-font-weight-600">Htmlstream</span>
                            <a class="g-color-gray-dark-v4 g-mr-5" href="#!">@Htmlstream</a>
                            <span class="g-color-gray-dark-v4">26m</span>
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
                    <i class="icon-notebook g-pos-rel g-top-1 g-mr-5"></i> Last Played Games with Players
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
              <div class="card-header d-flex align-items-center justify-content-between g-bg-orange border-0 g-mb-15">
                <h3 class="h6 mb-0">
                    <i class="icon-directions g-pos-rel g-top-1 g-mr-5"></i> My Reports
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

              <div class="card-block g-pa-0">
                <!-- Product Table -->
                <div class="table-responsive">
                  <table class="table table-bordered u-table--v2">
                    <thead class="text-uppercase g-letter-spacing-1">
                      <tr>
                        <th class="g-font-weight-300 g-color-black">Games Played</th>
                        <th class="g-font-weight-300 g-color-black g-min-width-200">Prizes Earned</th>
                        <th class="g-font-weight-300 g-color-black">Status</th>
                        <th class="g-font-weight-300 g-color-black">Contacts</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td class="align-middle text-nowrap">
                          <h4 class="h6 g-mb-2">Lenovo Group</h4>
                          <div class="js-rating g-font-size-12 g-color-primary" data-rating="3.5"></div>
                        </td>
                        <td class="align-middle">
                          <div class="d-flex">
                            <i class="icon-location-pin g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                            <span>389ZA2 DeClaudine, CA, USA</span>
                          </div>
                        </td>
                        <td class="align-middle">
                          <a class="btn btn-block u-btn-primary g-rounded-50 g-py-5" href="#!">
                            <i class="fa fa-arrows-v g-mr-5"></i> Middle
                          </a>
                        </td>
                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <i class="icon-phone g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> +1 4768 97655
                          </span>
                          <span class="d-block">
                            <i class="icon-envelope g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> contact@lenovo.com
                          </span>
                        </td>
                      </tr>

                      <tr>
                        <td class="align-middle text-nowrap">
                          <h4 class="h6 g-mb-2">Samsung Electronics</h4>
                          <div class="js-rating g-font-size-12 g-color-primary" data-rating="4.5"></div>
                        </td>
                        <td class="align-middle">
                          <div class="d-flex">
                            <i class="icon-location-pin g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                            <span>738AD Lorena Spur, London, UK</span>
                          </div>
                        </td>
                        <td class="align-middle">
                          <a class="btn btn-block u-btn-pink g-rounded-50 g-py-5" href="#!">
                            <i class="fa fa-level-up g-mr-5"></i> High
                          </a>
                        </td>
                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <i class="icon-phone g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> +44 7689 7655
                          </span>
                          <span class="d-block">
                            <i class="icon-envelope g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> users@samsung.com
                          </span>
                        </td>
                      </tr>

                      <tr>
                        <td class="align-middle text-nowrap">
                          <h4 class="h6 g-mb-2">Sony Corp.</h4>
                          <div class="js-rating g-font-size-12 g-color-primary" data-rating="2"></div>
                        </td>
                        <td class="align-middle">
                          <div class="d-flex">
                            <i class="icon-location-pin g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                            <span>044C1 Port Dickson, BC, Canada</span>
                          </div>
                        </td>
                        <td class="align-middle">
                          <a class="btn btn-block u-btn-cyan g-rounded-50 g-py-5" href="#!">
                            <i class="fa fa-sort-amount-desc g-mr-5"></i> Deep
                          </a>
                        </td>
                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <i class="icon-phone g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> +1 0739 3644
                          </span>
                          <span class="d-block">
                            <i class="icon-envelope g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> clients@sony.com
                          </span>
                        </td>
                      </tr>

                      <tr>
                        <td class="align-middle text-nowrap">
                          <h4 class="h6 g-mb-2">Apple Inc.</h4>
                          <div class="js-rating g-font-size-12 g-color-primary" data-rating="5"></div>
                        </td>
                        <td class="align-middle">
                          <div class="d-flex">
                            <i class="icon-location-pin g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                            <span>07W2 Donell Lodge, NY, USA</span>
                          </div>
                        </td>
                        <td class="align-middle">
                          <a class="btn btn-block u-btn-purple g-rounded-50 g-py-5" href="#!">
                            <i class="fa fa-level-down g-mr-5"></i> Down
                          </a>
                        </td>
                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <i class="icon-phone g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> +1 6589-96451
                          </span>
                          <span class="d-block">
                            <i class="icon-envelope g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> mail@appple.com
                          </span>
                        </td>
                      </tr>

                      <tr>
                        <td class="align-middle text-nowrap">
                          <h4 class="h6 g-mb-2">Dell Corporation</h4>
                          <div class="js-rating g-font-size-12 g-color-primary" data-rating="4"></div>
                        </td>
                        <td class="align-middle">
                          <div class="d-flex">
                            <i class="icon-location-pin g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                            <span>1A9WA4 Wanderben, Berlin, Germany</span>
                          </div>
                        </td>
                        <td class="align-middle">
                          <a class="btn btn-block u-btn-deeporange g-rounded-50 g-py-5" href="#!">
                            <i class="fa fa-bolt g-mr-5"></i> Stabile
                          </a>
                        </td>
                        <td class="align-middle text-nowrap">
                          <span class="d-block g-mb-5">
                            <i class="icon-phone g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> +49 3868 4792
                          </span>
                          <span class="d-block">
                            <i class="icon-envelope g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> clients@dell.com
                          </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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

    <!-- Footer -->
    <div id="contacts-section" class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 g-py-60">
      <div class="container">
        <div class="row">
          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">About Us</h2>
            </div>

            <p>About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.</p>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Latest Posts</h2>
            </div>

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Incredible template</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">May 8, 2017</div>
            </article>

            <hr class="g-brd-white-opacity-0_1 g-my-10">

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">New features</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">June 23, 2017</div>
            </article>

            <hr class="g-brd-white-opacity-0_1 g-my-10">

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">New terms and conditions</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">September 15, 2017</div>
            </article>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Useful Links</h2>
            </div>

            <nav class="text-uppercase1">
              <ul class="list-unstyled g-mt-minus-10 mb-0">
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">About Us</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Portfolio</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Our Services</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Latest Jobs</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Contact Us</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
              </ul>
            </nav>
          </div>
          <!-- End Footer Content -->

          <!-- Footer Content -->
          <div class="col-lg-3 col-md-6">
            <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
              <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Our Contacts</h2>
            </div>

            <address class="g-bg-no-repeat g-font-size-12 mb-0" style="background-image: url(../../../assets/img/maps/map2.png);">
          <!-- Location -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-map-marker"></i>
              </span>
            </div>
            <p class="mb-0">795 Folsom Ave, Suite 600, <br> San Francisco, CA 94107 795</p>
          </div>
          <!-- End Location -->

          <!-- Phone -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-phone"></i>
              </span>
            </div>
            <p class="mb-0">(+123) 456 7890 <br> (+123) 456 7891</p>
          </div>
          <!-- End Phone -->

          <!-- Email and Website -->
          <div class="d-flex g-mb-20">
            <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-globe"></i>
              </span>
            </div>
            <p class="mb-0">
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:info@gamex.com">info@gamex.com</a>
              <br>
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">www.gamex.com</a>
            </p>
          </div>
          <!-- End Email and Website -->
        </address>
          </div>
          <!-- End Footer Content -->
        </div>
      </div>
    </div>
    <!-- End Footer -->

    <!-- Copyright Footer -->
    <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
            <div class="d-lg-flex">
              <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2017 © All Rights Reserved.</small>
              <ul class="u-list-inline">
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Terms of Use</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">License</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Support</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-4 align-self-center">
            <ul class="list-inline text-center text-md-right mb-0">
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Facebook">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Skype">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-skype"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Linkedin">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Pinterest">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-pinterest"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Twitter">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Dribbble">
                <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Copyright Footer -->
    <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
      <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
  </main>

  <div class="u-outer-spaces-helper"></div>


  <!-- JS Global Compulsory -->
  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="../../../assets/vendor/popper.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/bootstrap.min.js"></script>


  <!-- JS Implementing Plugins -->
  <script src="../../../assets/vendor/appear.js"></script>
  <script src="../../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script src="../../../assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

  <!-- JS Unify -->
  <script src="../../../assets/js/hs.core.js"></script>
  <script src="../../../assets/js/helpers/hs.hamburgers.js"></script>
  <script src="../../../assets/js/components/hs.header.js"></script>
  <script src="../../../assets/js/components/hs.tabs.js"></script>
  <script src="../../../assets/js/components/hs.counter.js"></script>
  <script src="../../../assets/js/components/hs.progress-bar.js"></script>
  <script src="../../../assets/js/components/hs.rating.js"></script>
  <script src="../../../assets/js/components/hs.scrollbar.js"></script>
  <script src="../../../assets/js/components/hs.go-to.js"></script>

  <!-- JS Customization -->
  <script src="../../../assets/js/custom.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of counters
        var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');

        // initialization of rating
        $.HSCore.components.HSRating.init($('.js-rating'), {
          spacing: 2
        });

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init( $('.js-scrollbar') );
      });

      $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });

        // initialization of horizontal progress bars
        setTimeout(function () { // important in this case
          var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
            direction: 'horizontal',
            indicatorSelector: '.js-hr-progress-bar-indicator'
          });
        }, 1);
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
  </script>

</body>

</html>
