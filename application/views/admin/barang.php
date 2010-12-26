<div id="content">
	<div id="maincol">
	   <h1>Manajemen Barang</h1>
	   <br/><br/>
	   <strong>Upload List Barang</strong>
	   <form action = "<?php echo site_url();?>/lib_admin/upload_csv/" method="POST" enctype="multipart/form-data">
	    <table cellpadding="10">
	      <tr><td>Kategori</td><td>:</td><td><?php $this->system_barang->get_cat('select');?></td></tr>
	      <tr><td>File</td><td>:</td><td><input type="file" name="userfile" title="Pilih file berisi list barang yang akan anda upload. Cek kembali sebelum mengupload, untuk mengurangi tingkat kesalahan"></td></tr>
	      <tr><td></td><td></td><td><input type="submit" value="Upload"></td></tr>
	    </table>
	   </form>
	   
	   <br/><br/>
	   <strong>Tambahkan Kategori Barang</strong>
	   <form action="<?php echo site_url();?>/lib_admin/tambah_cat/" method="POST">
	      <table cellpadding="10">
	        <tr><td>Nama Kategori</td><td>:</td><td><input type="text" name="ketegori" class="input"></td></tr>
	        <tr><td></td><td></td><td><input type="submit" value="tambah"></td></tr>
	      </table>
	   </form>
	   <br><br>
	   <strong>List Kategori yang tersedia</strong>
	   <?php $this->system_barang->get_cat('table');?>
	</div>
	</div>