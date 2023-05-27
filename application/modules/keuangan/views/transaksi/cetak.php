
      
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->               
                <h2 class="page-title">
                  <?= $title; ?>
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <nav aria-label="breadcrumb">
	                  <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
	                  </ol>
	                </nav>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            
            <div class="card">

              <div class="card-body">
              <div class="row">

                <div class="col-md-6">
                  
                  <table width="100%">
                    
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
                      <td>Tahun Ajaran</td><td>:</td><td><b><?= $tahunajaran->tahun_ajaran;?></b></td>
                    </tr>
                    
                  </table>

                </div>

                <div class="col-md-6">
                  
                </div>

              </div>
            </div>

            <form action="<?= base_url('keuangan/Pembayaran_Spp/cetak') ?>" method="post">

              <input type="hidden" name="nis" value="<?= $siswa->nis;?>">
            	<div class="card-body">
                  
                   <div class="col-md-12">

                   	<div class="table-responsive" id="scroll_table">
                   		
                   		<table class="table table-striped table-bordered">
                   			<thead class="text-center">
                   				<tr>
                            <th>#</th>
                   					<th>No</th>
                   					<th>Tanggal</th>
                   					<th>Nama Pembayaran</th>
                   					<th>Jumlah</th>
                   					<th>Keterangan</th>
                   					<th>Paraf</th>
                   				</tr>
                   			</thead>
                   			<tbody>
                   				<?php $no=1; foreach ($pembayaran as $row): ?>
                          <?php 

                            if ($row->status_bayar == 'BL') {
                              $sb = '';
                            }else{
                              $sb = 'LUNAS';
                            }
                           ?>
                          <tr>
                            <td class="text-center"><input type="radio" name="id_pembayaran[]" value="<?= $row->id_pembayaran;?>"></td>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= date('d-m-Y',strtotime($row->tgl_bayar));?></td>
                            <td><?= $row->jenis_pembayaran.' '.nama_bulan($row->bulan);?></td>
                            <td><span style="float: right;"><?= number_format($row->nominal);?></span></td>
                            <td class="text-center"><?= $sb;?></td>
                            <td></td>
                          </tr>
                          <?php endforeach ?>
                   			</tbody>
                   		</table>

                   	</div>
                      <a href="<?= base_url('keuangan/Pembayaran_Spp/cetak_all/'.encrypt_url($siswa->nis)); ?>" target="_blank" class="btn btn-info float-end m-2"><span class="fas fa-print"></span>&nbsp; Print All</a>
                      <button class="btn btn-secondary float-end m-2"><span class="fas fa-print"></span>&nbsp; Print</button>

                   </div>
              </div>

            </form>
            	
            </div>

          </div>
        </div>
      </div>


     

  
