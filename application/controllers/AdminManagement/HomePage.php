<?php
/**
| Page Name       :  Admin Mangement Controller
| Author          :  Byron Jester Malvar Manalo
| Created by      :  Byron Jester Malvar Manalo
| DAte Created    :  April 13, 2019
| Last Updated    :  April 13, 2019
| Last update by  :  Byron Jester Malvar Manalo 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class HomePage extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('/AdminManagement/admin_management_model', 'admin');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
    		$this->load->view('templates/header');
    	  	$this->load->view('admin/homepage'); 
    	  	$this->load->view('templates/footer');
    	}else{
            redirect(base_url());
    	}
	}


	#Add Product
	public function addProduct(){
  	$config = [
  		[
               'field' => 'item_name',
               'label' => 'Item Name',
               'rules' => 'required|trim|htmlspecialchars'
       	],

       	[
               'field' => 'category',
               'label' => 'Category',
               'rules' => 'required|trim|htmlspecialchars'
       	],

       	[
               'field' => 'date_posted',
               'label' => 'Date',
               'rules' => 'required|trim|htmlspecialchars'
       	],


       	[
               'field' => 'product_qty',
               'label' => 'Item Quantity',
               'rules' => 'required|trim|htmlspecialchars'
       	],

       	[
               'field' => 'product_prc',
               'label' => 'Product Price',
               'rules' => 'required|trim|htmlspecialchars'
       	],
      ];

    $this->form_validation->set_rules($config);

    if($this->form_validation->run() === false){
      $res = [
        'msg' => validation_errors(),
        'code'    => 0,
      ];

      echo json_encode($res);
    }else{
    	$code = 0;
    	$msg  = "";

    	$name  = $this->input->post('item_name');
    	$categ = $this->input->post('category');
    	$date  = $this->input->post('date_posted');
    	$qty	 = $this->input->post('product_qty');
    	$prc 	 = $this->input->post('product_prc');
    	$img 	 = $this->upload();

    	$prod  = $this->admin->addProduct($name, $categ, $date, $qty, $prc, $img);

    	if($prod){
    		$code = 1;
    		$msg  = "Product Successfully Added";
    	}

    	$res = [
        'msg' 	=> $msg,
        'code'  => $code
      ];

      echo json_encode($res);

    }
	}

  #Get All Product
  public function getProduct(){
  	$product = $this->admin->getProduct();
  	
  	echo json_encode($product);
  }

  #Delete Product
  public function deleteProduct(){
    $id = $this->input->post('btn_del');

    $delete_product = $this->admin->deleteProduct($id);

    if($delete_product){
      $res = [
        'code' => 1,
        'msg'  => 'Item Successfully Deleted'
      ];
      echo json_encode($res);
    }else{
      $res = [
        'code' => 0,
        'msg'  => 'Error Deleting Item'
      ];
      echo json_encode($res);
    }
  }


  #Update Product
  public function updateProduct(){
    $config = [
      [
               'field' => 'upd_name',
               'label' => 'Item Name',
               'rules' => 'trim|htmlspecialchars'
        ],

        [
               'field' => 'upd_list',
               'label' => 'Category',
               'rules' => 'trim|htmlspecialchars'
        ],

        [
               'field' => 'upd_date',
               'label' => 'Date',
               'rules' => 'trim|htmlspecialchars'
        ],


        [
               'field' => 'upd_qty',
               'label' => 'Item Quantity',
               'rules' => 'trim|htmlspecialchars'
        ],

        [
               'field' => 'upd_prc',
               'label' => 'Product Price',
               'rules' => 'trim|htmlspecialchars'
        ],
      ];

    $this->form_validation->set_rules($config);

    if($this->form_validation->run() === false){
      $res = [
        'msg'     => validation_errors(),
        'code'    => 0,
      ];

      echo json_encode($res);
    }else{
      $code = 0;
      $msg  = "";

      $id    = $this->input->post('btn_edit');
      $name  = $this->input->post('upd_name');
      $categ = $this->input->post('upd_list');
      $date  = $this->input->post('upd_date');
      $qty   = $this->input->post('upd_qty');
      $prc   = $this->input->post('upd_prc');

      $img   = $this->updatePhoto();

      $update_product = $this->admin->editProduct($name, $categ, $date, $qty, $prc,  $img, $id);

      if($update_product){
        $code = 1;
        $msg  = "Item Successfully Updated";
      }else{
        $msg  = "Error Updating Product";
      }

      $res = [
        'msg'     => $msg,
        'code'    => $code,
      ];

      echo json_encode($res);
    }
  }


  #Update Image
  public function updatePhoto(){
    if(isset($_FILES["upd_img"])){
      $extension = explode('.', $_FILES['upd_img']['name']);
      $new_name = $extension[0] . '.' . $extension[1];
      $destination = './uploads/'. $new_name;
      move_uploaded_file($_FILES['upd_img']['tmp_name'], $destination);
      return $new_name;
    }
  } 



	#Upload Image
  public function upload(){
    if(isset($_FILES["img_id"])){
      $extension = explode('.', $_FILES['img_id']['name']);
      $new_name = $extension[0] . '.' . $extension[1];
      $destination = './uploads/'. $new_name;
      move_uploaded_file($_FILES['img_id']['tmp_name'], $destination);
      return $new_name;
    }
  }

  #Search Product
  public function searchItem(){
    $config = [
        [
               'field' => 'find_item',
               'label' => 'Item Name',
               'rules' => 'trim|htmlspecialchars'
        ]
    ];

    $this->form_validation->set_rules($config);

    if($this->form_validation->run() === false){
      $res = [
        'msg'     => validation_errors(),
        'code'    => 0,
      ];

      echo json_encode($res);
    }else{
      $item = $this->input->post('find_item');

      $product = $this->admin->searchItem($item);

      echo json_encode($product);
    }

  }

  #Search by Category
  public function searchCategory(){
    $config = [
        [
               'field' => 'find_categ',
               'label' => 'Item Name',
               'rules' => 'trim|htmlspecialchars'
        ]
    ];

    $this->form_validation->set_rules($config);

    if($this->form_validation->run() === false){
      $res = [
        'msg'     => validation_errors(),
        'code'    => 0,
      ];

      echo json_encode($res);
    }else{
      $item = $this->input->post('find_categ');

      $product = $this->admin->searchCategory($item);

      echo json_encode($product);
    }

  }

}