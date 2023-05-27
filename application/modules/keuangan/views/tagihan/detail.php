
      
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
                   <a href="<?= base_url('keuangan/Tagihan/cetak/'.encrypt_url($siswa->nis)); ?>" class="btn btn-secondary float-end m-2 "><span class="fas fa-print"></span>&nbsp; Cetak</a>
                </div>

              </div>
            </div>


              <input type="hidden" name="nis" value="<?= $siswa->nis;?>">
            	<div class="card-body">
                  
                   <div class="col-md-12">

                   	<div class="table-responsive" id="scroll_table">
                   		
                   		<table class="table table-striped table-bordered">
                   			<thead class="text-center">
                   				<tr>
                   					<th>No</th>
                   					<th>Nama Tagihan</th>
                   					<th>Jumlah</th>
                   					<th>Keterangan</th>
                   				</tr>
                   			</thead>
                   			<tbody>
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
                   			</tbody>
                   		</table>

                   	</div>
                      
                     

                   </div>
              </div>

            	
            </div>

          </div>
        </div>
      </div>


     

  
