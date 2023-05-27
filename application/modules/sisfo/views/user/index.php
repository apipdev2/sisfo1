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
                        <th>Image</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($user as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><img src="<?= base_url('assets/img/user/'.$row->image); ?>" alt="img" width="60"></td>
                          <td><?= $row->nip;?></td>
                          <td><?= $row->full_name;?></td>
                          <td><?= $row->email;?></td>
                          <td><?= $row->nama_level;?></td>                        
                          <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-key<?= $row->id_user;?>" class="fas fa-key text-secondary"></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $row->id_user;?>" class="fas fa-edit text-info"></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_user;?>" class="fas fa-trash text-danger"></a>
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
          <form action="<?= base_url('sisfo/User/tambah'); ?>" method="post">
          <div class="modal-body">

               <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control">
              </div>
              
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="full_name" class="form-control">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>

              <div class="form-group">
              	<label>Password</label>
              	<input type="text" name="password" class="form-control">
              </div>

              <div class="form-group">
                <label>Level</label>
                <select name="id_level" class="form-select">
                <option value="" selected disabled>::Pilih Level::</option>
                  <?php foreach ($level as $lvl): ?>
                    <option value="<?= $lvl->id_level; ?>"><?= $lvl->nama_level; ?></option>
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


  <?php foreach ($user as $row): ?>
    
  <!-- modal edit -->
   <div class="modal modal-blur fade" id="modal-edit<?= $row->id_user;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/User/edit/'.encrypt_url($row->id_user)); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

              <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="<?= $row->nip; ?>">
              </div>

              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="full_name" class="form-control" value="<?= $row->full_name; ?>">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $row->email; ?>">
              </div>

              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
              </div>

              <div class="form-group">
                <label>Level</label>
                <select name="id_level" class="form-select">

                  <?php foreach ($level as $lvl): ?>
                    <?php if ($row->id_level == $lvl->id_level): ?>
                      <option value="<?= $lvl->id_level; ?>" selected><?= $lvl->nama_level; ?></option>
                    <?php else: ?>
                      <option value="<?= $lvl->id_level; ?>"><?= $lvl->nama_level; ?></option>
                    <?php endif ?>                    
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

  <!-- modal key-->
  <div class="modal modal-blur fade" id="modal-key<?= $row->id_user;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="<?= base_url('sisfo/User/change_password/'.encrypt_url($row->id_user)); ?>" method="post">
          <div class="modal-header bg-secondary text-white">
            <h2>Reset Password</h2>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Password New</label>
              <input type="text" name="password" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-info float-end">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- modal del -->
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_user;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <?= $row->full_name; ?> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/User/hapus/'.encrypt_url($row->id_user )); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>