<!doctype html>
<html>
    <head>
        <title><?= $title ?></title>
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
        <h4 class="text-center"><?= $title ?></h4>
        <p class="text-center"><?= $deskripsi ?></p>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama Kapal</th>
                <th>Tempat Pendaftaran</th>
                <th>Tanda Pendaftaran</th>
                <th>Tanggal Terbit</th>
                <th>Pembaruan Terakhir</th>
                <th>Tanggal Expired</th>
                <th>Sisa Hari Expired</th>
                <th>Status</th>
            </tr><?php
            foreach ($tbl_sertifikat_data as $tbl_sertifikat)
            {
                ?>
                <tr>
                    <td width="10px"><?php echo ++$start ?></td>
                    <td><?php echo $tbl_sertifikat->nama_kapal ?></td>
                    <td><?php echo $tbl_sertifikat->tempat_pendaftaran ?></td>
                    <td><?php echo $tbl_sertifikat->tanda_pendaftaran ?></td>
                    <td><?php echo tgl_indo($tbl_sertifikat->tanggal_terbit) ?></td>
                    <td><?php echo tgl_indo($tbl_sertifikat->pembaruan_terakhir) ?></td>
                    <td><?php echo tgl_indo($tbl_sertifikat->tanggal_expired) ?></td>
                    <td><?php echo hitungSisaHari($tbl_sertifikat->tanggal_expired)?></td>
                    <td>
                        <?php 
                            if($tbl_sertifikat->tanggal_expired > date('Y-m-d')) {
                                echo 'Belum Expired';
                            } elseif($tbl_sertifikat->tanggal_expired < date('Y-m-d')) {
                                echo 'Sertifikat Expired, Harap Perbarui';
                            }
                        ?>
                    </td>
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