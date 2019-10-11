<?php
$path=dirname(realpath(__FILE__));
include_once $path.'/../lib/Database.php';

class Format
{
	public $db;
	function __construct()
	{
		$this->db=new Database();
	}
	public function formateDate($date){
      return date('F j,Y,g:i a',strtotime($date));
	} 

	public function textShorten($text, $limit = 400){
		$text = $text." ";
		$text = substr($text,0,$limit);
		$text = substr($text, 0, strrpos($text," "));
		$text=$text.".....";
		return $text;


	}

	public function validation($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	public function title(){
       $data=$_SERVER['SCRIPT_FILENAME'];
       $data=basename($data, '.php');
       $data = ucfirst($data);
      if ($data == 'Index') {
      	return "Home";
      }else{
      	return $data;
      }
	}

  public function checkemail($table,$email){
 $query="SELECT * from $table";
     $result=$this->db->select($query);
     if ($result) {
       while ($data=$result->fetch_assoc()) {
         $checkemail=$data['email'];
         if ($checkemail==$email) {
           return $checkemail;
         }
       }
     }
     else {
      return false;
    }
  }
}
?>
