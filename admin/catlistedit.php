
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$path = realpath(dirname(__FILE__));
	include $path.'/../class/Category.php';
	$ct = new Category();
?>
<?php
if (isset($_GET['eid'])) {
	$id = $_GET['eid'];
	?>
	<div class="grid_10">
		<div class="box round first grid">
			<h2>Category List</h2>

					<?php 
					if (isset($_POST['submit'])) {
						$name = $_POST['name'];
						$ct->updatecat($name,$id);
					}
					?>	
					<form action="" method="post"> 
						<?php 
						$result = $ct->catedit($id);
						if ($result) {
							while ($data = $result->fetch_assoc()) {?>
						<input type="text" value="<?php echo $data['name'];?>" name="name">
						<?php } } ?>
						<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
					</form>
					</div>
				</div>
	<?php } ?>
	<script type="text/javascript">

		$(document).ready(function () {
			setupLeftMenu();

			$('.datatable').dataTable();
			setSidebarHeight();


		});
	</script>
	<?php  include 'inc/footer.php';?>

