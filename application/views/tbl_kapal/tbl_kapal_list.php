<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KAPAL</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
                <?php echo anchor(site_url('tbl_kapal/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                <?php echo anchor(site_url('tbl_kapal/word'), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Print', 'target="_blank" class="btn btn-primary btn-sm"'); ?>
            </div>
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
        <table class="table table-bordered" id="tabel_kapal" style="margin-bottom: 10px">
            <thead>
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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
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
                    <td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('tbl_kapal/read/'.$tbl_kapal->id_kapal),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				//echo '  '; 
				echo anchor(site_url('tbl_kapal/update/'.$tbl_kapal->id_kapal),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('tbl_kapal/delete/'.$tbl_kapal->id_kapal),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </tbody>

        </div>
                    </div>
            </div>
            </div>
    </section>
</div>