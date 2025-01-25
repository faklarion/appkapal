<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA SERTIFIKAT</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<?php 
						$query = $this->db->select('*')->where('status', 0)->get('tbl_kapal')->result();
					?>
	
					<tr>
						<td width='200'>Nama Kapal <?php echo form_error('id_kapal') ?></td>
						<td>
						<select id="id_kapal" name="id_kapal" class="form-control" style="width: 100%;" required>
							<?php foreach ($query as $option): ?>
								<option value="<?= $option->id_kapal ?>"><?= $option->nama_kapal ?></option>
							<?php endforeach; ?>
						</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Tempat Pendaftaran <?php echo form_error('tempat_pendaftaran') ?></td><td><input type="text" class="form-control" name="tempat_pendaftaran" id="tempat_pendaftaran" placeholder="Tempat Pendaftaran" value="<?php echo $tempat_pendaftaran; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanda Pendaftaran <?php echo form_error('tanda_pendaftaran') ?></td><td><input type="text" class="form-control" name="tanda_pendaftaran" id="tanda_pendaftaran" placeholder="Tanda Pendaftaran" value="<?php echo $tanda_pendaftaran; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Terbit <?php echo form_error('tanggal_terbit') ?></td>
						<td><input type="date" class="form-control" name="tanggal_terbit" id="tanggal_terbit" placeholder="Tanggal Terbit" value="<?php echo $tanggal_terbit; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_sertifikat" value="<?php echo $id_sertifikat; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_sertifikat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>