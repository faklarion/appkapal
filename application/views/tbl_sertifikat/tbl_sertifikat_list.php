<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA SERTIFIKAT</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_sertifikat/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
            </div>
            <div style="padding-bottom: 10px;">
                <form action="<?php echo site_url('tbl_sertifikat/filter'); ?>" method="get" target="_blank" class="form-inline">
                    <label for="status" class="mr-2">Status:</label>
                    <select name="status" id="status" class="form-control mr-2">
                        <option value="0">Expired</option>
                        <option value="1">Belum Expired</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>

            <div style="padding-bottom: 10px;">
                <form action="<?php echo site_url('tbl_sertifikat/filter_expired'); ?>" method="get" target="_blank" class="form-inline">
                    <label for="status" class="mr-2">Tanggal Batas Expired:</label>
                    <input type="date" name="tanggal_batas" id="tanggal_batas" class="form-control" required>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </form>
            </div>

            <!-- <div style="padding-bottom: 10px;">
                <label class="mr-2">Cetak Laporan Grafik:</label>
                <?php echo anchor(site_url('tbl_sertifikat/grafik'), 'Cetak', 'target="_blank" class="btn btn-primary btn-sm"'); ?>
            </div>-->
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" id="tabel_sertifikat" style="margin-bottom: 10px">
            <thead>
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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
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
                    <td style="text-align:center" width="200px">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $tbl_sertifikat->id_sertifikat ?>">Detail Pembaruan</button>
                        <?php 
                            // Tombol Edit dan Hapus
                            echo anchor(site_url('tbl_sertifikat/read/' . $tbl_sertifikat->id_sertifikat),'<i class="fa fa-print" aria-hidden="true"></i>','target="_blank" class="btn btn-primary btn-sm"'); 
                            echo '  '; 
                            echo anchor(site_url('tbl_sertifikat/delete/' . $tbl_sertifikat->id_sertifikat),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        </div>
                    </div>
            </div>
            </div>
    </section>
</div>

    <!-- Modal -->
    <?php foreach ($tbl_sertifikat_data as $tbl_sertifikat) { ?>
    <div class="modal fade" id="myModal<?php echo $tbl_sertifikat->id_sertifikat; ?>" tabindex="-1" role="dialog" aria-labelledby="expiredModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="expiredModalLabel">Detail Pembaruan Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php 
                    echo anchor(site_url('tbl_sertifikat/pengukuhan/' . $tbl_sertifikat->id_sertifikat),'<i class="fa fa-print" aria-hidden="true"> Cetak Halaman Pengukuhan</i>','target="_blank" class="btn btn-primary btn-sm"'); 
                ?>
                    <table class="table">
                        <tr>
                            <td>Nama Kapal</td>
                            <td>:</td>
                            <td><?php echo $tbl_sertifikat->nama_kapal ?></td>
                        </tr>
                    </table>

                    <?php 
						$query = $this->db->select('*')
                        ->from('tbl_pembaruan')
                        ->join('tbl_sertifikat', 'tbl_sertifikat.id_sertifikat = tbl_pembaruan.id_sertifikat')
                        ->where('tbl_pembaruan.id_sertifikat', $tbl_sertifikat->id_sertifikat)
                        ->order_by('id_pembaruan', 'DESC')
                        ->get()
                        ->result();    
                        
                        $no = 1;
					?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tempat Pembaruan</td>
                                <td>Tanda Pembaruan</td>
                                <td>Tanggal Pembaruan</td>
                                <td>Tanggal Expired</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($query as $data) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data->tempat_pembaruan?></td>
                                    <td><?php echo $data->tanda_pembaruan?></td>
                                    <td><?php echo tgl_indo($data->tanggal_pembaruan)?></td>
                                    <td><?php echo tgl_indo(date('Y-m-d', strtotime('+1 year', strtotime($data->tanggal_pembaruan))))?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <?php 
                    if($tbl_sertifikat->tanggal_expired > date('Y-m-d')) {
                        echo 'Sertifikat Belum Expired';
                    } elseif($tbl_sertifikat->tanggal_expired < date('Y-m-d')) {
                        echo anchor(
                            site_url('tbl_pembaruan/update_sertifikat/' . $tbl_sertifikat->id_sertifikat),
                            'Perbarui Sertifikat',
                            'class="btn btn-primary"'
                        ); 
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>