<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_pembaruan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Sertifikat</th>
		<th>Tempat Pembaruan</th>
		<th>Tanda Pembaruan</th>
		<th>Tanggal Pembaruan</th>
		
            </tr><?php
            foreach ($tbl_pembaruan_data as $tbl_pembaruan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_pembaruan->id_sertifikat ?></td>
		      <td><?php echo $tbl_pembaruan->tempat_pembaruan ?></td>
		      <td><?php echo $tbl_pembaruan->tanda_pembaruan ?></td>
		      <td><?php echo $tbl_pembaruan->tanggal_pembaruan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>