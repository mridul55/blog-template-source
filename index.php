
<?php
/*$path = realpath(dirname(__FILE__));

include_once $path.'/helpers/Format.php';*/

?>
 


<?php include 'inc/header.php';?>
<?php include "inc/slider.php";?>

<?php
$per_page=4;
if (isset($_GET["page"])) {
	$page=$_GET["page"];
}  else {
	$page=1;
}
$start_form=($page-1)*$per_page;
?>


  
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
	  <?php
        $query="Select * from tbl_post limit $start_form,$per_page";
          $post=$db->select($query);
          if($post){
         while($result=$post->fetch_assoc()){
		?>

			<div class="samepost clear"> 

	<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['titel'];?></a></h2>

    <h4><?php echo $fm->formateDate($result['date']);?> By <a href="#"><?php echo $result['author'];?></a></h4>

	<a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
	
	<?php echo $fm->textShorten($result['body']);?>

			
		<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>
<?php }?> 	

<!--pagination -->
<?php 
$query="SELECT * from tbl_post";
$result=$db->select($query);
$total_rows=mysqli_num_rows($result);
$total_pages = ceil($total_rows/$per_page);?>
<div class="item1">
<?php 
echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";

for($i=1; $i<=$total_pages; $i++){
echo "<span class='pagination'><a href='index.php?page=".$i."'>".$i."</a></span>";
}

 echo  "<span class='pagination'><a href='index.php?page=$total_pages'>".'Last Page'."</a></span>";?>
</div>
<?php  } else { header("Location:404.php"); } 
	
?>			
	

		</div>
		<?php  include "inc/sidebar.php";?>
	   <?php include "inc/footer.php";?>
