<?php
$url = explode('/',$_SERVER['REQUEST_URI']);

 ?>
<!-- Profile Sidebar -->
<div class="col-lg-3 g-mb-50 g-mb-0--lg">
  <!-- User Image -->
  <div class="u-block-hover g-pos-rel">
    <figure>
      <div id="loader" style="margin-top:50%;margin-left:25%;display:table;vertical-align:middle;position:absolute;z-index:999;display:none;">
        <img src="../../../assets/img/loaders/ajaxloader.gif" />
      </div>
      <img id ="profileImage" class="img-fluid w-100 u-block-hover__main--zoom-v1" src="../../../assets/img/profilePic/<?= !empty($selectUserInformations['user_profile_pic']) ? $selectUserInformations['user_profile_pic'] : 'user_default_avatar.png';?>" alt="<?= $selectUserInformations['user_fullname'];?>">
    </figure>

          <!-- Profile Action -->
              <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
                <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
                  <!-- Photo Change -->
                  <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">

                    <li class="list-inline-item align-middle g-mx-7">
                      <a class="u-icon-v1 u-icon-size--md g-color-white" href="javascript:void(0);" id="changePhoto" data-toggle="tooltip" title="Upload Photo">
                        <i class="icon-camera u-line-icon-pro"></i>
                      </a>
                      <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                        <input id="imageUpload" accept="image/*" type="file" name="profile_photo" placeholder="Photo" required="" capture hidden>
                        <input type="submit" value="Upload" class="submit" hidden/>
                    </form>
                    </li>
                  </ul>
                  <!-- End Photo Change -->
                </div>
              </figcaption>
              <!-- End Profile Action -->

    <!-- User Info -->
    <span class="g-pos-abs g-top-20 g-left-0">
      <a class="btn btn-sm u-btn-primary rounded-0 username" href="#!"><b><?= $selectUserInformations['user_fullname'];?></b></a>
      <small class="d-block g-bg-black g-color-white g-pa-5"><strong>Pro GAMER</strong></small>
    </span>
    <!-- End User Info -->

  </div>
  <!-- User Image -->

  <!-- Sidebar Navigation -->
  <div class="list-group list-group-border-0 g-mb-40">
      <!-- Overall -->
      <a href="userDashboard" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='userDashboard') ? 'active': 'nope' ?>">
          <span><i class="icon-home g-pos-rel g-top-1 g-mr-8"></i> My Dashboard Area</span>
      </a>
      <!-- End Overall -->

      <!-- Profile -->
      <a href="myProfile" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='myProfile') ? 'active': 'nope' ?>">
          <span><i class="icon-user g-pos-rel g-top-1 g-mr-8"></i> My Profile Informations</span>
      </a>
      <!-- End Profile -->

      <!-- Users Contacts -->
      <a href="gamePlatforms" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='gamePlatforms') ? 'active': 'nope' ?>">
          <span><i class="icon-game-controller g-pos-rel g-top-1 g-mr-8"></i> My Game Platforms</span>
      </a>
      <!-- End Users Contacts -->

      <!-- My Projects -->
      <a href="walletStatistics" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='walletStatistics') ? 'active': 'nope' ?>">
          <span><i class="icon-wallet g-pos-rel g-top-1 g-mr-8"></i> My Wallet Statistics</span>
      </a>
      <!-- End My Projects -->

      <!-- Comments -->
      <a href="allNotifications" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='allNotifications') ? 'active': 'nope' ?>">
          <span><i class="icon-bell g-pos-rel g-top-1 g-mr-8"></i> My Notifications Area</span>
          <span class="u-label g-font-size-11 g-bg-black g-rounded-20 g-px-8"><div id="notificationCounts"></div></span>
      </a>
      <!-- End Comments -->

      <!-- Reviews -->
      <a href="battleHistory" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='battleHistory') ? 'active': 'nope' ?>">
          <span><i class="icon-feed g-pos-rel g-top-1 g-mr-8"></i> My Battle History</span>
      </a>
      <!-- End Reviews -->

      <!-- History -->
      <a href="challengeRequests" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='challengeRequests') ? 'active': 'nope' ?>">
          <span><i class="icon-fire g-pos-rel g-top-1 g-mr-8"></i> My Challenge Requests</span>
      </a>
      <!-- End History -->

       <!-- Fixture -->
      <a href="fixture" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='fixture') ? 'active': 'nope' ?>">
          <span><i class="icon-game-controller g-pos-rel g-top-1 g-mr-8"></i> My Tournamnet Fixture</span>
      </a>
      <!-- End Fixture -->


      <!-- Settings -->
      <!-- <a href="#" class="list-group-item list-group-item-action justify-content-between <? echo ($url[5]=='myProfile') ? 'active': 'nope' ?>">
          <span><i class="icon-settings g-pos-rel g-top-1 g-mr-8"></i> Settings</span>
          <span class="u-label g-font-size-11 g-bg-red g-color-white g-rounded-20 g-px-8">3</span>
      </a> -->
      <!-- End Settings -->

      <!-- Logout -->
      <a href="../auth/controller/userLogout" class="list-group-item list-group-item-action justify-content-between">
          <span><i class="icon-power g-pos-rel g-top-1 g-mr-8"></i> Logout</span>
      </a>
      <!-- End Logout -->
  </div>
  <!-- End Sidebar Navigation -->

  <!-- Project progres area, Copy from template_project_area -->

</div>
<!-- End Profile Sidebar -->
