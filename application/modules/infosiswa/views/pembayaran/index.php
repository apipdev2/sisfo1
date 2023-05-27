
      
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
            <div class="row">
              <div class="col-md-6">                
                <div class="card">
                  <div class="card-header">
                    Data Pembayaran
                  </div>              
                    <div class="card-body ">

                      <div class="table-responsive" id="scroll_table">
                      
                      <table class="table table-striped table-bordered">
                        <thead class="text-center">
                          <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                      <?php $no=1; foreach ($pembayaran as $row): ?>
                          
                          <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= date('d-m-Y',strtotime($row->tgl_bayar)); ?></td>
                            <td class="text-left"><?= $row->jenis_pembayaran.' '.nama_bulan($row->bulan);?></td>
                            <td><span style="float: right;"><?= number_format($row->nominal);?></span></td>
                            <td class="text-center"><?= $row->status_bayar;?></td>
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>

                    </div>
                      
                    </div>
                  </div>
              </div>

               <div class="col-md-6">                
                <div class="card">
                  <div class="card-header">
                    Data Tunggakan
                  </div>              
                    <div class="card-body ">
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
                      <?php $no=1; foreach ($tagihan as $row): ?>
                         
                          <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-left"><?= $row->jenis_pembayaran.' '.nama_bulan($row->bulan);?></td>
                            <td><span style="float: right;"><?= number_format($row->nominal);?></span></td>
                            <td class="text-center"><?= $row->ket;?></td>
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
      </div>

   

	  

  
