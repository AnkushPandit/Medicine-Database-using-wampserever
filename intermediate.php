<!DOCTYPE html>
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
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
$price=$result['price'];

if($temp == true)
{

}
else
{
  header('location:login.php');
}

//check if in cart already
$check="SELECT * FROM cart WHERE email='$email' AND medicine=$pid";
if(mysqli_num_rows(mysqli_query($conn, $check)))
{
	echo "Already in cart ";
}
else{
 
	$insert="INSERT INTO cart (email, medicine) VALUES ('$email',$pid)";
	if(mysqli_query($conn,$insert))
	{
		echo "added into cart successfully ";
	}
	else{
		echo "something went wrong, please try again ";
		
	}
  }
  ?>
  
  <form method="post" action="remove.php?pid=<?php echo $pid; ?>">
    <button type="submit">Remove from Cart</button>
</form>