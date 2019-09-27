<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Post List</h2>
            <div class="block">  
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Category ID</th>
						<th>Post Title</th>
						<th>Image</th>
						<th>Author</th>
						<th>TAGS</th>
						<th>E/D option</th>
						
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<?php
							$query=" Select *from tbl_post";
							$post=$db->select($query);
							if($post){
								while($result=$post->fetch_assoc()){
									?>
						<td><?php echo $result['cat'];?></td>
						<td><?php echo $result['titel'];?></td>

						<td><?php echo $result['body'],10;?></td>

						<td><?php echo $result['image'];?></td>
						<td><?php echo $result['author'];?></td>
						<td><?php echo $result['tags'];?></td>
						<td><a href="">Edit</a> || <a href="">Delete</a></td>
					</tr>
                     <?php } } else { echo "no value"; } ?>
					
					
					
					
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

