<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title;?></title>
	<style>
		body {
			font-family: "lucida Sans Unicode", "Lucida Grande", "Segoe UI", vardana
		}
		.table {
			border-collapse: collapse;
			font-size: 13px;
		}
		.table th, 
		.table td {
			padding: 7px 17px;
		}
		.table th {
			border: 1px solid #c7ecc7;
			text-transform: uppercase;
		}

		/* Table Body */
		.table td {
			color: #353535;
			border: 1px solid #c7ecc7;
		}
	</style>
</head>
<body>
	<h2 style="text-align: center;">Data Alumni </h2>

	<table class="table" >
		<tr>
			<th>No</th>
			<th>NIS</th>
			<th>NISN</th>
			<th>NIK</th>
			<th>No_kk</th>
			<th>No Akta Lahir</th>
			<th>No KIP</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>L/P</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Asal Sekolah</th>
			<th>agama</th>
			<th>berkebutuhan_khusus</th>
			<th>alamat</th>
			<th>Rt</th>
			<th>Rw</th>
			<th>Desa</th>
			<th>Kecamatan</th>
			<th>Kabupaten</th>
			<th>Provinsi</th>
			<th>Kode pos</th>
			<th>tempat_tinggal</th>
			<th>moda_transportasi</th>
			<th>anak_ke</th>
			<th>jumlah_saudara_kandung</th>
			<th>nomor_hp</th>
			<th>email</th>
			<th>tinggi_badan</th>
			<th>berat_badan</th>
			<th>jarak</th>
			<th>size_jurusan</th>
			<th>size_olahraga</th>
			<th>nama_ayah</th>
			<th>nik_ayah</th>
			<th>tempat_lahir_ayah</th>
			<th>tanggal_lahir_ayah</th>
			<th>pendidikan_ayah</th>
			<th>pekerjaan_ayah</th>
			<th>penghasilan_bulanan_ayah</th>
			<th>berkebutuhan_khusus_ayah</th>
			<th>no_ayah</th>
			<th>nama_ibu</th>
			<th>nik_ibu</th>
			<th>tempat_lahir_ibu</th>
			<th>tanggal_lahir_ibu</th>
			<th>pendidikan_ibu</th>
			<th>pekerjaan_ibu</th>
			<th>penghasilan_bulanan_ibu</th>
			<th>berkebutuhan_khusus_ibu</th>
			<th>no_ibu</th>
			<th>nama_wali</th>
			<th>nik_wali</th>
			<th>tempat_lahir_wali</th>
			<th>tanggal_lahir_wali</th>
			<th>pendidikan_wali</th>
			<th>pekerjaan_wali</th>
			<th>penghasilan_bulanan_wali</th>
			<th>no_wali</th>
			
		</tr>
		<?php
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Alumni.xls");
		?>
		<?php $no=1; foreach ($peserta as $p): ?>
													
		<tr>
			<td><?= $no++; ?></td>
			<td>'<?= $p->nis; ?></td>
			<td>'<?= $p->nisn; ?></td>
			<td>'<?= $p->nik; ?></td>
			<td>'<?= $p->no_kk; ?></td>
			<td>'<?= $p->no_registrasi_akta_lahir;?></td>
			<td>'<?= $p->no_kip;?></td>
			<td><?= $p->nama_peserta; ?></td>
			<td><?= $p->tempat_lahir; ?></td>
			<td><?= date('d-m-Y',strtotime($p->tanggal_lahir)); ?></td>
			<td><?= $p->jenis_kelamin; ?></td>
			<td><?= $p->kelas;?></td>
			<td><?= $p->jurusan;?></td>
			<td><?= $p->asal_sekolah; ?></td>
			<td><?= $p->agama;?></td>
			<td><?= $p->berkebutuhan_khusus;?></td>
			<td><?= $p->alamat;?></td>
			<td><?= $p->rt;?></td>
			<td><?= $p->rw;?></td>
			<td><?= $p->desa;?></td>
			<td><?= $p->kecamatan;?></td>
			<td><?= $p->kabupaten;?></td>
			<td><?= $p->provinsi;?></td>
			<td><?= $p->kode_pos;?></td>
			<td><?= $p->tempat_tinggal;?></td>
			<td><?= $p->moda_transportasi;?></td>
			<td><?= $p->anak_ke;?></td>
			<td><?= $p->jumlah_saudara_kandung;?></td>
			<td>'<?= $p->nomor_hp;?></td>
			<td><?= $p->email;?></td>
			<td><?= $p->tinggi_badan;?></td>
			<td><?= $p->berat_badan;?></td>
			<td><?= $p->jarak;?></td>
			<td><?= $p->size_jurusan;?></td>
			<td><?= $p->size_olahraga;?></td>
			<td><?= $p->nama_ayah;?></td>
			<td>'<?= $p->nik_ayah;?></td>
			<td><?= $p->tempat_lahir_ayah;?></td>
			<td><?= date('d-m-Y',strtotime($p->tanggal_lahir_ayah));?></td>
			<td><?= $p->pendidikan_ayah;?></td>
			<td><?= $p->pekerjaan_ayah;?></td>
			<td><?= $p->penghasilan_bulanan_ayah;?></td>
			<td><?= $p->berkebutuhan_khusus_ayah;?></td>
			<td>'<?= $p->no_ayah;?></td>
			<td>'<?= $p->nik_ibu;?></td>
			<td><?= $p->nama_ibu;?></td>
			<td><?= $p->tempat_lahir_ibu;?></td>
			<td><?= date('d-m-Y',strtotime($p->tanggal_lahir_ibu));?></td>
			<td><?= $p->pendidikan_ibu;?></td>
			<td><?= $p->pekerjaan_ibu;?></td>
			<td><?= $p->penghasilan_bulanan_ibu;?></td>
			<td><?= $p->berkebutuhan_khusus_ibu;?></td>
			<td>'<?= $p->no_ibu;?></td>
			<td><?= $p->nama_wali;?></td>
			<td>'<?= $p->nik_wali;?></td>
			<td><?= $p->tempat_lahir_wali;?></td>
			<td><?= date('d-m-Y',strtotime($p->tanggal_lahir_wali));?></td>
			<td><?= $p->pendidikan_wali;?></td>
			<td><?= $p->pekerjaan_wali;?></td>
			<td><?= $p->penghasilan_bulanan_wali;?></td>
			<td>'<?= $p->no_wali;?></td>			
			
		<?php endforeach ?>
	</table>
</body>
</html>