 <?php include_once "../lib/Database.php"?>
<?php 

class Post{
	public $db;
	public function __construct(){
		$this->db = new Database();
	}

	public function postadd($data, $file){
		$title= $data['title'];
		$select= $data['select'];
		$body= $data['body'];
		$author= $data['author'];
		$tag= $data['tag'];
		

		$permited =array('jpg','jpeg','png','gif');
		$file_name=$file['image']['name'];
		$file_size=$file['image']['size'];
		$file_temp=$file['image']['tmp_name'];

		$div=explode('.', $file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_image="upload/".$unique_image;

		if ($title =="" || $select =="" || $body == "" ||  $file_name == "" ||  $author == "" ||  $tag == "") {
		    echo "<span class='error'> Field must be empty! </span>";
		    } else if($file_size>1048567){
		        echo "<span class=''error'> Image size should be less then 1MB!</span> ";
		    } elseif (in_array($file_ext,$permited) === false){
		    echo "<span class='error'>YOu can Uploaded only:-".implode(',',$permited)."</span>";
		    } else {
		        move_uploaded_file($file_temp, $uploaded_image);
		        $query="INSERT INTO tbl_post(cat,titel,body,image,author,tags,date) VALUES ('$select','$title','$body','$uploaded_image','$author','$tag',now())";
		        $inserted_rows=$this->db->insert($query);
		        if ($inserted_rows) {
		            echo "<span class='success'>Image Inserted Successfully</span>";
		        } else {
		            echo "<span class ='error'> Image Not inserted ! </span>";
		        }

		    }
	}

	public function postedit($id){
		$query = "SELECT * from tbl_post where id='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updatepost($cat ,$id){
		//die($cat);
		$query = "UPDATE tbl_post set 
		cat='$cat'
		where id = '$id'";
		$result = $this->db->update($query);
		if ($result) {
			die("Update Successfuly");
		}else{
			die("Update not Successfuly");
		}
	}

	public function memberdel($delid){
		$query ="DELETE FROM tbl_member where id='$delid'";
		$result = $this->db->delete($query);
	}
}
?>