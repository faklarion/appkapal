
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_PEMBARUAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Sertifikat</td>
				<td><?php echo $id_sertifikat; ?></td>
			</tr>
	
			<tr>
				<td>Tempat Pembaruan</td>
				<td><?php echo $tempat_pembaruan; ?></td>
			</tr>
	
			<tr>
				<td>Tanda Pembaruan</td>
				<td><?php echo $tanda_pembaruan; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Pembaruan</td>
				<td><?php echo $tanggal_pembaruan; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_pembaruan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>