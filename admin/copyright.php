<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">

<div class="box round first grid">
<h2>Update Copyright Text</h2>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$_POST['name'];
    $name=mysqli_real_escape_string($db->link,$name);
         
    if (empty($name)) {
        echo "<span class='error'> Field must not be empty</span>";
    } else {
        $query="UPDATE tbl_footer set 
    name='$name' where id='1'";
    $result=$db->update($query);
    if ($result) {
        echo "Update succecfully";
    } else {
        echo " NOT Update succecfully";
    }

} 


}
?>

<div class="block copyblock">
<?php
$query="SELECT * from tbl_footer where id='1' ";
$data=$db->select($query);
if ($data) {
    while ($result=$data->fetch_assoc()) {
        
 
?>




<form action="" method="post">
<table class="form">					
<tr>
    <td>
        <input type="text" value="<?php echo $result['name'];?>" 
        name="name" class="large" />
    </td>
</tr>

 <tr> 
    <td>
        <input type="submit" name="submit" Value="Update" />
    </td>
</tr>
</table>
</form>
<?php } }?>
</div>
</div>
</div>

<?php include 'inc/footer.php';?>