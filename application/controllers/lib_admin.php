<?php
   class Lib_admin extends Controller {
    
    function Lib_admin(){
      parent::Controller();
      $this->system_user->check_session(0);
    }
    
    function tambah_cat(){
    $a = $this->input->post('ketegori');
    $kategori = strip_quotes($a);
    $q = $this->db->query("select * from kategori where kategori like \"$kategori\"");
    if ($q->num_rows == 0){
      $this->db->query("insert into kategori(kategori) values(\"$kategori\")");
      $this->system_view->success_report_admin("Kategori $kategori sudah masuk kedalam database");
    }else $this->system_view->error_report_admin("Maaf, kategori yang anda masukan sudah ada didalam database");
    }
    
    function upload_csv(){
    $upload = $this->config->item('upload_csv');
    $cat = $this->input->post('kategori');
    $config['upload_path'] = "$upload";
    $config['allowed_types'] = 'zip';	
    $this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->system_view->error_report_admin($error);
		}	
		else
		{
			$data = $this->upload->data();
			$file = $data['file_name'];
			$raw = $data['raw_name'];
			mkdir("$upload/$cat");
			$this->unzip->allow(array('csv','jpg'));
			$this->unzip->extract("$upload/$file","$upload/$cat"); 
                        $nguk = $this->csvreader->parse_file("$upload/$cat/$raw.csv");
                        foreach($nguk as $bram){
                          $nama = $bram['nama barang'];
                          $merk = $bram['nama merek'];
                          $size = $bram['size'];
                           $harga = $bram['harga'];
                           $g = $bram['gambar'];
                           
                           if ($g != '' ){
                           $message = "".$g."".$merk."";
                           $gambar = $this->system_setting->hashing($message);
                           rename("$upload/$cat/gambar/$g.jpg","$upload/gambar/$gambar.jpg");
                           }else $gambar = 'nopict';
                           $this->db->query("insert into barang(id_kategori,nama_barang,merk,size,harga_barang,gambar) value($cat,\"$nama\",\"$merk\",\"$size\",$harga,\"$gambar\")");                   
                           }
                          $this->system_view->success_report_admin("Semua data sudah berhasil masuk kedalam database, silahkan cek pada bagian list barang");
		}
    }
}