<html>
    <head>
        <title>LIST BARANG</title>
    </head>
    <body>
        <table border='1'>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Size</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Promo</th>
                        <th>Tgl Selesai Promo</th>
                        <th>Tgl Selesai Diskon</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                        <tbody>
                      <?php $i=1; foreach ($list->result()as $row) { ?>
                     <?php $nn=$row->promo ;
                     if ($nn== "0") { $nn="No" ;} 
                     else if ($nn=="1") {$nn="Yes";}?>
                      
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->nama_barang; ?></td>
                            <td><?php echo $row->kategori; ?></td>
                            <td><?php echo $row->size; ?></td>
                            <td><?php echo $row->harga_barang; ?></td>
                            <td><?php echo $row->diskon; ?></td>
                            <td><?php echo $nn ;?></td>
                            <td><?php echo $row->tgl_selesai_promo; ?></td>
                            <td><?php echo $row->tgl_selesai_diskon; ?></td>
                            <td><?php echo $row->keterangan; ?></td>
                <td><?php 
                      echo anchor('cbarang/delete/'.$row->id_barang,'Delete'); 
                      echo anchor('cbarang/edit/'.$row->id_barang,'Edit'); ?>
                <?php $i++; }?>
                          </tr>
                        </tbody>
                    </table>
                    </table>     
    </body>
</html>