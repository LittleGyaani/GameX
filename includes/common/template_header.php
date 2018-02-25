<!-- Meta, Header and Navigation Start-->
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

<!-- CSS Implementing Plugins -->
<link  rel="stylesheet" href="../../../assets/vendor/custombox/custombox.min.css">


<!--Heartbeat Style -->
<style>
.fa-beat {
  animation:fa-beat 5s ease infinite;
}
@keyframes fa-beat {
  0% {
    transform:scale(1);
  }
  5% {
    transform:scale(1.25);
  }
  20% {
    transform:scale(1);
  }
  30% {
    transform:scale(1);
  }
  35% {
    transform:scale(1.25);
  }
  50% {
    transform:scale(1);
  }
  55% {
    transform:scale(1.25);
  }
  70% {
    transform:scale(1);
  }
}

.heart {
  color:red;
}
</style>
<!--Heartbeat End-->

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

            <div id="hiddenUserID" style="display:none;"><?=$userID?></div>


            <!-- Logo -->
            <a href="../../../index.php" class="navbar-brand d-flex">
                <h2><font color="green"><b>battle</b><strong>station</strong></font></h2>
            </a>
            <!-- End Logo -->


          <!-- User AREA-->
          <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">

            <i class="icon-user g-pos-rel"></i> Welcome <a class="g-brd-2 g-mr-10 g-mb-15" href="myProfile.php"><b><?= $selectUserInformations['user_fullname'];?>!</b></a>
            <br>

          <!-- Notification Icon Start -->
                 <a href="#" class="justify-content-between">
                     <b><span class="u-label g-font-size-18 g-bg-primary g-rounded-20 g-px-8"><i class="icon-bell g-pos-rel g-top-1" ></i>  <span id="notificationCount"></span></span></b>
                 </a>
          <!-- Notification Icon End -->

          <!-- Wallet Icon Start -->
                 <a href="#" class="justify-content-between">
                     <span class="u-label g-font-size-18 g-bg-blue g-rounded-20 g-px-8"><i class="icon-wallet g-pos-rel g-top-1 g-mr-8"></i>₹<b><?= $selectUserInformations['walletBalance'];?></b></span>
                 </a>
           <!-- Wallet Icon End -->

           <!-- Wallet Icon Start -->
                  <a href="../auth/controller/userLogout.php" class="justify-content-between">
                      <span class="u-label g-font-size-18 g-bg-lightred g-rounded-20 g-px-8"><i class="icon-power g-pos-rel g-top-1 g-mr-8"></i>Logout</span>
                  </a>
            <!-- Wallet Icon End -->

         </div>
         <!-- User AREA End-->
    </nav>
        </div>
      </div>
      <!-- Meta, Header and Navigation End-->
