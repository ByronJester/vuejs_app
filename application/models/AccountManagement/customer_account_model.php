<?php
/**
|	Page Name 			:  Admin Login Model
|	Author   				:  Byron Jester Malvar Manalo
|	Created by   		:	 Byron Jester Malvar Manalo
|	DAte Created   	:	 April 24, 2019
|	Last Updated 		:  April 24, 2019
|	Last update by  :  Byron Jester Malvar Manalo 
*/
defined('BASEPATH') OR exit('No ');
class customer_account_model extends CI_Model {

	#Check if Username Already Exist
	public function checkUsername($un){
		$sql = "SELECT username FROM customer_tbl WHERE username = ?";
		$q 	 = $this->db->query($sql, [$un]);

		if($q){
			return $q->row_array();
		}else{
			return false;
		}
	}

	#Check if Email Already Exist 
	public function checkEmail($em){
		$sql = "SELECT email FROM customer_tbl WHERE email = ?";
		$q 	 = $this->db->query($sql, [$em]);

		if($q){
			return $q->row_array();
		}else{
			return false;
		}
	}
	

	#Create Customer Account
	public function createAccount($un, $pw, $em, $ph, $fn, $md, $ln, $img){
		$sql = "INSERT INTO customer_tbl (username, password, email, phone, first_name, middle_name, last_name, profile_img) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)"; 
		$q 	 = $this->db->query($sql, [$un, $pw, $em, $ph, $fn, $md, $ln, $img]);

		if($q){
			return true;
		}else{
			return false;
		}
	}

	#Login Account
	public function loginAccount($username, $password){
		$sql	= "SELECT user_id FROM customer_tbl WHERE username = ? AND password = ?";
		$q 		= $this->db->query($sql, [$username, $password]);

		if($q){
			return $q->row_array();
		}else{
			return false;
		}
	}

}