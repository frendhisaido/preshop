<?php

class System_barang extends Model {

    function System_barang(){
        parent:: Model();
    }
     
     function get_cat($jenis){
     $query = $this->db->query("select * from kategori");
     if ($jenis == 'select'){
	echo "<select title=\"Pilih Kategori barang yang akan anda upload\" name=\"kategori\">";
	
	foreach($query->result() as $row){
	    echo "<option value=\"".$row->id_kategori."\">".$row->kategori."</option>";
	}
	echo "</select>";
	}else if ($jenis == 'table'){
	  echo "<div align=\"center\"><table cellpadding=\"5\" class=\"perlu\">
	        <tr><th>Nama Kategori</th><th>Aksi</th></tr>
	       ";
	    foreach($query->result() as $row){
	      echo "<tr><td>".$row->kategori."</td><td><a href=\"\">Hapus</a> || <a href=\"\">Ubah</a> </td><tr>";
	    }
	  echo "</table></div>";
	}
     }
     
     function list_barang($page){
     $site = site_url();
     $base = base_url();
     $i = 0;
     $limit = 4;
     $page_limit = 20; 
     $ofset = $page_limit*$page;
     $q = $this->db->query("select * from barang");
     $r = $q->num_rows();
     $query = $this->db->query("select * from barang b,kategori k where b.id_kategori=k.id_kategori limit $page_limit offset $ofset");
      $pages = ceil($r/$page_limit);
     echo "Pages: ";
     for ($h=1;$h<=$pages;$h++){
       echo "<a href=\"$site/admin/list_barang/".($h-1)."\">$h</a>";
     }
     echo "<table cellpadding=\"15\"><tr>\n";
     foreach($query->result_array() as $row){
         
         $id = $row['id_barang'];
         $nama = $row['nama_barang'];
         $merek = $row['merk'];
         $harga = $row['harga_barang'];
         $gambar = "".$row['gambar'].".jpg";
         if ($i != $limit){
          echo "<td>";
          echo "<table cellpadding=\"3\"> 
		<tr  align=\"center\"><td><a href=\"\">$nama $id</a></td><tr>
		<tr  align=\"center\"><td><img rel=\"$base/csv/gambar/$gambar\" src=\"$base/csv/gambar/$gambar\" width=\"100px\"/></td><tr>
		<tr  align=\"center\"><td>$merek</td><tr>
		<tr  align=\"center\"><td>Rp $harga,-</td><tr>
		</table>";
          echo "</td>\n";
          $i++;
         }else {
         $i = 0;
         echo "<td>";
          echo "<table cellpadding=\"3\"> 
		<tr  align=\"center\"><td><a href=\"\">$nama $id</a></td><tr>
		<tr  align=\"center\"><td><img rel=\"$base/csv/gambar/$gambar\" src=\"$base/csv/gambar/$gambar\" width=\"100px\"/></td><tr>
		<tr  align=\"center\"><td>$merek</td><tr>
		<tr  align=\"center\"><td>Rp $harga,-</td><tr>
		</table>";
          echo "</td>\n";
         echo "</tr><tr>\n";
         }
     }
     echo "</tr></table>\n";
     $pages = ceil($r/$page_limit);
     echo "Pages: ";
     for ($h=1;$h<=$pages;$h++){
       echo "<a href=\"$site/admin/list_barang/".($h-1)."\">$h</a>";
     }
     }
    
}