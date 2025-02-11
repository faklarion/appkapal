<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KAPAL BERLAYAR</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_berlayar/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		    </div>
            </div>
            <div class='col-md-4'>
                <form action="<?= site_url('tbl_berlayar/word') ?>" method="get" target="_blank">
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
        <table class="table table-bordered" style="margin-bottom: 10px" id="tabel_berlayar">
            <thead>
            <tr>
                <th>No</th>
		        <th>Nama Kapal</th>
		        <th>Pelabuhan Asal</th>
                <th>Pelabuhan Tujuan</th>
                <th>Tanggal Berlayar</th>
                <th>Tanggal Sampai</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tbl_berlayar_data as $tbl_berlayar)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $tbl_berlayar->nama_kapal ?></td>
			<td><?php echo $tbl_berlayar->pelabuhan_asal ?></td>
			<td><?php echo $tbl_berlayar->pelabuhan_tujuan ?></td>
			<td><?php echo tgl_indo($tbl_berlayar->tanggal_berlayar) ?></td>
			<td><?php echo tgl_indo($tbl_berlayar->tanggal_sampai) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('tbl_berlayar/read/'.$tbl_berlayar->id_berlayar),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				//echo '  '; 
				echo anchor(site_url('tbl_berlayar/update/'.$tbl_berlayar->id_berlayar),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('tbl_berlayar/delete/'.$tbl_berlayar->id_berlayar),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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