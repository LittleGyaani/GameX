<?php

//Hiding all errors and notices
error_reporting();

//Calling Database file for estanlishing connection for performing operations
include '../../../includes/config/dbConnectivity.php';

//Initializing session
session_start();

//Validating if the session exists or not
if(isset($_SESSION['userID'])){

    // echo 'Welcome User'.$_SESSION['userNAME'];
    $userID = $_SESSION['userID'];

    //Selecting all user information basing upon the user's session id
    $getAllUserDetails = $conn -> query("SELECT * FROM user_info ui JOIN user_wallet_info uw ON ui.user_id = uw.userID WHERE ui.user_id = '$userID'");
    $selectUserInformations = $getAllUserDetails -> fetch_assoc();
    $walletID = $selectUserInformations['walletID'];
    $walletBalance = $selectUserInformations['walletBalance'];

}else{

    echo 'You are not authorized to access the page without logging in.';
    header('Location:../auth/loginPage.php?redirectback=' . urlencode($_SERVER['REQUEST_URI']));

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>battlestation - Play the best of your life! | Wallet Statistics</title>

    <?php

      //Including Meta and Navigation
      include "../../../includes/common/template_header.php";

     ?>

    </header>
    <!-- End Header -->

    <!-- Promo Block -->

    <section class="g-bg-cover g-bg-pos-center g-bg-img-hero g-bg-bluegray-opacity-0_3--after g-py-150" style="background-image: url(https://i0.wp.com/www.celebsclothing.com/blog/wp-content/uploads/2016/10/League-of-Legends.jpg?fit=1920%2C1080&ssl=1);">
        <div class="container g-max-width-750 g-bg-cover__inner">
            <!-- Countdown v4 -->
            <div class="js-countdown text-center text-uppercase g-mb-40 g-mb-70--md" data-end-date="2018/01/01" data-month-format="%m" data-days-format="%D" data-hours-format="%H" data-minutes-format="%M" data-seconds-format="%S">
                <div class="d-inline-block g-color-white g-font-size-11 g-px-10 g-px-40--md g-py-10">
                    <div class="js-cd-days g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">12</div>
                    <span class="g-font-size-default">Days</span>
                </div>
                <div class="d-inline-block g-color-white g-font-size-11 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-40--md g-py-10">
                    <div class="js-cd-hours g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">01</div>
                    <span class="g-font-size-default">Hours</span>
                </div>
                <div class="d-inline-block g-color-white g-font-size-11 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-40--md g-py-10">
                    <div class="js-cd-minutes g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">52</div>
                    <span class="g-font-size-default">Minutes</span>
                </div>
                <div class="d-inline-block g-color-white g-font-size-11 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-40--md g-py-10">
                    <div class="js-cd-seconds g-font-size-20 g-font-size-45--md g-font-weight-700 g-line-height-1 g-mb-5">52</div>
                    <span class="g-font-size-default">Seconds</span>
                </div>
            </div>
            <!-- End Countdown v4 -->

            <h2 class="h2 g-color-white g-font-weight-700 g-font-size-40 g-font-size-55--md text-center text-uppercase g-mb-30 g-mb-70--md">The Next Game OPENS</h2>

            <div class="row g-mx-minus-5">
                <div class="col-md-4 g-px-5 g-mb-20 g-mb-0--md">
                    <div class="media">
                        <div class="d-flex align-self-center mr-3">
                            <i class="g-color-white-opacity-0_7 g-font-size-27 g-line-height-0_7 icon-education-124 u-line-icon-pro"></i>
                        </div>
                        <div class="media-body align-self-center g-color-white text-uppercase">
                            <span class="d-block g-color-white-opacity-0_7 g-font-size-default">When</span>
                            <span class="d-block text-uppercase g-font-weight-700 mb-0">18:30, 12 Jul, 2017</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 g-px-5 g-mb-20 g-mb-0--md">
                    <div class="media">
                        <div class="d-flex align-self-center mr-3">
                            <i class="g-color-white-opacity-0_7 g-font-size-27 g-line-height-0_7 icon-hotel-restaurant-235"></i>
                        </div>
                        <div class="media-body align-self-center g-color-white text-uppercase">
                            <span class="d-block g-color-white-opacity-0_7 g-font-size-default">Where</span>
                            <span class="d-block text-uppercase g-font-weight-700 mb-0">Concert Hall, Los Angeles, USA</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 text-md-right g-px-5">
                    <a class="btn btn-lg u-btn-white g-color-primary--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15" href="shortcode-blocks-promo-demo-11.html#!">Play Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Promo Block -->

    <!-- Breadcrumb -->
    <section class="g-my-30">
        <div class="container">
            <ul class="u-list-inline">
                <li class="list-inline-item g-mr-7">
                    <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Home</a>
                    <i class="fa fa-angle-right g-ml-7"></i>
                </li>
                <li class="list-inline-item g-mr-7">
                    <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pages</a>
                    <i class="fa fa-angle-right g-ml-7"></i>
                </li>
                <li class="list-inline-item g-color-primary">
                    <span>Profile Settings</span>
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

                <!-- Game Platform Area -->
                <div class="col-lg-9">
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-grey border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-credit-card g-pos-rel g-top-1 g-mr-5"></i> My Wallet Transaction Reports
                      </h3>
                  </div>

                  <!--Basic Table-->
                      <div class="table-responsive">
                        <table class="table table-bordered u-table--v2">
                          <div class="row" style="float:left; margin-left:2px;">
                            <div class="col-md-12">
                                  <a class="btn btn-block u-btn-cyan g-rounded-50 g-py-5" href="#MoneyAddModal" data-modal-target="#MoneyAddModal" data-modal-effect="blur"><i class="icon-plus g-mr-5"></i> Add Money</a>
                              </div>
                            </div>

                            <div class="row" style="float:left; margin-left:2px;">
                              <div class="col-md-12" style="float:right;">
                                <span class="btn btn-block u-btn-primary g-rounded-50 g-py-5">
                                <i class="icon-arrow-down-circle g-mr-5"></i> Withdraw Request
                              </span>
                            </div>
                          </div>

                          <div class="row" style="float:left; margin-left:2px;">
                            <div class="col-md-12">
                              <a class="btn btn-block u-btn-cyan g-rounded-50 g-py-5" href="#ReedemptionModal" data-modal-target="#ReedemptionModal" data-modal-effect="blur"><i class="icon-present g-mr-5"></i> Reedem Voucher</a>
                          </div>
                        </div>

                        <div class="row" style="float:left; margin-left:2px;">
                          <div class="col-md-12">
                            <span class="btn btn-block u-btn-purple g-rounded-50 g-py-5">
                            <i class="fa fa-exchange g-mr-5"></i> Money Transfer
                          </span>
                        </div>
                      </div>

                          <?php

                            $selectWalletInfo = "SELECT * FROM `user_wallet_transaction_info` WHERE `userID` = $userID";
                            $runselectWalletInfo = $conn -> query($selectWalletInfo);
                            if(($runselectWalletInfo -> num_rows) > 0){
                              ?>
                          <thead class="text-uppercase g-letter-spacing-1">
                            <tr>
                              <th class="g-font-weight-200 g-color-black">Wallet Tranx. ID</th>
                              <th class="g-font-weight-200 g-color-black">Remaining Balance (CWB-/+LUB)*</th>
                              <!-- <th class="g-font-weight-200 g-color-black">Wallet <br>Transaction <br>Type</th> -->
                              <th class="g-font-weight-200 g-color-black">Last Used Balance</th>
                              <th class="g-font-weight-200 g-color-black">Transaction Date & Time</th>
                              <th class="g-font-weight-200 g-color-black">Transaction Status</th>
                            </tr>
                          </thead>

                          <tbody>

                            <?php
                                  while ($userWalletDetails = $runselectWalletInfo -> fetch_assoc()){
                            ?>
                            <tr>

                              <td class="align-middle">
                                <h4 class="h6 g-mb-2"><b>BSTRANS-<?=$userWalletDetails['walletTransactionID']?></b></h4>
                              </td>

                              <td class="align-middle text-nowrap">
                                  <span>₹<b><?=$userWalletDetails['wallet_remaining_balance']?></b></span>
                              </td>

                              <!-- <td class="align-middle">
                                <span class="btn btn-block u-btn-primary g-rounded-50 g-py-5">
                                  <i class="icon-check g-mr-5"></i> <?=ucwords($userWalletDetails['useType']);?>
                                </span>
                              </td> -->

                              <td class="align-middle text-nowrap">
                                <span class="d-block g-mb-5">
                                  <?php
                                  if($userWalletDetails['useType'] == 'walletcredit' || $userWalletDetails['useType'] == 'wallettopup') {?>
                                  +₹<b><?=$userWalletDetails['lastUsedBalance']?></b>
                                  <?php
                                }else if($userWalletDetails['lastUsedBalance'] == 0){ ?>
                                  ₹<b>hi</b>
                                  <?php
                                }else {
                                  ?>
                                  -₹<b><?=$userWalletDetails['lastUsedBalance']?></b>
                                <?php
                              }
                                  ?>
                                </span>
                              </td>

                              <td class="align-middle text-nowrap">
                                <span class="d-block g-mb-5">
                                  <?=$userWalletDetails['date_time_stamp']?>
                                </span>

                              </td>

                              <td class="align-middle text-nowrap">
                                <span class="d-block g-mb-5">
                                  <?=ucfirst($userWalletDetails['transaction_status']);?>
                                </span>

                              </td>

                            </tr>

                            <?php  }
                             ?>

                           <br><br>
                            <strong><br><small>* CWB - Current Wallet Balance, LUB - Last Used Balance, TRANX. - Transaction</small></strong><br>
                            <h6>Your Current Wallet Balance is ₹<b><?= $selectUserInformations['walletBalance'];?></b> | Last Updated On : <?= $selectUserInformations['lastUpdate_date_time_stamp'];?></h6>
                            <?php


                            }else{

                              echo '</br></br><b>No transactions to show. Add some money to your wallet instead.</b>';
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <!--End Basic Table-->

                </div>

        </section>


            </div>
        </div>
    </section>

    <!-- Voucher Reedemption modal window -->
     <div id="ReedemptionModal" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
       <button type="button" class="close" onclick="Custombox.modal.close();">
         <i class="fa fa-close"></i>
       </button>
       <h4 class="g-mb-20">Reedem Voucher</h4>
       <p>
         <!-- Voucher Code Masking -->
         <div class="form-group g-mb-20">
           <label class="g-mb-10">Enter Voucher Code</label>
           <b class="tooltip tooltip-top-right u-tooltip--v1">Some helpful information</b>
           <div class="input-group g-brd-primary--focus">
             <input id="voucherCode" class="form-control form-control-md g-brd-right-none rounded-0" type="text" placeholder="BSV-XXX-XXX" data-mask="BSV-999-999">
             <div class="input-group-addon d-flex align-items-center g-color-gray-dark-v5 rounded-0">
               <i class="icon-credit-card"></i>
             </div>
           </div>
           <br>
           <button class="btn btn-md u-btn-outline-darkgray g-mr-10 g-mb-15" id="rdmvchr">Reedem</button>
         </div>
         <!-- End Vocuher Card Masking -->
       </p>
     </div>
     <!-- Voucher Reedemption Demo modal window -->

     <!-- Money Add modal window -->
      <div id="MoneyAddModal" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
        <button type="button" class="close" onclick="Custombox.modal.close();">
          <i class="fa fa-close"></i>
        </button>
        <h4 class="g-mb-20">Add Money to  Wallet</h4>
        <p>
          <!-- Voucher Code Masking -->
          <div class="form-group g-mb-20">
            <label class="g-mb-10">Enter Amount*</label>
            <b class="tooltip tooltip-top-right u-tooltip--v1">Some helpful information</b>
            <form method="post" action="../../../includes/integrations/wallets/paytm/pgRedirect.php">
            <div class="input-group g-brd-primary--focus">
              <input id="ORDER_ID" type="text" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo 'BSLAM' . date('dmYHi') . rand(10000,99999999); ?>" hidden>
               <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?= $userID; ?>" hidden>
               <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" hidden>
               <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" hidden>
               <input id ="WALLET_ID" tabindex="4" maxlength="12" size="12" name="WALLET_ID" autocomplete="off" value="<?= $walletID; ?>" hidden>
               <input id ="WALLET_MONEY" tabindex="4" maxlength="12" size="12" name="WALLET_MONEY" autocomplete="off" value="<?= $walletBalance; ?>" hidden>
               <input class="form-control form-control-md g-brd-right-none rounded-0" title="TXN_AMOUNT" min="50" max="9999" tabindex="10" type="text" name="TXN_AMOUNT" value="" id="moneyAmount" placeholder="₹1000" >
              <div class="input-group-addon d-flex align-items-center g-color-gray-dark-v5 rounded-0">
                <i class="icon-credit-card"></i>
              </div>
            </div>
            *Minimum Amount to add money to wallet is ₹50.</br></br>
            <center><input value="Add Money" type="submit"	onclick="" class="btn btn-md u-btn-outline-darkred g-mr-10 g-mb-15" id="addmny" name="ADDMONEY"></center>
            </form>
          </div>
          <!-- End Vocuher Card Masking -->
        </p>
      </div>
      <!-- Voucher Reedemption Demo modal window -->

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
