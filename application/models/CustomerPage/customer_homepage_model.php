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
class customer_homepage_model extends CI_Model {

	#Display Customer Fullname
	public function getName($id){
		$sql = "SELECT first_name, middle_name, last_name FROM customer_tbl WHERE user_id = ?";
		$q 	 = $this->db->query($sql, [$id]);

		return $q->row_array();
	}

	#Display All Product
	public function getProducts(){
		$sql = "SELECT * FROM product_tbl";
		$q 	 = $this->db->query($sql);

		return $q->result_array();
	}

	#Check Quantity of Product
	public function checkQuantity($pid){
		$sql = "SELECT product_qty FROM product_tbl WHERE product_id = ?";
		$q 	 = $this->db->query($sql, [$pid]);

		return $q->row_array();
	}

	#Add to Cart Product
	public function addCart($uid, $pid, $qty){
		$sql = "INSERT INTO cart_tbl (user_id, product_id, qty, status) VALUES (?, ?, ?, 'pending')";
		$q 	 = $this->db->query($sql, [$uid, $pid, $qty]);

		return $q;
	}

	#Select Product by Category
	public function selectCategory($categ){
		$sql = "SELECT * FROM product_tbl WHERE item_category = ?";
		$q 	 = $this->db->query($sql, [$categ]);

		return $q->result_array();

	}

}