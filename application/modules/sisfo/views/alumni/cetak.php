<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title;?></title>
	<style>
		table{
		    border-collapse:collapse;
		    font:normal normal 12px Verdana,Arial,Sans-Serif;
		    color:#333333;
		}
		/* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
		table th {
		    background:#00BFFF;
		    color:#000;
		    font-weight:bold;
		    font-size:14px;
		}
		/* Mengatur border dan jarak/ruang pada kolom */
		table th,
		table td {
		    vertical-align:top;
		    padding:5px 10px;
		    border:1px solid #696969;
		}
		/* Mengatur warna baris */
		table tr {
		    background:#F5FFFA;
		}
		/* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
		table tr:nth-child(even) {
		    background:#F0F8FF;
		}
	</style>
</head>
<body>
	<h2 style="text-align: center;">Data Alumni </h2>
	<h3 style="text-align: center; line-height: 2px;">
		Tahun Ajaran : <?= $tahun_ajaran;?> Jurusan : <?= $jurusan;?><br>
	</h3>

	

	<table border="1" width="100%">
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
			<th>agama</th>
			<th>Kelas</th>
			<th>Jurusan</th>			
			
			
		</tr>
		
		<?php $no=1; foreach ($peserta as $p): ?>
													
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $p->nis; ?></td>
			<td><?= $p->nisn; ?></td>
			<td><?= $p->nik; ?></td>
			<td><?= $p->no_kk; ?></td>
			<td><?= $p->no_registrasi_akta_lahir;?></td>
			<td><?= $p->no_kip;?></td>
			<td><?= $p->nama_peserta; ?></td>
			<td><?= $p->tempat_lahir; ?></td>
			<td><?= date('d-m-Y',strtotime($p->tanggal_lahir)); ?></td>
			<td><?= $p->jenis_kelamin; ?></td>
			<td><?= $p->agama;?></td>
			<td><?= $p->kelas;?></td>
			<td><?= $p->jurusan;?></td>
						
			
		<?php endforeach ?>
	</table>
</body>
</html>