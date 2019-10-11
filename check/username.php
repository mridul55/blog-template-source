<?php 
include'../lib/Database.php';
$db = new Database();
?> 
<?php

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$query="SELECT 	username from tbl_user where username='$username'";
	$data = $db->select($query);
	if ($data) {
		echo "Match";
	}else{
		echo " <span style='color:red'>Not  Match</span>";
	}
}
	
?>