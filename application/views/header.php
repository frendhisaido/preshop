<html>
<head>
<title>Sebelumbelanja.com</title>
<link rel="icon" href="<?php echo base_url();?>images/logo.png" type="image/png" />
<link rel="stylesheet" href="<?php echo base_url();?>css/home_style.css" type="text/css" />
</head>
<body>
<div id="container" >
  <div id="wrapper" class="clearfix">
	<div id="header">
	  <div id="menus">
        <ul>
          <?php
          $now = $this->uri->segment(2);
          ?>
          <li><a href="<?php echo site_url(); ?>/preshop/" <?php if ($now == ''){ echo "class=\"current\"";}?>>Halaman utama.</a></li>
          <li><a href="<?php echo site_url(); ?>/preshop/mulai" <?php if ($now == 'mulai'){ echo "class=\"current\"";}?>>Mulai Belanja</a></li>
          <?php 
          $id = $this->session->userdata('id_user');
          $site = site_url();
          if ($id ==''){
          echo "<li><a href=\"$site/preshop/daftar\"";
          if ($now == 'daftar'){ 
           echo "class=\"current\"";
          }
          echo ">Daftar</a></li>";
          }
          ?>
          
          <li><a href="<?php echo site_url(); ?>/preshop/tentang" <?php if ($now == 'tentang'){ echo "class=\"current\"";}?>>Tentang kami.</a></li>
         <?php 
         if ($id != ''){
          echo "<li><a href=\"$site/preshop/logout\">Logout</a></li>";
         }else echo "<li><a href=\"$site/preshop/login\">Login</a></li>";
         ?>
        </ul>     
      </div>
	</div>