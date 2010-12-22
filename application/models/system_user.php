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
}