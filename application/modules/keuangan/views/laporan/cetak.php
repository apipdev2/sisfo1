<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan Keuangan</title>
	<style>
		body{
			margin: 20px;
		}
		#data{
			border-collapse: collapse;
			text-align: left;
			font-size: 12px;

		}
		#data th,td{
			border : 1px solid #000;
			padding: 8px;

		}
		#data th{
			background-color: #95a5a6;
		}

		#header{
			border-collapse: collapse;
			text-align: left;
		}
		#header td{
			border:none;
			padding: 1px;
		}

	</style>
</head>
<body>

 <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Keuangan ".date('d-m-Y').".xls");
 ?>	
	<table width="30%" id="header">
		<tr>
			<td>Tahun Ajaran</td><td>:</td><td><?= $tahunajaran->tahun_ajaran;?></td>
		</tr>
		<tr>
			<td>Kelas</td><td>:</td><td><?= $kelas->kelas;?></td>
		</tr>
		<tr>
			<td>Walas</td><td>:</td><td><?= $walas->nama_lengkap;?></td>
		</tr>
	</table>
	<br>
	<table width="100%" id="data">
         <tr>
          <th rowspan="2" style="text-align: center;">No</th>
          <th rowspan="2" style="text-align: center;">NIS</th>
          <th rowspan="2" style="text-align: center;">Nama Siswa</th>
          <th colspan="2" style="text-align: center;">Tunggakan</th>
          <th colspan="6" style="text-align: center;">SPP Semester1</th>
          <th colspan="6" style="text-align: center;">SPP Semester2</th>
          <th rowspan="2" style="text-align: center;">Studi Wisata</th>
          <th rowspan="2" style="text-align: center;">Jumlah SPP yang belum dibayarkan</th>
          <th rowspan="2" style="text-align: center;">Daftar Ulang</th>
          <th rowspan="2" style="text-align: center;">Jumlah yang belum dibayarkan</th>
        </tr>
        <tr>
          <th style="text-align: center;">DU</th>
          <th style="text-align: center;">Total</th>
          <th style="text-align: center;">Jul</th>
          <th style="text-align: center;">Agust</th>
          <th style="text-align: center;">Sept</th>
          <th style="text-align: center;">Okt</th>
          <th style="text-align: center;">Nov</th>
          <th style="text-align: center;">Des</th>
          <th style="text-align: center;">Jan</th>
          <th style="text-align: center;">Feb</th>
          <th style="text-align: center;">Mar</th>
          <th style="text-align: center;">Apr</th>
          <th style="text-align: center;">Mei</th>
          <th style="text-align: center;">Jun</th>


        </tr>
       <?php $no=1; foreach ($laporan as $row): ?>

       <?php 
       		$total_studi[] = $row['studi']; 
       		$tot_tagihandu[] = $row['total'];
       		$tot_tagihanspp[] = $row['tot_spp'];
       		$tot_all[] = $row['tot_spp'] + $row['total'];
        ?>
       	<tr>
       		<td><?= $no++;?></td>
       		<td><?= $row['nis'];?></td>
       		<td><?= $row['nama_peserta'];?></td>
       		<td style="text-align: right;"><?= number_format($row['du']);?></td>
       		<td style="text-align: right;"><?= number_format($row['total']);?></td>
       		<td style="text-align: right;"><?= number_format($row['jul']);?></td>
       		<td style="text-align: right;"><?= number_format($row['agust']);?></td>
       		<td style="text-align: right;"><?= number_format($row['sep']);?></td>
       		<td style="text-align: right;"><?= number_format($row['okt']);?></td>
       		<td style="text-align: right;"><?= number_format($row['nov']);?></td>
       		<td style="text-align: right;"><?= number_format($row['des']);?></td>
       		<td style="text-align: right;"><?= number_format($row['jan']);?></td>
       		<td style="text-align: right;"><?= number_format($row['feb']);?></td>
       		<td style="text-align: right;"><?= number_format($row['mar']);?></td>
       		<td style="text-align: right;"><?= number_format($row['apr']);?></td>
       		<td style="text-align: right;"><?= number_format($row['mei']);?></td>
       		<td style="text-align: right;"><?= number_format($row['jun']);?></td>
       		<td style="text-align: right;"><?= number_format($row['studi']);?></td>
       		<td style="text-align: right;"><?= number_format($row['tot_spp']);?></td>
       		<td style="text-align: right;"><?= number_format($row['total']);?></td>
       		<td style="text-align: right;"><?= number_format($row['tot_spp'] + $row['total']);?></td>
       	</tr>
       
       <?php endforeach ?>

       	<tr>
       		<td colspan="3">Update : <?= date('d-m-Y');?></td>
       		<td></td>
       		<td></td>
       		<td colspan="12" style="text-align: center; font-size: 9px;">
       			APABILA ADA PERBEDAAN ANTARA REKAPAN DAN KARTU SPP, YANG BENAR ADALAH YANG ADA DI KARTU SPP
       		</td>
       		<td style="text-align: right;">
       			<?= number_format(array_sum($total_studi)); ?>
       		</td>
       		<td style="text-align: right;">
       			<?= number_format(array_sum($tot_tagihanspp)); ?>
       		</td>
       		<td style="text-align: right;">
       			<?= number_format(array_sum($tot_tagihandu)); ?>
       		</td>
       		<td style="text-align: right;">
       			<?= number_format(array_sum($tot_all)); ?>
       		</td>
       	</tr>
    </table>





</body>
</html>