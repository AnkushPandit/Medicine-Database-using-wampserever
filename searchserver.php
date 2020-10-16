<!DOCTYPE html>
<?php
session_start();
include("connection.php");
error_reporting(0);
$value = $_GET['search'];
if($value == NULL)
{
    echo "Please enter something in the search bar.";
}
else
{
$query = "SELECT * FROM medicine WHERE name LIKE '{$value}%' OR company LIKE '{$value}%' OR category LIKE '{$value}%' OR sub LIKE '{$value}%'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);


if($total)
{
    ?>
<table>
    <tr>
        <th>Name</th>
        <th>Company</th>
        <th>Category</th>
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

}

?>
</table>
