<?php 
	$path= dirname(realpath(__FILE__));
	include $path.'/../lib/Database.php';
	include $path.'/../helpers/Format.php';
	$db = new Database();
	$fm = new Format();
?>
<!DOCTYPE html>
<html>   
<head>
	<?php include 'scripts/meta.php';?>
	<?php include 'scripts/css.php';?>
	<?php include 'scripts/js.php';?>
</head>

<body>

<div class="headersection templete clear">
<a href="index.php">
	<div class="logo">
		<?php
		$query="SELECT * from  title_slogan where id='1'";
		$result=$db->select($query);
		if ($result) {
			$data=$result->fetch_assoc();


			?>
			<img src="admin/<?php echo $data['logo'];?>" alt="Logo"/>
			<h2><?php echo $data['title'];?></h2>
			<p><?php echo $data['slogan'];?></p>
		<?php }?>
	</div>
</a>
<div class="social clear">
	<div class="icon clear">
		<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
		<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
		<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
		<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
	</div>
	<div class="searchbtn clear">
		<form action="search.php" method="GET">
			<input type="text" name="search" placeholder="Search keyword..."/>
			<input type="submit" name="submit" value="Search"/>
		</form>
	</div>
</div>
</div>
<div class="navsection templete">
<ul>
	<li><a  <?php if ($fm->title()=='Home') {
		echo 'id="active"';
	}?> href="index.php">Home</a></li>
	<?php
	$sql="SELECT * from add_page";

	$pages=$db->select($sql);
	if ($pages) {
		while ($result=$pages->fetch_assoc()) {

			?>

			<li><a <?php 
			if (isset($_GET['pageid']) && $_GET['pageid']==$result['id']) {
				echo 'id="active"';
			}
			?> href="about.php?pageid=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
		<?php } }?>	
		<li><a <?php if ($fm->title()=='Contact') {
			echo 'id="active"';
		}?> href="contact.php">Contact</a></li>
	</ul>
</div>
