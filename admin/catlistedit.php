<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if (!isset($_GET['catid']) || ($_GET['catid']) == NULL ) {
  echo "<script> window.location='catlist.php'; </script>";
} else{
  $id=$_GET['catid'];
}
?>


<div class="grid_10" >
  <div class="box round first grid">
    <h2>
      ADD New Category
    </h2>
    <div class="block copyblock"> 
      <?php 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        $name=$_POST['name'];
        $name=mysqli_real_escape_string($db->link,$name);

        if (empty($name)) {
          echo "<span class='error'> Field must not be empty</span>";
        } else {
          $query="UPDATE tbl_category
                  SET 
                 name='$name' where id='$id';  ";
          $updated_row=$db->update($query);
          if ($updated_row) {
            echo "<span class='success'> Category Updated Successfuly</span>";
          } else {
           echo "<span class='error'> Category Not Updated </span>";
         }

       }
     }
     ?>
     <?php
     $query="SELECT * from tbl_category where id='$id' order by id desc";
     $category=$db->select($query);
     while ($result=$category->fetch_assoc()) {

      ?>


      <form action="" method="POST">
        <table class="form">
          <tr>
            <td>
              <input type="text" name="name" 
              value="<?php echo $result['name']?>" class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="submit" value="Save" />
            </td>
          </tr>

        </table>
      </form>
    <?php }?>

  </div>
</div>
</div>
