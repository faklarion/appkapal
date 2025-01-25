<head>
        <title>DATA SERTIFIKAT</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title text-center">SURAT LAUT</h3>
				<p class="text-center">Diterbitkan berdasarkan ketentuan pasal 58.</p>
				<p class="text-center">Permenhub Nomer PM 13 Tahun 2012</p>
			</div>
			<div class="box-body">
				<div class="container">
					<p>Yang bertanda tangan dibawah ini, menyatakan bahwa : </p>
				</div>
				<table class="table word-table">
					<tr>
						<th>NAMA KAPAL</th>
						<th>TANDA PANGGILAN</th>
						<th>TEMPAT PENDAFTARAN</th>
						<th>TANDA PENDAFTARAN</th>
					</tr>
					<tr>
						<td><?php echo $row->nama_kapal ?></td>
						<td><?php echo $row->tanda_panggilan ?></td>
						<td><?php echo $row->tempat_pendaftaran ?></td>
						<td><?php echo $row->tanda_pendaftaran ?></td>
					</tr>
				</table>
				<table class="table word-table">
					<tr>
						<th>UKURAN PxLxD (M)</th>
						<th>TONASE KOTOR (GT)</th>
						<th>TONASE BERSIH (NT)</th>
						<th>TAHUN PEMBANGUNAN</th>
						<th>NOMER IMO</th>
					</tr>
					<tr>
						<td><?php echo $row->panjang ?> x <?php echo $row->lebar ?> x <?php echo $row->dimensi ?></td>
						<td><?php echo $row->tonase_kotor ?></td>
						<td><?php echo $row->tonase_bersih ?></td>
						<td><?php echo $row->tahun ?></td>
						<td><?php echo $row->nomer_imo ?></td>
					</tr>
				</table>

				<table class="table word-table">
					<tr>
						<th>PENGGERAK UTAMA</th>
						<th>MEREK TK/TW</th>
						<th>BAHAN UTAMA KAPAL</th>
						<th>JUMLAH GELADAK</th>
						<th>JUMLAH BALING-BALING</th>
					</tr>
					<tr>
						<td><?php echo $row->penggerak_utama ?></td>
						<td><?php echo $row->merek_tk ?></td>
						<td><?php echo $row->bahan_utama ?></td>
						<td><?php echo $row->jumlah_geladak ?></td>
						<td><?php echo $row->jumlah_baling ?></td>
					</tr>
				</table>

				<p>Telah memenuhi syarat sebagai kapal Indonesia, sesuai dengan ketentuan perundang undangan,
					oleh karena itu berhak berlayar dengan mengibarkan bendera Indonesia sebagai bendera kebangsaan kapal.
				</p>
				<p>
					Kepada seluruh pejabat yang berwenang dan pejabat-pejabat Republik Indonesia maupun mereka yang bersangkutan
					berkewajiban supaya memperlakukan nahkoda kapal dan muatannya sesuai dengan ketentuan perundang-undangan
					Republik Indonesia dan perjanjian dengan negara-negara lain.
				</p>

				<table class="table">
					<tr>
						<td>Diterbitkan di </td>
						<td> : </td>
						<td><?php echo $row->tempat_pendaftaran ?></td>
					</tr>
					<tr>
						<td>Tanggal </td>
						<td> : </td>
						<td><?php echo tgl_indo($row->tanggal_terbit) ?></td>
					</tr>
				</table>

				<div style="width: 100%; margin-top: 50px;">
    			<!-- Kolom Tanda Tangan -->
					<div style="float: right; text-align: center; width: 300px;">
						<p>An. MENTERI PERHUBUNGAN</p>
						<p>DIREKTUR JENDERAL PERHUBUNGAN LAUT</p>
						<p>DIREKTUR PERKAPALAN DAN KEPELAUTAN</p>
						<p>KEPALA SUBDIT PENGUKURAN, PENDAFTARAN DAN KEBANGSAAN KAPAL</p>
						<br><br><br> <!-- Jarak untuk tanda tangan -->
						<p><u>ZAHARA SAPUTRA, ST., MM</u></p>
						<span>Pembina (IV/a)</span>
						<p>NIP: 19630618 198903 1 002</p>
					</div>
				</div>

			</div>
		
		</div>
	</section>
</div>

<script>
	window.print();
</script>