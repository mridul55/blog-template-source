<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
.leftside{float: left;width: 70%}
.rightside{float: left;width: 10%}  
.rightside img{height:160px;width:160px;}  
</style>
<div class="grid_10">
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $title=$_POST['title'];
    $slogan=$_POST['slogan'];
    

        $permited =array('jpg','jpeg','png','gif');
        $file_name=$_FILES['logo']['name'];
        $file_size=$_FILES['logo']['size'];
        $file_temp=$_FILES['logo']['tmp_name'];

        $div=explode('.', $file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image="upload/".$unique_image;

        if ($file_name) {
            move_uploaded_file($file_temp, $uploaded_image);
           $query="UPDATE title_slogan set 
            title='$title',
            slogan='$slogan',
            logo='$uploaded_image' where id='1'";
            $result=$db->update($query);
            if ($result) {
                echo "Update succecfully";
            } else {
                echo " NOT Update succecfully";
            }

        } else {
           $query="UPDATE title_slogan set 
            title='$title',
            slogan='$slogan' 
            where id='1'";
             $result=$db->update($query);
            if ($result) {
                echo "Update succecfully";
            } else {
                echo " NOT Update succecfully";
            }
        }





}
?>
<div class="box round first grid">
<h2>Update Site Title and Description</h2>
<?php
$query="SELECT * from title_slogan where id='1'";

$blog_title=$db->select($query);
if ($blog_title) {
   while ($result=$blog_title->fetch_assoc()) {
       
?>
<div class="block sloginblock">

<div class="leftside">
            
<form action="" method="post" enctype="multipart/form-data">
<table class="form">					
<tr>
    <td>
        <label>Website Title</label>
    </td>
    <td>
        <input type="text" value="<?php echo $result['title'];?>"  name="title" class="medium" />
    </td>
</tr>
 <tr>
    <td>
        <label>Website Slogan</label>
    </td>
    <td>
        <input type="text" value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
    </td>
</tr>


<tr>
<td>
    <label>Upload Logo</label>
</td>
<td>
    <input type="file"  name="logo" />
</td>
</tr>
 

 <tr>
    <td>
    </td>
    <td>
        <input type="submit" name="submit" Value="Update" />
    </td>
</tr>
</table>
</form>
</div>

        <div class="rightside">
            <img src="<?php echo $result['logo'];?>" 
            alt="logo"/>
            
        </div>
</div>

<?php } }?> 
</div>
</div>

<?php include 'inc/footer.php';?>