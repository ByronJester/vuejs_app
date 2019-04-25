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
class CustomerAccount extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('/AccountManagement/customer_account_model', 'customer');
	}

	public function index(){
	  if($this->session->userdata('logged_in')){
      redirect('');
    }else{
			$this->load->view('templates/header');
	  	$this->load->view('account_management/customer_account'); 
	  	$this->load->view('templates/footer');
	  }
	}

	#Create Customer Account
	public function createAccount(){
		$msg 	= '';
		$code = 0;

		$config  = [
			[
			 'field' => 'username',
			 'label' => 'Username',
			 'rules' => 'required|trim|htmlspecialchars|min_length[5]|max_length[20]'
			],

			[
			 'field' => 'password',
			 'label' => 'Password',
			 'rules' => 'required|trim|htmlspecialchars|min_length[8]'
			],

			[
			 'field' => 'c_password',
			 'label' => 'Password Confirmation',
			 'rules' => 'required|trim|htmlspecialchars|matches[password]'
			],

			[
			 'field' => 'email',
			 'label' => 'Email',
			 'rules' => 'required|trim|htmlspecialchars'
			],

			[
			 'field' => 'phone',
			 'label' => 'Mobile Number',
			 'rules' => 'required|trim|htmlspecialchars|min_length[11]|max_length[11]'
			],

			[
			 'field' => 'firstname',
			 'label' => 'First Name',
			 'rules' => 'required|trim|htmlspecialchars'
			],

			[
			 'field' => 'middlename',
			 'label' => 'Middle Name',
			 'rules' => 'required|trim|htmlspecialchars'
			],

			[
			 'field' => 'lastname',
			 'label' => 'Last Name',
			 'rules' => 'required|trim|htmlspecialchars'
			],
    ];

    $this->form_validation->set_rules($config);

    if($this->form_validation->run() === false){
      $msg = validation_errors();
    }else{
    	$un 	= $this->input->post('username');
    	$pw 	= $this->input->post('password');
    	$em 	= $this->input->post('email');
    	$ph 	= $this->input->post('phone');
    	$fn 	= $this->input->post('firstname');
    	$md 	= $this->input->post('middlename');
    	$ln 	= $this->input->post('lastname');
    	$img 	= $this->upload();

    	#Check if Username Already Exist
    	$check_username = $this->customer->checkUsername($un);

    	#Check if Email Already Exist
    	$check_email 		= $this->customer->checkEmail($em);

    	#Check Profile Image if Empty
    	if($img == ''){
    		$msg = "Profile Image is Empty";
    	}else if($check_username['username'] != ''){
    		$msg =  "Username is not Available";
    	}else if($check_email['email'] != ''){
    		$msg = "Email is not Available";
    	}else{
    		#Create Customer Account
    		$has_created	  = $this->customer->createAccount($un, $pw, $em, $ph, $fn, $md, $ln, $img);

    		if($has_created == 1){
    			$msg 	= "Account Successfuly Created";
    			$code = 1;
    		}else{
    			$msg 	= "There's an error creating your account";
    		}
    	}
    }

    $res = [
    	'msg' 	=> $msg,
    	'code'	=> $code
    ];

    echo json_encode($res);
    
	}

	#Upload Profile Image
  public function upload(){
    if(isset($_FILES["p_image"])){
      $extension 		= explode('.', $_FILES['p_image']['name']);
      $new_name 		= $extension[0] . '.' . $extension[1];
      $destination 	= './assets/customer_img/'. $new_name;
      move_uploaded_file($_FILES['p_image']['tmp_name'], $destination);
      return $new_name;
    }
  }


  #Login Account
  public function loginAccount(){
  	$msg 	= "Incorrect Username or Password";
  	$code = 0;
  	$config = [
  		[
  			'field' => 'un',
  			'label' => 'UserName',
  			'rules' => 'required|trim|htmlspecialchars'
  		],

  		[
  			'field' => 'pw',
  			'label' => 'Password',
  			'rules' => 'required|trim|htmlspecialchars'
  		]
  	];

  	$this->form_validation->set_rules($config);

  	if($this->form_validation->run() === false){
  		$msg = validation_errors();
  	}else{
  		$username = $this->input->post('un');
  		$password = $this->input->post('pw');

  		$has_loggedin = $this->customer->loginAccount($username, $password);

  		if($has_loggedin['user_id'] != ""){
  			$msg 	= "Login Successfuly";
  			$code =	1;

  			$session = [
  				'id' 				=> $has_loggedin['user_id'],
  				'logged_in' => true
  			];

  			$this->session->set_userdata($session);
  		}
  	}

  	$res = [
  		'msg'	 => $msg,
  		'code' => $code
  	];

  	echo json_encode($res);
  }

  #Log out Account
  public function logout(){
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('logged_in');
    redirect(base_url()); 
  }

}