<div id="content">
	<div id="maincol">
	<?php 
	$id = $this->uri->segment(3);
	$this->system_barang->list_barang($id)
	?>
</div>