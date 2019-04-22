<?php
/**
|	Page Name 			:  Admin Login Model
|	Author   				:  Byron Jester Malvar Manalo
|	Created by   		:	 Byron Jester Malvar Manalo
|	DAte Created   	:	 April 12, 2019
|	Last Updated 		:  April 13, 2019
|	Last update by  :  Byron Jester Malvar Manalo 
*/
defined('BASEPATH') OR exit('No ');
class user_profile_model extends CI_Model {

	#Login Account
	public function loginAccount($un, $pw){
		$sql = "SELECT * FROM users_tbl WHERE username = ? AND password = ?";
		$q 	 = $this->db->query($sql, [$un, $pw]);

		return $q->row_array();
	}

	#Get Name
	public function displayName($id){
		$sql = "SELECT * FROM users_tbl WHERE id = ?";
		$q 	 = $this->db->query($sql, [$id]);

		return $q->row_array();
	}

	#Edit Password
	public function editPassword($pwd, $id){
		$sql = "UPDATE users_tbl SET password = ? WHERE id = ?";
		$q 	 = $this->db->query($sql, [$pwd, $id]);

		return $q;
	}


}