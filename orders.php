<!DOCTYPE html>
<?php
session_start();
include("connection.php");
error_reporting(0);
$temp = $_SESSION['user'];
$email=$_SESSION['email'];
$query = "SELECT * FROM transaction WHERE  email='$email'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
if($temp == true)
{

}
else
{
  header('location:login.php');
}
?>
<html>
  <head>
    <title></title>
  </head>
  <body style="background-color:powderblue;"><center>
    <br>
	<h1 font="verdana" size=150><?php echo $temp?>'s cart</h1>
	<?php
	if($total)
	{
		?>Total <?php echo $total?> records found<br><br><br>
		
		<table border="1">
		<tbody>
		<tr>
		<th>S.No</th>
        <th>Date</th>
        <th>Amount</th>
		<th>      </th>
		</tr>
		<?php
		$var=0;
		while($result = mysqli_fetch_assoc($data)){
			$var=$var+1;?>
			<form method="post" action="details.php?pid=<?php echo $result["id"]; ?>">
			<tr>
            <td><?php echo $var?></td>
            <td><?php echo substr($result['date'],0,10)?></td>
            <td><label ><?php echo $result['total_amount']?></label></td>
			<td><input type="submit" value="Details"></td>
			</tr>
			</form>
			<?php
		}?>
		</tbody>
	</table><br>
		
	<?php
	}
	else{
		echo "No record found\n\n";?>
		<br><br><?php
	}
	?>
	<br>
	<a class="button" href="userHome.php" >HOME</a>
  </center></body>
</html>
