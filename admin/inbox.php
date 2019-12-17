<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Inbox</h2>

  <?php
    if (isset($_GET['sendid'])) {
     $sendid=$_GET['sendid'];
     $query="UPDATE tbl_contact
             SET status='1' where id='$sendid';";
     $updated_row=$db->update($query);
     if ($updated_row) {
      echo "<span class='success'> Message Sent In The Seen Box </span>";
    } else {
     echo "<span class='error'> Somethig Wrong </span>";
   }
 }
 ?>
 <div class="block">        
  <table class="data display datatable" id="example">
    <thead>
      <tr>
        <th width="10%">S.No.</th>
        <th width="15%">Name</th>
        <th width="20%">email</th>
        <th width="40%">Message</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $query="SELECT * From tbl_contact where status='0'";
      $result=$db->select($query);
      if ($result) {
        $i=0;
        while ($data=$result->fetch_assoc()) { $i++ ?>
          <tr class="odd gradeX" style="text-align: center;">
            <td><?php echo $i; ?></td>
            <td><?php echo $data['firstname'].' '.$data['lastname']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $fm->textShorten($data['message'],50); ?></td>

            <td>
              <a href="msgview.php?viewid=<?php echo $data['id']; ?>">View</a> || 
              <a href="msgreply.php?replyid=<?php echo $data['id']; ?>">Reply</a>
              || <a onclick="return confirm('Are you sure to Move');"  href="?sendid=<?php echo $data['id'];?>">Seen</a>
            </td>
          </tr>
        <?php } } ?>   
      </tbody>
    </table>
  </div>
</div>


<div class="box round first grid">
  <h2> seen Message</h2>
  <?php
  if (isset($_GET['unsendid'])) {
   $unsendid=$_GET['unsendid'];
   $query="UPDATE tbl_contact
   SET 
   status='0'
   where id='$unsendid';
   ";
   $updated_row=$db->update($query);
   if ($updated_row) {
    echo "<span class='success'> Message Sent In The UNSeen Box </span>";
  } else {
   echo "<span class='error'> Somethig Wrong </span>";
 }
}
?>

<?php 
if (isset($_GET['delid'])) {
 $delid=$_GET['delid'];
 $delquery=" DELETE from tbl_contact where id='$delid'";
 $deldata=$db->delete($delquery);

 if ($deldata) {
  echo "<span class='success'> Message DELETED Successfuly</span>";
} else {
 echo "<span class='error'> Message Not DELETED </span>";
}

}
?>
<div class="block">
  <table class="data display datatable" id="example">
    <thead>
      <tr>
       <th width="10%">S.No.</th>
       <th width="15%">Name</th>
       <th width="20%">email</th>
       <th width="40%">Message</th>
       <th width="15%">Action</th>
     </tr>
   </thead>
   <tbody>
    <?php 
    $query="SELECT * From tbl_contact where status='1'";
    $result=$db->select($query);
    if ($result) {
     $i=0;
     while ($data=$result->fetch_assoc()) { $i++ ?>
      <tr class="odd gradeX" style="text-align: center;">
       <td><?php echo $i; ?></td>
       <td><?php echo $data['firstname'].' '.$data['lastname']; ?></td>
       <td><?php echo $data['email']; ?></td>
       <td><?php echo $fm->textShorten($data['message'],50); ?></td>

       <td>

        <a href="msgview.php?viewid=<?php echo $data['id']; ?>">View</a> || 
        <a onclick="return confirm('Are you sure Delete!');" href="?delid=<?php echo $data['id']; ?>">Delete</a>

        || <a onclick="return confirm('Are you sure to Move');" href="?unsendid=<?php echo $data['id'];?>">Unseen</a>
      </td>
    </tr>
  <?php } } ?>
</tbody>
</table>

</div>

</div>




</div>

<script type="text/javascript">

  $(document).ready(function () {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();


  });
</script> 
<?php include 'inc/footer.php';?>
