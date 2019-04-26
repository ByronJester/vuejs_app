<?php
/**
| Page Name       :  Admin Mangement Controller
| Author          :  Byron Jester Malvar Manalo
| Created by      :  Byron Jester Malvar Manalo
| DAte Created    :  April 24, 2019
| Last Updated    :  April 24, 2019
| Last update by  :  Byron Jester Malvar Manalo 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class CustomerHomePage extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('/CustomerPage/customer_homepage_model', 'customer');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
  		$this->load->view('templates/header');
  	  $this->load->view('customer_page/home_page'); 
  	  $this->load->view('templates/footer'); 
  	}else{
      redirect(base_url());
  	}
	}


	#Display Customer Fullname
	public function getName(){
		$id = $this->session->userdata('id');
		$fullname = $this->customer->getName($id);

		$res = [
			'fullname' => $fullname['first_name'] . " " . $fullname['middle_name'] . " " . $fullname['last_name']
		];

		echo json_encode($res);
	}

	#Display All Products
	public function getProducts(){
		$all_product = $this->customer->getProducts();

		echo json_encode($all_product);
	}

	#Add to Cart Product
	public function addCart(){
		$msg	= "Error adding this product to your cart! Please try again";
		$code = 0;

		$config = [
			[
				'field' => 'quantity',
				'lable' => 'Item Quantity',
				'rules' => 'trim|required|htmlspecialchars|is_natural_no_zero'
			]
		];

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() === false){
			$msg = validation_errors();
		}else{
			$uid 	= $this->session->userdata('id');
			$pid 	= $this->input->post('id');
			$qty  = $this->input->post('quantity');


			#Get Item Data 
			$item_data = $this->customer->getItemData($pid);

			if($item_data['product_qty'] == 0){
				$msg = "Item quantity is zero! You can't add this product to your cart";
			}else{
				#Add Product to Cart
				$cart = $this->customer->addCart($uid, $pid, $item_data['item_name'], $item_data['product_prc'], $qty);
				if($cart != ""){
					$msg 	= "Cart Successfully Added";
					$code = 1;
				}else{
					$msg 	= "Error adding this product to your cart! Please try again";
				}
			}

		}

		$res = [
			'msg' 	=> $msg,
			'code'	=> $code
		];

		echo json_encode($res);
	}

	#Select Product by Category
	public function selectCategory(){
		$categ = $this->input->post('categ');

		$filter = $this->customer->selectCategory($categ);

		echo json_encode($filter);

	}

}