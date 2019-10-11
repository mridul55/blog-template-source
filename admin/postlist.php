<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?//php include '../helpers/Format.php';?>


<div class="grid_10">
<div class="box round first grid">
<h2>Category List</h2>
<?php
/*if (isset($_GET['delcat'])) {
$delid=$_GET['delcat'];
$delquery=" DELETE from tbl_category where id='$delid'";
$deldata=$db->delete($delquery);

if ($deldata) {
echo "<span class='success'> Category DELETED Successfuly</span>";
} else {
 echo "<span class='error'> Category Not DELETED </span>";
}

}*/
?>

<div class="block">        
<table class="data display datatable" id="example">
<thead> 
<tr>
  <th width="5%">No.</th>

  <th width="15%">Titel</th>
  <th width="15%">Body</th>
  <th width="10%">Category</th>
  <th width="10%">Image</th>
  <th width="10%">Author</th>
  <th width="10%">Tags</th>
  <th width="10%">Date</th>
  <th width="15%">Action</th>
</tr>
</thead>
<tbody>
<?php
$query="SELECT * from tbl_post order by id desc"; 
$category=$db->select($query);
if ($category) {
 $i=0;
 while ($result=$category->fetch_assoc()) {
  $i++; 
  ?>	
  <?php if (Session::get('userId')==$result['userid']) { ?>
  <tr class="odd gradeX">

   <td><?php echo $i; ?></td>

   <td><?php echo $result['titel'];?></td>
   <td><?php echo $fm->textShorten($result['body'],50);?></td>
   <td><?php echo $result['cat'];?></td>
   <td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>
   <td><?php echo $result['author'];?></td>
   <td><?php echo $result['tags'];?></td>
   <td><?php echo $result['date'];?></td>




   <td>

<a href="viewpost.php?viewpostid=<?php 
echo $result['id']; ?>" > View </a>
  
    
   || <a href="postedit.php?editpostid=<?php
     echo $result['id']; ?>" > Edit </a> || 

    <a onclick="return confirm('Are U sure to Delete!');" 
        href="deletepost.php?delpostid=<?php echo $result['id']; ?>" > Delete </a>




 </td>

  </tr>
   <?php  } ?>


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

