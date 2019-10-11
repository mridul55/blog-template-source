<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
  $userid = Session::get('userId');
  $userrole = Session::get('userRole');
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
    $username=$_POST['username'];
    $email=$_POST['email'];
    $details=$_POST['details'];
$name=mysqli_real_escape_string($db->link,$name);
$username=mysqli_real_escape_string($db->link,$username);
$email=mysqli_real_escape_string($db->link,$email);
$details=mysqli_real_escape_string($db->link,$details);

$checckemail=$fm->checkemail('tbl_user',$email);

         
    if (empty($name)) {
        echo "<span class='error'> Field must not be empty</span>";
    } 
    if ($checckemail) {
    echo "<span class='error'> Email All Ready Exits </span>";
    } 
    else {
        $query="UPDATE tbl_user
        SET 
        name='$name',
        username='$username',
        email='$email',
        details='$details'
        where id='$userid'";
        $updated_row=$db->update($query);
        if ($updated_row) {
            echo "<span class='success'> Data Updated Successfuly</span>";
        } else {
             echo "<span class='error'> Data Not Updated </span>";
        }

    }
}

?>
	<?php
	   $query="SELECT * from tbl_user where id='$userid' AND role='$userrole' ";
	   $getuser=$db->select($query);
       if ($getuser) {
           
	   while ($result=$getuser->fetch_assoc()) {
	   
	?>


  <form action="" method="POST">
    <table class="form">
    <tr> 
        <td>Name</td>
        <td>
    <input type="text" name="name" 
  value="<?php echo $result['name']?>" class="medium" />
        </td>
    </tr>
   <tr> 
       <td>User Name</td>
       <td>
   <input type="text" name="username" 
 value="<?php echo $result['username']?>" class="medium" />
       </td>
   </tr>
     <tr> 
         <td>email</td>
         <td>
     <input type="text" name="email" 
   value="<?php echo $result['email']?>" class="medium" />
         </td>
     </tr>
   <tr> 
           <td>Details</td>
           <td>
       <input type="text" name="details" 
     value="<?php echo $result['details']?>" class="medium" />
           </td>
       </tr>

    <tr>
        <td>
        <input type="submit" name="submit" value="Update" />
        </td>
    </tr>
            
        </table>
    </form>
<?php } } ?>
    
 </div>
</div>
</div>
