<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL BERLAYAR</h3>
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
						<td width='200'>Pelabuhan Asal <?php echo form_error('pelabuhan_asal') ?></td><td><input type="text" class="form-control" name="pelabuhan_asal" id="pelabuhan_asal" placeholder="Pelabuhan Asal" value="<?php echo $pelabuhan_asal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelabuhan Tujuan <?php echo form_error('pelabuhan_tujuan') ?></td><td><input type="text" class="form-control" name="pelabuhan_tujuan" id="pelabuhan_tujuan" placeholder="Pelabuhan Tujuan" value="<?php echo $pelabuhan_tujuan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Berlayar <?php echo form_error('tanggal_berlayar') ?></td>
						<td><input type="date" class="form-control" name="tanggal_berlayar" id="tanggal_berlayar" placeholder="Tanggal Berlayar" value="<?php echo $tanggal_berlayar; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Sampai <?php echo form_error('tanggal_sampai') ?></td>
						<td><input type="date" class="form-control" name="tanggal_sampai" id="tanggal_sampai" placeholder="Tanggal Sampai" value="<?php echo $tanggal_sampai; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_berlayar" value="<?php echo $id_berlayar; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_berlayar') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>