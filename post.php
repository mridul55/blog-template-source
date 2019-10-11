<?php include 'inc/header.php';?>

<?php
if(!isset($_GET['id']) || $_GET['id']==NULL ) {
	header("Location:404.php");
}  else {
	$id= $_GET['id'];
}

?>

<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<?php
			$query=" Select *from tbl_post where id=$id";
			$post=$db->select($query);
			if($post){
				while($result=$post->fetch_assoc()){
					?>
					<h2><?php echo $result['titel'];?></h2>

					<h4><?php echo $fm->formateDate($result['date']);?> By <a href="#"><?php echo $result['author'];?></a></h4>

					<img src="admin/<?php echo $result['image'];?>" alt="post image"/>

					<?php echo $result['body'];?>



					<div class="relatedpost clear">
						<h2>Related articles</h2>
						<?php
						$catid=$result['cat'];
						$queryrelated=" Select *from tbl_post where cat='$catid' order by rand() limit 6";
						$relatedpost=$db->select($queryrelated);
						if($relatedpost){
							while($relatedresult=$relatedpost->fetch_assoc()){
								?>

								<a href="post.php?id=<?php echo $result['id'];?>">
									<img src="admin/<?php echo $result['image'];?>" alt="post image"/>
								</a>

							<?php } } else { echo "No related post availa !!";} ?>
						</div>

					<?php } } else { header("Location:404.php"); } ?>
				</div>

			</div>


			<?php  include "inc/sidebar.php";?>
			<?php include "inc/footer.php";?>
