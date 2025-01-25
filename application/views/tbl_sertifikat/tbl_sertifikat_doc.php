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
        <h2>Tbl_sertifikat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kapal</th>
		<th>Tempat Pendaftaran</th>
		<th>Tanda Pendaftaran</th>
		<th>Tanggal Terbit</th>
		<th>Pembaruan Terakhir</th>
		<th>Tanggal Expired</th>
		
            </tr><?php
            foreach ($tbl_sertifikat_data as $tbl_sertifikat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_sertifikat->id_kapal ?></td>
		      <td><?php echo $tbl_sertifikat->tempat_pendaftaran ?></td>
		      <td><?php echo $tbl_sertifikat->tanda_pendaftaran ?></td>
		      <td><?php echo $tbl_sertifikat->tanggal_terbit ?></td>
		      <td><?php echo $tbl_sertifikat->pembaruan_terakhir ?></td>
		      <td><?php echo $tbl_sertifikat->tanggal_expired ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>