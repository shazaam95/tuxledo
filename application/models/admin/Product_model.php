<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Product_model extends CI_Model
{
   
    private $_table = "produk";
    private $_table2 = "varian";
    private $_table3 = "gambar";
   function get_product()
   	{

        $query=$this->db->query("SELECT p.id, p.nama, p.deskripsi, sum(v.stok) as stok, p.harga, p.flag_aktif, g.id_gambar, g.nama_gambar FROM produk p join varian v on v.id_produk = p.id join (select pr.id, g.id as id_gambar, g.nama_gambar from gambar g join produk pr on pr.id = g.id_produk GROUP BY pr.id) g on g.id = p.id GROUP BY p.id");
            return $query->result();

        
    }


    function get_edit_product($id_x)
    {

        $query=$this->db->query("SELECT p.id, p.nama, p.deskripsi, sum(v.stok) as stok, p.harga, p.flag_aktif, g.id_gambar, g.nama_gambar FROM produk p join varian v on v.id_produk = p.id join (select pr.id, g.id as id_gambar, g.nama_gambar from gambar g join produk pr on pr.id = g.id_produk GROUP BY pr.id) g on g.id = p.id WHERE p.id = '$id_x' GROUP BY p.id");
            return $query->row();

        
    }

    function get_varian($id_x)
    {

        $query=$this->db->query("SELECT v.id, v.ukuran, v.warna, v.stok, v.nama_warna from varian v where v.id_produk = '$id_x'");
            return $query->result_array();

        
    }

    function get_image($id_x)
    {

        $query=$this->db->query("SELECT g.id, g.nama_gambar, g.nama_origin, g.ukuran from gambar g where g.id_produk = '$id_x' order by g.urutan");
            return $query->result_array();

        
    }


    public function insert_product(){
    	$post = $this->input->post();
    	$id = uniqid('prd', true);
    	$this->id = $id;
    	$this->nama = $post["nama_produk"];
    	$this->deskripsi = $post["deskripsi"];
    	$this->harga = str_replace(array('.'), array(''), $post['harga']);
    	$this->flag_aktif = $post["radios"];
        $counter = 0;

    	$filesCount = count($_FILES['img']['name']);
        for($i = 0; $i < $filesCount; $i++){
        	
        	$id_gambar =  uniqid('gbr', true);
        	$nama_gambar = $_FILES['img']['name'][$i];

            $_FILES['file']['name']     = $_FILES['img']['name'][$i];
            $_FILES['file']['type']     = $_FILES['img']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['img']['error'][$i];
            $_FILES['file']['size']     = $_FILES['img']['size'][$i];
            
            // File upload configuration
            $uploadPath = './images/product/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 1500;
            // $config['file_name'] = $id_gambar;
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
            	
                $fileData = $this->upload->data();
                $data_image[$i]['id'] = $id_gambar;
                $data_image[$i]['nama_origin'] = $nama_gambar;
                $data_image[$i]['nama_gambar'] = $fileData['file_name'];
                $data_image[$i]['ukuran'] = $_FILES['file']['size'];
                $data_image[$i]['urutan'] = ($counter + 1);
                $data_image[$i]['id_produk'] = $id;
                $counter++;
                // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
            }
        }

        if(!empty($data_image)){


	        $ukuran = $post["ukuran"];
	        $warna = $post["warna"];
	        $stok = $post["stok"];
            $nama_warna = $post["nama_warna"];

	        $index = 0; // Set index array awal dengan 0
	        $data_varian = array();
	        foreach($ukuran as $ukuran_e){ // Kita buat perulangan berdasarkan nis sampai data terakhir     
	        array_push($data_varian, array(
	        'id'=>uniqid('vrn', true),
	        'ukuran'=>$ukuran_e,
	        'warna'=>$warna[$index],
            'nama_warna'=>$nama_warna[$index],
	        'stok'=>str_replace(array('.'), array(''), $stok[$index]),
	        'id_produk'=>$id
		     ));            
		         $index++;    
		     }


	        
	        $insert1 = $this->db->insert($this->_table, $this);
	        $insert2 = $this->db->insert_batch('varian', $data_varian);
	        $insert3 = $this->db->insert_batch('gambar', $data_image);


	        return ($insert1&&$insert2&&$insert3)?true:false;
    }

    	else {return false;}
        
    }


    public function edit_product(){
        $post = $this->input->post();
        $id = $post["id"];
        $this->nama = $post["nama_produk"];
        $this->deskripsi = $post["deskripsi"];
        $this->harga = str_replace(array('.'), array(''), $post['harga']);
        $this->flag_aktif = $post["radios"];

        $this->db->select('id,urutan, nama_gambar');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id);
        $array =  $this->db->get()->result();
        $counter = count($array);
        $counter_urutan = 0;
        $flag_upload_img_baru = false;
        if(!empty($_FILES['img']['name'])){

            $filesCount = count($_FILES['img']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $id_gambar =  uniqid('gbr', true);
                $nama_gambar = $_FILES['img']['name'][$i];
                $_FILES['file']['name']     = $_FILES['img']['name'][$i];
                $_FILES['file']['type']     = $_FILES['img']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['img']['error'][$i];
                $_FILES['file']['size']     = $_FILES['img']['size'][$i];
                
                // File upload configuration
                $uploadPath = './images/product/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 1500;
                // $config['file_name'] = $id_gambar;
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                //Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    
                    $fileData = $this->upload->data();

                    if($counter > 0)
                    {   

                        $filename = $array[$i]->nama_gambar;
                        array_map('unlink', glob(FCPATH."images/product/$filename"));
                        

                        $id_gambar = $array[$i]->id;
                        $data_img = array(
                            'nama_origin'=>$nama_gambar,
                            'nama_gambar'=>$fileData['file_name'],
                            'ukuran' => $_FILES['file']['size']
                        );
                        $this->db->update($this->_table3, $data_img, array('id' => $id_gambar));
                    }

                    else 
                    {
                        $flag_upload_img_baru = true;
                        $data_image[$i]['id'] = $id_gambar;
                        $data_image[$i]['nama_origin'] = $_FILES['file']['name'];
                        $data_image[$i]['nama_gambar'] = $fileData['file_name'];
                        $data_image[$i]['ukuran'] = $_FILES['file']['size'];
                        $data_image[$i]['urutan'] = ($counter_urutan + 1);
                        $data_image[$i]['id_produk'] = $id;
                        // $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

                    }

                }
                $counter_urutan++;
                $counter--;
            }
            
            if($flag_upload_img_baru)
            {
                $this->db->insert_batch('gambar', $data_image);
            }
            
        }   

        


            $ukuran = $post["ukuran"];
            $warna = $post["warna"];
            $stok = $post["stok"];
            $nama_warna = $post["nama_warna"];

            $index = 0; // Set index array awal dengan 0
            $data_varian = array();
            foreach($ukuran as $ukuran_e){ // Kita buat perulangan berdasarkan nis sampai data terakhir     
            array_push($data_varian, array(
            'id'=>uniqid('vrn', true),
            'ukuran'=>$ukuran_e,
            'warna'=>$warna[$index],
            'nama_warna'=>$nama_warna[$index],
            'stok'=>str_replace(array('.'), array(''), $stok[$index]),
            'id_produk'=>$id
             ));            
                 $index++;    
             }


            
            $update = $this->db->update($this->_table, $this, array('id' => $id));

            $this->db->delete($this->_table2, array("id_produk" => $id));
            $insert = $this->db->insert_batch('varian', $data_varian);
            


            return ($update&&$insert)?true:false;
        
    }
    

  function activate_product($id_x)
    {
        
        $this->db->select('nama');
        $this->db->from('produk');
        $this->db->where('id', $id_x);
        $tmp =  $this->db->get()->row();

        $this->flag_aktif = 1;
        $this->db->update($this->_table, $this, array('id' => $id_x));
        return $tmp->nama;

        
    }

    function deactivate_product($id_x)
    {
        $this->db->select('nama');
        $this->db->from('produk');
        $this->db->where('id', $id_x);
        $tmp =  $this->db->get()->row();

        $this->flag_aktif = 0;
        $this->db->update($this->_table, $this, array('id' => $id_x));
        return $tmp->nama;
        
    }

    function delete_product($id_x)
    {
        $this->db->select('nama');
        $this->db->from('produk');
        $this->db->where('id', $id_x);
        $tmp =  $this->db->get()->row();

        $this->db->select('nama_gambar');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id_x);
        $tmp2 =  $this->db->get()->result();

        for($i = 0; $i < count($tmp2);$i++)

        {
            $tmp3 = $tmp2[$i]->nama_gambar;
            array_map('unlink', glob(FCPATH."images/product/$tmp3"));

        }

        $this->db->delete($this->_table3, array("id_produk" => $id_x));
        $this->db->delete($this->_table2, array("id_produk" => $id_x));
        $this->db->delete($this->_table, array("id" => $id_x));
        return $tmp->nama;
        
    }
    
   
}