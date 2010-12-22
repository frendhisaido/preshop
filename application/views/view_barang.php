<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<title>
Sebelumbelanja.com | Mulai belanja!
</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<link rel="icon" href="<?php echo base_url();?>images/logo.png" type="image/png" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/view_barang.css"/>
<script type="text/javascript" src="<?php echo base_url();?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/all/view_barang.js"></script>
</head>
<body>
<div id="logo">
<img src="<?php echo base_url();?>/images/headerlogo.png" width="267" height="27"/>
</div>

<div id='container'>
  <div id='midcontainer'>  
    <div class="left">
      <div class="searchbox">
      Cari: <input value="" />
      </div>
      <?php $i=1; foreach($kategori->result() as $katRow) {?>
      <div class="block" id="<?php echo $i;?>">
      <?php echo $i; ?>.
      <?php echo $katRow->kategori; ?>
      </div>
      <?php $i++;}?>
    </div>
  <div class='right'>
    kanan.
  </div>
  
  <div class='resultcontainer'>
    <?php $u=1; foreach($list->result() as $listRow) { ?>
    <div class="item" id="<?php echo $u;?>">
        <a target="_blank" href="#">
        <img src="<?php echo base_url();?>images/itm/image_not_found.png" alt="Klematis" width="110" height="90" />
      </a>
      <div class="desc">
        <?php echo $listRow->nama_barang;?>.
        Rp <?php echo $listRow->harga_barang; ?>,00
        <?php echo $listRow->size;?>.
      </div>
    </div>
    <?php $u++;}?>
    <?php echo $this->pagination->create_links();?>
  </div>        
  
    <!--<div id="panel-frame">
      <div class="panel">
          <div class="head"><a href="#" class="close">CLOSE</a></div> 
          <div class="data" style="padding:20px;"></div>
      </div> 
    </div> --> 

  </div>
</div>

</body>
</html>