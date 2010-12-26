<?php

class System_belanja extends Model {

    function System_belanja(){
        parent:: Model();
    }
    
    function list_belanja($id){
    echo $id;
    }
    
    function get_cat(){
    echo "<select title=\"Pilih Kategori barang yang akan anda upload\" name=\"kategori\">";
    $query = $this->db->query("select * from kategori");
    foreach($query->result() as $row){
      echo "<option value=\"".$row->id_kategori."\">".$row->kategori."</option>";
    }
    echo "</select>";
    }
}