<?php

//Declaring all required header parameters
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
header("refresh:3; url=http://localhost/gamex/portal/web/userProfile/walletStatistics");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

//Declaring default Date and Time Zone for Stamps
date_default_timezone_set('Asia/Kolkata');

//Calling the DB File
include '../../../../includes/config/dbConnectivity.php';

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
$now = date("d-m-Y H:i");

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

		// print_r($_POST);
		$ORDER_ID = $_POST['ORDERID'];
		$TRANSACTION_ID = $_POST['TXNID'];
		$getAllInfo = $conn -> query ("SELECT * FROM `user_wallet_transaction_info` uwti JOIN user_wallet_info uwi ON uwi.`walletID` = uwti.`user_wallet_id` JOIN `user_info` ui ON ui.`user_id` = uwi.`userID` WHERE uwti.`user_order_id` = '$ORDER_ID'");
		$fetchAllInfo = $getAllInfo -> fetch_assoc();
		$walletBalance = $fetchAllInfo['wallet_remaining_balance'];
		$lastUsedBalance = $fetchAllInfo['lastUsedBalance'];
		$walletID = $fetchAllInfo['walletID'];
		$userID = $fetchAllInfo['user_id'];
		// print_r($fetchAllInfo);
		// foreach ($fetchAllInfo as $key => $value) {
    //
		// 	echo '</br>' . $key. '=' . $value;
    //
		// }

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.

		if($ORDER_ID == $fetchAllInfo['user_order_id']){

			//checking if transaction status is completed or not
			if($fetchAllInfo['transaction_status'] != 'completed'){

				echo "<center><img src='http://localhost/GameX/assets/img/loaders/tick-loader.gif'";
				echo "</br></br><b>Transaction is successful. Taking you back to Wallet.</center></b>" . "<br/>";

				//Update Transaction Info
				$pushTransactionDetail = $conn -> query ("UPDATE `user_wallet_transaction_info` SET `transaction_status` = 'completed', `date_time_stamp`='$now', `transaction_id` = '$TRANSACTION_ID', `wallet_remaining_balance`=$walletBalance+$lastUsedBalance WHERE `user_order_id` = '$ORDER_ID'");

				//Update the wallet balance of current user against current user id
				$updateWalletBalance = $conn -> query ("UPDATE `user_wallet_info` SET `walletBalance`=$walletBalance+$lastUsedBalance,`lastUpdate_date_time_stamp`='$now' WHERE `walletID` = $walletID");

				//Insert into user Activity History
				$insertUserActivity = $conn -> query("INSERT INTO `user_activity_history`(`user_id`, `user_last_action`, `user_activity_DTStamp`) VALUES ($userID,'wallet topup completed','$now')");

				//Insert Notification Record for User
				$insertUserNotification = $conn -> query("INSERT INTO `user_notification_record`(`userID`, `sentuserID`, `notification_title`, `notification_message`, `notification_status`, `notification_type`, `notification_sent_by`, `notification_sent_DTStamp`) VALUES ($userID,0,'Money added successfully.','Thank you for adding money to wallet. Please check wallet for more detailed information.',0,'wallettopup','admin','$now')");

			}else{

					// echo 'You cannot use this page again.';
					echo '<script>window.location.href="http://localhost/gamex/portal/web/userProfile/walletStatistics"';
					echo '</script>';
			}

		}else{

				echo "ORDER ID mismatched. Please re-initiate the transaction.";

		}

	}else {

		echo "<b>Transaction status is failure</b>" . "<br/>";

	}
	// if (isset($_POST) && count($_POST)>0 )
	// {
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }

}else {

	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
	// header('Location:'.PAYTM_TXN_URL);
}
?>
