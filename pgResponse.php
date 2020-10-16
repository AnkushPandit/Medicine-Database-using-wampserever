
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

session_start();
include("connection.php");
error_reporting(0);

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure !</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
			if($paramName!= "MID" && $paramName!="CHECKSUMHASH" && $paramName!="RESPCODE")
			{
				echo "<br/>" . $paramName . " = " . $paramValue;
			}
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
$email=$_SESSION['email'];
//update transaction table
$bank=$_POST['BANKNAME'];
$total_amount=$_POST['TXNAMOUNT'];
$date=$_POST['TXNDATE'];
$banktxnid=$_POST['BANKTXNID'];
$payment_mode=$_POST['PAYMENTMODE'];
$insert="INSERT INTO transaction (bank, total_amount, date, banktxnid, payment_mode, email) VALUES ('$bank','$total_amount','$date','$banktxnid','$payment_mode','$email')";
mysqli_query($conn, $insert);

//once the transactionis complete the cart must be empty

$query="DELETE FROM cart WHERE email='$email'";
mysqli_query($conn, $query);

?>
<html>
<body style="background-color:powderblue;">

<p>Click the button to print the current page (Print this as your Bill)</p>

<button onclick="myFunction()">PRINT</button>

<script>
function myFunction() {
  window.print();
}
</script>
<br><a class="button" href="userHome.php" >HOME</a>
</body>
</html>