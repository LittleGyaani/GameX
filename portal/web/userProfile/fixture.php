<?php

//Hiding all errors and notices
error_reporting(0);

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Defining Default Time DateTimeZone
date_default_timezone_set('Asia/Kolkata');

//Validating if the session exists or not
if(!empty($_SESSION['userID'])){

  // echo 'Welcome User'.$_SESSION['userNAME'];
  $userID = $_SESSION['userID'];
  //Selecting all user information basing upon the user's session id
  $selectAllUserData = "SELECT * FROM `user_info` WHERE `user_id` = '$userID'";
  $getAllUserDetails = $conn -> query($selectAllUserData);
  $selectUserInformations = $getAllUserDetails -> fetch_assoc();

}else{

  echo 'You are not authorized to access the page without logging in.';
  header('Location:../auth/loginPage.php?redirectback=' . urlencode($_SERVER['REQUEST_URI']));


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

     <script type="text/javascript" src="assets/js/jquery.bracket.min.js"></script>
     <link rel="stylesheet" type="text/css" href="assets/css/jquery.bracke.min.css">
    </header>
    <!-- End Header -->
    <div id ="internetActivity" class="col-md-12 col-md-6" style="background:white; background-position:center; color:black; height:100%; width:100%; position:fixed; z-index:10000; overflow:hidden; display:none;"><center><font class="g-color-gray" size="50">I and Internet aren't talking right now! Will be back soon. :(</font><br><br><br><br><img src="../../../assets/img/icons/no_internet.png"/></center></div>
    <!-- Promo Block -->
    <div class="container g-pt-100">
        <div class="row justify-content-lg-between">
          <div class="col-lg-4 g-pt-50--lg">
            <div class="mb-5">
              <h1 class="g-color-black g-font-size-45 mb-4">Welcome Back!</h1>
              <p>Explore all the September events and back-to-school resources to welcome you to campus.</p>
              <span class="u-icon-v1 g-mb-10"><a class="js-go-to btn u-shadow-v33 g-color-white g-bg-primary u-btn-hover-v2-2 g-bg-cyan--hover g-rounded-30 g-px-35 g-py-10 quickMatchModal" href="#quickMatch" data-modal-target="#quickMatch" data-modal-effect="blur">
                  <i class="icon-energy"></i> Quick Match</a>
                </span>
                <br>
                <span class="u-icon-v1 g-mb-10"><a class="js-go-to btn u-shadow-v33 g-color-white g-bg-purple u-btn-hover-v2-2 g-bg-orange--hover g-rounded-30 g-px-35 g-py-10 quickHeadOnMatchModal" href="#quickheadOnMatch" data-modal-target="#quickheadOnMatch" data-modal-effect="blur">
                    <i class="icon-puzzle"></i> Quick Head On Match</a>
                  </span>

            </div>
          </div>

          <!-- Qucik Match modal window -->
          <div id="quickMatch" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
            <button type="button" class="close" onclick="Custombox.modal.close();">
              <i class="icon-close"></i>
            </button>
            <div id="findQuickMatch">
            <p><center><img src="https://cdn.dribbble.com/users/475393/screenshots/3099510/pulse.gif" height="290" width="388"/></center></p><br>
            <center><p><h5>Finding a <b>Match</b> for YOU<span id="dots"></span><h5></p></center>
            </div>

              <div id="quickMatchArea"><h4 class="g-mb-20"><div id="successtext"></div></h4></div>
              <center><button type="button" class="close btn btn-lg u-btn-outline-red u-btn-hover-v2-1 g-mr-10 g-mb-15" onclick="Custombox.modal.close();">Cancel</button></center>
          </div>
          <!-- End Quick Match modal window -->

          <!-- Qucik Head ON Match modal window -->
          <div id="quickheadOnMatch" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20"  tabindex="-1" data-backdrop="false" style="display: none;">
            <button type="button" class="close closeHeadOnModal" onclick="Custombox.modal.close();">
              <i class="icon-close"></i>
            </button>

                  <form method="post" id="headonMatchForm" action="#" class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30">

                    <div class="form-inline">
                      <label class="mr-sm-3 mb-3 mb-lg-0" for="WhomtoChallenge">Whom to Challenge?</label>
                      <select id="userSelect" name="userSelect" class="custom-select mr-sm-3 mb-3 mb-lg-0">
                        <option value="null" selected disabled>Choose an User</option>
                    <?php
                      $selectUserData = "SELECT * FROM `user_info` WHERE `user_id` != $userID";
                      $runselectUserData = $conn -> query($selectUserData);
                      if($runselectUserData && ($runselectUserData -> num_rows > 0)){

                          while ($fetchuserData = $runselectUserData -> fetch_assoc()){
                    ?>
                          <option value="<?= $fetchuserData['user_id']; ?>"><?= $fetchuserData['user_fullname']; ?> - <?= $fetchuserData['user_name']; ?></option>
                    <?php
                  }
                }
                    ?>
                      </select>

                    </div>

                    <br>

                    <div class="form-inline" id ="gamePlatformChoose" style="display:none">
                      <label class="mr-sm-3 mb-3 mb-lg-0" for="WhomtoChallenge">What game to Challenge?</label>
                      <select id="gameSelect" name="gameSelect" class="custom-select mr-sm-3 mb-3 mb-lg-0">
                        <option value="null" selected disabled>Choose Game</option>
                    <?php
                      $selectGameData = "SELECT * FROM `profile_platform_games` WHERE `game_status`= 1";
                      $runselectGameData = $conn -> query($selectGameData);
                      if($runselectGameData && ($runselectGameData -> num_rows > 0)){

                          while ($fetchgameData = $runselectGameData -> fetch_assoc()){
                    ?>
                          <option value="<?= $fetchgameData['gameID']; ?>"><?= $fetchgameData['game_name']; ?> - <?= $fetchgameData['game_developer_company']; ?></option>
                    <?php
                  }
                }
                    ?>
                      </select>

                    </div>

                      <br>

                    <div id="challengeAmountSection" class="form-inline" style="display:none">
                      <label class="mr-sm-3 mb-3 mb-lg-0" for="HowMuchforChallenge">Choose Challenge Amount?</label>
                      <select id="challengeAmount" name="challengeAmount" class="custom-select mr-sm-3 mb-3 mb-lg-0">
                        <option value="0" selected disabled>Choose an Amount</option>
                        <option value="50">₹50</option>
                        <option value="100">₹100</option>
                        <option value="150">₹150</option>
                        <option value="200">₹200</option>
                        <option value="250">₹250</option>
                        <option value="500">₹500</option>
                        <option value="1000">₹1000</option>
                      </select>
                    </div>

                    <br>

                    <center>  <button type="submit" class="btn btn-md u-btn-primary rounded-0" id="headonMatch">Challenge Now</button> </center>
                    <center>  <a href="#" class="btn btn-md u-btn-red rounded-0" id="addMoney">Add Money</a> </center>

                  </form>

          </div>
          <!-- End Quick Head On Match modal window -->

          <div class="col-lg-8 align-self-end">
            <div class="u-shadow-v40 g-brd-around g-brd-7 g-brd-white rounded">
              <img class="img-fluid rounded" src="<?php echo $baseURL;?>assets/img/bg/quick_match.png" alt="Image Description">
            </div>
          </div>
        </div>
      <!-- End Promo Block -->

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
            <span>Tournament Fixture</span>
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

            <!-- Projects & Activities Panels -->
            <div class="row g-mb-40">
              <div class="col-lg-6 g-mb-40 g-mb-0--lg">

                <!-- Latest Projects Panel -->
                <div class="card border-0">
                  <!-- Panel Header -->
                   <div class="container">
                    <div class="text-center g-mb-50">
                      <h2 class="h4">Tournament
                        <span class="g-color-primary g-ml-5">Fixture</span>
                      </h2>

                   <!-- Panel Body -->
                  <div class="js-scrollbar card-block u-info-v1-1 g-bg-white-gradient-v1--after g-height-500 g-pa-0" style="height: 800px;width: 500px;">


<!-- <iframe width="410" height="450" frameborder="0" src="http://www.gotbracket.com/view/dfb4be7f-1c3f-40f0-b500-5d14a815f961"></iframe>
 -->

<iframe width="550" height="600" frameborder="0" src="http://www.gotbracket.com/view/28e73a72-bdd3-43af-a825-796dcba734a2"></iframe>


<?php
    $team = array();
    $pars = array();

    $rows = "SELECT*FROM ` tournament_fixture_info` WHERE `tournament_join_userID`= $userID";
    foreach ($rows as $k => $item) {
        $team[$k+1] = $item['tournament_join_userID'];
    }

    $all_team = count($team);
    $k = $all_team/2;

    $days = range(7, 100, 2); // first halh of season
    $days2 = range(55, 100, 2); // second half

    // 1 tour
    for ($i=1; $i <= $k; $i++) {
        $pars[] = $days[0].'|'.$team[$i].'|'.$team[($all_team-$i+1)];
        $pars[] = $days2[0].'|'.$team[($all_team-$i+1)].'|'.$team[$i];
    }

    // Next tours
    for($i=2; $i<$all_team; $i++)
    {

        $team2 = $team[2];

        for($y=2;$y<$all_team;$y++)
        {
            $team[$y] = $team[$y+1];
        }
        $team[$all_team] = $team2;

        for($j=1;$j<=$k;$j++)
        {
            $pars[] = $days[$i - 1].'|'.$team[$j].'|'.$team[($all_team-$j+1)];
            $pars[] = $days2[$i - 1].'|'.$team[($all_team-$j+1)].'|'.$team[$j];
        }

    }
 ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</h5>
</h5>
</p>
</center>
</div>
</div>
</div>
</div>
</head>

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
</html>
