<?php

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include 'includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Validating if the session exists or not
if(isset($_SESSION['userID'])){

  // echo 'Welcome User'.$_SESSION['userNAME'];
  $userID = $_SESSION['userID'];
  //Selecting all user information basing upon the user's session id
  $getAllUserDetails = $conn -> query("SELECT * FROM user_info WHERE user_id = '$userID'");
  $selectUserInformations = $getAllUserDetails -> fetch_assoc();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Game X - Play the best of your life! | HOME</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <!-- <link rel="stylesheet" href="assets/vendor/icon-awesome/css/font-awesome.min.css"> -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/dzsparallaxer.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
  <link rel="stylesheet" href="assets/vendor/animate.css">
  <link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="assets/vendor/typedjs/typed.css">
  <link rel="stylesheet" href="assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="assets/vendor/hamburgers/hamburgers.min.css">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="assets/css/unify-core.css">
  <link rel="stylesheet" href="assets/css/unify-components.css">
  <link rel="stylesheet" href="assets/css/unify-globals.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="assets/css/custom.css">
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
            <a href="index.php" class="navbar-brand d-flex">
              <h2><font color="green"><b>GAME</b>-<strong>X</strong></font></h2>
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
              <ul class="navbar-nav text-uppercase g-pos-rel g-font-weight-600 ml-auto">

                <!-- Home -->
                <li class="hs-has-mega-menu nav-item active g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut" data-max-width="60%" data-position="left">
                  <a id="mega-menu-home" class="nav-link g-py-7 g-px-0" href="index.php" aria-haspopup="true" aria-expanded="false">Home-X</a>
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
        <a class="btn btn-md u-btn-outline-cyan g-brd-2 g-mr-10 g-mb-15" href="portal/web/userProfile/myProfile.php">Welcome <b><?= $selectUserInformations['user_fullname'];?></b></a> <a href="portal/web/auth/controller/userLogout.php" class="btn btn-md u-btn-outline-lightred g-mr-10 g-mb-15">Logout</a>
      </div>
    </div>
  </nav>
</div>
     <?php } ?>

    </header>
    <!-- End Header -->

    <!-- Promo Block -->
    <section class="g-pos-rel">
      <div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll" data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'>
        <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-pos-top-center g-bg-img-hero g-bg-bluegray-opacity-0_2--after" style="height: 130%; background-image: url(http://images.nintendolife.com/news/2017/10/injustice_2_director_on_the_possibility_of_bringing_the_game_to_switch/attachment/0/large.jpg);"></div>

        <div class="container g-bg-cover__inner g-py-100">
          <div class="row align-items-center">
            <div class="col-lg-6 g-mb-30 g-mb-0--lg">
              <h2 class="h1 text-uppercase g-color-white g-mb-30">
                  <span class="g-bg-primary-dark-v3 g-px-5">Let's &amp; Play!</span><br>
                  <span class="g-bg-primary-dark-v3 g-px-5">Challenge Mode or</span><br>
                  <span class="g-bg-primary-dark-v3 g-px-5">Head-ON</span>
                </h2>
              <h3 class="h4 g-color-white">
                  <span class="g-bg-black-opacity-0_6 g-px-5">Ready for a new battle</span><br>
                  <span class="g-bg-black-opacity-0_6 g-px-5">already registered 160+ globally</span><br>
                  <span class="g-bg-black-opacity-0_6 g-px-5">CHALLENGE NOW.</span>
                </h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Promo Block -->

    <!-- Icon Blocks -->
    <section class="g-py-100">
      <div class="container">
        <header class="text-center g-width-60x--md mx-auto g-mb-50">
          <div class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
            <h2 class="h4 u-heading-v2__title g-color-gray-dark-v2 g-font-weight-600 text-uppercase">How to Play?</h2>
          </div>
          <p class="g-font-size-16">A simple guide through, how to play the game and the flow.</p>
        </header>
        <div class="row no-gutters">
          <div class="col-lg-4 g-px-40 g-mb-50 g-mb-0--lg">
            <!-- Icon Blocks -->
            <div class="text-center">
              <span class="d-inline-block u-icon-v3 u-icon-size--xl g-bg-primary g-color-white rounded-circle g-mb-30">
                  <i class="icon-communication-040 u-line-icon-pro"></i>
                </span>
              <h3 class="h5 g-color-gray-dark-v2 g-font-weight-600 text-uppercase mb-3">Create an Account OR Login. Kick-START.</h3>
              <p class="mb-0">Login or Signup via our simple authentication process and dive into the arena of games.</p>
            </div>
            <!-- End Icon Blocks -->
          </div>

          <div class="col-lg-4 g-brd-left--lg g-brd-gray-light-v4 g-px-40 g-mb-50 g-mb-0--lg">
            <!-- Icon Blocks -->
            <div class="text-center">
              <span class="d-inline-block u-icon-v3 u-icon-size--xl g-bg-primary g-color-white rounded-circle g-mb-30">
                  <i class="icon-sport-039 u-line-icon-pro"></i>
                </span>
              <h3 class="h5 g-color-gray-dark-v2 g-font-weight-600 text-uppercase mb-3">Choose a Game OR Challenge. Head-ON.</h3>
              <p class="mb-0">Choose from a pool of games and pick your favourite one or challenge head-to-head. Set the pace and Play.</p>
            </div>
            <!-- End Icon Blocks -->
          </div>

          <div class="col-lg-4 g-brd-left--lg g-brd-gray-light-v4 g-px-40">
            <!-- Icon Blocks -->
            <div class="text-center">
              <span class="d-inline-block u-icon-v3 u-icon-size--xl g-bg-primary g-color-white rounded-circle g-mb-30">
                  <i class="icon-sport-175 u-line-icon-pro"></i>
                </span>
              <h3 class="h5 g-color-gray-dark-v2 g-font-weight-600 text-uppercase mb-3">Win Big Prizes OR real Money. Jump-IN.</h3>
              <p class="mb-0">Upon winning the game you will be rewarded with big prizes. Either reedem as real money or digitally.</p>
            </div>
            <!-- End Icon Blocks -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Icon Blocks -->

    <hr class="g-brd-gray-light-v4 my-0">

    <!-- Our Recent Projects -->
    <section class="g-py-100">
      <div class="container">
        <header class="g-mb-50">
          <div class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
            <h2 class="h4 u-heading-v2__title g-color-gray-dark-v2 g-font-weight-600 text-uppercase">Live Games played Globally</h2>
          </div>
          <p class="g-font-size-16">Have a look at our live game pool played globally, check the Leaderboard and who is in hall of fame.</p>
        </header>

        <div class="row">
          <div class="col-lg-4 col-md-6 g-mb-30 g-mb-0--lg">
            <article class="u-block-hover u-shadow-v21 rounded">
              <figure class="u-bg-overlay g-bg-black-opacity-0_4--after">
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="http://www.freemobagames.com/wp-content/uploads/2014/06/league-of-legends-feature.jpg" alt="Image description">
              </figure>

              <header class="u-bg-overlay__inner g-pos-abs g-top-30 g-right-30 g-left-30 g-color-white">
                <h3 class="h4">
                    <a class="g-color-white" href="#!">League of Legends</a>
                  </h3>
                <p>Game open for registration.</p>
              </header>

              <ul class="list-inline u-bg-overlay__inner g-pos-abs g-bottom-10 g-left-30 g-opacity-0_8">
                <li class="list-inline-item">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img12.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-ml-minus-20">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img5.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-ml-minus-20">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img7.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-font-weight-600 g-color-white">+21</li>
              </ul>
            </article>
          </div>

          <div class="col-lg-4 col-md-6 g-mb-30 g-mb-0--lg">
            <article class="u-block-hover u-shadow-v21 rounded">
              <figure class="u-bg-overlay g-bg-black-opacity-0_4--after">
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="http://www.freemobagames.com/wp-content/uploads/2014/06/league-of-legends-feature.jpg" alt="Image description">
              </figure>

              <header class="u-bg-overlay__inner g-pos-abs g-top-30 g-right-30 g-left-30 g-color-white">
                <h3 class="h4">
                    <a class="g-color-white" href="#!">League of Legends</a>
                  </h3>
                <p>Game open for registration.</p>
              </header>

              <ul class="list-inline u-bg-overlay__inner g-pos-abs g-bottom-10 g-left-30 g-opacity-0_8">
                <li class="list-inline-item">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img7.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-ml-minus-20">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img4.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-ml-minus-20">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img5.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-font-weight-600 g-color-white">+42</li>
              </ul>
            </article>
          </div>

          <div class="col-lg-4 col-md-6">
            <article class="u-block-hover u-shadow-v21 rounded">
              <figure class="u-bg-overlay g-bg-black-opacity-0_4--after">
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="http://www.freemobagames.com/wp-content/uploads/2014/06/league-of-legends-feature.jpg" alt="Image description">
              </figure>

              <header class="u-bg-overlay__inner g-pos-abs g-top-30 g-right-30 g-left-30 g-color-white">
                <h3 class="h4">
                    <a class="g-color-white" href="#!">League of Legends</a>
                  </h3>
                <p>Game open for registration.</p>
              </header>

              <ul class="list-inline u-bg-overlay__inner g-pos-abs g-bottom-10 g-left-30 g-opacity-0_8">
                <li class="list-inline-item">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img5.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-ml-minus-20">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img7.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-ml-minus-20">
                  <div class="g-brd-around g-brd-2 g-brd-white rounded-circle">
                    <img class="g-width-30 g-height-30 rounded-circle" src="assets/img-temp/100x100/img6.jpg" alt="Image description">
                  </div>
                </li>
                <li class="list-inline-item g-font-weight-600 g-color-white">+15</li>
              </ul>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- End Our Recent Projects -->

    <!-- Most Quality Solution -->
    <section class="dzsparallaxer auto-init height-is-based-on-content use-loading" data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'>
      <!-- Parallax Image -->
      <div class="divimage dzsparallaxer--target w-100 u-bg-overlay g-bg-img-hero g-bg-white-opacity-0_7--after" style="height: 140%; background-image: url(assets/img/bg/intro_parallax_bg.jpg);"></div>
      <!-- End Parallax Image -->

      <div class="container u-bg-overlay__inner g-py-150--md g-py-80">
        <div class="row">
          <!-- Section Content -->
          <div class="col-lg-6 order-2 order-sm-1 g-mb-0 g-mb-50--sm g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-primary g-mb-30">
              <h2 class="h4 u-heading-v2__title g-color-gray-dark-v2 g-font-weight-600 text-uppercase">Give a break to your life!</h2>
            </div>
            <p class="g-font-size-16 g-line-height-2 g-mb-30">Play a challening head and game on to be the best among all. Prove your self! Let's challenge.</p>

            <div class="g-mb-30">
              <img class="u-block-hover__main--grayscale g-width-100 g-opacity-0_6" src="http://gamerau.com/8-ball-pool-hack/images/logo.png" alt="Image description">
              <img class="u-block-hover__main--grayscale g-width-100 g-opacity-0_6" src="https://k1.midasplayer.com/images/logos/kingLogoRebrand.svg?_v=13wlhey" alt="Image description">
              <img class="u-block-hover__main--grayscale g-width-100 g-opacity-0_6" src="https://upload.wikimedia.org/wikipedia/en/4/46/Pokemon_Go.png" alt="Image description">
            </div>

            <a href="#!" class="btn btn-xl u-btn-primary text-uppercase g-font-weight-600 g-font-size-12 rounded g-mr-15 g-mb-15 g-mb-0--sm">Play a Match</a>
            <small class="d-block d-sm-inline-block g-color-gray-dark-v5 g-font-size-12">*Be the best and find yourself in the hall of fame.</small>
          </div>
          <!-- End Section Content -->

          <!-- Video Icon -->
          <div class="col-lg-6 order-1 order-sm-2 align-self-center text-center g-pos-rel g-mb-40 g-mb-0--sm">
            <a class="js-fancybox d-block g-pos-rel" href="javascript:;" data-src="//youtube.com/embed/xhGNIySaqwg?ecver=2" data-speed="350" data-caption="Lightbox Gallery">
              <span class="u-icon-v3 u-icon-size--xl u-block-hover--scale u-shadow-v24 g-bg-white g-color-gray-dark-v1 g-color-primary--hover g-font-size-20 rounded-circle g-cursor-pointer g-mb-10">
                  <i class="fa fa-play g-pos-rel g-left-2"></i>
                </span>
            </a>
            <p class="g-color-gray-dark-v5">Watch our 2 min video.</p>
          </div>
          <!-- End Video Icon -->
        </div>
      </div>
    </section>
    <!-- End Most Quality Solution -->

    <!-- Counters -->
    <section class="g-brd-top g-brd-bottom g-brd-gray-light-v4 g-pt-50">
      <div class="container">
        <div class="text-center g-mb-60">
            <h2 class="h4">Some of our Global Statistics
              <span class="g-color-primary g-ml-5">#Numbers reflects the average figures of stats</span>
            </h2>
          </div>
        <div class="row text-center text-uppercase">
          <div class="col-lg-3 col-sm-6 g-brd-right g-brd-gray-light-v4 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7">52147</div>
            <h4 class="h6 g-color-gray-dark-v5">Matches Played</h4>
          </div>

          <div class="col-lg-3 col-sm-6 g-brd-right--lg g-brd-gray-light-v4 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7">24583<strong><span class="g-color-pink">*</span></strong></div>
            <h4 class="h6 g-color-gray-dark-v5">Prizes Distributed</h4>
          </div>

          <div class="col-lg-3 col-sm-6 g-brd-right g-brd-gray-light-v4 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7">7348</div>
            <h4 class="h6 g-color-gray-dark-v5">Head-On Matches</h4>
          </div>

          <div class="col-lg-3 col-sm-6 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7">87904</div>
            <h4 class="h6 g-color-gray-dark-v5">Live Matches</h4>
          </div>
          <small><span class="g-color-pink">*Reflects real money as well as worth of prizes.</span></small>
        </div>
      </div>
    </section>
    <!-- End Counters -->

    <!-- Projects -->
     <section class="container g-py-100">
       <div class="text-center g-mb-50">
         <h2 class="h1 g-color-black g-font-weight-600">Live Games open for Registration</h2>
         <p class="lead">Live games open for challenge. You can choose to challenge someone or take part in registration process.</p>
       </div>

       <div class="row no-gutters g-mx-minus-10">
         <div class="col-sm-6 col-lg-4 g-px-10 g-mb-20">
           <!-- Projects -->
           <div class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-white--hover g-bg-pink--hover text-center rounded g-transition-0_3 g-px-30 g-py-50">
             <img class="img-fluid u-block-hover__main--zoom-v1 mb-5" src="http://www.afkmagazine.com/wp-content/uploads/2013/07/rockstar-logo.png" width="160px" height="160px" alt="Image Description">
             <br/><span class="g-font-weight-600 g-font-size-22 text-uppercase">GTA Vice City</span>
             <h3 class="h4 g-font-weight-600 mb-0">Registration Open : 09/01/2018</h3>

             <a class="u-link-v2" href="#!"></a>
           </div>
           <!-- End Projects -->
         </div>

         <div class="col-sm-6 col-lg-4 g-px-10 g-mb-20">
           <!-- Projects -->
           <div class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-white--hover g-bg-pink--hover text-center rounded g-transition-0_3 g-px-30 g-py-50">
             <img class="img-fluid u-block-hover__main--zoom-v1 mb-5" src="http://www.afkmagazine.com/wp-content/uploads/2013/07/rockstar-logo.png" width="160px" height="160px" alt="Image Description">
             <br/><span class="g-font-weight-600 g-font-size-22 text-uppercase">GTA Vice City</span>
             <h3 class="h4 g-font-weight-600 mb-0">Registration Open : 09/01/2018</h3>

             <a class="u-link-v2" href="#!"></a>
           </div>
           <!-- End Projects -->
         </div>

         <div class="col-sm-6 col-lg-4 g-px-10 g-mb-20">
           <!-- Projects -->
           <div class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-white--hover g-bg-cyan--hover text-center rounded g-transition-0_3 g-px-30 g-py-50">
             <img class="img-fluid u-block-hover__main--zoom-v1 mb-5" src="http://www.afkmagazine.com/wp-content/uploads/2013/07/rockstar-logo.png" width="160px" height="160px" alt="Image Description">
             <br/><span class="g-font-weight-600 g-font-size-22 text-uppercase">GTA Vice City</span>
             <h3 class="h4 g-font-weight-600 mb-0">Registration Open : 09/01/2018</h3>

             <a class="u-link-v2" href="#!"></a>
           </div>
           <!-- End Projects -->
         </div>

         <div class="col-sm-6 col-lg-4 g-px-10 g-mb-20">
           <!-- Projects -->
           <div class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-white--hover g-bg-blue--hover text-center rounded g-transition-0_3 g-px-30 g-py-50">
             <img class="img-fluid u-block-hover__main--zoom-v1 mb-5" src="http://www.afkmagazine.com/wp-content/uploads/2013/07/rockstar-logo.png" width="160px" height="160px" alt="Image Description">
             <br/><span class="g-font-weight-600 g-font-size-22 text-uppercase">GTA Vice City</span>
             <h3 class="h4 g-font-weight-600 mb-0">Registration Open : 09/01/2018</h3>

             <a class="u-link-v2" href="#!"></a>
           </div>
           <!-- End Projects -->
         </div>

         <div class="col-sm-6 col-lg-4 g-px-10 g-mb-20">
           <!-- Projects -->
           <div class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-white--hover g-bg-green--hover text-center rounded g-transition-0_3 g-px-30 g-py-50">
             <img class="img-fluid u-block-hover__main--zoom-v1 mb-5" src="http://www.afkmagazine.com/wp-content/uploads/2013/07/rockstar-logo.png" width="160px" height="160px" alt="Image Description">
             <br/><span class="g-font-weight-600 g-font-size-22 text-uppercase">GTA Vice City</span>
             <h3 class="h4 g-font-weight-600 mb-0">Registration Open : 09/01/2018</h3>

             <a class="u-link-v2" href="#!"></a>
           </div>
           <!-- End Projects -->
         </div>

         <div class="col-sm-6 col-lg-4 g-px-10 g-mb-20">
           <!-- Projects -->
           <div class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-white--hover g-bg-red--hover text-center rounded g-transition-0_3 g-px-30 g-py-50">
             <img class="img-fluid u-block-hover__main--zoom-v1 mb-5" src="http://www.afkmagazine.com/wp-content/uploads/2013/07/rockstar-logo.png" width="160px" height="160px" alt="Image Description">
             <br/><span class="g-font-weight-600 g-font-size-22 text-uppercase">GTA Vice City</span>
             <h3 class="h4 g-font-weight-600 mb-0">Registration Open : 09/01/2018</h3>

             <a class="u-link-v2" href="#!"></a>
           </div>
           <!-- End Projects -->
         </div>
       </div>
     </section>
     <!-- End Projects -->

    <!-- Call To Action -->
    <section class="g-bg-primary g-color-white g-pa-30" style="background-image: url(assets/img/bg/pattern5.png);">
      <div class="d-md-flex justify-content-md-center text-center">
        <div class="align-self-md-center">
          <p class="lead g-font-weight-400 g-mr-20--md g-mb-15 g-mb-0--md">Go ahead and <b>Play</b> the best game of your <strong>Life</strong>.</p>
        </div>
        <div class="align-self-md-center">
          <a class="btn btn-lg u-btn-white text-uppercase g-font-weight-600 g-font-size-12" target="_blank" href="https://wrapbootstrap.com/theme/unify-responsive-website-template-WB0412697?ref=htmlstream">Let's PLAY</a>
        </div>
      </div>
    </section>
    <!-- End Call To Action -->

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
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#top">Home</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Live Match</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Challenge Mode</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Global Leader Board</a>
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

            <address class="g-bg-no-repeat g-font-size-12 mb-0" style="background-image: url(assets/img/maps/map2.png);">
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
      <i class="fa fa-arrow-up"></i>
    </a>
  </main>

  <div class="u-outer-spaces-helper"></div>


  <!-- JS Global Compulsory -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="assets/vendor/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>


  <!-- JS Implementing Plugins -->
  <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
  <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script src="assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
  <script src="assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
  <script src="assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
  <script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
  <script src="assets/vendor/typedjs/typed.min.js"></script>
  <script  src="assets/vendor/appear.js"></script>

  <!-- JS Unify -->
  <script src="assets/js/hs.core.js"></script>
  <script src="assets/js/components/hs.carousel.js"></script>
  <script src="assets/js/components/hs.header.js"></script>
  <script src="assets/js/helpers/hs.hamburgers.js"></script>
  <script src="assets/js/components/hs.tabs.js"></script>
  <script src="assets/js/components/hs.popup.js"></script>
  <script src="assets/js/components/text-animation/hs.text-slideshow.js"></script>
  <script src="assets/js/components/hs.go-to.js"></script>
  <script  src="assets/js/components/hs.counter.js"></script>

  <!-- JS Customization -->
  <script src="assets/js/custom.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of popups
        $.HSCore.components.HSPopup.init('.js-fancybox');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of counters
        var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');

        // initialization of text animation (typing)
        $(".u-text-animation.u-text-animation--typing").typed({
          strings: [
            "an awesome template",
            "perfect template",
            "just like a boss"
          ],
          typeSpeed: 60,
          loop: true,
          backDelay: 1500
        });
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
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
  </script>

</body>

</html>
