<?php

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Defining Default Time DateTimeZone
date_default_timezone_set('Asia/Kolkata');
// echo 'Hi'.$_SESSION['userID'];
// exit;
//Validating if the session exists or not
if(!empty($_SESSION['userID'])){

  // echo 'Welcome User'.$_SESSION['userNAME'];
  $userID = $_SESSION['userID'];
  //Selecting all user information basing upon the user's session id
  $selectAllUserData = "SELECT * FROM `user_info` WHERE `user_id` = '$userID'";
  $getAllUserDetails = $conn -> query($selectAllUserData);
  $selectUserInformations = $getAllUserDetails -> fetch_assoc();
  if(!$selectUserInformations['is_firsttime'])
    header('Location:userDashboard');

}else{

  echo 'You are not authorized to access the page without logging in.';
  // header('Location:../auth/loginPage.php?redirectback=' . urlencode($_SERVER['REQUEST_URI']));


}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>battlestation - Play the best of your life! | User Dashboard</title>

    <?php

      //Including Meta and Navigation
      include "../../../includes/common/template_header.php";

     ?>

    </header>
    <!-- End Header -->

  </br></br>  </br></br>

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
            <span>KYC Page</span>
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

          <!-- Profile Content -->
          <div class="col-lg-9">

            <!-- Edit Profile -->
            <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
              <h2 class="h4 g-font-weight-300">Before you start, let's quickly update few details about you.</h2>
              <p>Please fill-up the form to know you better.</p>

              <form method="post" action="javascript:void(0);" id="profileData" name="profileData">

                  <!-- Username Check -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Pick an username</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="text" placeholder="Choose an username" id="username" autocomplete="off" minlength="5" maxlength="20" data-toggle="tooltip" data-placement="left" title="Username must be unique and should be of minimum 5 letters and maximum of 20" required>
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-user"></i>
                        </div>
                      </div>
                      <span id="result"></span>
                    </div>
                  </div>
                  <!-- End Username Check -->

                  <!-- Mobile Number Input -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Your Phone Number</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="tel" placeholder="Enter Your Phone" id="phone" autocomplete="off" maxlength="10" data-toggle="tooltip" data-placement="left" title="Phone number should be of 10 digit without country code" pattern="^[6-9]\d{9}$" required>
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-phone"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Mobile Number End -->

                  <!-- New Password -->
                  <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">New password</label>
                    <div class="col-sm-9">
                      <div class="input-group g-brd-primary--focus">
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="password" placeholder="New password" id="pass" data-toggle="tooltip" data-placement="left" title="Password must contain atleast one character(One upper and lower case), one number and one special character with length between 6 to 12" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{6,12}" required>
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
                        <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="password" placeholder="Please re-enter the password to confirm" data-toggle="tooltip" data-placement="left" title="Verify password that you entered in Password field" id="vpass" required>
                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Verify Password -->

                  <!-- Login Verification -->
                  <!-- <div class="form-group row g-mb-25">
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
                  </div> -->
                  <!-- End Login Verification -->

                  <!-- Password Reset -->
                  <!-- <div class="form-group row g-mb-25">
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
                  </div> -->
                  <!-- End Password Reset -->

                  <!-- Save Password -->
                  <!-- <div class="form-group row g-mb-25">
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
                  </div> -->
                  <!-- End Save Password -->

                  <hr class="g-brd-gray-light-v4 g-my-25">
                  <div class="text-sm-right">
                    <input type="reset" class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" value="Reset" />
                    <input type="submit" class="btn u-btn-blue rounded-0 g-py-12 g-px-25" id="updateProfile" value="Update Profle"/>
                  </div>

                </form>

            </div>
            <!-- End Edit Profile -->
            </div>
            <!-- End Product Table Panel -->
          </div>
          <!-- End Profile Content -->
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
