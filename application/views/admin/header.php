<html>
<head>
<title>Sebelumbelanja.com</title>
<link rel="icon" href="<?php echo base_url();?>images/logo.png" type="image/png" />
<link rel="stylesheet" href="<?php echo base_url();?>css/home_style.css" type="text/css" />
<script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery.qtip.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/select.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/tooltip.js" type="text/javascript"></script>
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
          <li><a href="<?php echo site_url(); ?>/admin/" <?php if ($now == ''){ echo "class=\"current\"";}?>>Admin Panel.</a></li>
          <li><a href="<?php echo site_url(); ?>/admin/pengguna" <?php if ($now == 'pengguna'){ echo "class=\"current\"";}?>>Pengguna</a></li>
          <li><a href="<?php echo site_url(); ?>/admin/barang" <?php if ($now == 'barang'){ echo "class=\"current\"";}?>>Barang</a></li>
         <?php 
         $site = site_url();
         $id = $this->session->userdata('id_user');
         if ($id != ''){
          echo "<li><a href=\"$site/preshop/logout\">Logout</a></li>";
         }
         ?>
        </ul>     
      </div>
	</div>