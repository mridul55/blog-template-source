<div class="slidersection templete clear">
        <div id="slider">

        <?php 

        $query="SELECT * from tbl_slider order by id desc"; 
      $category=$db->select($query);
      if ($category) {
       $i=0;
       while ($result=$category->fetch_assoc()) {
        $i++; 
        ?>

            <a href="#"><img src="admin/<?php echo $result['image'];
            ?>" alt="<?php echo $result['title'];
            ?>" title="<?php echo $result['title'];
            ?>" /></a>

       <?php } }?>     
            
        </div>

        </div>
