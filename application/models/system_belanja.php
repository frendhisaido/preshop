<?php

class System_belanja extends Model {

    function System_belanja(){
        parent:: Model();
    }
    
    function list_belanja(){
    setlocale(LC_MONETARY, 'id_ID');
    $id_user = $this->session->userdata('id_user');
    $data = $this->db->query("select * from list_belanja where id_user = $id_user");
    $site = site_url();
    $base = base_url();
    foreach($data->result_array() as $row){
      $nama = $row['nama'];
      $id = $row['id_list_belanja'];
      echo "<a href=\"$site/preshop/gen_list/$id\" title=\"Klik link ini untuk mencetak daftar belanja <h3>$nama</h3>\">$nama</a><br>";
      $belanja = $this->db->query("select * from belanja where id_list_belanja = $id");
      echo "<table cellpadding=\"5\">";
      echo "<tr><th>No</th><th>Nama Barang</th><th>Merek</th><th>Jumlah</th><th>Harga</th><th>SubTotal</><th>Aksi</th></tr>";
      $i=1;
      $total = 0;
      foreach($belanja->result_array() as $row){
        $id_barang = $row['id_barang'];
   
        $b = $this->db->query("select * from barang where id_barang =  $id_barang");
        $a = $b->row_array();
        $a_nama_barang = $a['nama_barang'];
        $a_merk = $a['merk'];
        $a_harga_barang = $a['harga_barang'];
        $f_harga = money_format('%.2n', $a_harga_barang);
        $a_jumlah = $row['jumlah'];
        $a_total = $a_jumlah*$a_harga_barang;
        $f_total = money_format('%.2n', $a_total);
        $a_pict = $a['gambar'];
	echo "<tr><td>$i</td><td rel=\"$base/csv/gambar/$a_pict.jpg\" class=\"barang\">$a_nama_barang</td><td>$a_merk</td><td>$a_jumlah</td><td>$f_harga</td><td>$f_total</td><td>Aksi</td></tr>";
	$i++;
	$total = $total + $a_total;

      }
      $t = money_format('%.2n', $total);
      echo "</table>";
      echo "Total Belanja anda adalah : $t";
      echo "<br><br>";
    }
    
    }
    
    function tambah_daftar($id_user,$nama){
      $site = site_url();
      $data = $this->db->query("select * from list_belanja where id_user = $id_user and nama like \"%$nama%\"");
      if ($data->num_rows() > 0){
         $this->system_view->error_report("Maaf, Anda telah memiliki Daftar Belanja dengan nama $nama");
      }else{
	 $this->db->query("insert into list_belanja(id_user,nama) values($id_user,\"$nama\") ");
	 $this->system_view->success_report("Daftar Belanja $nama telah dibuat , silahkan mulai <a href=\"$site/preshop/mulai\" >belanja</a>");
      }
    }
    
   
}