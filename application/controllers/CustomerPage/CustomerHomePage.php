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
}