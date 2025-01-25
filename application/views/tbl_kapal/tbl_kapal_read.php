
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_KAPAL</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Kapal</td>
				<td><?php echo $nama_kapal; ?></td>
			</tr>
	
			<tr>
				<td>Tanda Panggilan</td>
				<td><?php echo $tanda_panggilan; ?></td>
			</tr>
	
			<tr>
				<td>Panjang</td>
				<td><?php echo $panjang; ?></td>
			</tr>
	
			<tr>
				<td>Lebar</td>
				<td><?php echo $lebar; ?></td>
			</tr>
	
			<tr>
				<td>Dimensi</td>
				<td><?php echo $dimensi; ?></td>
			</tr>
	
			<tr>
				<td>Tonase Kotor</td>
				<td><?php echo $tonase_kotor; ?></td>
			</tr>
	
			<tr>
				<td>Tonase Bersih</td>
				<td><?php echo $tonase_bersih; ?></td>
			</tr>
	
			<tr>
				<td>Tahun</td>
				<td><?php echo $tahun; ?></td>
			</tr>
	
			<tr>
				<td>Nomer Imo</td>
				<td><?php echo $nomer_imo; ?></td>
			</tr>
	
			<tr>
				<td>Penggerak Utama</td>
				<td><?php echo $penggerak_utama; ?></td>
			</tr>
	
			<tr>
				<td>Merek Tk</td>
				<td><?php echo $merek_tk; ?></td>
			</tr>
	
			<tr>
				<td>Bahan Utama</td>
				<td><?php echo $bahan_utama; ?></td>
			</tr>
	
			<tr>
				<td>Jumlah Geladak</td>
				<td><?php echo $jumlah_geladak; ?></td>
			</tr>
	
			<tr>
				<td>Jumlah Baling</td>
				<td><?php echo $jumlah_baling; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_kapal') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>