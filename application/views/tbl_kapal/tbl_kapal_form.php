<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA KAPAL</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Kapal <?php echo form_error('nama_kapal') ?></td><td><input type="text" class="form-control" name="nama_kapal" id="nama_kapal" placeholder="Nama Kapal" value="<?php echo $nama_kapal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanda Panggilan <?php echo form_error('tanda_panggilan') ?></td><td><input type="text" class="form-control" name="tanda_panggilan" id="tanda_panggilan" placeholder="Tanda Panggilan" value="<?php echo $tanda_panggilan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Panjang <small>(M)</small> <?php echo form_error('panjang') ?></td><td><input type="number" step=".01" class="form-control" name="panjang" id="panjang" placeholder="Panjang" value="<?php echo $panjang; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lebar <small>(M)</small> <?php echo form_error('lebar') ?></td><td><input type="number" step=".01" class="form-control" name="lebar" id="lebar" placeholder="Lebar" value="<?php echo $lebar; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Dimensi <small>(M)</small> <?php echo form_error('dimensi') ?></td><td><input type="number" step=".01" class="form-control" name="dimensi" id="dimensi" placeholder="Dimensi" value="<?php echo $dimensi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tonase Kotor <?php echo form_error('tonase_kotor') ?></td><td><input type="number" class="form-control" name="tonase_kotor" id="tonase_kotor" placeholder="Tonase Kotor" value="<?php echo $tonase_kotor; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tonase Bersih <?php echo form_error('tonase_bersih') ?></td><td><input type="number" class="form-control" name="tonase_bersih" id="tonase_bersih" placeholder="Tonase Bersih" value="<?php echo $tonase_bersih; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tahun <?php echo form_error('tahun') ?></td><td><input type="number" min="1900" max="3000" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nomer IMO <?php echo form_error('nomer_imo') ?></td><td><input type="text" class="form-control" name="nomer_imo" id="nomer_imo" placeholder="Nomer Imo" value="<?php echo $nomer_imo; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Penggerak Utama <?php echo form_error('penggerak_utama') ?></td><td><input type="text" class="form-control" name="penggerak_utama" id="penggerak_utama" placeholder="Penggerak Utama" value="<?php echo $penggerak_utama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Merek TK/TW <?php echo form_error('merek_tk') ?></td><td><input type="text" class="form-control" name="merek_tk" id="merek_tk" placeholder="Merek Tk" value="<?php echo $merek_tk; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Bahan Utama <?php echo form_error('bahan_utama') ?></td><td><input type="text" class="form-control" name="bahan_utama" id="bahan_utama" placeholder="Bahan Utama" value="<?php echo $bahan_utama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jumlah Geladak <?php echo form_error('jumlah_geladak') ?></td><td><input type="number" class="form-control" name="jumlah_geladak" id="jumlah_geladak" placeholder="Jumlah Geladak" value="<?php echo $jumlah_geladak; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jumlah Baling <?php echo form_error('jumlah_baling') ?></td><td><input type="number" class="form-control" name="jumlah_baling" id="jumlah_baling" placeholder="Jumlah Baling" value="<?php echo $jumlah_baling; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_kapal" value="<?php echo $id_kapal; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_kapal') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>