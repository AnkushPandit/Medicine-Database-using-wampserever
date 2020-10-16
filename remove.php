<!DOCTYPE html>
<?php
/*header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
*/session_start();
include("connection.php");
error_reporting(0);
$temp =  $_SESSION['user'];
$email=$_SESSION['email'];
$pid=$_GET["pid"];

$query = "SELECT * FROM medicine WHERE id=$pid";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
$name=$result['name'];

if($temp == true)
{

}
else
{
  header('location:login.php');
}

//remove from cart
$remove="DELETE from cart WHERE email='$email' AND medicine=$pid";
if(mysqli_query($conn,$remove))
{
	echo "removed from cart successfully ";
}
else{
	echo "something went wrong, please try again ";
	
}