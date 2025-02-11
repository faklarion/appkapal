<!doctype html>
<html>
    <head>
        <title>Laporan Maintenance Kapal</title>
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
        <h4 class="text-center">Laporan Data Maintenance Kapal</h4>
        <p class="text-center"><?= $label ?></p>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama Kapal</th>
                <th>Bagian Maintenance</th>
                <th>Biaya</th>
                <th>Tanggal Maintenance</th>
                <th>Tanggal Selesai</th>
            </tr>
                <?php
                    foreach ($tbl_maintenance_data as $tbl_maintenance)
                    {
                ?>
                <tr>
                    <td width="10px"><?php echo ++$start ?></td>
                    <td><?php echo $tbl_maintenance->nama_kapal ?></td>
                    <td><?php echo $tbl_maintenance->bagian_maintenance ?></td>
                    <td><?php echo formatRupiah($tbl_maintenance->biaya) ?></td>
                    <td><?php echo tgl_indo($tbl_maintenance->tanggal_maintenance) ?></td>
                    <td><?php echo tgl_indo($tbl_maintenance->tanggal_selesai) ?></td>
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