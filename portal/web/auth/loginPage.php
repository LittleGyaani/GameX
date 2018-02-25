<?php

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Validating if the session exists or not
if(!empty( $_SESSION['userID'])){
  echo 'Logged in successfully. Redirecting you to Dashboard now.';
  header('Location:../userProfile/userDashboard.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>battlestation - Play the best of your life! | Login Page</title>

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
  <link rel="stylesheet" href="../../../assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="../../../assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="../../../assets/vendor/animate.css">
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

            <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
              <a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15" href="loginPage.php">Login/Signup</a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- End Header -->

    <!-- Login -->
    <section class="g-height-100vh g-flex-centered g-bg-size-cover g-bg-pos-top-center" style="background-image: url(../../../assets/img/bg/authentication_page_bg.jpg);">
      <div class="container g-py-100 g-pos-rel g-z-index-1">
        <div class="row justify-content-center">
          <div class="col-sm-8 col-lg-5">
            <div class="g-bg-white rounded g-py-40 g-px-30">
              <header class="text-center mb-4">
                <h2 class="h2 g-color-black g-font-weight-600">Login to Play</h2>
                <h5>Please login with your <strong>USERNAME</strong> or <strong>EMAIL ID</strong> and <strong>Password</strong> to get access.</h5>
              </header>

              <!-- Form -->
              <form class="g-py-15" id="userLoginForm">

                <div class="mb-4">
                  <div class="input-group">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                        <i class="icon-media-121 u-line-icon-pro"></i>
                        </span>
                    <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15" type="text" placeholder="Please enter your Username or EMAIL ID" id="userName">
                  </div>
                </div>

                <div class="mb-4">
                  <div class="input-group">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                        <i class="icon-media-094 u-line-icon-pro"></i>
                        </span>
                    <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15" type="password" placeholder="Please enter your Password" id="userPassword">
                  </div>


                  <!--Forgot Password-->
                    <br/><p align="right" class="g-color-gray-dark-v5 g-font-size-13 mb-0">Don't remember your Password? <a class="g-font-weight-600" href="forgotPass.php">Reset now</a>
                    </p>
                  <!-- Forgot Password End-->

                </div>

                <div class="g-mb-60">
                  <button class="btn btn-md btn-block u-btn-outline-blue u-btn-hover-v1-4 g-letter-spacing-0_5 text-uppercase g-rounded-50 g-px-30 g-mr-10 g-mb-15" type="button" id="loginButton">Login</button>
                </div>
                <div class="text-center g-pos-rel pb-2 g-mb-60">
                  <div class="d-inline-block w-100 g-height-1 g-bg-white"></div>
                  <span class="u-icon-v2 u-icon-size--lg g-brd-white g-color-white g-bg-teal g-font-size-default rounded-circle text-uppercase g-absolute-centered g-pa-24">OR</span>
                </div>

                <button class="btn btn-block u-btn-facebook rounded text-uppercase g-py-13 g-mb-15" type="button">
                  <i class="mr-3 fa fa-facebook"></i>
                  <span class="g-hidden-xs-down">Login with</span> Facebook
                </button>
                <button class="btn btn-block u-btn-twitter rounded text-uppercase g-py-13" type="button">
                  <i class="mr-3 fa fa-twitter"></i>
                  <span class="g-hidden-xs-down">Login with</span> Twitter
                </button>
              </form>
              <!-- End Form -->

              <footer class="text-center">
                <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Don't have an account? <a class="g-font-weight-600" href="signupPage.php">Signup</a>
                </p>
              </footer>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Login -->

    <?php

      //Footer Section
      include "../../../includes/common/template_footer.php";

     ?>

  </main>

  <div class="u-outer-spaces-helper"></div>


  <!-- JS Global Compulsory -->
  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="../../../assets/vendor/popper.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/bootstrap.min.js"></script>


  <!-- JS Implementing Plugins -->
  <script src="../../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>

  <!-- JS Unify -->
  <script src="../../../assets/js/hs.core.js"></script>
  <script src="../../../assets/js/components/hs.header.js"></script>
  <script src="../../../assets/js/helpers/hs.hamburgers.js"></script>
  <script src="../../../assets/js/components/hs.tabs.js"></script>
  <script src="../../../assets/js/components/hs.go-to.js"></script>

  <!-- JS Customization -->
  <script src="../../../assets/js/custom.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
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
  <!--Some Custom Scripts for handling authentication.-->
  <script>
    $(document).ready(function(){

        //Login Script
        $('#loginButton').on('click',function(){
            // alert("hi!");
            var userName = $('#userName').val();
            var userPassword = $('#userPassword').val();
            if(userName == ''){
              alert('Username field is blank.')
              $('#userName').focus();
            }else if(userPassword == ''){
              alert('Password field is blank.')
              $('#userPassword').focus();
            }else if(userName == '' && userPassword ==''){
              alert('You cannot left both the fields blank.')
            }else{
              $.ajax({
                    type: 'post',
                    url: '../../../api/process/request/processLogin.php',
                    dataType: 'json',
                    data:{'userName':userName,'userPassword':userPassword},
                    beforeSend: function(){
                    $('#loader').show();
                    },
                    success: function(data){
                      $('#loader').hide();

                      switch(data.result){

                          case ('SUCCESS'):
                            window.location.href="../userProfile/userDashboard.php";
                            window.location.reload();
                            alert(data.resp+data.msg);
                            break;

                            case ('EXISTS'):
                              $('userLoginForm').reset[0];
                              $('userName').focus();
                              alert(data.resp+data.msg);
                              break;

                          case ('ERROR'):
                            alert(data.resp+data.msg);
                            window.location.href="signupPage.php";
                            break;

                            case ('EMPTY'):
                              alert(data.resp+data.msg);
                              break;

                          default:
                            alert('Something went wrong.');

                        }
                    }
                  });
                }
              });
      });
        </script>
</body>

</html>
