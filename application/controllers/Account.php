<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	function __construct(){
        parent::__construct();
       	$this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }
	
	public function index()
	{
        
        // $cek = $this->session->userdata('username');

        // if(!empty($cek))
        // 	{	
        		// $data["lists"] = $this->table_model->getAll();

                
        	       $this->load->view("login");
                
    		// }
    	// else 
    	// 	{
    	// 		$this->load->view("login");
    	// 	}
	}



	public function proses_login() { 
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $login = $this->auth_model->auth($user, $pass);


        if (!empty($login))
         { 
            $this->session->set_userdata($login);
            
            echo 1;
        } else { 
            
            echo 0;
            

            
            
        } 
    }

    public function proses_logout()
    {

    	//removing session data 
        $this->session->sess_destroy();
         redirect(base_url());
    }
}
