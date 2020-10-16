<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
session_start();
include("connection.php");
error_reporting(0);
$temp = $_SESSION['user'];
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>
<body>
<div class="container">
  <div class="content">
	  <h1>Bill Desk</h1>
  <title>Customer Check Out Page</title>
</head>
<body style="background-color:powderblue;">
	<h2>Merchant Check Out Page </h2>
	
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php" >
		<table align="center" bottom="130" width="600" border="1" >
			<tbody>
				<tr>
					<th>Serial No.</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="30" size="30"
						name="ORDER_ID" autocomplete="off" readonly
						value="<?php echo  $email . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUST NAME ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" readonly autocomplete="off" value="<?php echo $temp?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT" readonly
						value="<?php echo $_POST["total_amount"]?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
  </div>
</div>

</body>
</html>
