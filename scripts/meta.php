<?php
if (isset($_GET['pageid'])) {
$pagetitle=$_GET['pageid'];

$query="SELECT * from add_page where id='$pagetitle'";

$pages=$db->select($query);
if ($pages) {
while ($result=$pages->fetch_assoc()) {

} }


}
?>
<?php 
if (isset($_GET['pageid'])) {
$id=$_GET['pageid'];
$query="SELECT * from add_page where id='$id'";
$pages=$db->select($query);
if ($pages) {
while ($result=$pages->fetch_assoc()) { ?>


<title><?php echo $result['name']; ?>-<?php echo TITLE; ?></title>
<?php } } } elseif(isset($_GET['id'])) {
$id=$_GET['id'];
$query="SELECT * from tbl_post where id='$id'";
$pages=$db->select($query);
if ($pages) {
while ($result=$pages->fetch_assoc()) { ?>
<title><?php echo $result['titel']; ?>-<?php echo TITLE; ?></title>


<?php } } } else { ?>
<title><?php echo $fm->title(); ?>-<?php echo TITLE; ?></title>
<?php } ?>
<meta name="language" content="English">
<meta name="description" content="It is a website about education">
<?php
if (isset($_GET['id'])) {
   
}
?>
<meta name="keywords" content="blog,cms blog">
<meta name="author" content="Delowar">
