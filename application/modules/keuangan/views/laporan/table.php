<div class="btn-group  mb-2">                    
	<a href="<?= base_url('keuangan/Laporan/cetak/'. $kelas->id_kelas); ?>" class="btn btn-info" target="_blank"><span class="fas fa-print"></span>&nbsp; Cetak Perkelas</a>
	
</div>

<table class="table table-bordered">
    <thead>
    <tr>
      <th rowspan="2" class="text-center">No</th>
      <th rowspan="2" class="text-center">NIS</th>
      <th rowspan="2" class="text-center">Nama Siswa</th>
      <th colspan="2" class="text-center">Tunggakan</th>
      <th colspan="6" class="text-center">SPP Semester1</th>
      <th colspan="6" class="text-center">SPP Semester2</th>
      <th rowspan="2" class="text-center">Studi Wisata</th>
      <th rowspan="2" style="text-align: center;">Jumlah SPP yang belum dibayarkan</th>
      <th rowspan="2" style="text-align: center;">Daftar Ulang</th>
      <th rowspan="2" style="text-align: center;">Jumlah yang belum dibayarkan</th>
    </tr>
    <tr>
      <th>DU</th>
      <th>Total</th>
      <th>Jul</th>
      <th>Agust</th>
      <th>Sept</th>
      <th>Okt</th>
      <th>Nov</th>
      <th>Des</th>
      <th>Jan</th>
      <th>Feb</th>
      <th>Mar</th>
      <th>Apr</th>
      <th>Mei</th>
      <th>Jun</th>
    </tr>
    </thead>
    <tbody>
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
    </tbody>

    

</table>