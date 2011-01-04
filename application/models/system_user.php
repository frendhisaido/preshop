<?php

class System_user extends Model {

    function System_user(){
        parent:: Model();
    }

    function tambah_user($username,$pass1,$pass2,$telp,$nama,$rahasia,$jawaban){
    $enc_pass = $this->system_setting->hashing($pass1);
    $cek_user = $this->db->query("select * from user where username like \"$username\" or nama like \"$nama\"");
    if ($cek_user->num_rows() > 0 ){
       $this->system_view->error_report('Maaf, Username Atau Nama anda telah terdaftar pada sistem kami, silahkan login dengan username yang anda punya');
    }else if($pass1 != $pass2){
       $this->system_view->error_report('Password yang anda masukan tidak sama !');
    }else if($username == '' || $pass1 == '' || $pass2 == '' || $telp == '' || $nama == ''){
       $this->system_view->error_report('Tolong isi form pendaftaran dengan data yang lengkap !');
    }else {
       $this->db->query("insert into user(username,password,telp,nama,rahasia,jawaban) values(\"$username\",\"$enc_pass\",\"$telp\",\"$nama\",\"$rahasia\",\"$jawaban\")");
       $this->system_view->success_report("Selamat $nama, anda telah terdaftar pada sistem kami, silahkan mulai berbelanja");
    }
    }
    
    function reset_pass($a,$b){
    $site = site_url();
    $id = strip_quotes($a);
    $jawaban = strip_quotes($b);
    $this->db->query("update user set login_gagal=0 where id_user = $id");
    $query = $this->db->query("select * from user where id_user = $id and jawaban like \"$jawaban\"");
    if ($query->num_rows() == 0){
       $this->system_view->error_report("Maaf, jawaban yang anda masukan tidak cocok dengan database kami, <a href=\"$site/preshop/reset_pass/$id\">silahkan ulangi</a>");
    }else if($query->num_rows() == 1){
       $hah = $this->db->query("select * from user where id_user = $id");
       $u = $hah->row_array();
       $username = $u['username'];
       $enc_pass = $this->system_setting->hashing($username);
       $this->db->query("update user set password='$enc_pass' where id_user=$id");
       $this->system_view->success_report("Password anda telah kami reset, anda dapet login menggunakan username <strong>$username</strong> dengan password <strong>$username</strong>");
    }
    
    }
    
    function check_login($username,$password){
        $site = site_url();
        $enc_pass = $this->system_setting->hashing($password);
        $query = $this->db->query("select * from user where username like \"$username\" and password like \"$enc_pass\"");
        if ($query->num_rows() > 0 ){
           $row = $query->row_array();
           $baned = $row['baned_status'];
           $level = $row['level'];
           
           $id =  $row['id_user'];
           if($baned == 0){
           $data = array(
                   'id_user'   => $id,
                   'username'  => $row['username'],
                   'password'  => $row['password'],
                   'level'     => $level
               );
           $this->session->set_userdata($data);
           $this->db->query("update user set login_gagal=0 where id_user = $id");
             if($level == 1){
                redirect('preshop/mulai');
             }else if($level == 0){
                redirect('admin');
             }
           
           } else if($baned == 1 ){
               $this->system_view->error_report("Maaf, untuk sementara username anda kami blok, silahkan hubungi administrator kami , untuk info yang lebih jelas");
           }
        }else {
	    $hah = $this->db->query("select * from user where username like \"$username\"");
	    
	    if ($hah->num_rows() > 0){
	    $wew = $hah->row_array();
	    $error_loging = $wew['login_gagal'];
	    $id_user = $wew['id_user'];
	    $now_attemp = $error_loging+1;
		if ($error_loging <= 2 ){
		$this->db->query("update user set login_gagal='$now_attemp' where id_user = $id_user");
	        $this->system_view->error_report("Maaf, Username atau password yang anda masukan tidak cocok");
		}else if ($error_loging >= 3){
		   $message = "Sistem Kami mencatat anda telah melakukan keselahan Login lebih dari 3 kali.<br>
		               Apabila anda benar $username, Silahkan reset password pada <a href=\"$site/preshop/reset_pass/$id_user\">halaman ini</a>
		              ";
		   $this->system_view->error_report($message);
		}
	    }else $this->system_view->error_report("Maaf, Kami tidak dapet menemukan Username atau Nama di database kami");
        }
    }
    
    function check_session($permission){
    $user = $this->session->userdata('username');
    $pass = $this->session->userdata('password');

       if ($user != ''){
           $query = $this->db->query("select * from user where username like '$user' and password like '$pass' and level = $permission");
          if ($query->num_rows() < 1){
          $this->session->sess_destroy();
            redirect('preshop/login');
          }
       }else {
       $this->session->sess_destroy();
       redirect('preshop/login');
       }
    }
    
   
}