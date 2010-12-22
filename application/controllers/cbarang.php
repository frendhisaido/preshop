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
      $data['list']= $this->mbarang->getListBarang();
      $this->load->view('listbarang',$data);
    }
    //kalau yang ini cuma beda load viewnya aja.
    function viewBarang(){
      //siapkan pagination  
      $this->load->library('pagination');
      $config['base_url']= base_url().'index.php/cbarang/viewBarang/';
      $config['total_rows']= $this->db->count_all('barang');
      $config['per_page']= '10';
      $this->pagination->initialize($config);
      
      
      
      $this->load->model('mbarang');
      $data['kategori']= $this->mbarang->getKategori();
      $data['list']= $this->mbarang->getBarang($config['per_page'],$this->uri->segment(3));
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
     $html = $this->load->view('cobapdf',$data,true);
     pdf_create($html, 'filename');
    }  
}
/* End of file cbarang.php */
/* Location: ./system/application/controllers/cbarang.php */
