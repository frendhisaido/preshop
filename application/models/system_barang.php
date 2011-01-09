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
     
     function list_kategori(){
	$site = site_url();
	$query = $this->db->query("select * from kategori");
	$limit_per_row = 4;
	$i = 0;
	echo "<table cellpadding=\"20\"><tr>";
	foreach($query->result_array() as $row){
	  $kategori = $row['kategori'];
	  $id_kategori = $row['id_kategori'];
	  if($i <= $limit_per_row){
	    echo "<td>";
	    echo "<a href=\"$site/preshop/cari/kategori/$id_kategori\">$kategori</a>";
	    echo "</td>";
	    $i++;
	  }else if( $i >= $limit_per_row){
	   
	    echo "<td>";
	    echo "<a href=\"$site/preshop/cari/kategori/$id_kategori\">$kategori</a>";
	    echo "</td>"; 
	    echo "</tr><tr>";
	    $i = 0;
	  }
	}
	echo "</tr></table>";
     }
     
     function cari_barang($dasar='',$value=''){
	  if ($value == ''){
	    echo "<h3>Silahkan masukan barang yang ingin anda cari</h3>";}
	  else if($value != ''){
	   
	   if ($dasar == 'nama'){
	     $data = $this->db->query("select * from barang where nama_barang like \"%$value%\" or merk like \"%$value%\"");
	     $error = "<h3>Maaf $value tidak ada dalam daftar barang kami</h3>";
	     $head = "<h3>Hasil pencarian barang dari kata \"$value\"</h3>";
	   }else if ($dasar == 'kategori'){
	     $data = $this->db->query("select * from barang where id_kategori = $value");
	     $k = $this->db->query("select * from kategori where id_kategori = $value");
	     $n = $k->row_array();
	     $nama = $n['kategori'];
	     $error = "<h3>Kategori $nama lagi kosong</h3>";
	     $head = "<h3>Hasil pencarian untuk kategori</h3> <h1>$nama</h1>";
	   }
	   
	   
	   if ($data->num_rows() <= 0){
	      echo $error;
	   }else{
	         $a = 1;
	         $b = 1;
	         
	         $limit = 4;
	         $site = site_url();
	         $base = base_url();
	         echo $head;
	         echo "<div id=\"paginationdemo\" class=\"demo\">";
	         echo "<div id=\"p1\" class=\"pagedemo _current\" style=\"\">";
	         echo "<table cellpadding=\"20\"><tr>";
	         foreach($data->result_array() as $row){
	            $nama = $row['nama_barang'];
	            $merk = $row['merk'];
	            $pict = $row['gambar'];
	            $harga = $row['harga_barang'];
	            $id_barang = $row['id_barang'];
	            
	            if($a <= $limit){
	              echo "<td>";
	              echo "<table >\n";
	              echo "<tr align=\"center\"><td>$nama</td></tr>\n";
	              echo "<tr align=\"center\"><td><img src=\"$base/csv/gambar/$pict.jpg\" rel=\"$base/csv/gambar/$pict.jpg\" height=\"60px\"></td></tr>\n";
	              echo "<tr align=\"center\"><td>$merk</td></tr>\n";
	              echo "<tr align=\"center\"><td>Rp $harga,-</td></tr>\n";
	              echo "<tr align=\"center\"><td><a id=\"$id_barang\" href=\"$site/lib_preshop/tambah_barang_ke_list/0/$id_barang\" class=\"tanya_belanja\" rel=\"$nama\" title=\"Klik untuk menamhakan <h2>$nama</h2> ke Daftar Belanja\">Tambah ke list</a></td></tr>\n";
	              echo "</table>\n";
	              echo "</td>\n";
	              $a++;
	            }else if($a >= $limit){
	              
	              echo "<td>";
	              echo "<table>\n";
	              echo "<tr align=\"center\"><td>$nama</td></tr>\n";
	              echo "<tr align=\"center\"><td><img src=\"$base/csv/gambar/$pict.jpg\" rel=\"$base/csv/gambar/$pict.jpg\" height=\"60px\"></td></tr>\n";
	              echo "<tr align=\"center\"><td>$merk</td></tr>\n";
	              echo "<tr align=\"center\"><td>Rp $harga,-</td></tr>\n";
	              echo "<tr align=\"center\"><td><a id=\"$id_barang\" href=\"$site/lib_preshop/tambah_barang_ke_list/0/$id_barang\" class=\"tanya_belanja\" rel=\"$nama\" title=\"Klik untuk menamhakan <h2>$nama</h2> ke Daftar Belanja\">Tambah ke list</a></td></tr>\n";
	              echo "</table>\n";
	              echo "</td>\n";
	              echo "</tr>\n";
	              $b ++;
	              $a = 1;
	              
	            }
	            
	              if($b >= 3){
	                  $p = $b+1;
	                   echo "</table></div>\n";
	                   echo "<div id=\"p$p\" class=\"pagedemo _current\" style=\"\"><table cellpadding=\"20\"><tr>\n";
	                   $b = 1;
	              }
	           
		  } 
		  echo "</tr></table></div></div>";
                  echo "<div id=\"page\"></div>";
	   }
	  }

     }
    
}