<!DOCTYPE html>
<?php
session_start();
include("connection.php");
error_reporting(0);
$temp =  $_SESSION['user'];
$email=$_SESSION['email'];
if($temp == true)
{

}
else
{
  header('location:login.php');
}

$query="DELETE FROM cart WHERE email='$email'";
mysqli_query($conn, $query);
/*
if( mysqli_query($conn, $query))
{?>
	alert('cart has been cleared');
	<?php
}*/
?>
<html>
  <head>
    <meta http-equiv="refresh" content="0.5; url='cart.php'" />
  </head>
  <body style="background-color:powderblue;">
  </body>
</html>
