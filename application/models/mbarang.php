<?php

class mbarang extends Model {

    function mbarang(){
        parent:: Model();
    }

    function getKategori() {
           $kategori=$this->db->get('kategori');
           return $kategori;
       }

    function getIdKategori($id_kategori) {
           $this->db->where('id_kategori', $id_kategori);
           return $this->db->get('kategori');
       }
    
    function getBarang(){
      $sql='select b.id_barang, b.nama_barang, k.kategori, b.size, b.harga_barang, b.diskon, b.promo
            , b.tgl_selesai_promo, b.tgl_selesai_diskon, b.keterangan from barang b, kategori k
            where b.id_kategori=k.id_kategori';
      return $this->db->query($sql);
    }
}

?>
