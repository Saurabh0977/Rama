<?php 
class Model_users extends CI_Model
{

	public function __construct()
	{

	}

	public function get_user($username)
  	{
    
    $query = $this->db->query("SELECT * FROM  `users` WHERE `USERNAME` = '$username' ");
    return $query->result();

 	} 

	function create_user($name,$uname,$hash,$phone,$salt,$usertype)
	{
	
		$query = $this->db->query("INSERT INTO `users` ( NAME,USERNAME,PASSWORD,PHONE_NUMBER,SALT,TYPE) VALUES ('$name','$uname','$hash','$phone','$salt','$usertype')");
	}
	function add_money($amount,$amount_r,$amount_at,$sdate,$bal,$usertype,$createdby)
	{
		$query = $this->db->query("INSERT INTO `money` ( AMOUNT , AMOUNT_RECEIVED , AMOUNT_AT ,DATE_M , BALANCE , UID ,CREATED_BY) VALUES ('$amount' , '$amount_r' , '$amount_at' ,'$sdate' , '$bal' , '$usertype' ,'$createdby') "); 
	}

	function add_expense($amount,$edate,$usertype,$desc,$createdby)
	{
		$query = $this->db->query("INSERT INTO `expenses` ( AMOUNT , DATE_E , UID , DESCRIPTION , CREATED_BY) VALUES ('$amount' , '$edate' , '$usertype' ,  '$desc' , '$createdby') ");
	}

	function get_users_list()
	{
		$query = $this->db->query("SELECT * FROM `users`");
		return $query->result();
	}

	function get_money_list()
	{
		$query = $this->db->query("SELECT * FROM `money` ORDER BY ID DESC");
		return $query->result();
	}

	function get_money_list_for_operator($id)
	{
		$query = $this->db->query("SELECT * FROM `money` WHERE UID = '$id' ORDER BY ID DESC");
		return $query->result();
	}

	function get_expenses_list()
	{
		$query = $this->db->query("SELECT * FROM `expenses` ");
		return $query->result();
	}

	function get_expenses_list_for_operator($id)
	{
		$query = $this->db->query("SELECT * FROM `expenses` WHERE UID = '$id' ORDER BY ID DESC");
		return $query->result();
	}

	function get_operator_name()
	{
		$query = $this->db->query("SELECT * FROM `users` WHERE TYPE = '2'");
		return $query->result();
	}

	function fetch_operator_name_by_id($uid)
	{
		$query = $this->db->query("SELECT * FROM `users` WHERE ID='$uid'");
		$result =  $query->result();
		return $result[0]->NAME;
	}

	function get_user_details_by_id($id)
	{
		$query = $this->db->query("SELECT * FROM `users` WHERE ID = '$id'");
		$result =  $query->result();
		return $result[0];	
	}

	function update_user($id,$name,$uname,$hash,$phone,$salt,$usertype)
	{
		$query = $this->db->query("UPDATE `users` SET NAME = '$name' , USERNAME = '$uname' , PASSWORD = '$hash' , PHONE_NUMBER = '$phone' , SALT = '$salt' , TYPE = '$usertype' WHERE ID = '$id'") ; 
	}

	public function logout_user()
	{
		$this->load->library('session');
		$this->session->set_userdata('is_logged_in',FALSE);
		
  }

  	public function delete_user_by_id($id)
  	{
  		$this->db->query("UPDATE `users` SET STATUS = '0' WHERE ID = '$id'");
  		header('location:/rama/Users/users_list');
  	}

 

	public function update_moneytable_balance($id,$required_balance)
	{
		$query = $this->db->query("UPDATE `money` SET BALANCE = '$required_balance' WHERE UID = '$id'");
	}

	function subtract_from_balance($id, $required_balance) {
		$query = $this->db->query("UPDATE `money` SET BAlANCE = BALANCE - '$required_balance' WHERE ID = '$id'");
	}

	function empty_balance_for_row($id) {
		$query = $this->db->query("UPDATE `money` SET BAlANCE = 0 WHERE ID = '$id'");	
	}

	function update_current_qty_to_users($usertype,$current_qty)
	{
		$query = $this->db->query("UPDATE `users` SET CURRENT_QTY = CURRENT_QTY + '$current_qty' WHERE ID = '$usertype'");
	}
	function get_current_balance_from_user($usertype)
	{
		$query = $this->db->query("SELECT * FROM `users` WHERE ID='$usertype'");
		$result =  $query->result();
		return $result[0]->CURRENT_QTY;
	}

	function subtract_current_balance($usertype, $amount) {
		$query = $this->db->query("UPDATE `users` SET CURRENT_QTY = CURRENT_QTY - '$amount' WHERE ID = '$usertype'");
	}

	function getall_operators() {
		$query = $this->db->query("SELECT * FROM `users` WHERE TYPE=2 ORDER BY NAME ASC");
		return $query->result();
	}
	public function get_operator_details_from_expense($id,$fdate,$tdate)
	{
		$query = $this->db->query("SELECT * FROM `expenses` WHERE UID = '$id' AND CREATED_AT <= '$tdate' AND CREATED_AT >= '$fdate' ");

		return $query->result();
	}

	function activate_user_by_id($id)
	{
		$this->db->query("UPDATE `users` SET STATUS = '1' WHERE ID = '$id'");
  		header('location:/rama/Users/users_list');	
	}
	function fetch_username_by_ajax($val)
	{
		$query = $this->db->query("SELECT * FROM `users` WHERE USERNAME = '$val' ");
		return $query->result();
	}
	function fetch_mobile_number_by_ajax($number)
	{
		
		$query = $this->db->query("SELECT * FROM `users` WHERE PHONE_NUMBER = '$number' AND STATUS = '1' ");
		return $query->result();

	}

}