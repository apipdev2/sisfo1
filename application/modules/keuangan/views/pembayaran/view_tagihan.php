 <div class="table-responsive">
  <table class="table datatable" id="dt">

	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Jenis Pembayaran</th>
			<th>tingkat</th>
			<th>Kelas</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($tagihan as $row): ?>
		<tr>
			<td><?= $no++;?></td>
			<td><?= $row->nama_kategori;?></td>
			<td><?= $row->jenis_pembayaran;?></td>
			<td><?= $row->tingkat;?></td>
			<td><?= $row->kelas;?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
	
</table>
</div>

 <script>
  $(document).ready(function () {
      $('#dt').DataTable();
  });
</script>