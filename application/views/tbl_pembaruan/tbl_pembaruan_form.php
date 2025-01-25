<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_PEMBARUAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Sertifikat <?php echo form_error('id_sertifikat') ?></td><td><input type="text" class="form-control" name="id_sertifikat" id="id_sertifikat" placeholder="Id Sertifikat" value="<?php echo $id_sertifikat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tempat Pembaruan <?php echo form_error('tempat_pembaruan') ?></td><td><input type="text" class="form-control" name="tempat_pembaruan" id="tempat_pembaruan" placeholder="Tempat Pembaruan" value="<?php echo $tempat_pembaruan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanda Pembaruan <?php echo form_error('tanda_pembaruan') ?></td><td><input type="text" class="form-control" name="tanda_pembaruan" id="tanda_pembaruan" placeholder="Tanda Pembaruan" value="<?php echo $tanda_pembaruan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Pembaruan <?php echo form_error('tanggal_pembaruan') ?></td>
						<td><input type="date" class="form-control" name="tanggal_pembaruan" id="tanggal_pembaruan" placeholder="Tanggal Pembaruan" value="<?php echo $tanggal_pembaruan; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_pembaruan" value="<?php echo $id_pembaruan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_pembaruan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>