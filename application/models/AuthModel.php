<?php
class AuthModel extends CI_Model
{
public function __construct()
{
	parent::__construct();
	
}

//Save Register Data In DB
public function saveRegister($data_array)
{
	$this->db->insert("users",$data_array);
}


//Check User in DB

public function CheckUser($email)
{

$this->db->where('email',$email);
		$row=$this->db->get("users")->row_array();
		return $row;
}

//Authorize Method //

public function AuthorizeUser()
{
$user=$this->session->userdata('user');
if(!empty($user))
{
	return true;
}
else
{
	return false;
}
}

}
?>
