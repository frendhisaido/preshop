<html>
    <head>
        <title>Pilih/Input Kategori</title>
    </head>
    <body>
            <table>
              <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    
                    <table border='1'>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Actions</th>
                      </tr>
                        <tbody>
                      <?php $i=1; foreach ($kategori->result()as $row) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->kategori ?></td>
                <td><?php 
                      echo anchor('cbarang/merk/'.$row->id_kategori,'Pilih'); ?>
                <?php $i++; } ?>
                          </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                  <td>Jika kategori belum ada silahkan ditambahkan</td>
                </tr>
                <?php echo form_open('cbarang/addKategori');?>
                <form method= post>
                <tr>
                    <td>Nama Kategori</td>
                    <td>: <input type="text" name="kategori" class="text" value=""/></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>&nbsp;<input type="submit" value="Save"/></td>
                </tr>
                <?php echo anchor('cbarang/listBarang','List Barang'); ?>
            </table>
        </form>
        
    </body>
</html>