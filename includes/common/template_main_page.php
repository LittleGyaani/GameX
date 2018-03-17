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

<!-- Custom Toast Notification powered by Cheers Alert -->
<script src="https://maddumajohnerick.github.io/cheers-alert/dist/cheers-alert.min.js"></script>
<link rel="stylesheet" href="https://maddumajohnerick.github.io/cheers-alert/dist/cheers-alert.min.css" />

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
                <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
                  <a class="btn u-btn-outline-green g-font-size-13 text-uppercase g-py-10 g-px-15" href="index.php">HOME-X</a>
                </div>
              </li>
              <!-- End Home -->
            </ul>

          <!-- End Navigation -->

          <?php
          if(!($_SESSION['userID'])){ ?>
          <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
            <a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15" href="portal/web/auth/loginPage.php">Login/Signup</a>
          </div>

  <?php } else{ ?>
    <div class="d-inline-block g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
      <a class="btn btn-md u-btn-outline-cyan g-brd-2 g-mr-10 g-mb-15" href="portal/web/userProfile/myProfile.php">Welcome <b><?= $selectUserInformations['user_fullname'];?></b></a> <a href="portal/web/auth/controller/userLogout.php" class="btn btn-md u-btn-outline-lightred g-mr-10 g-mb-15">Logout</a>
    </div>

   <?php } ?>
</div>
</header>
<!-- End Header -->
