<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('product_model');
       
    }
	
	public function index()
	{
        
        // $cek = $this->session->userdata('username');

        // if(!empty($cek))
        // 	{	
        		// $data["lists"] = $this->table_model->getAll();

        	    $this->load->view("product");
                
    		// }
    	// else 
    	// 	{
    	// 		$this->load->view("login");
    	// 	}
	}

public function get_product()
	{
        
        echo json_encode($this->product_model->get_product());
           
	}


// public function get_entity()
// 	{
//         $post = $this->input->post();

//         $data = array(
//         'id' => $post['id'],
//         'harga' => $post['harga'],
//         'nama' => $post['nama'],
//         'id_gambar' => $post['id_gambar']
// 		);

//         $view = $this->load->view("partials/product_entity", $data, true);
//        	echo $view;
           
// 	}

	public function get_product_size($id)
	{
        
        echo json_encode($this->product_model->get_product_size($id));
           
	}


	public function get_product_image($id)
	{
        
        echo json_encode($this->product_model->get_product_image($id));
           
	}


}
