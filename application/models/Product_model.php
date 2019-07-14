<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	 public function get_product()
    {
            $query=$this->db->query("SELECT p.id, p.nama, p.harga, p.deskripsi ,g.id as id_gambar FROM produk p left join gambar g on p.id = g.id_produk GROUP BY p.id order by p.id asc");

            return $query->result_array();
            
    }


    public function get_product_size($id)
    {
            $query=$this->db->query("SELECT u.jenis FROM ukuran_helper uh join ukuran u on uh.id_ukuran = u.id where uh.id_produk = '$id'");

            return $query->result_array();
            
    }

    public function get_product_image($id)
    {
            $query=$this->db->query("SELECT id FROM gambar where id_produk = '$id'");

            return $query->result_array();
            
    }

}