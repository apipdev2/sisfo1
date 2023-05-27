
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
                <li class="breadcrumb-item"><a href="<?= base_url('infoguru/Dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('infoguru/Presensi'); ?>">Presensi</a></li>
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
                  <div class="table-responsive">
                  <table width="90%">
                    <tr>
                      <td>Tahun Ajaran</td><td>:</td><td><b><?= $tahunajaran->tahun_ajaran;?></b></td>
                    </tr>
                    <tr>
                      <td>NIP</td><td>:</td><td><?= $pegawai->nip; ?></td>
                    </tr>
                     <tr>
                      <td>Nama</td><td>:</td><td><?= $pegawai->nama_lengkap; ?></td>
                    </tr>                
                   
                  </table>
                  </div>
                </div>

                <div class="col-md-6">
                  <button class="btn btn-secondary float-end print"><i class="fas fa-print"></i> Cetak</button>
                </div>

               

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>IN</th>
                      <th>OUT</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($detail as $row): ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date_indo($row->tanggal); ?></td>
                        <td><?= $row->time_in; ?></td>
                        <td><?= $row->time_out; ?></td>
                        <td><?= $row->ket; ?></td>
                       
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>

            
        </div>

      </div>

      <!-- end content -->
    </div>
  </div>




  <script>
    $('.print').click(function(){
      window.print();
    });
  </script>

  

