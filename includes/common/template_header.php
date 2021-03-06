<?php

  //Allow Cross Access from Origin
  header("Access-Control-Allow-Origin: *");

  //Initializing session
  session_start();

  //Define Base URL to be used globally
  $baseURL = 'http://localhost/GameX/';//$baseURL = 'https://www.battlestation.live/';

  //Defining Default Time DateTimeZone
  date_default_timezone_set('Asia/Kolkata');

  //Generate Random String to use as token for secure AJAX calls
  function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

      for ($i = 0; $i < $length; $i++) {
          $key .= $keys[array_rand($keys)];
      }

      return $key;
    }

    //Custom php function to get time ago

    function get_time_ago( $time )
    {
        $time_difference = time() - $time;

        if( $time_difference < 1 ) { return '1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return  $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

 ?>
<!-- Meta updated by LittleGyaani(BRAHMA) {https://www.twitter.com/LittleGyaani} -->
<!-- Meta, Header and Navigation Start-->
<!-- Required Meta Tags Always Come First -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo $baseURL; ?>favicon.ico">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
<!-- CSS Global Compulsory -->
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/bootstrap/bootstrap.min.css">
<!-- CSS Global Icons -->
<!-- <link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/icon-awesome/css/font-awesome.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/icon-etlinefont/style.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/icon-line-pro/style.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/icon-hs/style.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/animate.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/hs-megamenu/src/hs.megamenu.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/hamburgers/hamburgers.min.css">

<!-- CSS Unify -->
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/css/unify-core.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/css/unify-components.css">
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/css/unify-globals.css">

<!-- CSS Customization -->
<link rel="stylesheet" href="<?php echo $baseURL; ?>assets/css/custom.css">

<!-- CSS Implementing Plugins -->
<link  rel="stylesheet" href="<?php echo $baseURL; ?>assets/vendor/custombox/custombox.min.css">

<!-- Custom Toast Notification powered by Cheers Alert -->
<script src="https://maddumajohnerick.github.io/cheers-alert/dist/cheers-alert.min.js"></script>
<link rel="stylesheet" href="https://maddumajohnerick.github.io/cheers-alert/dist/cheers-alert.min.css" />

</head>

<body>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2161578867407424',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.0'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   function checkLoginState() {
     FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
    //console.log(response);
  });
}

  function statusChangeCallback(response) {
    if (response.status == 'connected') {
        // Logged into your app and Facebook.
        // we need to hide FB login button
        // $('#fblogin').hide();
        //fetch data from facebook
        var accessToken = response.authResponse.accessToken;
        getUserInfo();
    }
  }
  function getUserInfo(){

     FB.api('/me', {locale: 'en_IN', fields: 'id,name,email,picture'},function(response) {
      // console.log(JSON.stringify(response));
      $.ajax({
            type: "POST",
            // dataType: 'json',
            data: response,
            url: '<?php echo $baseURL;?>api/process/request/FBLogin',
            success: function(msg) {
              if(msg == 'EXISTS')
                alert('User is already present.'+msg);
                // window.location.href="";
                location.reload(true);
            }
      });

    });

  }

  function FBLogin(){
      FB.login(function(response) {
         if (response.authResponse){

             getUserInfo(); //Get User Information.

          }else{
           alert('Authorization failed.');
          }
       },{scope: 'public_profile,email',return_scopes: true});
}

function FBLogout()
  {
  	FB.logout(function(response) {
      // console.log(JSON.stringify(response));
      alert('Logout successful');
    });
  }
</script>

  <!--Notification Audio-->
  <audio id="notificationSound" style="display:none;"></audio>
  <!--Notification Audio End-->

<main>



  <!-- Header -->
  <header id="js-header" class="u-header u-header--sticky-top u-header--toggle-section u-header--change-appearance" data-header-fix-moment="300">
  <div class="u-header__section u-header__section--dark g-bg-black g-transition-0_3 g-py-10" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="g-py-0">
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

            <div id="hiddenUserID" style="display:none;"><?=$userID?></div>


            <!-- Logo -->
            <a href="<?php echo $baseURL; ?>index.php" class="navbar-brand d-flex">
                <h2><font color="green"><b>battle</b><strong>station</strong></font></h2>
            </a>
            <!-- End Logo -->

            <?php

            //Get current url for showing headers on pages accordingly
            $current_url = strtolower(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

              if(!($_SESSION['userID'])){

            ?>
              <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
                <a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15" href="<?php echo $baseURL; ?>portal/web/auth/loginPage">Login/Signup</a>
              </div>

            <?php

            }else{

              if($current_url == 'index.php' || $current_url == 'gamex' || $current_url == 'index'){

              ?>
              <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
              <ul class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
                <li class="nav-item g-mx-20--lg">
                  <a href="#!" class="nav-link px-0">Home

              </a>
                </li>
                <li class="nav-item g-mx-20--lg">
                  <a href="#!" class="nav-link px-0">Features

              </a>
                </li>
                <li class="nav-item g-mx-20--lg active">
                  <a href="#!" class="nav-link px-0">Shortcodes
                <span class="sr-only">(current)</span>
              </a>
                </li>
                <li class="nav-item g-mx-20--lg">
                  <a href="#!" class="nav-link px-0">Pages

              </a>
                </li>

              </ul>

            <!-- End Navigation -->

              <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
                <a class="btn btn-md u-btn-outline-cyan g-brd-2 g-mr-10 g-mb-15" href="portal/web/userProfile/myProfile">Welcome <b><?= $selectUserInformations['user_fullname'];?></b></a> <a href="portal/web/auth/controller/userLogout" class="btn btn-md u-btn-outline-lightred g-mr-10 g-mb-15">Logout</a>
              </div>
              <?php

            }else{?>
              <!-- User AREA-->
              <center>
              <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">

                <font color="white"><i class="icon-user"></i><span class="u-label g-font-size-16 g-px-8">Welcome</span></font><a class="g-brd-2 g-mr-16 g-font-size-16 g-mb-15 userName" href="portal/web/userProfile/myProfile"><b><?= $selectUserInformations['user_fullname'];?>!</b></a>
                <br>

              <!-- Notification Icon Start -->
              <div class="row">
                <div class="col-md-12">
              <ul id="nav">
                <li id="notification_li">
                     <a href="javascript:void(0);" id="notificationLink" class="justify-content-between">
                         <b><span class="u-label g-font-size-18 g-bg-primary g-rounded-20 g-px-8"><i class="icon-bell g-pos-rel g-top-1" ></i>  <span id="notificationCount"></span></span></b>
                     </a>
                     <div id="notificationContainer">
                      <div id="notificationTitle"><i class="icon-bell"></i> All Notifications</div>
                      <div id="notificationsBody" class="notifications">
                          <!-- Area for appending messages -->
                      </div>
                      <div id="notificationFooter"><a class ="lnkAllNotification" href="allNotifications" target="_blank">See All</a></div>
                      </div>
                </li>

              <!-- Notification Icon End -->

              <!-- Wallet Icon Start -->
                    <li>
                     <a href="walletStatistics" class="justify-content-between">
                         <span class="u-label g-font-size-18 g-bg-blue g-rounded-20 g-px-8 walletBalance"><i class="icon-wallet g-pos-rel g-top-1 g-mr-8"></i>₹<b id="walletBalanceArea"></b></span>
                     </a>
                   </li>
               <!-- Wallet Icon End -->

               <!-- Achievements Icon Start -->
                     <!-- <li>
                      <a href="#" class="justify-content-between">
                          <span class="u-label g-font-size-18 g-bg-cyan g-rounded g-px-8 walletBalance"><i class="icon-trophy g-pos-rel g-top-1"></i></span>
                      </a>
                    </li> -->
                <!-- Achievements Icon End -->

               <!-- Logout Icon Start -->
                    <!-- <li>
                      <a href="../auth/controller/userLogout.php" class="justify-content-between">
                          <span class="u-label g-font-size-18 g-bg-lightred g-rounded-20 g-px-8"><i class="icon-logout g-pos-rel g-top-1 g-mr-8"></i><b>Logoff</b></span>
                      </a>
                    </li> -->
                <!-- Logout Icon End -->
                </ul>
              </div>
            </div>

             </div>
             <!-- User AREA End-->
           </center>

           <?php }} ?>
         </nav>
         </div>
        </div>
      </div>
      <!-- Meta, Header and Navigation End-->
