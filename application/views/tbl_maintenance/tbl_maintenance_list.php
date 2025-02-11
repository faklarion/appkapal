<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA MAINTENANCE KAPAL</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_maintenance/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		    </div>
            </div>
            <div class='col-md-4'>
                <form action="<?= site_url('tbl_maintenance/word') ?>" method="get" target="_blank">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="tanggal_awal">Tanggal Awal:</label>
                            <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal_akhir">Tanggal Akhir:</label>
                            <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Cetak
                            </button>
                        </div>
                    </div>
                </form>
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
        <table class="table table-bordered" id="maintenance" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kapal</th>
                    <th>Bagian Maintenance</th>
                    <th>Biaya</th>
                    <th>Tanggal Maintenance</th>
                    <th>Tanggal Selesai</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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
			<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('tbl_maintenance/read/'.$tbl_maintenance->id_maintenance),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				//echo '  '; 
				echo anchor(site_url('tbl_maintenance/update/'.$tbl_maintenance->id_maintenance),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('tbl_maintenance/delete/'.$tbl_maintenance->id_maintenance),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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