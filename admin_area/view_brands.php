<table width="795" align="center" bgcolor="pink">

<tr align="center">
<td colspan="6"><h3>View All Brands</h3></td>
</tr>

<tr align="center" bgcolor="lightgreen">
<th> Brand ID </th>
<th> Brand Title </th>
<th> Edit</th>
<th> Delete</th>



</tr>
<?php
include("includes/db.php");

$get_brand = "select * from brands";

$run_brand =mysqli_query($con, $get_brand);
if(!$run_brand){
  die('invalid query:' . mysql_error());
}
$i = 0;
while ($row_brand = mysqli_fetch_array($run_brand)){
  $brand_id = $row_brand['brand_id'];
  $brand_title = $row_brand['brand_title'];

  $i++;
?>
<tr align="center">
  <td> <?php echo $i; ?></td>
  <td> <?php echo $brand_title ;?></td>

  <td> <a href="home.php?edit_brand=<?php echo $brand_id; ?>"> Edit </a></td>
  <td> <a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Delete </a></td>
</tr>
<?php } ?>
</table>
