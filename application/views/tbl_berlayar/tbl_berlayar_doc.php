<!doctype html>
<html>
    <head>
        <title>Laporan Kapal Berlayar</title>
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
        <h2 class="text-center">PT RIMAU BAHTERA SHIPPING</h2>
        <p class="text-center"><img src="<?= base_url('assets/images/logorbs.png') ?>" width="200px" alt=""></p>
        <h4 class="text-center">Laporan Data Kapal Berlayar</h4>
        <p class="text-center"><?= $label ?></p>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama Kapal</th>
                <th>Pelabuhan Asal</th>
                <th>Pelabuhan Tujuan</th>
                <th>Tanggal Berlayar</th>
                <th>Tanggal Sampai</th>
		
            </tr><?php
            foreach ($tbl_berlayar_data as $tbl_berlayar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_berlayar->nama_kapal ?></td>
		      <td><?php echo $tbl_berlayar->pelabuhan_asal ?></td>
		      <td><?php echo $tbl_berlayar->pelabuhan_tujuan ?></td>
		      <td><?php echo tgl_indo($tbl_berlayar->tanggal_berlayar) ?></td>
		      <td><?php echo tgl_indo($tbl_berlayar->tanggal_sampai) ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>

<script>
    window.print();
</script>