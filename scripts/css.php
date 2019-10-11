
<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">  
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
 <?php 
  $query="SELECT * from tbl_theme where id='1' order by id desc";
  $data=$db->select($query);
      while ($result=$data->fetch_assoc()) {
          if ($result['name']=='default') { ?>
           <link rel="stylesheet" href="theme/default.css">

      <?php } elseif ($result['name']=='green') { ?>  
           <link rel="stylesheet" href="theme/green.css">
         <?php } ?>     
       
        <?php } ?>  





<!-- //deault Theme --> 


