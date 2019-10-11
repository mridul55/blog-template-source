<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<div class="grid_10">
<div class="box round first grid">
<h2>User List</h2>
<?php 
if (isset($_GET['delcat'])) {
     $delid=$_GET['delcat'];
     $delquery=" DELETE from tbl_user where id='$delid'";
     $deldata=$db->delete($delquery);

      if ($deldata) {
            echo "<span class='success'>  DELETED Successfuly</span>";
        } else {
             echo "<span class='error'> Not DELETED </span>";
        }

}
?>

<div class="block">        
<table class="data display datatable" id="example">
<thead>
<tr>
<th>Serial No.</th>
<th>Name</th>
<th>User Name</th>
<th>Email</th>
<th>Details</th>
<th>Roll</th>
<th>Action</th>
</tr>
</thead>
	<tbody>
	<?php
	$query="SELECT * from tbl_user order by id desc"; 
	$user=$db->select($query);
	if ($user) {
		$i=0;
		while ($result=$user->fetch_assoc()) {
			$i++; 
	?>	
	<tr class="odd gradeX">

		<td><?php echo $i; ?></td>
		<td><?php echo $result['name'];?></td>
		<td><?php echo $result['username'];?></td>
		<td><?php echo $result['email'];?></td>
<td><?php echo $fm->textShorten($result['details'],30);?></td>
		<td>
			<?php
			 if ($result['role'] == '0') {
			 	echo "Admin";
			 } elseif ($result['role'] == '1') {
			 	echo "Author";
			 }elseif ($result['role'] == '2') {
			 	echo "Editor";
			 }
			 ?>
			 </td>

		<td>
			<a href="viewuser.php?userid=<?php echo $result['id']; ?>" > View </a>  

<?php if (Session::get('userRole') == '0') { ?>
		||	<a onclick="return confirm('Are U sure to Delete!');" href="?delcat=<?php echo $result['id']; ?>" > Delete </a> 
		<?php }?>	
		</td>

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

