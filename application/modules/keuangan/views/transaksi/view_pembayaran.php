 <div class="table-responsive">
  <table class="table datatable" id="dt">

	<thead>
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
			<th>#</th>
		</tr>
	</thead>
	<tbody>
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
			<td>
				<a href="<?= base_url('keuangan/Pembayaran_Spp/print/'.encrypt_url($row->nis)); ?>" class="fas fa-print"></a>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
	<tfoot class="bg-light">
		<tr>
			<td colspan="6" style="text-align: center; font-weight: bold;">Total</td>
			<td>:</td>
			<td style="float: right; font-weight: bold;"><?= number_format(array_sum($total)); ?></td>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
	
</table>
</div>



 <script>
  $(document).ready(function () {
      $('#dt').DataTable();
  });
</script>