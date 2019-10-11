<?//php include'../lib/Database.php';?> 

<?//php include'../config/config.php';?> 
<?php include'../lib/Database.php';?> 
<?php include'../helpers/Format.php';?> 

<?php
$db = new Database();

?>

<?php
if (!isset($_GET['delpage']) || ($_GET['delpage']) == NULL ) {
	echo "<script> window.location='postlist.php'; </script>";

} else{
	$pageid=$_GET['delpage'];

	

  $delquery= "DELETE from add_page where id='$pageid'";
   $delData=$db->delete($delquery);
   if ($delData) {
   	//die($delData);
   	echo "<script>alert('Data Deleted successfully.');</script>";
   	echo "<script>window.location ='index.php' ;</script>";
   } else {
   		echo "<script>alert('Data Not Deleted.');</script>";
   	echo "<script>window.location ='index.php' ;</script>";
   }

}


?>
