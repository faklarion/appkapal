<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA MAINTENANCE KAPAL</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>

					<?php 
						$query = $this->db->select('*')->get('tbl_kapal')->result();
					?>
	
					<tr>
						<td width='200'>Nama Kapal <?php echo form_error('id_kapal') ?></td>
						<td>
						<select id="id_kapal" name="id_kapal" class="form-control" style="width: 100%;" required>
							<?php foreach ($query as $option): ?>
								<option value="<?= $option->id_kapal ?>" <?= ($option->id_kapal == $id_kapal) ? 'selected' : '' ?>>
									<?= $option->nama_kapal ?>
								</option>
							<?php endforeach; ?>
						</select>

						</td>
					</tr>
	    
					<tr>
						<td width='200'>Bagian Maintenance <?php echo form_error('bagian_maintenance') ?></td>
						<td> <textarea class="form-control" rows="3" name="bagian_maintenance" id="bagian_maintenance" placeholder="Bagian Maintenance"><?php echo $bagian_maintenance; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Biaya <?php echo form_error('biaya') ?></td><td><input type="number" class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Maintenance <?php echo form_error('tanggal_maintenance') ?></td>
						<td><input type="date" class="form-control" name="tanggal_maintenance" id="tanggal_maintenance" placeholder="Tanggal Maintenance" value="<?php echo $tanggal_maintenance; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></td><td><input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_maintenance" value="<?php echo $id_maintenance; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_maintenance') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>