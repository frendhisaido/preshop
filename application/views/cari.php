<div id="content">
   <div id="maincol">
    <div id="pesan"></div>
     <?php if(! isset($barang)){redirect('preshop/mulai');}?>
      
     <?php 
        if ($dasar == 'nama'){
           $this->system_barang->cari_barang('nama',$barang);
        }else if($dasar == 'kategori'){
           $this->system_barang->cari_barang('kategori',$barang);
        } 
     ?>
   </div>

		