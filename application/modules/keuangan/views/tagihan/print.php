<!DOCTYPE html>
<html>
<head>
	<title>Data Tunggakan</title>
	<style>
		@page { 
			size: auto;
			margin: 0mm; 		}
		body{
			margin: 50px;
		}

		.header{
			width:100%;
			margin: 0px;
			text-align: center;
		}

		.header img{
			margin: 0px;
			padding: 0px;
		}

		#data{
			border-collapse: collapse;
			text-align: left;
			font-size: 14px;

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

	<div class="header" >

			
			<img src="<?= base_url('assets/img/instansi/'.$instansi->header); ?>" alt="logo" >

	</div>

	<h3 style="text-align: center;">Data Tunggakan</h3>
	<table width="50%" id="header">
		<tr>
          <td>NIS</td>
          <td>:</td>
          <td><?= $siswa->nis;?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?= $siswa->nama_peserta;?></td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td><?= $siswa->kelas;?></td>
        </tr>
		<tr>
			<td>Tahun Ajaran</td><td>:</td><td><?= $tahunajaran->tahun_ajaran;?></td>
		</tr>
		
	</table>
	<br>
	<table width="100%" id="data">
        <tr>
			<th style="text-align:center;">No</th>
			<th style="text-align:center;">Nama Tagihan</th>
			<th style="text-align:center;">Jumlah</th>
			<th style="text-align:center;">Keterangan</th>
		</tr>
		<?php $no=1; foreach ($pembayaran as $row): ?>
	      <?php 

	        if ($row->ket == 'BL') {
	          $sb = '';
	        }else{
	          $sb = 'LUNAS';
	        }
	       ?>
	      <tr>
	        <td class="text-center"><?= $no++; ?></td>
	        <td class="text-left"><?= $row->jenis_pembayaran.' '.nama_bulan($row->bulan);?></td>
	        <td><span style="float: right;"><?= number_format($row->nominal);?></span></td>
	        <td class="text-center"><?= $sb;?></td>
	      </tr>
	      <?php endforeach ?>
      
    </table>





</body>
</html>