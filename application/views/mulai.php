<div id="content">
       <div id="maincol">
       <p>
       <h1>Cari barang yang ingin anda beli </h1>
       <form action="<?php echo site_url();?>/preshop/cari/nama" method="POST"> 
        <table>
          <tr><td><input type="text" class="search" name="barang"></td><td><input type="submit" value="Cari" class="search_button"></td></tr>
        </table>       
       </form>
       </p>
       <br><br>
       <p>
         <h1>Temukan barang berdasarkan ketegori</h1>
         <?php $this->system_barang->list_kategori();?>
       </p><br><br>
       <p>
	 <h1>Temukan barang berdasarkan harga</h1>
	  <form action="<?php echo site_url();?>/preshop/cari/harga" method="POST"> 
	    <table>
	      <tr></tr>
	    </table>
	  </form>
       </p>
    </div>

		
	
