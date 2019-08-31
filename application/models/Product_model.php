<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	 public function get_product()
    {
            $query=$this->db->query("SELECT p.id, p.nama, p.harga, p.deskripsi ,g.nama_gambar FROM produk p left join gambar g on p.id = g.id_produk where p.flag_aktif = 1 GROUP BY p.id order by p.id asc");

            return $query->result_array();
            
    }


    public function get_product_size($id)
    {
            $query=$this->db->query("SELECT DISTINCT v.ukuran FROM varian v  where v.id_produk = '$id'");

            return $query->result_array();
            
    }

    public function get_product_color($id, $ukuran)
    {
            $query=$this->db->query("SELECT v.nama_warna FROM varian v  where v.id_produk = '$id' and v.ukuran = '$ukuran'");
            return $query->result_array();
            
    }

    public function get_product_stock($id, $ukuran, $nama_warna)
    {
            $query=$this->db->query("SELECT v.stok FROM varian v  where v.id_produk = '$id' and v.ukuran = '$ukuran' and v.nama_warna = '$nama_warna'");
            return $query->result_array();
            
    }

    public function get_product_image($id)
    {
            $query=$this->db->query("SELECT nama_gambar FROM gambar where id_produk = '$id'");

            return $query->result_array();
            
    }

}