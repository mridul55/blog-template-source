<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?//php include '../class/Post.php';
//$pt = new Post();
?>
<?php


?>
<div class="grid_10">

<div class="box round first grid">
<h2>View Contact Message</h2>

<div class="block">               
<form action="" method="post" enctype="multipart/form-data">
<table class="form">
<?php 
if (isset($_GET['viewid'])) {
  $msgid=$_GET['viewid'];
  $query="SELECT * from tbl_contact where id='$msgid'";
  $result=$db->select($query);
  $data=$result->fetch_assoc();
}
?>
<tr>
<td>
    <label>Name</label>
</td>
<td>
    <input type="text" readonly="" name="titel" value="<?php echo $data['firstname'].' '.$data['lastname']; ?>" class="medium" />
</td>
</tr>

<tr>
<td>
    <label>Email</label>
</td>
<td>
    <input type="text" readonly="" name="titel" value="<?php echo $data['email']; ?>" class="medium" />
</td>
</tr>


<tr>
<td style="vertical-align: top; padding-top: 9px;">
    <label>Content</label>
</td>
<td>
    <textarea readonly="" class="tinymce" name="body">
        <?php echo $data['message']; ?>
    </textarea>
</td>
</tr>

</table>
</form>
</div>
</div>
</div>



<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
setupTinyMCE();
setDatePicker('date-picker');
$('input[type="checkbox"]').fancybutton();
$('input[type="radio"]').fancybutton();
});
</script>

<?php include 'inc/footer.php';?>
