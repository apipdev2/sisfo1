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
            <div class="btn-group">

                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-add" class="btn btn-success "><i class="fas fa-plus"></i>
                    Tambah
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
                        <th>Tahun</th>
                        <th>Tahun Ajaran</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($tahun as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $row->tahun;?></td>
                          <td><?= $row->tahun_ajaran;?></td>
                          <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $row->id_tahun;?>" class="fas fa-edit text-info"></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_tahun;?>" class="fas fa-trash text-danger"></a>
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
            <h5 class="modal-title">Tambah Tahun Ajaran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Tahun_ajaran/tambah'); ?>" method="post">
          <div class="modal-body">

              <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control">
              </div>

              <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control">
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


  <?php foreach ($tahun as $row): ?>
    
  <!-- modal edit -->
   <div class="modal modal-blur fade" id="modal-edit<?= $row->id_tahun;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Tahun Ajaran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Tahun_ajaran/edit/'.encrypt_url($row->id_tahun)); ?>" method="post">
          <div class="modal-body">

              <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="<?= $row->tahun; ?>">
              </div>

              <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" value="<?= $row->tahun_ajaran; ?>">
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
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_tahun;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <?= $row->tahun; ?> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Tahun_ajaran/hapus/'.encrypt_url($row->id_tahun)); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>