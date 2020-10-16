<!DOCTYPE html>
<?php
session_start();
include("connection.php");
error_reporting(0);
$temp = $_SESSION['user'];
$email=$_SESSION['email'];
$query = "SELECT name,price FROM medicine WHERE id in(SELECT medicine from cart WHERE email='$email')";
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
		?>Total <?php echo $total?> items found<br><br><br>
		
		<table border="1">
		<tbody>
		<tr>
		<th>S.No</th>
        <th>Medicine</th>
        <th>Price</th>
		<th>      </th>
		<th>Quantity</th>
		<th>      </th>
		</tr>
		<?php
		$var=0;
		while($result = mysqli_fetch_assoc($data)){
			$var=$var+1;?>
			<tr>
            <td><?php echo $var?></td>
            <td><?php echo $result['name']?></td>
            <td><label id="value<?php echo $var?>"><?php echo $result['price']?></label></td>
			<td><button onclick="getElementById('price<?php echo $var?>').value = parseInt(getElementById('price<?php echo $var?>').value,10)+1;totalValue()">+</button></td>
			<td><input type="number" id="price<?php echo $var?>" value=0>
			<td><button onclick="getElementById('price<?php echo $var?>').value =
						parseInt(getElementById('price<?php echo $var?>').value,10)-1>0 ? parseInt(getElementById('price<?php echo $var?>').value,10)-1 : 0;
						totalValue()">-</button></td>
			</tr>
			<?php
		}?>
		</tbody>
	</table><br>
		<form method="post" action="TxnTest.php">
		Total Amount: <input id="total_amount" type="number" name="total_amount" value=0 readonly><br><br>
		<input value="Go to payment" type="submit">
		
	</form>
	<script>
		function totalValue()
		{
			document.getElementById("total_amount").value =0
			<?php
			$var2=0;
			while($var>$var2)
			{
				$var2=$var2+1;
				?>
				document.getElementById("total_amount").value = parseInt(document.getElementById("total_amount").value,10)+parseInt(document.getElementById("price<?php echo $var2?>").value,10)*parseInt(document.getElementById("value<?php echo $var2?>").innerHTML,10);
				<?php
			}?>
			
		}
	</script>
	<br><br>
	<form method="post" action="clear.php">
    <button type="submit">Clear Cart</button>
	</form>
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
