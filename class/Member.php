 

<?php include 'inc/header.php';?>
<?php 
class Member {
	public $db;
	
	public function __construct(){
		$this->db = new Database();	
	}

	public function memberinsert($name, $number, $email){
		/*$name = $data['name'];
        $number = $data['number'];
        $email = $data['email'];*/
        $query = "INSERT INTO tbl_member(name,number,email) values('$name','$number','$email')";
        $result = $this->db->insert($query);
        if ( $result) {
        	die("Member Add Successfuly");
        }else{
        	die("Member not Add Successfuly");
        }
	}

	 public function edit($id){
		$query = "SELECT * FROM tbl_category where id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function memberupdate($name, $number, $email,$id){
		$query = "UPDATE tbl_category set 
		name='$name',
		
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