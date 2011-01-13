<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sebelumbelanja.com</title>
<link rel="icon" href="<?php echo base_url();?>images/logo.png" type="image/png" />
<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/text.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/960.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/south-street/jquery.ui.css" type="text/css" />
<script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery.ui.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/function.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery.qtip.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/select.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery.paginate.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/tooltip.js" type="text/javascript"></script>
</head>
<body>

  <div id="container" class="container_12 clearfix">
  <!--header-->  
    <img class="the_header" src="<?php echo base_url();?>images/headerlogo.png"/>  
    
	<div id="menus" class="grid_12">
    <ul>
          <?php
          $now = $this->uri->segment(2);
          ?>
          <li><a href="<?php echo site_url(); ?>/preshop/" <?php if ($now == ''){ echo "class=\"current\"";}?>>Halaman utama.</a></li>
          <li><a href="<?php echo site_url(); ?>/preshop/mulai" <?php if ($now == 'mulai'){ echo "class=\"current\"";}?>>Mulai Belanja</a></li>
          <?php 
          $id = $this->session->userdata('id_user');
          $GLOBALS['id'] = $id; 
          $site = site_url();
          if ($id ==''){
          echo "<li><a href=\"$site/preshop/daftar\"";
          if ($now == 'daftar'){ 
           echo "class=\"current\"";
          }
          echo ">Daftar</a></li>";
          }
          ?>
          
          
         <?php 
         if ($id != ''){
          echo "<li><a href=\"$site/preshop/daftar_belanja\"";
           if ($now == 'daftar_belanja'){ 
           echo "class=\"current\"";
          }
          echo ">Daftar Belanja</a></li>";
           echo "<li><a href=\"$site/preshop/promo\"";
           if ($now == 'promo'){ 
           echo "class=\"current\"";
          }
          echo ">Promo</a></li>";
          echo "<li><a href=\"$site/preshop/logout\">Logout</a></li>";
         }else echo "<li><a href=\"$site/preshop/login\">Login</a></li>";
         ?>
         <li><a href="<?php echo site_url(); ?>/preshop/tentang" <?php if ($now == 'tentang'){ echo "class=\"current\"";}?>>Tentang kami.</a></li>
        </ul>     
    </div>
    <div class="clear"></div>
	  