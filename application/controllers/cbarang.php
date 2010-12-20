<?php

class cbarang extends Controller {

    function cbarang() {
        parent::Controller();
            //load helper,database and library
            $this->load->helper(array('url', 'form'));
            $this->load->database();
            $this->load->library(array('table', 'validation'));

    }


    function index() {
           $this->load->model('mbarang');
           $data['kategori'] = $this->mbarang->getKategori();
           $this->load->view('kategori',$data);
    }
    
    function addKategori() {
        $this->db->insert('kategori',$_POST);
        $sql='select *from kategori where id_kategori=(select max(id_kategori) as id from kategori)';
        $data['kategori']= $this->db->query($sql);
        $this->load->view('inputbarang',$data);
    }
    
    function barang(){
        $this->load->model('mbarang');
        $sql='select *from kategori where id_kategori=?';
        $data['kategori']= $this->db->query($sql, $this->uri->segment(3));
        $this->load->view('inputbarang',$data);
    }
    
    function listBarang(){
      $this->load->model('mbarang');
      $data['list']= $this->mbarang->getBarang();
      $this->load->view('listbarang',$data);
    }
    //kalau yang ini cuma beda load viewnya aja.
    function viewBarang(){
      $this->load->model('mbarang');
      $data['kategori']= $this->mbarang->getKategori();
      $data['list']= $this->mbarang->getBarang();
      $this->load->view('view_barang',$data);
    }

    function add() {
        $this->db->insert('barang',$_POST);
        redirect('cbarang/listBarang', 'refresh');
    }

    function delete() {
            $sql = 'DELETE FROM barang WHERE id_barang=?';
            $this->db->query($sql, $this->uri->segment(3));
            redirect('cbarang/', 'refresh');
        }
        
        function pdf(){
     $this->load->plugin('to_pdf');   
      $this->load->model('mbarang');
      $data['kategori']= $this->mbarang->getKategori();
      $data['list']= $this->mbarang->getBarang();
     $html = $this->load->view('view_barang',$data,true);
     pdf_create($html, 'filename');
    }  
}
/* End of file cbarang.php */
/* Location: ./system/application/controllers/cbarang.php */
