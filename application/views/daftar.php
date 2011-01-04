<div id="content">
	<div id="maincol">
	    <h1>Pendaftaran</h1>

</script>
	     <p>
	       <form action="<?php echo site_url();?>/lib_preshop/daftar" method="POST">
	         <table cellpadding="5" id="register">
	           <tr><td>Username</td><td>:</td><td><input type="text" name="username" class="input"></td></tr>
	           <tr><td>Password</td><td>:</td><td><input type="password" name="password" class="input"></td></tr>
	           <tr><td>Ulangi Password</td><td>:</td><td><input type="password" name="confirm_password" class="input"></td></tr>
	           <tr><td>Nama Panjang</td><td>:</td><td><input type="text" name="nama" class="input"></td></tr>
	           <tr><td>Pertanyaan Rahasia</td><td>:</td><td><textarea name="rahasia" rel="tooltip" class="textarea" title="Isilah pertanyaan ini dengan pertanyaan yang jawabanya hanya anda yang tahu. <br><br> Pertanyaan ini akan kami ajukaan lagi ketika anda akan mereset password "></textarea></td></tr>
	           <tr><td>Jawaban</td><td>:</td><td><input type="text" name="jawaban" class="input" title="Jawaban dari pertanyaan rahasia, sebaiknya anda ingat-ingat jawaban ini dan jangan beritahu siapapun"></td></tr>
	           <tr><td>No Telp</td><td>:</td><td><input type="text" name="telp" class="input"></td></tr>
	           <tr><td><input type="reset" value="Reset"></td><td>:</td><td><input type="submit" value="Register"></td></tr>
	         </table>
	       </form>
	    </p>
	</div>
		
	
