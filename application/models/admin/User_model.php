<?php defined('BASEPATH') OR exit('No direct script access allowed');



class User_model extends CI_Model
{
   
    private $_table = "user";
   function get_user()
   	{

        $query=$this->db->query("SELECT * FROM user");
            return $query->result();

        
    }
    
   
}