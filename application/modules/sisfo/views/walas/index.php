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
                <a href="<?= base_url('sisfo/Walas/cetak'); ?>" class="btn btn-secondary " target="_blank"><i class="fas fa-print"></i>
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

                <table class="table" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Walas</th>
                        <th>Kelas</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($walas as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $row->nama_lengkap;?></td>
                          <td><?= $row->kelas;?></td>                          
                          <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $row->id_walas;?>" class="fas fa-edit text-info"></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_walas;?>" class="fas fa-trash text-danger"></a>
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


  <!-- add modal -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Walas/store'); ?>" method="post">
          <div class="modal-body">

              <div class="form-group">
                <label>Nama Walas</label>
                <select name="id_guru" class="form-control">
                  <option value="" selected disabled>::PILIH::</option>
                  <?php foreach ($pegawai as $p): ?>
                    <option value="<?= $p->id_pegawai; ?>"><?= $p->nama_lengkap; ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label>Kelas</label>
                <select name="id_kelas" class="form-control">
                  <option value="" selected disabled>::PILIH::</option>
                  <?php foreach ($kelas as $k): ?>
                    <option value="<?= $k->id_kelas; ?>"><?= $k->kelas; ?></option>
                  <?php endforeach ?>
                </select>
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

    <?php foreach ($walas as $row): ?>
    
  <!-- modal edit -->
   <div class="modal modal-blur fade" id="modal-edit<?= $row->id_walas;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Walas/edit/'.encrypt_url($row->id_walas)); ?>" method="post">
          <div class="modal-body">

              <div class="form-group">
                <label>Nama Walas</label>
                <select name="id_guru" class="form-control">
                  <?php foreach ($pegawai as $p): ?>
                  <?php if ($row->id_guru == $p->id_pegawai): ?>
                    <option value="<?= $p->id_pegawai; ?>" selected><?= $p->nama_lengkap; ?></option>
                  <?php else: ?>
                    <option value="<?= $p->id_pegawai; ?>"><?= $p->nama_lengkap; ?></option>
                  <?php endif ?>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label>Kelas</label>
                <select name="id_kelas" class="form-control">
                  <?php foreach ($kelas as $k): ?>
                  <?php if ($row->id_kelas == $k->id_kelas): ?>
                    <option value="<?= $k->id_kelas; ?>" selected><?= $k->kelas; ?></option>
                  <?php else: ?>
                    <option value="<?= $k->id_kelas; ?>"><?= $k->kelas; ?></option>
                  <?php endif ?>                    
                  <?php endforeach ?>
                </select>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <!-- modal del -->
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_walas;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <?= $row->nama_lengkap; ?> akan terhapus dari Data Walas.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Walas/hapus/'.encrypt_url($row->id_walas)); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>


  