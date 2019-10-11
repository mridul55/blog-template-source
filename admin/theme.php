<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<div class="grid_10" >
<div class="box round first grid">
    <h2>
    ADD New 
    </h2>
    <div class="block copyblock">

        <?php 
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $name=mysqli_real_escape_string($db->link,$_POST['name']);

                $query="UPDATE tbl_theme
                SET 
                name='$name'
                where id='1';
                ";
                $updated_row=$db->update($query);
                if ($updated_row) {
                    echo "<span class='success'> Theme Updated Successfuly</span>";
                } else {
                   echo "<span class='error'> Theme Not Updated </span>";
               }

           }
       
       ?>

  <?php 
  $query="SELECT * from tbl_theme where id='1' order by id desc";
  $data=$db->select($query);
  if ($data) {
      while ($result=$data->fetch_assoc()) {
          

  ?>     
    <form action="" method="POST">
        <table class="form">
            <tr>
                <td>
                   <input <?php if ($result['name']=='default') {
                       echo "Checked";
                   }?> 
                   type="radio" name="name" value="default" /> Default
                </td>
            </tr>
            <tr>
                <td>
                   <input <?php if ($result['name']=='green') {
                       echo "Checked";
                   }?> 
                    type="radio" name="name" value="green" /> Green
                </td>
            </tr>
            <tr>
                <td>
                   <input  <?php if ($result['name']=='red') {
                       echo "Checked";
                   }?> 
                    type="radio" name="name" value="red" /> Red
                </td>
            </tr>
           
            <tr>
                <td>
                   <input type="submit" name="submit" value="Save" /> 
                </td>
            </tr>

        </table>
    </form> 
<?php } }?>
 </div>
</div>
</div>
