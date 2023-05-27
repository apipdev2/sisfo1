

<!-- Page header -->
 <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
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
                    <li class="breadcrumb-item" aria-current="page"><a href="">Data Presensi</a></li>
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
                      <td>NIS</td><td>:</td><td><?= $siswa->nis; ?></td>
                    </tr>
                     <tr>
                      <td>Nama</td><td>:</td><td><?= $siswa->nama_peserta; ?></td>
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
                      <th>#</th>
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
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $row->id_presensi;?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-hapus<?= $row->id_presensi;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
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


  <?php foreach ($detail as $row): ?>
     <!-- add modal -->
  <div class="modal modal-blur fade" id="modal-edit<?= $row->id_presensi;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Presensi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Phsiswa/edit/'); ?>" method="post">
          <div class="modal-body">

              <input type="hidden" name="id_presensi" value="<?= $row->id_presensi; ?>">
              <input type="hidden" name="nis" value="<?= $row->nis; ?>">
              <input type="hidden" name="bln" value="<?= $this->uri->segment(5); ?>">
              <input type="hidden" name="thn" value="<?= $this->uri->segment(6); ?>">

              <table width="100%">
                <tr>
                  <th>Nama</th><th>:</th><th><?= $row->nama_peserta; ?></th>
                </tr>
                <tr>
                  <th>Tanggal</th><th>:</th><th><?= date_indo($row->tanggal); ?></th>
                </tr>
                <tr>
                  <th>Keterangan</th><th>:</th>
                  <th>
                    <input type="radio" name="ket" value="H" <?php if($row->ket == 'H'){echo 'checked';} ?>> hadir
                    <input type="radio" name="ket" value="I" <?php if($row->ket == 'I'){echo 'checked';} ?>> Izin
                    <input type="radio" name="ket" value="S" <?php if($row->ket == 'S'){echo 'checked';} ?>> Sakit
                    <input type="radio" name="ket" value="A" <?php if($row->ket == 'A'){echo 'checked';} ?>> Alfa
                  </th>
                </tr>
              </table>

              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>

     <!-- modal del -->
  <div class="modal modal-blur fade" id="modal-hapus<?= $row->id_presensi;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <?= $row->tanggal; ?> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Phsiswa/hapus/'.encrypt_url($row->id_presensi )); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>


  <script>
    $('.print').click(function(){
      window.print();
    });
  </script>

  

