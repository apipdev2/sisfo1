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

                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-add" class="btn btn-success "><i class="fas fa-user-plus"></i>
                    Tambah
                </a>
                 <a href="#" data-bs-toggle="modal" data-bs-target="#import" class="btn btn-secondary "><i class="fas fa-download"></i>
                    Import
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

                <table class="table" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tingkat</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th>Kurikulum</th>
                        <th>Kapasitas</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($kelas as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $row->tingkat;?></td>
                          <td><?= $row->kelas;?></td>
                          <td><?= $row->jurusan;?></td>
                          <td><?= $row->kurikulum;?></td>
                          <td><?= $row->kapasitas;?></td>                           
                          <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $row->id_kelas;?>" class="fas fa-edit text-info"></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_kelas;?>" class="fas fa-trash text-danger"></a>
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
              <h3>Download Format Import Kelas: <a href="<?= base_url('assets/import/sample-kelas.xlsx') ?>" class="btn btn-link text-info">Klik disini</a></h3>
              <form action="<?= base_url('sisfo/Kelas/import'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>File Import Kelas</label>
                  <input type="file" name="upload_file" class="form-control">
                </div>
                 <button type="button" class="btn btn-warning mt-3 link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-info mt-3 float-end">Import</button>
              </form>
          </div>
          
        </div>
      </div>
    </div>


  <!-- add modal -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary text-light">
            <h5 class="modal-title">Tambah <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Kelas/tambah'); ?>" method="post">
          <div class="modal-body">


              <div class="form-group">
                <label>Kurikulum</label>
                <select name="kurikulum" class="form-select">
                <option value="" selected disabled>::Pilih Kurikulum::</option>
                  <?php foreach ($kurikulum as $k): ?>
                    <option value="<?= $k->kode_kurikulum; ?>"><?= $k->nama_kurikulum; ?>( <?= $k->kode_kurikulum; ?> )</option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" class="form-select">
                <option value="" selected disabled>::Pilih Jurusan::</option>
                  <?php foreach ($jurusan as $j): ?>
                    <option value="<?= $j->nama_jurusan; ?>"><?= $j->nama_jurusan; ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label>Tingkat</label>
                <input type="text" name="tingkat" class="form-control">
              </div>

              <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="kelas" class="form-control">
              </div>

              <div class="form-group">
                <label>Kapasias</label>
                <input type="number" name="kapasitas" class="form-control">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>


  <?php foreach ($kelas as $row): ?>
    
  <!-- modal edit -->
   <div class="modal modal-blur fade" id="modal-edit<?= $row->id_kelas;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary text-light">
            <h5 class="modal-title">Edit <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Kelas/edit/'.encrypt_url($row->id_kelas)); ?>" method="post">
          <div class="modal-body">

             <div class="form-group">
                <label>Kurikulum</label>
                <select name="kurikulum" class="form-select">
                  <?php foreach ($kurikulum as $k): ?>
                  <?php if ($row->kurikulum == $k->kode_kurikulum): ?>
                    <option value="<?= $k->kode_kurikulum; ?>" selected><?= $k->nama_kurikulum; ?>( <?= $k->kode_kurikulum; ?> )</option>
                  <?php else: ?>
                    <option value="<?= $k->kode_kurikulum; ?>"><?= $k->nama_kurikulum; ?>( <?= $k->kode_kurikulum; ?> )</option>
                  <?php endif ?>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" class="form-select">
                  <?php foreach ($jurusan as $j): ?>
                  <?php if ($row->jurusan == $j->nama_jurusan): ?>
                    <option value="<?= $j->nama_jurusan; ?>" selected><?= $j->nama_jurusan; ?></option>
                  <?php else: ?>
                    <option value="<?= $j->nama_jurusan; ?>"><?= $j->nama_jurusan; ?></option>
                  <?php endif ?>
                  <?php endforeach ?>
                </select>
              </div>

             <div class="form-group">
                <label>Tingkat</label>
                <input type="text" name="tingkat" class="form-control" value="<?= $row->tingkat; ?>">
              </div>

              <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?= $row->kelas; ?>">
              </div>

              <div class="form-group">
                <label>Kapasias</label>
                <input type="number" name="kapasitas" class="form-control" value="<?= $row->kapasitas; ?>">
              </div>

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
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_kelas;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <?= $row->tingkat; ?> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Kelas/hapus/'.encrypt_url($row->id_kelas )); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>