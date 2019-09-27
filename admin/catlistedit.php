<?php 
$path = realpath(dirname(__FILE__));
include $path.'/../class/Member.php';
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (isset($_GET['eid'])) {
	$id = $_GET['eid'];
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                      <?php 
      if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        
       $mb->memberupdate($name,$id);
        

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
						<tr class="odd grade">
                         <form action="" method="post">  <?php 
            		 $result = $mb->edit($id);
            		 if ($result) {
            		 	while ($data = $result->fetch_assoc()) {?>
                         
							
							<td><?php echo $result['name'];?></td>
							
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>

							 <?php } } else { echo "no value"; } ?>
							</form>
						</tr>
						 
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
        
<?php } include 'inc/footer.php';?>

