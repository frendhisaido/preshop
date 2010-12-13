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

    function getMerk(){
        $merk=$this->db->get('merk');
        return $merk;
    }

    function getIdMerk($id_merk) {
           $this->db->where('id_merk', $id_merk);
           return $this->db->get('merk');
       }

    
    function getBarang(){
      $sql='select b.id_barang, b.nama_barang, k.kategori, m.merk, b.size, b.harga_barang, b.diskon, b.promo, 
      b.tgl_selesai_promo, b.tgl_selesai_diskon, b.keterangan
      from barang b, kategori k, merk m
      where k.id_kategori=b.id_kategori and b.id_merk=m.id_merk';
      $barang=$this->db->query($sql);
      return $barang;
    }
}

?>
