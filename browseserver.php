<?php
include("connection.php");
error_reporting(0);
$value = $_GET['temp'];
$query = "SELECT * FROM medicine WHERE category LIKE '{$value}'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total)
{
    ?>
<table>
    <tr>
        <th>Name</th>
        <th>Company</th>
        <th>Sub Category</th>
		<th></th>
    </tr>


    <?php
    echo $total." records found."."<br/>";
    while ($result = mysqli_fetch_assoc($data)) {
        # code...
        ?>
		<form method="post" action="intermediate.php?pid=<?php echo $result["id"]; ?>">
			<tr>
            <td><?php echo $result['name']?></td>
            <td><?php echo $result['company']?></td>
            <td><?php echo $result['category']?></td>
            <td><?php echo $result['sub']?></td>
			<td><input type="submit" value="AddToCart"></td>
			</tr>
		</form>
		<?php 
    }

}
else
{
    echo "No record found";
}
?>
</table>