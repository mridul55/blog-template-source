<?php
$path=realpath(dirname(__FILE__));
include_once $path.'/../lib/Database.php';
include_once $path.'/../helpers/Format.php';
 class Contact {
 	public $db;
    public $fm;
 	function __construct(){
 		$this->db = new Database();
 		$this->fm = new Format();

 	}

 	public function messagesave($data){

       $firstname = $this->fm->validation($data['firstname']);
       $lastname  = $this->fm->validation($data['lastname']);
       $email     = $this->fm->validation($data['email']);
       $message   = $this->fm->validation($data['message']);

       $firstname = mysqli_real_escape_string($this->db->link, $data['firstname']);
       $lastname  = mysqli_real_escape_string($this->db->link, $data['lastname']);
       $email     = mysqli_real_escape_string($this->db->link, $data['email']);
       $message   = mysqli_real_escape_string($this->db->link, $data['message']);

       if (empty($firstname) or empty($lastname) or empty($email) or empty($message)) {
       	$msg="<span style='color:red;font-size:20px;'>Field must not be empty</span>";
       	return $msg;
       } else {
       	$query="INSERT into tbl_contact(firstname,lastname,email,message) values ('$firstname','$lastname','$email','$message')";
       	$result=$this->db->insert($query);
       	if ($result) {
       		$msg="<span style='color:green;font-size:20px;'>Message sent Succesfully</span>";
       	return $msg;
       	}
       }

 	}
 	public function msgsend($data){
 	   $to_email = $this->fm->validation($data['to_email']);
       $from_email  = $this->fm->validation($data['from_email']);
       $subject     = $this->fm->validation($data['subject']);
       $body   = $this->fm->validation($data['body']);

       $to_email = mysqli_real_escape_string($this->db->link, $data['to_email']);
       $from_email  = mysqli_real_escape_string($this->db->link, $data['from_email']);
       $subject     = mysqli_real_escape_string($this->db->link, $data['subject']);
       $body   = mysqli_real_escape_string($this->db->link, $data['body']);
       $sendmail=mail($to_email, $subject, $body, $from_email);
       if ($sendmail) {
       	$msg="<span style='color:green;font-size:20px;'>Message sent Succesfully</span>";
       	return $msg;
       } else {
       	$msg="<span style='color:red;font-size:20px;'>Message not sent Succesfully</span>";
       	return $msg;
       }

 	}
 }
?>