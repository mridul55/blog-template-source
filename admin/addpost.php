<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $title= $_POST['title'];
    $select= $_POST['select'];
    $body= $_POST['body'];
    $author= $_POST['author'];
    $tag= $_POST['tag'];
    

    $permited =array('jpg','jpeg','png','gif');
    $file_name=$_FILES['image']['name'];
    $file_size=$_FILES['image']['size'];
    $file_temp=$_FILES['image']['tmp_name'];

    $div=explode('.', $file_name);
    $file_ext=strtolower(end($div));
    $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
    $uploaded_image="upload/".$unique_image;

    if ($title =="" || $select =="" || $body == "" ||  $file_name == "" ||  $author == "" ||  $tag == "") {
        echo "<span class='error'> Field must be empty! </span>";
        } else if($file_size>1048567){
            echo "<span class=''error'> Image size should be less then 1MB!</span> ";
        } elseif (in_array($file_ext,$permited) === false){
        echo "<span class='error'>YOu can Uploaded only:-".implode(',',$permited)."</span>";
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query="INSERT INTO tbl_post(cat,titel,body,image,author,tags,date) VALUES ('$select','$title','$body','$uploaded_image','$author','$tag',now())";
            $inserted_rows=$db->insert($query);
            if ($inserted_rows) {
                echo "<span class='success'>Image Inserted Successfully</span>";
            } else {
                echo "<span class ='error'> Image Not inserted ! </span>";
            }

        }
}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="select">
                                     <?php
                                  $query="SELECT * from tbl_category";
                                  $post=$db->select($query);
                                   if($post){
                                 while($result=$post->fetch_assoc()){
                                    ?>
                                   
                                    <option value="<?php echo $result['id']; ?>"><?php echo $result['name'];?> </option>

                                   <?php } } ?>
                                    
                                </select>
                            </td>
                        </tr>
                   
                    
                       
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file"  name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" placeholder="Enter Author Name" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>TAG</label>
                            </td>
                            <td>
                                <input type="text" name="tag" placeholder="Enter TAG Name" class="medium" />
                            </td>
                        </tr>




						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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
