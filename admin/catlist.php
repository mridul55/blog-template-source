﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<div class="grid_10">
<div class="box round first grid">
<h2>Category List</h2>
<?php 
if (isset($_GET['delcat'])) {
     $delid=$_GET['delcat'];
     $delquery=" DELETE from tbl_category where id='$delid'";
     $deldata=$db->delete($delquery);

      if ($deldata) {
            echo "<span class='success'> Category DELETED Successfuly</span>";
        } else {
             echo "<span class='error'> Category Not DELETED </span>";
        }

}
?>

<div class="block">        
<table class="data display datatable" id="example">
<thead>
<tr>
<th>Serial No.</th>
<th>Category Name</th>
<th>Action</th>
</tr>
</thead>
	<tbody>
	<?php
	$query="SELECT * from tbl_category order by id desc"; 
	$category=$db->select($query);
	if ($category) {
		$i=0;
		while ($result=$category->fetch_assoc()) {
			$i++; 
	?>	
	<tr class="odd gradeX">
		<td><?php echo $i; ?></td>
		<td><?php echo $result['name'];?></td>
		<td><a href="catlistedit.php?catid=<?php echo $result['id']; ?>" > Edit </a> || 

			<a onclick="return confirm('Are U sure to Delete!');" href="?delcat=<?php echo $result['id']; ?>" > Delete </a> </td>

	</tr>


	<?php } }?> 
	</tbody>
</table>
</div>

</div>
</div>
<script type="text/javascript">

$(document).ready(function () {
setupLeftMenu();

$('.datatable').dataTable();
setSidebarHeight();


});
</script>

<?php include 'inc/footer.php';?>

