<html>
    <head>
        <title>Pilih/Input Merk</title>
    </head>
    <body>
            <table>
            <?php $i=1; foreach ($kategori->result()as $m) { ?>
              <input type="hidden" name="id_kategori" value="<?php echo $m->id_kategori; ?>"/>
              <tr>
                <td>Kategori</td>
                <td>: <?php echo $m->kategori; ?></td> <?php } ?>
              </tr>
              
              <tr>
                    <td>Merk</td>
                    <td>:</td>
                    
                    <table border='1'>
                      <tr>
                        <th>No</th>
                        <th>Merk</th>
                        <th>Actions</th>
                      </tr>
                        <tbody>
                      <?php $i=1; foreach ($merk->result()as $row) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->merk; ?></td>
                <td><?php 
                      echo anchor('cbarang/barang/'.$row->id_merk.'/'.$m->id_kategori,'Pilih'); ?>
                <?php $i++; }?>
                          </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                  <td>Jika merk belum ada silahkan ditambahkan</td>
                </tr>
                <?php echo form_open('cbarang/addMerk');?>
                <form method= post>
                <?php $i=1; foreach ($kategori->result()as $n) { ?>
              <input type="hidden" name="id_kategori" value="<?php echo $n->id_kategori; ?>"/> <?php } ?>
                <tr>
                    <td>Merk</td>
                    <td>: <input type="text" name="merk" class="text" value=""/></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>&nbsp;<input type="submit" value="Save"/></td>
                </tr>
            </table>
        </form>
        
    </body>
</html>