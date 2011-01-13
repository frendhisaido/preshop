<?php
   class Lib_preshop extends Controller {
    
    function Lib_preshop(){
      parent::Controller();
      
    }
    
    function daftar(){
    $username = $this->input->post('username');
    $pass1 = $this->input->post('password');
    $pass2 = $this->input->post('confirm_password');
    $telp = $this->input->post('telp');
    $nama = $this->input->post('nama');
    $rahasia = $this->input->post('rahasia');
    $jawaban = $this->input->post('jawaban');
    $this->system_user->tambah_user($username,$pass1,$pass2,$telp,$nama,$rahasia,$jawaban);
    }
    
    function login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $this->system_user->check_login($username,$password);
    }
    
    function reset_pass(){
    $id = $this->input->post('id');
    $jawaban = $this->input->post('jawaban');
    $this->system_user->reset_pass($id,$jawaban);
    }
    
    function tambah_daftar_belanja(){
    $id_user = $this->session->userdata('id_user');
    $nama = $this->input->post('nama_list');
    $this->system_belanja->tambah_daftar($id_user,$nama);
    }
    
    function hapus_barang_di_list($id_list,$id_barang){
    $this->db->query("delete from belanja where id_barang = $id_barang and id_list_belanja = $id_list");
    redirect('preshop/daftar_belanja');
    }
    
    function kosong_list($id){
    $this->db->query("delete from belanja where id_list_belanja = $id");
    redirect('preshop/daftar_belanja');
    }
    
    function hapus_list($id){
    $this->db->query("delete from list_belanja where id_list_belanja = $id");
    $this->db->query("delete from belanja where id_list_belanja = $id");
    redirect('preshop/daftar_belanja');
    }
    
    function tambah_barang_ke_list($step,$id_barang){
    $site = site_url();
    $base = base_url();
    $id_user = $this->session->userdata('id_user');
    $lb = $this->db->query("select * from list_belanja where id_user = $id_user");
    $b = $this->db->query("select * from barang where id_barang = $id_barang");
    $barang = $b->row_array();
    $nama_barang = $barang['nama_barang'];
    $merk = $barang['merk'];
    
    if ($step == 0){
      if ($lb->num_rows() <= 0){
        echo "<h1>Maaf Anda belum memiliki daftar Belanjaan</h1><br>";
        echo "Silahkan buat daftar belanjaan dengan mengklik <a href=\"$site/preshop/daftar_belanja\">link ini</a> ";
      }else{
      echo "Menambahkan <strong>$nama_barang</strong> dengan merek <strong>$merk</strong> ke daftar belanjaan ? ";
      echo "<form action=\"$site/lib_preshop/tambah_barang_ke_list/1/$id_barang\" method=\"POST\" id=\"tambah_barang$id_barang\">";
      echo "Daftar Belanjaan : <select name=\"list\">";
      foreach($lb->result_array() as $row){
        $nama_list = $row['nama'];
        $id = $row['id_list_belanja'];
        echo "<option value=\"$id\">$nama_list</option>";
      }
      echo "</select>";
      echo "<br><br>Jumlah yang akan di beli : <input type=\"text\" name=\"jumlah\">";
      echo "<input type=\"hidden\" name=\"id_barang\" value=\"$id_barang\">";
      echo "</form><br><br>";
      }
    }else if($step == 1){
      $list_belanja = $this->input->post('list');
      $id_bar = $this->input->post('id_barang');
      $jumlah = $this->input->post('jumlah');
      if ($jumlah == ''){
        $jumlah = 1;
      }
      $d = $this->db->query("select * from list_belanja where id_list_belanja = $list_belanja");
      $n = $d->row_array();
      $nama_list = $n['nama'];
      $u = $this->db->query("select * from belanja where id_barang = $id_bar and id_list_belanja = $list_belanja");
      $row = $u->row_array();
      if ($u->num_rows() > 0){
         $jml_skr = $row['jumlah'];
         $jml = $jml_skr + $jumlah;
         $this->db->query("update belanja set jumlah = $jml where id_barang = $id_bar and id_list_belanja = $list_belanja");
         echo "Anda Baru Saja menambahkan lagi $nama_barang dengan Merek $merk kedalam Daftar Belanjaan $nama_list sebanyak $jumlah buah";
      }else {
      $this->db->query("insert into belanja(id_list_belanja,id_barang,jumlah) values($list_belanja,$id_bar,$jumlah)");
      echo "Anda Baru Saja menambahkan $nama_barang dengan Merek $merk kedalam Daftar Belanjaan $nama_list sebanyak $jumlah buah";
      }
      }
    }
    
}