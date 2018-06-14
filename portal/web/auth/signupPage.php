<?php

//Hiding all errors and notices
error_reporting(0);

//Initializing session
session_start();

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

if(!empty($_SESSION['userID'])){
  // echo 'Session already running'.$_SESSION['userNAME'];
  header('Location:../userProfile/userDashboard');
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>battlestation - Play the best of your life! | Signup Page</title>

  <?php

    //Including Meta and Navigation
    include "../../../includes/common/template_header.php";

   ?>

    </header>
    <!-- End Header -->
    <br><br><br><br>
    <!-- Signup -->
    <section class="g-height-100vh g-flex-centered g-bg-size-cover g-bg-pos-top-center" style="background-image: url(../../../assets/img/bg/authentication_page_bg.jpg);">
      <div class="container g-py-100 g-pos-rel g-z-index-1">
        <div class="row justify-content-center">
          <div class="col-sm-8 col-lg-5">
            <div class="g-bg-white rounded g-py-40 g-px-30">
              <header class="text-center mb-4">
                <h2 class="h2 g-color-black g-font-weight-600">Signup to Game</h2>
                <h4>Please signup by filling a simple form illustrated below to get started.</h4>
              </header>

              <!-- Form -->
              <form class="g-py-15">

                <div class="row">
                  <div class="col-xs-12 col-sm-6 mb-4">
                    <div class="input-group">
                      <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-finance-067 u-line-icon-pro"></i>
                          </span>
                      <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15" type="text" placeholder="Your Name" id="usrFullName">
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 mb-4">
                    <div class="input-group">
                      <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-media-121 u-line-icon-pro"></i>
                          </span>
                      <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15" type="text" placeholder="Your Username" id="usrName">
                    </div>
                    <div id="checkUserName" style="display:none;"></div>
                  </div>

                </div>

                <div class="mb-4">
                  <div class="input-group">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                        <i class="icon-communication-025 u-line-icon-pro"></i>
                        </span>
                    <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15" type="email" placeholder="Please enter your EMAIL ID" id="usrEMAIL">
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-6 mb-4">
                    <div class="input-group">
                      <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                            <i class="icon-media-094 u-line-icon-pro"></i>
                          </span>
                      <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15" type="password" placeholder="Password" id="usrPass" >
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 mb-4">
                    <div class="input-group">
                      <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                            <i class="icon-media-094 u-line-icon-pro"></i>
                          </span>
                      <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-py-15 g-px-15" type="password" placeholder="Confirm again" id="usrCnfmPass" >
                    </div>
                  </div>
                </div>

                <div class="mb-4">
                  <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" id="termsCheck">
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa g-rounded-2" data-check-icon="&#xf00c;"></i>
                    </div>
                    I accept the <a href="signupPage.php#termsModal" data-modal-target="#termsModal" data-modal-effect="slide">Terms and Conditions</a>
                  </label>
                </div>

                <button class="btn btn-md btn-block u-btn-outline-bluegray u-btn-hover-v1-4 g-letter-spacing-0_5 text-uppercase g-rounded-50 g-px-30 g-mr-10 g-mb-15" type="button" id="signupButton">Signup</button>

                <div class="d-flex justify-content-center text-center g-mb-30">
                  <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                  <span class="align-self-center g-color-gray-dark-v3 mx-4">OR SIGNUP USING</span>
                  <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                </div>

                <!-- Form Social Icons -->
                <button onclick="FBLogin();" class="btn btn-block u-btn-facebook rounded text-uppercase g-py-13 g-mb-15" type="button" display="popup" >
                  <i class="mr-3 fa fa-facebook"></i>
                  <span class="g-hidden-xs-down">Signup with Facebook</span>
                </button>
                <!-- End Form Social Icons -->
              </form>
            <!-- End Form -->

              <footer class="text-center">
                <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Already have an account? <a class="g-font-weight-600" href="loginPage">Login</a>
                </p>
              </footer>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Signup -->

    <?php

      //Footer Section
      include "../../../includes/common/template_footer.php";

     ?>

  </main>

  <div class="u-outer-spaces-helper"></div>

  <!-- Terms and Conditions modal window -->
  <div class="row">
    <div class="mb-4">
      <div id="termsModal" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
        <button type="button" class="close" onclick="Custombox.modal.close();">
          <i class="hs-icon hs-icon-close"></i>
        </button>
        <h4 class="g-mb-20">Terms and Conditions</h4>
        <p>Below are certain terms and conditions. You need to read and understand before signing up.</p>
        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
          recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
    </div>
  </div>
  <!-- End Terms and Conditions modal window -->

  <!-- JS Global Compulsory -->
  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="../../../assets/vendor/popper.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/bootstrap.min.js"></script>


  <!-- JS Implementing Plugins -->
  <script src="../../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script  src="../../../assets/vendor/custombox/custombox.min.js"></script>

  <!-- JS Unify -->
  <script src="../../../assets/js/hs.core.js"></script>
  <script src="../../../assets/js/components/hs.header.js"></script>
  <script src="../../../assets/js/helpers/hs.hamburgers.js"></script>
  <script src="../../../assets/js/components/hs.tabs.js"></script>
  <script src="../../../assets/js/components/hs.go-to.js"></script>
  <script  src="../../../assets/js/components/hs.modal-window.js"></script>

  <!-- JS Customization -->
  <script src="../../../assets/js/custom.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {

        // initialization of popups
        $.HSCore.components.HSModalWindow.init('[data-modal-target]');

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

      // $('#signupButton').attr('disabled',true);

      // $("#usrName").keyup(function(){
      //
      //   var user_name = $(this).val();
      //
      //   if(user_name == ""){
      //
      //     alert('BLANK');
      //
      //   }
      //
      //     if(user_name.length > 3){
      //
      //       setTimeout(check_username_ajax(user_name), 100);
      //       $("#checkUserName").show();
      //       $("#checkUserName").html('<img src="../../../assets/img/loaders/check-loader.gif" height="67px" width="88px" />Checking...');
      //
      //     }else{
      //
      //         // alert("RETRY");
      //         $("#usrName").focus();
      //         $("#checkUserName").hide();
      //
      //     }
      //
      //   });
      //
      //   function check_username_ajax(username){
      //
      //       $.ajax({
      //
      //               type : 'POST',
      //               url: '../../../api/process/request/processRegister.php?request='+'checkUserName',
      //               data : {'userName':username},
      //               dataType : 'json',
      //
      //               success : function(data){
      //
      //                 if(data.result == 'AVAILABLE'){
      //
      //                         $('#signupButton').attr('disabled',false);
      //                         $("#checkUserName").delay(500).fadeOut("slow", 0.6);
      //
      //                         $("#checkUserName").html('<img src="../../../assets/img/loaders/tick-loader.gif" height="28px" width="109px" />'+'<small>'+data.msg+'</small>');
      //
      //                 }else {
      //
      //                     $("#checkUserName").delay(500).fadeOut("slow", 0.6);
      //                     $("#checkUserName").html('<img src="../../../assets/img/loaders/error-loader.png" height="22px" width="22px" />'+' <small>Username is taken.</small>');
      //
      //                 }
      //
      //               }
      //       });
      //       return false;
      //     }

            //Signup Script
            $('#signupButton').on('click',function(){
                // alert("hi!");
                var userName = $('#usrName').val();
                var userPassword = $('#usrPass').val();
                var userCnfmPassword = $('#usrCnfmPass').val();
                var userEMAILID = $('#usrEMAIL').val();
                var userFullName = $('#usrFullName').val();
                if(userName == '' && userPassword == '' && userPassword == '' && userCnfmPassword == '' && userEMAILID == ''){

                  cheers.error({
                    title: "All fiel are blank.",
                    message: 'Please fill all the fields.',
                    alert: 'slideleft',
                    icon: 'fa-id-card',
                  });
                  $('#usrFullName').focus();

                }else if(userFullName == ''){

                  cheers.warning({
                    title: "Name cannot left blank.",
                    message: 'Please fill the field.',
                    icon: 'fa-address-book-o',
                    alert: 'slideleft',
                  });
                  $('#usrFullName').focus();

                }else if (userName == ''){

                  cheers.warning({
                    title: "Name cannot left blank.",
                    message: 'Please fill the field.',
                    icon: 'fa-user-circle-o',
                    alert: 'slideleft',
                  });
                  $('#usrName').focus();

                }else if(userEMAILID == ''){

                  cheers.warning({
                    title: "EMAIL ID field cannot left blank.",
                    message: 'Please fill the field.',
                    icon: 'fa-envelope-open-o',
                    alert: 'slideleft',
                  });
                  $('#usrEMAIL').focus();

                }else if(userPassword == '' || userCnfmPassword == '' || userPassword != userCnfmPassword){

                    cheers.warning({
                      title: "Either Password and Confirm Passwords fields are blank or they don\'\t match.",
                      message: 'Please fill the fields or recheck.',
                      icon: 'fa-asterisk',
                      alert: 'slideleft',
                    });
                    $('#usrPass').focus();
                    $('#usrPass').val("");
                    $('#usrCnfmPass').val("");

                  }else if(!$('#termsCheck').is(':checked')){

                  cheers.warning({
                    title: "Please accept terms and conditions.",
                    message: 'Please check the T&C.',
                    icon: 'fa-stop',
                    alert: 'slideleft',
                  });
                  $('#termsCheck').focus();

                }else{

                    $.ajax({
                          type: 'post',
                          url: '../../../api/process/request/processRegister?request='+'registerUser',
                          dataType: 'json',
                          data:{'userName':userName,'userPassword':userPassword,'userEMAILID':userEMAILID,'userFullName':userFullName},
                          beforeSend: function(){
                          $('#loader').show();
                          },
                          success: function(data){

                            $('#loader').hide();

                            switch(data.result){

                                case ('EXISTS'):

                                  cheers.error({
                                    title: data.resp,
                                    message: data.msg,
                                  });
                                  setTimeout(function(){   window.location.href="loginPage"; }, 1500);
                                  break;

                                case ('NEW'):
                                  $('#loginFormContainer').hide();
                                  setTimeout(function(){   window.location.href = "../userProfile/userDashboard"; }, 1500);
                                  cheers.success({
                                    title: data.resp,
                                    message: data.msg,
                                  });
                                  break;

                                default:

                                  cheers.warning({
                                    title: 'Whoops!Something went wrong.',
                                    message: 'Unable to handle your request at the moment.',
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
