<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        
        // $cek = $this->session->userdata('username');

        // if(!empty($cek))
        // 	{	
        		// $data["lists"] = $this->table_model->getAll();

                
        	       $this->load->view("homepage");
                
    		// }
    	// else 
    	// 	{
    	// 		$this->load->view("login");
    	// 	}
	}

	public function admin()
	{

		if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1))
		{
			$this->load->view("admin/dashboard");
		}

		else 
		{
			redirect(base_url('account'));
		}

               
    		
	}
}
