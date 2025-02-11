
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_BERLAYAR</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Kapal</td>
				<td><?php echo $id_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Pelabuhan Asal</td>
				<td><?php echo $pelabuhan_asal; ?></td>
			</tr>
	
			<tr>
				<td>Pelabuhan Tujuan</td>
				<td><?php echo $pelabuhan_tujuan; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Berlayar</td>
				<td><?php echo $tanggal_berlayar; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Sampai</td>
				<td><?php echo $tanggal_sampai; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_berlayar') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>