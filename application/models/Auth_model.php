<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Auth_model extends CI_Model
{
   
    private $_table = "user";
   function auth($username,$password)
   	{

        $query=$this->db->query("SELECT * FROM user WHERE (username='$username') OR (email = '$username') LIMIT 1");

        $test = $query->row_array();

        $t_hasher = new PasswordHash(8, FALSE);
        $check = $t_hasher->CheckPassword($password, $test['password']);
        


        if(($test['username']==$username) || ($test['email']==$username) && $check)

        {

            return $query->row_array();

        }
    }

public function check_old_pass($old_pass)

      {

        $post = $this->input->post();
        $password_lama = $post["passwordLama"];
        

        return (MD5($password_lama) == $old_pass);

        

      }

    function check_new_pass()
    {

    	$post = $this->input->post();
        $password_baru = $post["passwordBaru"];
        $password_baru2 = $post["passwordBaru2"];

        return ($password_baru == $password_baru2);

    }

    function update_new_pass()
        {

        $post = $this->input->post();
        $this->password = MD5($post['passwordBaru']);
        $this->db->update($this->_table, $this, array('username' => $this->session->userdata('username')));
        
        
        }


//untuk log aktivitas

    function get_log()
    {

            // select jenis_aksi, u.nama, p.nama_parpol, kl.nama_kap as kap_lama, k.nama_kap as kap_baru, la.waktu from log_aktivitas la left join kap k on k.id_k = kap_id_new left join kap kl on kl.id_k = la.kap_id_old join parpol_helper ph on ph.id_ph = la.parpol_helper_id join parpol p on p.id_p = ph.id_parpol join user u on u.id = ph.id_user order by waktu asc

            $query=$this->db->query("SELECT user_pelaku, jenis_aksi, u.nama as nama, p.akronim, kl.nama_kap as kap_lama, k.nama_kap as kap_baru, la.waktu from log_aktivitas la left join kap k on k.id_k = kap_id_new left join kap kl on kl.id_k = la.kap_id_old join parpol_helper ph on ph.id_ph = la.parpol_helper_id join parpol p on p.id_p = ph.id_parpol join user u on u.id = ph.id_user order by waktu desc");
            return $query->result();
    }
   
}