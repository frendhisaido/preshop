<?php

class System_view extends Model {

    function System_view(){
        parent:: Model();
    }
    
    function get_user_list(){
     $query = $this->db->query("select * from user where id_user not like '1'");
     $i = 1;
     echo "<table cellpadding=\"5\"><tr><th>No</th><th>Username</th><th>Nama</th><th>No telp</th><th>Level</th><th>Status</th><th>Aksi</th></tr>";
     foreach($query->result_array() as $row){
       $username = $row['username'];
       $nama = $row['nama'];
       $nguk = $row['level'];
       if ($nguk == 1){
         $level = "Pengguna";
       }else if($nguk == 0){
         $level = "Administrator";
       }
       $id = $row['id_user'];
       $telp = $row['telp'];
       $ban = $row['baned_status'];
        if ($ban == 0){
         $status = "Aktif";
       }else if($nguk == 1){
         $status = "Di blokir";
       }
       echo "<tr><td>$i</td><td>$username</td><td>$nama</td><td>$telp</td><td>$level</td><td>$status</td><td>Hapus || Edit</td></tr>";
       $i++;
     }
     echo "</table>";
    }
    
    function error_report($message){
    $data['message'] = $message;
    $this->load->view('header');
    $this->load->view('error',$data);
    $this->load->view('footer');
    }

    function success_report($message){
    $data['message'] = $message;
    $this->load->view('header');
    $this->load->view('success',$data);
    $this->load->view('footer');
    }
}