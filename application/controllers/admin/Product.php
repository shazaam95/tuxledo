<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->model('admin/product_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        // $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]', array('matches[password]' => 'Password Tidak Cocok'));

                
    }

    
    public function index()
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            $data["lists"] = $this->product_model->get_product();
            $this->load->view('admin/table_product', $data);
        }

        else 
        {
            redirect(base_url('account'));

        }
    }


    public function view_add_product()
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            
            $this->load->view('admin/add_product');
        }

        else 
        {
            redirect(base_url('account'));

        }
    }

   
    public function add_product()
    {

        if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
            {

            
            
            // If file upload form submitted
            if(!empty($_FILES['img']['name'])){
                
                   $check =  $this->product_model->insert_product();
                   
                    
                    // Upload status message
                    $check?$this->session->set_flashdata('success','Product Successfully Added'):$this->session->set_flashdata('failed','some problem occured, please try again later');
                    
                }
            

            
            }

        else 
            {
                redirect(base_url('account'));

            }

    }


    public function view_edit_product($id_x)
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            $data["lists"] = $this->product_model->get_edit_product($id_x);
            
            $this->load->view('admin/edit_product', $data);
        }

        else 
        {
            redirect(base_url('account'));

        }
    }


    public function edit_product()
    {

        if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
            {

            
            
            // If file upload form submitted
            
                
                   $check =  $this->product_model->edit_product();
                   
                    
                    // Upload status message
                    $check?$this->session->set_flashdata('success','Product Successfully Edited'):$this->session->set_flashdata('failed','some problem occured, please try again later');
                    
            
            }

        else 
            {
                redirect(base_url('account'));

            }

    }

    public function get_varian($id_x)
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            echo json_encode($this->product_model->get_varian($id_x));
            
        }

        else 
        {
            

        }
    }

    public function get_image($id_x)
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            echo json_encode($this->product_model->get_image($id_x));
            
        }

        else 
        {
            

        }
    }


    public function set_active($id_x)
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            
            $check = $this->product_model->activate_product($id_x);

            if($check)
            {
                $this->session->set_flashdata('success', 'Product ' . $check . ' activated');
                redirect(site_url('admin/product'));
            }

            
        }

        else 
        {
            redirect(base_url('account'));

        }
    }

    public function set_not_active($id_x)
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            
            $check = $this->product_model->deactivate_product($id_x);

            if($check)
            {
                $this->session->set_flashdata('failed', 'Product ' . $check . ' deactivated');
                redirect(site_url('admin/product'));
            }
        }

        else 
        {
            redirect(base_url('account'));

        }
    }


    public function delete_product($id_x)
    {

            if(!empty($this->session->userdata('username')) && ($this->session->userdata('flag_admin')==1)) 
        {

            
            $check = $this->product_model->delete_product($id_x);

            if($check)
            {
                $this->session->set_flashdata('failed', 'Product ' . $check . ' has been deleted');
                redirect(site_url('admin/product'));
            }
        }

        else 
        {
            redirect(base_url('account'));

        }
    }
}




