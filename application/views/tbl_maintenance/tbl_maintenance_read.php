
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_MAINTENANCE</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Bagian Maintenance</td>
				<td><?php echo $bagian_maintenance; ?></td>
			</tr>
	
			<tr>
				<td>Biaya</td>
				<td><?php echo $biaya; ?></td>
			</tr>
	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Maintenance</td>
				<td><?php echo $tanggal_maintenance; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Selesai</td>
				<td><?php echo $tanggal_selesai; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_maintenance') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>