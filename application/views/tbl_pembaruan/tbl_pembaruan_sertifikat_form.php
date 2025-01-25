<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">PEMBARUAN SERTIFIKAT</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
                    <?php 
						$query = $this->db->select('*')
                        ->from('tbl_sertifikat')
                        ->join('tbl_kapal', 'tbl_kapal.id_kapal = tbl_sertifikat.id_kapal')
                        ->where('id_sertifikat', $id_sertifikat)
                        ->get()
                        ->row();      
					?>

					<tr>
						<td width='200'>Nama Kapal </td>
                        <td>
                            <?php echo $query->nama_kapal ?>
                        </td>
					</tr>

                    <tr>
						<td width='200'>Tanggal Expired </td>
                        <td>
                            <?php echo tgl_indo($query->tanggal_expired) ?>
                        </td>
					</tr>
	
					<tr>
						<td width='200'>Tempat Pembaruan <?php echo form_error('tempat_pembaruan') ?></td><td><input type="text" class="form-control" name="tempat_pembaruan" id="tempat_pembaruan" placeholder="Tempat Pembaruan" value="<?php echo $tempat_pembaruan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanda Pembaruan <?php echo form_error('tanda_pembaruan') ?></td><td><input type="text" class="form-control" name="tanda_pembaruan" id="tanda_pembaruan" placeholder="Tanda Pembaruan" value="<?php echo $tanda_pembaruan; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
                            <input type="hidden" name="id_sertifikat" value="<?php echo $id_sertifikat ?>">
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_sertifikat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>