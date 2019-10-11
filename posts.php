<?php include 'inc/header.php';?>


<?php

if(!isset($_GET['c']) || $_GET['c'] ==NULL  ){
  header("Location:404.php");
} else {
  $id=$_GET['c'];
}

?>

<div class="contentsection contemplete clear">
  <div class="maincontent clear">
    <div class="about">
      <?php
      $query=" Select *from tbl_post where cat=$id";
      $post=$db->select($query);
      if($post){
        while($result=$post->fetch_assoc()){
         ?>
         <h2><?php echo $result['titel'];?></h2>

         <h4><?php echo $fm->formateDate($result['date']);?> By <a href="#"><?php echo $result['author'];?></a></h4>

         <img src="admin/<?php echo $result['image'];?>" alt="post image"/>

         <?php echo $fm->textShorten($result['body']);?>



         <div class="readmore clear">
           <a href="post.php?id=<?php echo $result['id'];?>"> Read More</a>

         </div>
        <?php } } else {  ?>
     
        <h3> No post Avilable in this category.</h3>
     
    <?php  } ?>

       </div>


  </div>

  <?php  include "inc/sidebar.php";?>
  <?php include "inc/footer.php";?>
