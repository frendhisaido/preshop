<html>
    <head>
        <title>Input Barang</title>
    </head>
    <body>
        <?php echo form_open('cbarang/add');?>
         <form method= post>
            <table>
                <tr>
                    <td>Nama Barang</td>
                    <td>: <input type="text" name="nama_barang" class="text" value=""/></td>
                </tr>
                  <?php $i=1; foreach ($kategori->result()as $row) { ?>
                    <input type="hidden" name="id_kategori" value="<?php echo $row->id_kategori; ?>"/>
                <tr>
                  <td>Kategori</td>
                  <td>: <?php echo $row->kategori; ?></td>
                </tr>
                   <?php } ?>
                   
                   <?php $i=1; foreach ($merk->result()as $row) { ?>
                    <input type="hidden" name="id_merk" value="<?php echo $row->id_merk; ?>"/>
                <tr>
                   <td>Merk</td>
                   <td>: <?php echo $row->merk; ?></td>
                </tr>
                   <?php } ?>
                <tr>
                    <td>Size</td>
                    <td>: <input type="text" name="size" class="text" value=""/></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>: <input type="text" name="harga_barang" class="text" value=""/></td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>: <input type="text" name="diskon" value=""></td>
                </tr>
                <tr>
                    <td>Promo</td>
                    <td>: <input type="radio" name="promo" value="1">Yes</td>
                    <td><input type="radio" name="promo" value="0" checked>No</td>
                </tr>
                <tr>
                    <td>Tgl Selesai Promo</td>
                    <td>: <input type="text" name="tgl_selesai_promo" class="text" value=""/></td>
                </tr>
                <tr>
                    <td>Tgl Selesai Diskon</td>
                    <td>: <input type="text" name="tgl_selesai_diskon" class="text" value=""/></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>: <input type="text" name="keterangan" class="text" value=""/></td>
                </tr>
                <tr>
                    <td></td>
                    <td>&nbsp;<input type="submit" value="Save"/></td>
                </tr>
            </table>
        </form>
        
    </body>
</html>