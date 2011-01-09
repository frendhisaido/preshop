<div id="content">
	<div id="maincol">
	<h1>Tambahkan Daftar Belanjaan baru</h1>
	<table cellpadding="10">
	 <form action="<?php echo site_url();?>/lib_preshop/tambah_daftar_belanja" method="POST">
	  <tr><td>Nama Daftar Belanjaan</td><td>:</td><td><input type="text" name="nama_list" class="input"></td></tr>
	  <tr><td colspan="3"><input type="submit" value="buat" class="buttong"></td></tr>
	 </form>
	</table>
	<br><br>
	<h1>Daftar Belanjaan yang anda miliki</h1>	
	<?php
	$this->system_belanja->list_belanja();
	?>
	
	</div>
