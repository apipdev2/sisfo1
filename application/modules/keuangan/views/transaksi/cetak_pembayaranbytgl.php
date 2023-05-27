<!DOCTYPE html>
<html>
<head>
	<title>Data Pembayaran</title><style>
		@page { 
			size: auto;
			margin: 0mm; 		}
		body{
			margin: 30px;
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
			font-size: 11px;

		}
		#data th,td{
			border : 1px solid #000;
			padding: 5px;

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

	<h3 style="text-align: center;">Data Pembayaran</h3>
	<p>Periode : <?= date('d-M-Y', strtotime($tgl1));?> s/d <?= date('d-M-Y',strtotime($tgl2));?></p>
	
	<table width="100%" id="data">
        <tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Jenis Pembayaran</th>
			<th>Bulan</th>
			<th>Nominal</th>
			<th>Status</th>
		</tr>
      <?php 
		$total = [];
	 ?>
	<?php $no=1; foreach ($pembayaran as $row): ?>
	<?php $total[] = $row->nominal; ?>
		<tr>
			<td><?= $no++;?></td>
			<td><?= date('d-m-Y',strtotime($row->tgl_bayar));?></td>
			<td><?= $row->nis;?></td>
			<td><?= $row->nama_peserta;?></td>
			<td><?= $row->kelas;?></td>
			<td><?= $row->jenis_pembayaran;?></td>
			<td><?= nama_bulan($row->bulan);?></td>
			<td><span style="float: right;"><?= number_format($row->nominal);?></span></td>
			<td><?= $row->status_bayar;?></td>
			
		</tr>
	<?php endforeach ?>
	<tr>
			<td colspan="6" style="text-align: center; font-weight: bold;">Total</td>
			<td>:</td>
			<td style="float: right; font-weight: bold;"><?= number_format(array_sum($total)); ?></td>
			<td></td>
		</tr>
    </table>





</body>
</html>


 