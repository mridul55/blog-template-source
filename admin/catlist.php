<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
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
						<tr class="odd grade">

							<?php
							$query=" Select *from tbl_category";
							$post=$db->select($query);
							if($post){
								while($result=$post->fetch_assoc()){
									?>
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="catlistedit.php?eid=<?php echo $result['id']; ?>">Edit</a> 

							|| <a href="">Delete</a></td>
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

