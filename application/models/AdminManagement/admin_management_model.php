<?php
/**
|	Page Name 			:  Admin Mangement Model
|	Author   				:  Byron Jester Malvar Manalo
|	Created by   		:	 Byron Jester Malvar Manalo
|	DAte Created   	:	 April 13, 2019
|	Last Updated 		:  April 13, 2019
|	Last update by  :  Byron Jester Malvar Manalo 
*/
defined('BASEPATH') OR exit('No ');
class admin_management_model extends CI_Model {

	#Add Product
	public function addProduct($name, $categ, $date, $qty, $prc, $img){
		$sql = "INSERT INTO product_tbl (item_name, item_category, date_posted, product_qty, product_prc, product_img) VALUES(?, ? , ? , ?, ?, ?)";
		$q   = $this->db->query($sql, [$name, $categ, $date, $qty, $prc, $img]);

		return $q;
	}

	#Get All Product
	public function getProduct(){
		$sql = "SELECT * FROM product_tbl";
		$q   = $this->db->query($sql);

		return $q->result_array();
	}

	#Delete Product
	public function deleteProduct($id){
		$sql = "DELETE FROM product_tbl WHERE product_id = ?";
		$q   = $this->db->query($sql, [$id]); 

		if($q){
			return true;
		}else{
			return false;
		}
	}

	#Update Product
	public function editProduct($name, $categ, $date, $qty, $prc,  $img, $id){

		if($img != ""){
			$sql = "UPDATE product_tbl SET item_name = ?, item_category = ?, date_posted = ?, product_qty = ?, product_prc = ?, product_img = ? WHERE product_id = ?";
			$q   = $this->db->query($sql, [$name, $categ, $date, $qty, $prc,  $img, $id]);

			if($q){
				return true;
			}else{
				return false;
			}
		}else{
			$sql = "UPDATE product_tbl SET item_name = ?, item_category = ?, date_posted = ?, product_qty = ?, product_prc = ? WHERE product_id = ?";
			$q   = $this->db->query($sql, [$name, $categ, $date, $qty, $prc, $id]);

			if($q){
				return true;
			}else{
				return false;
			}
		}
	}

	#Search Item
	public function searchItem($item){
		$sql = "SELECT * FROM product_tbl WHERE item_name LIKE '%$item%' OR item_category LIKE '%$item%' OR date_posted LIKE '%$item%' OR product_qty LIKE '%$item%' OR product_prc LIKE '%$item%'";
		$q   = $this->db->query($sql);

		return $q->result_array();
	}

	#Search by Category
	public function searchCategory($item){
		$sql = "SELECT * FROM product_tbl WHERE item_category = ?";
		$q   = $this->db->query($sql, [$item]);

		return $q->result_array();
	}

	#Display Product in Cart
  public function getCart(){
    $sql = "SELECT * FROM cart_tbl WHERE status = 'pending'";
    $q 	 = $this->db->query($sql);

    return $q->result_array();
  }


  #Get Cart Data
  public function cartData($cart_id){
    $sql = "SELECT * FROM cart_tbl WHERE cart_id = ?";
    $q 	 = $this->db->query($sql, [$cart_id]);

    return $q->row_array();
  }

  #Get Product Data
  public function productData($product_id){
    $sql = "SELECT * FROM product_tbl WHERE product_id = ?";
    $q 	 = $this->db->query($sql, [$product_id]);

    return $q->row_array();
  }

  #Update Product Quantity
  public function qtyUpdate($qty, $id){
  	$sql = "UPDATE product_tbl SET product_qty = ? WHERE product_id = ?";
  	$q 	 = $this->db->query($sql, [$qty, $id]);

  	return $q;
  }

  #Update Cart Status
  public function statsUpdate($cart_id){
  	$sql = "UPDATE cart_tbl SET status = 'completed' WHERE cart_id = ?";
  	$q 	 = $this->db->query($sql, [$cart_id]);

  	return $q;
  }

  #Cancel Cart Request
  public function cancelCart($cart_id){
  	$sql = "UPDATE cart_tbl SET status = 'canceled' WHERE cart_id = ?";
  	$q 	 = $this->db->query($sql, [$cart_id]);

  	return $q;
  }


}