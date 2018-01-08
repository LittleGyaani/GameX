<?php
session_start();
if(!empty( $_SESSION['userID'])){
  echo 'Logged in successfully. Redirecting you to Dashboard now.';
  header('Location:../userProfile/userDashboard.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Game X - Play the best of your life! | Login Page</title>

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

            <div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
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
                <h4>Please login with your username or EMAILID and password to get access.</h4>
              </header>

              <!-- Form -->
              <form class="g-py-15">
                <div class="mb-4">
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="text" placeholder="Username or EMAIL ID" id="userName">
                </div>

                <div class="g-mb-35">
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3" type="password" placeholder="Password" id="userPassword">
                  <div class="row justify-content-between">
                    <div class="col align-self-center">
                      <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-0">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                        <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                          <i class="fa" data-check-icon="&#xf00c"></i>
                        </div>
                        Keep signed in
                      </label>
                    </div>
                    <div class="col align-self-center text-right">
                      <a class="g-font-size-12" href="page-login-7.html#!">Forgot password?</a>
                    </div>
                  </div>
                </div>

                <div class="g-mb-60">
                  <button class="btn btn-md btn-block u-btn-primary rounded g-py-13" type="button" id="loginButton">Login</button>
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
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Incredible template</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">May 8, 2017</div>
            </article>

            <hr class="g-brd-white-opacity-0_1 g-my-10">

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">New features</a>
          </h3>
              <div class="small g-color-white-opacity-0_6">June 23, 2017</div>
            </article>

            <hr class="g-brd-white-opacity-0_1 g-my-10">

            <article>
              <h3 class="h6 g-mb-2">
            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">New terms and conditions</a>
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
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">About Us</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Portfolio</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Our Services</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Latest Jobs</a>
                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
              </h4>
                </li>
                <li class="g-pos-rel g-py-10">
                  <h4 class="h6 g-pr-20 mb-0">
                <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Contact Us</a>
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
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:info@htmlstream.com">info@htmlstream.com</a>
              <br>
              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">www.htmlstream.com</a>
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
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Terms of Use</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">License</a>
                </li>
                <li class="list-inline-item">
                  <span>|</span>
                </li>
                <li class="list-inline-item">
                  <a class="g-color-white-opacity-0_8 g-color-white--hover" href="page-login-10.html#!">Support</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-4 align-self-center">
            <ul class="list-inline text-center text-md-right mb-0">
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Facebook">
                <a href="page-login-10.html#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Skype">
                <a href="page-login-10.html#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-skype"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Linkedin">
                <a href="page-login-10.html#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Pinterest">
                <a href="page-login-10.html#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-pinterest"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Twitter">
                <a href="page-login-10.html#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Dribbble">
                <a href="page-login-10.html#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                  <i class="fa fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Copyright Footer -->
    <a class="js-go-to u-go-to-v1" href="page-login-10.html#!" data-type="fixed" data-position='{
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
                            alert(data.resp+data.msg);
                            break;

                          case ('ERROR'):
                            alert(data.resp+data.msg);
                            window.location.href="signupPage.php";
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
