<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<style type="text/css">
		/* Table */
		body {
			font-family: "lucida Sans Unicode", "Lucida Grande", "Segoe UI", vardana;

			margin:0;
			padding: 10px;
		}
		.demo-table {
			border-collapse: collapse;
			font-size: 12px;
			color: #444;
		}


		.demo-table ,th ,td{
			border:1px solid #95a5a6;
			padding: 7px 17px;
		}
		.demo-table tr:nth-child(even) {
		    background-color: #f2f2f2;
		}

	
		.header{
			width:100%;
			margin: 0px;
		}
		.logo{
			width:100px;
			display: inline-block;
			/*background: yellow;*/
		}
		.sekolah{
			width: 550px;
			display: inline-block;	
			/*background: red;*/
		}

		hr{
			border:double;
		}

		.title th{
			border:none;
			padding:1px;
			text-align: left;
			font-size: 13px;
		}


		.foto{
			border:1px solid #000;
			width: 15%;
			height: 100px;
			display: inline-flex;
		}
		.bio{
			/*background: blue;*/
			width: 79%;
			height: 100px;
			display: inline-flex;
		}

		.bio td{
			padding: 3px;
		}
		

		
	</style>
</head>
<body>


	<div class="header" >

			
			<img src="<?= base_url('assets/img/instansi/'.$instansi->header); ?>" alt="logo" >

	</div>
	
	<h3 style="text-align: center;"><?= $title; ?></h3><br>

	<div class="foto">
		<img src="<?= base_url('assets/img/default.jpg'); ?>" alt="logo" width="100">
	</div>
	<div class="bio">
		<table style="width: 100%; border-collapse: collapse;">
			<tr>
				<td width="10">A.</td>
				<td colspan="3">Data Pribadi</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td><?= $peserta->nis; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td><?= $peserta->nama_peserta; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">3.</td>
				<td>Jenis Kelamin</td>
				<td><?= $peserta->jenis_kelamin; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">4.</td>
				<td>Tempat, Tanggal Lahir</td>
				<td><?= $peserta->tempat_lahir.', '.date('d-m-Y',strtotime($peserta->tanggal_lahir)); ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">5.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">6.</td>
				<td>Kelas</td>
				<td><?= $peserta->kelas; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">7.</td>
				<td>Jurusan</td>
				<td><?= $peserta->jurusan; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">8.</td>
				<td>Agama</td>
				<td><?= $peserta->agama; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">9.</td>
				<td>Alamat</td>
				<td><?= $peserta->alamat.' Rt.'.$peserta->rt.'/'.$peserta->rw.' Desa.'.$peserta->desa.' Kec.'.$peserta->kecamatan.' Kab/Kota.'.$peserta->kabupaten.' Prov.'.$peserta->provinsi.'-'.$peserta->kode_pos; ?></td>
			</tr>

			<tr>
				<td width="10">B.</td>
				<td colspan="3">Data Orang Tua</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIK</td>
				<td><?= $peserta->nik_ayah; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Ayah</td>
				<td><?= $peserta->nama_ayah; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">3.</td>
				<td>Tempat Tanggal, Lahir</td>
				<td><?= $peserta->tempat_lahir_ayah; ?>, <?= date('d-m-Y',strtotime($peserta->tanggal_lahir_ayah)); ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">4.</td>
				<td>Pendidikan</td>
				<td><?= $peserta->pendidikan_ayah; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">5.</td>
				<td>Pekerjaan</td>
				<td><?= $peserta->pekerjaan_ayah; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">6.</td>
				<td>Penghasilan</td>
				<td><?= $peserta->penghasilan_bulanan_ayah; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">7.</td>
				<td>NIK</td>
				<td><?= $peserta->nik_ibu; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">8.</td>
				<td>Ibu</td>
				<td><?= $peserta->nama_ibu; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">9.</td>
				<td>Tempat Tanggal, Lahir</td>
				<td><?= $peserta->tempat_lahir_ibu; ?>, <?= date('d-m-Y',strtotime($peserta->tanggal_lahir_ibu)); ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">10.</td>
				<td>Pendidikan</td>
				<td><?= $peserta->pendidikan_ibu; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">11.</td>
				<td>Pekerjaan</td>
				<td><?= $peserta->pekerjaan_ibu; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">12.</td>
				<td>Penghasilan</td>
				<td><?= $peserta->penghasilan_bulanan_ayah; ?></td>
			</tr>

			<tr>
				<td width="10">B.</td>
				<td colspan="3">Data Wali</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIK</td>
				<td><?= $peserta->nik_wali; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Wali</td>
				<td><?= $peserta->nama_wali; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">3.</td>
				<td>Tempat Tanggal, Lahir</td>
				<td><?= $peserta->tempat_lahir_wali; ?>, <?= date('d-m-Y',strtotime($peserta->tanggal_lahir_wali)); ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">4.</td>
				<td>Pendidikan</td>
				<td><?= $peserta->pendidikan_wali; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">5.</td>
				<td>Pekerjaan</td>
				<td><?= $peserta->pekerjaan_wali; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">6.</td>
				<td>Penghasilan</td>
				<td><?= $peserta->penghasilan_bulanan_wali; ?></td>
			</tr>
		</table>
	</div>


	
</body>
</html>