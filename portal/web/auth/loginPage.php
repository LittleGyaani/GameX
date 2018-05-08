<?php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed
//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Validating if the session exists or not
if(!empty( $_SESSION['userID'])){
  echo 'Logged in successfully. Redirecting you to Dashboard now.';
  header('Location:../userProfile/userDashboard');
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>battlestation - Play the best of your life! | Login Page</title>

  <?php

    //Including Meta and Navigation
    include "../../../includes/common/template_header.php";

   ?>

    </header>
    <!-- End Header -->
    <br><br><br>
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

                <?php
if(!session_id()) {
    session_start();
}
$fb = new Facebook\Facebook([
  'app_id' => '231577307401515',
  'app_secret' => 'f40193b3820209c0a1796344f90f76c5',
  'default_graph_version' => 'v2.12',
  ]);

$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) { $helper->getPersistentDataHandler()->set('state', $_GET['state']); }
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://battlestation.live/Gamex/portal/web/auth/fb-callback.php', $permissions);?>

 <button class="btn btn-block u-btn-facebook rounded text-uppercase g-py-13 g-mb-15" type="button"  scope="public_profile,email" onlogin="checkLoginState();">
                  <i class="mr-3 fa fa-facebook"></i>
                  <span class="g-hidden-xs-down" ><?php echo'<a href="' . $loginUrl . '">Login with Facebook </a>';?></span>
                </button>

                <!-- <button class="btn btn-block u-btn-twitter rounded text-uppercase g-py-13" type="button">
                  <i class="mr-3 fa fa-twitter"></i>
                  <span class="g-hidden-xs-down">Login with</span> Twitter
                </button> -->
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

  <!-- jQuery Shake Effect for form errors -->
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

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

      $('#userLoginForm').keypress(function(e) {
      if (e.which == 13)
        $('#loginButton').click();
      // return false;
    });

        //Login Script
        $('#loginButton').on('click',function(){
            // alert("hi!");
            var userName = $('#userName').val();
            var userPassword = $('#userPassword').val();
            if(userName == ''){

              cheers.warning({
                title: 'Username field is blank',
                message: 'Please fillup the field',
                alert: 'slideleft',
                icon: 'fa-user-circle-o',
              });
              $('#userName').focus();

            }else if(userPassword == ''){

              cheers.warning({
                title:'Password field is blank.',
                message: 'Please fillup the field',
                alert: 'slideleft',
                icon: 'fa-asterisk',
              });
              $('#userPassword').focus();

            }else if(userName == '' && userPassword ==''){

              cheers.warning({
                title:'You cannot left both the fields blank.',
                message: 'Please fillup required fields',
                alert: 'slideleft',
                icon: 'fa-toggle-off',
              });
              $('#userLoginForm').effect('shake');

            }else{

              $.ajax({
                    type: 'post',
                    url: '../../../api/process/request/processLogin.php',
                    dataType: 'json',
                    data: {'userName':userName,'userPassword':userPassword},
                    beforeSend: function(){
                    $('#loader').show();
                    },
                    success: function(data){
                      $('#loader').hide();

                      switch(data.result){

                            case ('PASSERROR'):

                              $('#userName').attr('disabled',true);
                              $('#userPassword').focus();
                              // $('#userLoginForm').effect('shake');
                              //alert(data.resp+data.msg);
                              cheers.warning({
                                title: data.resp,
                                message: data.msg,
                                alert: 'slideleft',
                              });
                              $('#userPassword').val('');
                              break;

                            case ('USERERROR'):

                              // alert(data.resp+data.msg);
                              setTimeout(function(){   window.location.href="signupPage"; }, 1500);
                              cheers.error({
                                title: data.resp,
                                message: data.msg,
                                alert: 'slideleft',
                              });

                              break;

                            case ('SUCCESS'):

                              setTimeout(function(){   window.location.href="../userProfile/userDashboard"; }, 1500);
                              cheers.success({
                                title: data.resp,
                                message: data.msg,
                                alert: 'slideleft',
                              });

                              break;

                            case ('EMPTY'):

                              cheers.error({
                                title: data.resp,
                                message: data.msg,
                                alert: 'slideleft',
                              });
                              break;

                            case ('FAIL'):

                              cheers.error({
                                title: data.resp,
                                message: data.msg,
                                alert: 'slideleft',
                              });
                              break;

                            default:

                              cheers.error({
                                title: 'Something went wrong.',
                                message: 'Please retry after some moment.',
                                alert: 'slideleft',
                              });

                        }
                    }

                  });

                }

              });

      });

  </script>
</body>

</html>
