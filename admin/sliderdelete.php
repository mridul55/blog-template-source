<?//php include'../lib/Database.php';?> 

<?//php include'../config/config.php';?> 
<?php include'../lib/Database.php';?> 
<?php include'../helpers/Format.php';?> 

<?php
$db = new Database();

?>

<?php
if (!isset($_GET['delsliderid']) || ($_GET['delsliderid']) == NULL ) {
  echo "<script> window.location='sliderlist.php'; </script>";

} else{
  $id=$_GET['delsliderid'];
  $query="SELECT * from tbl_slider where id='$id'";
  $getData=$db->select($query);
  if ($getData) {
         $delimg = $getData->fetch_assoc();
         $dellink=$delimg['image'];
         if (file_exists($dellink)) {
            unlink($dellink);
    }
  }

  $delquery= "DELETE from tbl_slider where id='$id'";
   $delData=$db->delete($delquery);
   if ($delData) {
    //die($delData);
    echo "<script>alert('Data Deleted successfully.');</script>";
    echo "<script>window.location ='sliderlist.php' ;</script>";
   } else {
      echo "<script>alert('Data Not Deleted.');</script>";
    echo "<script>window.location ='sliderlist.php' ;</script>";
   }

}


?>
