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
  <title>battlestation - Play the best of your life! | HOME</title>

  <?php

    //Including Meta and Navigation
    include "includes/common/template_header.php";

   ?>

    </header>
    <!-- End Header -->

    <!-- Promo Block -->
     <div class="g-bg-img-hero g-pos-rel" style="background-image: url(https://htmlstream.com/preview/unify-v2.4/assets/img/bg/bg-img1.png);">
       <div class="container g-pt-100">
         <div class="row justify-content-lg-between">
           <div class="col-lg-4 g-pt-50--lg">
             <div class="mb-5">
               <h1 class="g-color-black g-font-size-45 mb-4">Injustice Super League!</h1>
               <p>Explore the tournament and take part in the challenge.</p>
             </div>

             <a class="js-go-to btn u-shadow-v33 g-hidden-md-down g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-35 g-py-10" href="gamePlatforms" data-target="#content">Play Now</a>
           </div>

           <div class="col-lg-8 align-self-end">
             <div class="u-shadow-v40 g-brd-around g-brd-7 g-brd-white rounded">
               <img class="img-fluid rounded" src="http://www.allkeyshop.com/blog/wp-content/uploads/injustice-2-banner1-1024x576.jpg" alt="Image Description">
             </div>
           </div>
         </div>
       </div>

       <!-- SVG Bottom Background Shape -->
       <svg class="g-pos-abs g-bottom-0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1921 183.5" enable-background="new 0 0 1921 183.5" xml:space="preserve">
         <path fill="#FFFFFF" d="M0,183.5v-142c0,0,507,171,1171,58c0,0,497-93,750,84H0z" />
         <path opacity="0.2" fill="#FFFFFF" d="M0,183V0c0,0,507,220.4,1171,74.7c0,0,497-119.9,750,108.3H0z" />
       </svg>
       <!-- End SVG Bottom Background Shape -->
     </div>
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
      <div class="divimage dzsparallaxer--target w-100 u-bg-overlay g-bg-img-hero g-bg-white-opacity-0_7--after" style="height: 140%; background-image: url(http://backgroundcheckall.com/wp-content/uploads/2017/12/parallax-background-1.jpg);"></div>
      <!-- End Parallax Image -->

      <div class="container u-bg-overlay__inner g-py-150--md g-py-80">
        <div class="row">
          <!-- Section Content -->
          <div class="col-lg-6 order-2 order-sm-1 g-mb-0 g-mb-50--sm g-mb-0--lg">
            <div class="u-heading-v2-3--bottom g-brd-primary g-mb-30">
              <h2 class="h4 u-heading-v2__title g-color-gray-dark-v2 g-font-weight-600 text-uppercase">Give a break to your life!</h2>
            </div>
            <p class="g-font-size-16 g-line-height-2 g-mb-30">Play a challenging head and game on to be the best among all. Prove your self! Let's challenge.</p>

            <div class="g-mb-30">
              <img class="u-block-hover__main--grayscale g-width-100 g-opacity-0_6" src="http://gamerau.com/8-ball-pool-hack/images/logo.png" alt="Image description">
              <img class="u-block-hover__main--grayscale g-width-100 g-opacity-0_6" src="https://k1.midasplayer.com/images/logos/kingLogoRebrand.svg?_v=13wlhey" alt="Image description">
              <img class="u-block-hover__main--grayscale g-width-100 g-opacity-0_6" src="https://upload.wikimedia.org/wikipedia/en/4/46/Pokemon_Go.png" alt="Image description">
            </div>
            <a href="portal/web/userProfile/userDashboard#quickheadOnMatch" class="btn btn-xl u-btn-primary text-uppercase g-font-weight-600 g-font-size-12 rounded g-mr-15 g-mb-15 g-mb-0--sm">Play a Match</a>
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
          <!-- Get All Statistical Values -->
          <?php

            $getCountOfRegisteredUsers   = $conn -> query("SELECT * FROM `user_info`");
            $getCountOfTournamentsPlayed = $conn -> query("SELECT * FROM `tournament_registration_meta`");
            $getCountOfHeadOnMatches     = $conn -> query("SELECT * FROM `head_on_match_request`");
            $getCountofTotalTransactions = $conn -> query("SELECT SUM(lastUsedBalance) AS count FROM user_wallet_transaction_info");
            $total = 0;
            $rec  = $getCountofTotalTransactions->fetch_assoc();
            $total = $rec['count'];

          ?>

        <div class="row text-center text-uppercase">
          <div class="col-lg-3 col-sm-6 g-brd-right g-brd-gray-light-v4 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7"><?= $getCountOfRegisteredUsers -> num_rows ?></div>
            <h4 class="h6 g-color-gray-dark-v5">Matches Played</h4>
          </div>

          <div class="col-lg-3 col-sm-6 g-brd-right--lg g-brd-gray-light-v4 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7"><?= $total; ?><strong><span class="g-color-pink">*</span></strong></div>
            <h4 class="h6 g-color-gray-dark-v5">Transactions Flowed</h4>
          </div>

          <div class="col-lg-3 col-sm-6 g-brd-right g-brd-gray-light-v4 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7"><?= $getCountOfHeadOnMatches -> num_rows ?></div>
            <h4 class="h6 g-color-gray-dark-v5">Head-On Matches</h4>
          </div>

          <div class="col-lg-3 col-sm-6 g-mb-50">
            <div class="js-counter g-color-gray-dark-v2 g-font-size-35 g-font-weight-300 g-mb-7"><?= $getCountOfTournamentsPlayed -> num_rows ?></div>
            <h4 class="h6 g-color-gray-dark-v5">Tournaments Played</h4>
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
         <?php

         $hoverColorArray = array("g-bg-pink--hover", "g-bg-cyan--hover", "g-bg-blue--hover", "g-bg-red--hover", "g-bg-orange--hover");
         $selectGameInfo = "SELECT * FROM `tournament_registration_meta`";
         $runselectGameInfo = $conn -> query($selectGameInfo);
         $participantCountRows = $runselectGameInfo -> num_rows;
         if($participantCountRows > 0){

           while($getGameInfo = $runselectGameInfo -> fetch_assoc()){

             $timeonly = strtotime($getGameInfo['game_registration_start_date']);
             $gameID = $getGameInfo['game_reg_ID'];
             if($i > count($hoverColorArray) - 1) $i = 1;

         ?>
         <div class="col-sm-6 col-lg-4 g-px-10 g-mb-20">
           <!-- Projects -->
           <div class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-black--hover <?php echo $hoverColorArray[$i+1]; ?> text-center rounded g-transition-0_3 g-px-30 g-py-50">
             <img class="img-fluid u-block-hover__main--zoom-v1 mb-5" src="<?php echo $baseURL;?>assets/img/tournaments/<?=$getGameInfo['game_image_name']?>" width="300" height="200" alt="<?=$getGameInfo['game_name']?>">
             <br/><span class="g-font-weight-600 g-font-size-17 text-uppercase"><?=$getGameInfo['game_name']?></span>
             <h3 class="h4 g-font-weight-600 mb-0">Registration Open <br> <b><?=$getGameInfo['game_registration_start_date']?></b></h3>

             <a class="u-link-v2" href="portal/web/auth/loginPage"></a>
           </div>
           <!-- End Projects -->
         </div>
         <?php
       $i++;
     }
   }else{

     echo 'NO Games to Join.';
   }

        ?>
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
          <a class="btn btn-lg u-btn-white text-uppercase g-font-weight-600 g-font-size-12" href="portal/web/auth/loginPage">Let's PLAY</a>
        </div>
      </div>
    </section>
    <!-- End Call To Action -->

    <?php

      //Footer Section
      include "includes/common/template_footer.php";

     ?>

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
