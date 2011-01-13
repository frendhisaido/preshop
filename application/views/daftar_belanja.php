<div id="maintext" class="grid_12 shadow column">
	<h1>Tambahkan Daftar Belanjaan baru</h1>
	 <form action="<?php echo site_url();?>/lib_preshop/tambah_daftar_belanja" method="POST">
	  Nama Daftar Belanjaan : <input type="text" name="nama_list" class="input">
    <td colspan="3"><input type="submit" value="buat" class="buttong">
	 </form>
	<br><br>
	</div>
	<div class="grid_12 shadow column">    
	<h1>Daftar Belanjaan yang anda miliki</h1>	
	<?php
	$this->system_belanja->list_belanja();
	?>
	
	</div>
