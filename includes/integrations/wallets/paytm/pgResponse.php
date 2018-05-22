<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

//Calling the DB File
include '../../../../includes/config/dbConnectivity.php';

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		// print_r($_POST);
		echo $ORDER_ID = $_POST['ORDERID'];
		echo "</br>";
		$getAllInfo = $conn -> query ("SELECT * FROM `user_wallet_transaction_info` uwti JOIN user_wallet_info uwi ON uwi.`walletID` = uwti.`user_wallet_id` JOIN `user_info` ui ON ui.`user_id` = uwi.`userID` WHERE uwti.`user_order_id` = '$ORDER_ID'");
		$fetchAllInfo = $getAllInfo -> fetch_assoc();
		print_r($fetchAllInfo);
		$pushTransactionDetail = $conn -> query ("UPDATE `user_wallet_transaction_info` SET ``");
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}
	// if (isset($_POST) && count($_POST)>0 )
	// {
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
	// header('Location:'.PAYTM_TXN_URL);
}
?>
