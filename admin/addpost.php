<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/Post.php';
    $pt = new Post();
?>
<?php
 
if ($_SERVER['REQUEST_METHOD']=='POST') {
   $pt->postadd($_POST, $_FILES);
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
