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

                <a href="<?= base_url('sisfo/Pegawai/tambah'); ?>" class="btn btn-success "><i class="fas fa-user-plus"></i>
                    Tambah
                </a>
                 <a href="#" data-bs-toggle="modal" data-bs-target="#import" class="btn btn-info "><i class="fas fa-download"></i>
                    Import
                </a>
                <a href="<?= base_url('sisfo/Pegawai/cetak_pegawai'); ?>" class="btn btn-secondary " target="_blank"><i class="fas fa-print"></i>
                    Cetak
                </a>

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
              <div  class="table-responsive read">

                <table class="table datatable" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Status Pegawai</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($pegawai as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td>
                            <img src="<?= base_url('assets/img/pegawai/'.$row->foto); ?>" alt="foto" width="60"></td>
                          <td><?= $row->nip; ?></td>
                          <td><?= $row->nama_lengkap; ?></td>
                          <td><?= $row->jenis_kelamin; ?></td>
                          <td><?= $row->tempat_lahir; ?></td>
                          <td><?= date('d-m-Y',strtotime($row->tanggal_lahir)); ?></td>
                          <td><?= $row->status_pegawai; ?></td>
                          <td>
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-view<?= $row->id_pegawai;?>" class="fas fa-search text-primary"></a>
                            <a href="<?= base_url('sisfo/Pegawai/edit/'.encrypt_url($row->id_pegawai)); ?>" class="fas fa-edit text-info"></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_pegawai;?>" class="fas fa-trash text-danger"></a>
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

   <!-- modal import -->
  <div class="modal modal-blur fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
              <h3>Download Format Import Pegawai: <a href="<?= base_url('assets/import/sample-pegawai.xlsx') ?>" class="btn btn-link text-info">Klik disini</a></h3>
              <form action="<?= base_url('sisfo/Pegawai/import'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>File Import Pegawai</label>
                  <input type="file" name="upload_file" class="form-control">
                </div>
                 <button type="button" class="btn btn-warning mt-3 link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-info mt-3 float-end">Import</button>
              </form>
          </div>
          
        </div>
      </div>
    </div>

   <?php foreach ($pegawai as $row): ?>
    
  <!-- view pegawai -->
  <div class="modal modal-blur fade" id="modal-view<?= $row->id_pegawai;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">View <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table width="60%">
              <tr>
                <td>NIP</td><td>:</td><td><?= $row->nip; ?></td>
              </tr>
              <tr>
                <td>NIK</td><td>:</td><td><?= $row->nik; ?></td>
              </tr>
              <tr>
                <td>No KK</td><td>:</td><td><?= $row->no_kk; ?></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td><td>:</td><td><?= $row->nama_lengkap; ?></td>
              </tr>
              <tr>
                <td>Gelar Depan</td><td>:</td><td><?= $row->gelar_depan; ?></td>
              </tr>
              <tr>
                <td>Gelar Belakang</td><td>:</td><td><?= $row->gelar_belakang; ?></td>
              </tr>
              <tr>
                <td>Pendidikan terakhir</td><td>:</td><td><?= $row->pendidikan_terakhir; ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td><td>:</td><td><?= $row->jenis_kelamin; ?></td>
              </tr>
              <tr>
                <td>Tempat Lahir</td><td>:</td><td><?= $row->tempat_lahir;?></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td><td>:</td><td><?= $row->tanggal_lahir;?> </td>
              </tr>
              <tr>
                <td>Alamat</td><td>:</td><td><?= $row->alamat; ?></td>
              </tr>
              <tr>
                <td>No Telp</td><td>:</td><td><?= $row->telp; ?></td>
              </tr>
              <tr>
                <td>Email</td><td>:</td><td><?= $row->email; ?></td>
              </tr>
              <tr>
                <td>Status Pegawai</td><td>:</td><td><?= $row->status_pegawai; ?></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-warning float-end" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  <!-- modal del -->
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_pegawai;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <b><?= $row->nama_lengkap; ?></b> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Pegawai/hapus/'.encrypt_url($row->id_pegawai)); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>


 


