<?php include'../lib/Session.php';
Session::init();
?> 

<?//php include'../config/config.php';?>
<?php include'../lib/Database.php';?> 
<?php include'../helpers/Format.php';?> 

<?php
$db = new Database();
$fm = new Format();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
  <section id="content">
      <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
          $email=$fm->validation($_POST['email']);
          $email=mysqli_real_escape_string($db->link,$email);

          $result=$fm->checkemail("tbl_user",$email);
          if ($result) {
              $newpassword = substr($email, 0,4);
              $rand = rand(10000, 99999);
              $password = "$newpassword$rand";
              $to = $email;
              $subject = "Update Password";
              $from = "From Send:midul9650@gmail.com";
              $message="Your login password update in this time. Are sure change you password?
              your paassword is:$password";
              $send = mail($to, $subject, $message, $from);
              if($send){
                $password = md5($password);
                $query = "UPDATE tbl_user SET password='$password' where email='$email'";
                 $data = $db->update($query);
                header("Location:login.php");
              }else{
                echo " <span style='color:red;font-size:18px;'>Password change successfuly !! .</span>";
              }

               
            } else {
              echo " <span style='color:red;font-size:18px;'>Email Not found !! .</span>";
              }
            }
      ?>
    <form action="" method="post">
      <h1>Admin Login</h1>
      <div>
        <input type="email" placeholder="Email Address" id="email" required="" name="email" />
        <div id="success"></div>
      </div>
      <div>
        <input type="submit" name="submit" value="Send" />
      </div>
    </form><!-- form -->
    <div class="button">
      <a href="login.php">Try Login</a>
    </div><!-- button -->
  </section><!-- content -->
</div><!-- container -->
</body>
</html>
