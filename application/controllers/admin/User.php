<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->model('admin/user_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        // $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]', array('matches[password]' => 'Password Tidak Cocok'));

                
    }

    
    public function index()
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            $data["lists"] = $this->user_model->get_user();
            $this->load->view('admin/table_user', $data);
        }

        else 
        {
            redirect(base_url('account'));

        }
    }



   

}




