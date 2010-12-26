<div id="content">
	<div id="maincol">
	   <h1>Reset Password anda dengan mengisi jawaban dibawah ini</h1>
	   <?php 
	   $query = $this->db->query("select * from user where id_user = $id_user");
	   $row = $query->row_array();
	   $pertanyaan = $row['rahasia'];
	   ?>
	   <form action="<?php echo site_url();?>/lib_preshop/reset_pass" method="POST">
	     <table cellpadding="5">
	       <input type="hidden" name="id" value="<?php echo $id_user;?>">
	       <tr><td>Pertanyaan Rahasia</td><td>:</td><td><?php echo $pertanyaan;?> ?</td></tr>
	       <tr><td>Jawaban</td><td>:</td><td><input type="text" name="jawaban" class="input"></td></tr>
	       <tr><td colspan="3"><input type="submit" value="Reset Password"></td></tr>
	     </table>
	   </form>
	</div>
	</div>