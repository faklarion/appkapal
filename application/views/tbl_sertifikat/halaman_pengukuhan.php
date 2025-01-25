<!doctype html>
<html>
    <head>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div>
            <h4 class="text-center"><?= $title ?></h4>
            <div class="container text-center">
                <div class="row justify-content-center">
                    <?php foreach($data as $row) : ?>
                    <table class="table table-bordered text-center mx-auto" width="50%">
                        <tr>
                            <td>
                                <h3 class="text-center">PENGUKUHAN</h3>
                                <p class="text-center"><i>Endorsement</i></p>
                                <p class="text-center">Disahkan di : <?php echo $row->tempat_pembaruan?></p>
                                <p class="text-center">Tanggal : <?php echo tgl_indo($row->tanggal_pembaruan)?></p>
                                <p class="text-center">Nomer/Tanda : <?php echo $row->tanda_pembaruan?></p>
                                <br>
                                <br>
                                <br>
                                <small>*Kolom tanda tangan disini</small>
                            </td>
                        </tr>
                    </table>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </body>

</html>