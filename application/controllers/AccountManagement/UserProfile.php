<?php
/**
|	Page Name 			:  Admin Login Controller
|	Author   				:  Byron Jester Malvar Manalo
|	Created by   		:	 Byron Jester Malvar Manalo
|	DAte Created   	:	 April 12, 2019
|	Last Updated 		:  April 13, 2019
|	Last update by  :  Byron Jester Malvar Manalo 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UserProfile extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('/AccountManagement/user_profile_model', 'users');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
      redirect('AdminManagement/HomePage/index');
    }else{
			$this->load->view('templates/header');
	  	$this->load->view('account_management/user_profile'); 
	  	$this->load->view('templates/footer');
	  }
	}

	#Login Account
	public function loginAccount(){
    $config = [
         [
                 'field' => 'username',
                 'label' => 'Username',
                 'rules' => 'required|trim|htmlspecialchars'
         ],

         [
                 'field' => 'password',
                 'label' => 'Password',
                 'rules' => 'required|trim|htmlspecialchars'
         ],
    ];

    $this->form_validation->set_rules($config);

    if($this->form_validation->run() === false){
      $res = [
        'message' => validation_errors(),
        'code'    => 0,
      ];

      echo json_encode($res);
    }else{
      $un   = $this->input->post('username');
      $pw   = $this->input->post('password');

      $login_account = $this->users->loginAccount($un, $pw);

      $id   = "";
      $code = 0;
      $name = "";

      if($login_account){
        $id   = $login_account['id'];
        $code = 1;
        $name = $login_account['firstname'] . " " . $login_account['middlename'] . " " . $login_account['lastname'];

        $session      = [
          'user_id'   => $login_account['id'],
          'logged_in' => true
        ];

        $this->session->set_userdata($session);
      } 

      $res = [
        'id'   => $id,
        'code' => $code,
        'name' => $name
      ];

      echo json_encode($res);
    } 
	}

  #Get Userdata
  public function displayProfile(){
    $id = $this->session->userdata('user_id');

    $user_profile = $this->users->displayName($id);

    $res = [
      'id'        => $user_profile['id'],
      'username'  => $user_profile['username'],
      // 'password'  => $user_profile['password'],
      'fullname'  => $user_profile['firstname'] . " " . $user_profile['middlename'] . " " . $user_profile['lastname']
    ];

    echo json_encode($res);
  }

  #Edit User Password
  public function editPassword(){
    $config = [
         [
                 'field' => 'change_password',
                 'label' => 'Password',
                 'rules' => 'required|trim|htmlspecialchars|min_length[8]'
         ],
    ];

    $this->form_validation->set_rules($config);

    if($this->form_validation->run() === false){
      $res = [
        'code'    => 0,
        'msg'     => validation_errors()
      ];

      echo json_encode($res);
    }else{
      $code = 0;
      $msg  = "An error occured!";

      $id   = $this->input->post('user_id');
      $pwd  = $this->input->post('change_password');

      $user_profile = $this->users->displayName($id);

      $edt_pwd = $this->users->editPassword($pwd, $id);

      if($user_profile['password'] == $pwd){
        $msg = "Previous Password is not Available!";
      }else{
        if($edt_pwd){
          $code = 1;
          $msg  = "Password Successfuly Change";
        }
      }
     
      $res = [
        'code' => $code,
        'msg'  => $msg
      ];

      echo json_encode($res);
    }
  }

	#Log out Account
  public function logout(){
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('logged_in');
    redirect(base_url() . 'admin'); 
  }
 
}