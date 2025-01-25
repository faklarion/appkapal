
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_SERTIFIKAT</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tempat Pendaftaran</td>
				<td><?php echo $tempat_pendaftaran; ?></td>
			</tr>
	
			<tr>
				<td>Tanda Pendaftaran</td>
				<td><?php echo $tanda_pendaftaran; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Terbit</td>
				<td><?php echo $tanggal_terbit; ?></td>
			</tr>
	
			<tr>
				<td>Pembaruan Terakhir</td>
				<td><?php echo $pembaruan_terakhir; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Expired</td>
				<td><?php echo $tanggal_expired; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_sertifikat') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>