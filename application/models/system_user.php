<?php

class System_user extends Model {

    function System_user(){
        parent:: Model();
    }

    function tambah_user($username,$pass1,$pass2,$telp,$nama){
    $enc_pass = $this->system_setting->hashing($pass1);
    $cek_user = $this->db->query("select * from user where username like \"$username\" or nama like \"$nama\"");
    if ($cek_user->num_rows() > 0 ){
       $this->system_view->error_report('Maaf, Username Atau Nama anda telah terdaftar pada sistem kami, silahkan login dengan username yang anda punya');
    }else if($pass1 != $pass2){
       $this->system_view->error_report('Password yang anda masukan tidak sama !');
    }else if($username == '' || $pass1 == '' || $pass2 == '' || $telp == '' || $nama == ''){
       $this->system_view->error_report('Tolong isi form pendaftaran dengan data yang lengkap !');
    }else {
       $this->db->query("insert into user(username,password,telp,nama) values(\"$username\",\"$enc_pass\",\"$telp\",\"$nama\")");
       $this->system_view->success_report("Selamat $nama, anda telah terdaftar pada sistem kami, silahkan mulai berbelanja");
    }
    }
    
    function check_login($username,$password){
        $enc_pass = $this->system_setting->hashing($password);
        $query = $this->db->query("select * from user where username like \"$username\" and password like \"$enc_pass\"");
        if ($query->num_rows() > 0 ){
           $row = $query->row_array();
           $baned = $row['baned_status'];
           $level = $row['level'];
           if($baned == 0){
           $data = array(
                   'id_user'   => $row['id_user'],
                   'username'  => $row['username'],
                   'password'  => $row['password'],
                   'level'     => $level
               );
           $this->session->set_userdata($data);
             if($level == 1){
                redirect('preshop/mulai');
             }else if($level == 0){
                redirect('admin');
             }
           
           } else if($baned == 1 ){
               $this->system_view->error_report("Maaf, untuk sementara username anda kami blok, silahkan hubungi administrator kami , untuk info yang lebih jelas");
           }
        }else $this->system_view->error_report("Maaf, Username atau password yang anda masukan tidak cocok");
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