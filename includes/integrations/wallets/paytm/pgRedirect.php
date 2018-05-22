<?php

//Calling the DB File
include '../../../../includes/config/dbConnectivity.php';

//Declaring default Date and Time Zone for Stamps
date_default_timezone_set('Asia/Kolkata');

//Current Date and Time
$CURRENT_DTSTAMP = date("d-m-Y H:i");

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();
$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$WALLET_ID = $_POST['WALLET_ID'];
$WALLET_MONEY = $_POST['WALLET_MONEY'];
// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$paramList["CALLBACK_URL"] = "http://localhost/gamex/includes/integrations/wallets/paytm/pgResponse.php";
/*$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //
*/
//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

if(isset($_POST['ADDMONEY'])){

		//Generate ORDER ID
		$pushOrderDetails = $conn -> query("INSERT INTO `user_wallet_transaction_info`(`user_order_id`, `userID`, `user_wallet_id`, `lastUsedBalance`, `wallet_remaining_balance`, `useType`, `transaction_id`, `transaction_source`, `transaction_status`, `date_time_stamp`) VALUES ('$ORDER_ID',$CUST_ID,$WALLET_ID,0,$WALLET_MONEY,'wallettopup','','paytm','initiated','$CURRENT_DTSTAMP')");

}
?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
