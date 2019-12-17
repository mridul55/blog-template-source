  <?php include_once "../lib/Database.php"?>
  <?php
  class Category {
    public $db;

    public function __construct(){
      $this->db = new Database();	
    }

    public function catadd($data){
      $name= $data['name'];

      if ($name =="") {
        echo "<span class='error'> Field must be empty! </span>";
      }  else {

        $query="INSERT INTO tbl_category (name) VALUES ('$name')";
        $inserted_rows=$this->db->insert($query);
        if ($inserted_rows) {
          echo "<span class='success'> Inserted Successfully</span>";
        } else {
          echo "<span class ='error'>  Not inserted ! </span>";
        }

      } 
    }



    public function catedit($id){
      $query = "SELECT * from
      tbl_category where id='$id'";
      $result = $this->db->select($query);
      return $result;
    }

    public function updatecat($name ,$id){
//die($name);
      $query = "UPDATE tbl_category set 
      name='$name'
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
