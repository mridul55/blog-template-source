<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
   if (!isset($_GET['userid']) || ($_GET['userid']) == NULL ) {
  echo "<script> window.location='viewuser.php'; </script>";
  
} else{
  $id=$_GET['userid'];
}
?>
<div class="grid_10" >
<div class="box round first grid">
    <h2>
    View User
    </h2>
    <div class="block copyblock"> 
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
echo "<script> window.location='userlist.php'; </script>";
 
}
?>
	<?php
	   $query="SELECT * from tbl_user where id='$id'  ";
	   $getuser=$db->select($query);
       if ($getuser) {
           
	   while ($result=$getuser->fetch_assoc()) {
	   
	?>


  <form action="" method="POST">
    <table class="form">
    <tr> 
        <td>Name</td>
        <td>
    <input type="text" readonly 
  value="<?php echo $result['name']?>" class="medium" />
        </td>
    </tr>
   <tr> 
       <td>User Name</td>
       <td>
   <input type="text" readonly 
 value="<?php echo $result['username']?>" class="medium" />
       </td>
   </tr>
     <tr> 
         <td>email</td>
         <td>
     <input type="text" readonly 
   value="<?php echo $result['email']?>" class="medium" />
         </td>
     </tr>
   <tr> 
           <td>Details</td>
           <td>
       <input type="text" readonly 
     value="<?php echo $result['details']?>" class="medium" />
           </td>
       </tr>

    <tr>
        <td>
        <input type="submit" name="submit" value="OK" />
        </td>
    </tr>
            
        </table>
    </form>
<?php } } ?>
    
 </div>
</div>
</div>
