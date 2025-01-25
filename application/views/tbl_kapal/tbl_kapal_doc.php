<!doctype html>
<html>
    <head>
        <title>LAPORAN DATA KAPAL</title>
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
        <h4 class="text-center">Laporan Data Kapal</h4>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama Kapal</th>
                <th>Tanda Panggilan</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Dimensi</th>
                <th>Tonase Kotor</th>
                <th>Tonase Bersih</th>
                <th>Tahun</th>
                <th>Nomer Imo</th>
                <th>Penggerak Utama</th>
                <th>Merek Tk</th>
                <th>Bahan Utama</th>
                <th>Jumlah Geladak</th>
                <th>Jumlah Baling</th>
                <th>Status</th>
            </tr><?php
            foreach ($tbl_kapal_data as $tbl_kapal)
            {
                ?>
                <tr>
                    <td width="10px"><?php echo ++$start ?></td>
                    <td><?php echo $tbl_kapal->nama_kapal ?></td>
                    <td><?php echo $tbl_kapal->tanda_panggilan ?></td>
                    <td><?php echo $tbl_kapal->panjang ?></td>
                    <td><?php echo $tbl_kapal->lebar ?></td>
                    <td><?php echo $tbl_kapal->dimensi ?></td>
                    <td><?php echo $tbl_kapal->tonase_kotor ?></td>
                    <td><?php echo $tbl_kapal->tonase_bersih ?></td>
                    <td><?php echo $tbl_kapal->tahun ?></td>
                    <td><?php echo $tbl_kapal->nomer_imo ?></td>
                    <td><?php echo $tbl_kapal->penggerak_utama ?></td>
                    <td><?php echo $tbl_kapal->merek_tk ?></td>
                    <td><?php echo $tbl_kapal->bahan_utama ?></td>
                    <td><?php echo $tbl_kapal->jumlah_geladak ?></td>
                    <td><?php echo $tbl_kapal->jumlah_baling ?></td>
                    <td><?php echo renameStatus($tbl_kapal->status) ?></td>
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