<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php if (!Session::get('userRole') == '0') {
 echo "<script> window.location='index.php'; </script>";
}
 ?>



<div class="grid_10" >
<div class="box round first grid">
    <h2>
    ADD New Category
    </h2>
    <div class="block copyblock"> 
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $username=$_POST['username'];
     $password=$_POST['password'];
      $role=$_POST['role'];
      //die($role);

    $username=mysqli_real_escape_string($db->link,$username);
    $password=mysqli_real_escape_string($db->link,$password);
    $role=mysqli_real_escape_string($db->link,$role);
         
    if (empty($username) || empty($password) || $role=='') {
        echo "<span class='error'> Field must not be empty</span>";
    } else {
        $password=md5($password);
        $query="INSERT into  tbl_user(username,password,role) VALUES ('$username','$password','$role')";
        $roleinsert=$db->insert($query);
        if ($roleinsert) {
            echo "<span class='success'> Role Add Successfuly</span>";
        } else {
             echo "<span class='error'> Role  Not   Insertd </span>";
        }

    }
}
?>


    <form action="" method="POST">
        <table class="form">
            <tr>
                <td>
                    <input type="text" autocomplete="off" requred="1" name="username" placeholder="Enter User name.." class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" required="1" autocomplete="off" name="password" placeholder="Enter password.." class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <select name="role">
                        <option value=""> Please Select one</option>
                        <option value="0"> Admin </option>
                        <option value="1"> Editor </option>
                        <option value="2"> Author </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Save" />
                </td>
            </tr>
            
        </table>
    </form>
    
 </div>
</div>
</div>
