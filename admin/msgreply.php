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

<?php 
        include_once '../class/Contact.php';
        $ct = new Contact();
        if ($_SERVER['REQUEST_METHOD']=='POST') {
          $result=$ct->msgsend($_POST);
          if ($result) {
            echo $result;
          }
        }?>

<div class="block">     
<?php 
if (isset($_GET['replyid'])) {
  $replyid=$_GET['replyid'];
  $query="SELECT * from tbl_contact where id='$replyid'";
  $result=$db->select($query);
  $data=$result->fetch_assoc();
}
?>          
<form action="" method="post" enctype="multipart/form-data">
<table class="form">

<tr>
<td>
    <label>Email To</label>
</td>
<td>
    <input type="email" readonly="" name="to_email" value="<?php echo $data['email'];?>" class="medium" />
</td>
</tr>

<tr>
<td>
    <label>Email From</label>
</td>
<td>
    <input type="email"  name="from_email" value="" class="medium" />
</td>
</tr>

<tr>
<td>
    <label>Subject</label>
</td>
<td>
    <input type="text" name="subject" value="" class="medium" />
</td>
</tr>


<tr>
<td style="vertical-align: top; padding-top: 9px;">
    <label>Content</label>
</td>
<td>
    <textarea readonly="" class="tinymce" name="body">
        
    </textarea>
</td>
</tr>

<tr>
<td></td>
<td>
    <input type="submit" name="submit" Value="Send" />
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
