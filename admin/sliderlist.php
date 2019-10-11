<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?//php include '../helpers/Format.php';?>


<div class="grid_10">
  <div class="box round first grid">
    <h2>Slider List</h2>
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
        <th width="15%">Slider Titel</th>
        <th width="10%">Slider Image</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query="SELECT * from tbl_slider order by id desc"; 
      $category=$db->select($query);
      if ($category) {
       $i=0;
       while ($result=$category->fetch_assoc()) {
        $i++; 
        ?>  
        <?//php if (Session::get('userId')==$result['userid']) { ?>
          <tr class="odd gradeX">

           <td><?php echo $i; ?></td>

           <td><?php echo $result['title'];?></td>
           
           <td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>
           

           <td>

            || <a href="slideredit.php?slidereditid=<?php
            echo $result['id']; ?>" > Edit </a> || 

            <a onclick="return confirm('Are U sure to Delete!');" 
            href="sliderdelete.php?delsliderid=<?php echo $result['id']; ?>" > Delete </a>




          </td>

        </tr>
      <?//php  } ?>


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

