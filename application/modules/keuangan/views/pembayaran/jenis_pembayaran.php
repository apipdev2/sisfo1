
      
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
              <div class="card-header">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-add" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp; Tambah</a>
              </div>
            	<div class="card-body ">
            		
                <div class="table-responsive">
                   <table class="table datatable" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Jenis Pembayaran</th>
                        <th>Nominal</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($jenis as $j): ?>
                      <tr>
                        <td><?= $no++;?></td>
                        <td><?= $j->nama_kategori;?></td>
                        <td><?= $j->jenis_pembayaran;?></td>
                        <td><?= number_format($j->nominal);?></td>
                        <td>
                          <div class="dropdown">
                            <a class="fas fa-list dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $j->id_jenis;?>"><i class="fas fa-edit"></i>&nbsp;Edit</a></li>
                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $j->id_jenis;?>"><i class="fas fa-trash"></i>&nbsp;Hapus</a></li>
                            </ul>
                          </div>
                        </td>
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


      <!-- add modal -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('keuangan/Jenis_pembayaran/add'); ?>" method="post">
          <div class="modal-body">
              <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-select">
                  <option value="" selected disabled>::pilih Kategori::</option>
                  <?php foreach ($kategori as $kat): ?>
                    <option value="<?= $kat->id_kategori; ?>"><?= $kat->nama_kategori; ?></option>
                  <?php endforeach ?>
                </select>
              </div>

               <div class="form-group">
                <label>Jenis Pembayaran</label>
                <input type="text" name="jenis_pembayaran" class="form-control" >
              </div>
              
              <div class="form-group">
                <label>Nominal </label>
                <input type="number" name="nominal" class="form-control">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>


  <?php $no=1; foreach ($jenis as $j): ?>

   <div class="modal modal-blur fade" id="modal-edit<?= $j->id_jenis;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit<?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('keuangan/Jenis_pembayaran/edit/'.encrypt_url($j->id_jenis)); ?>" method="post">
          <div class="modal-body">

              <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-select">
                  <?php foreach ($kategori as $kat): ?>
                    <?php if ($kat->id_kategori == $j->id_kategori): ?>
                      <option value="<?= $kat->id_kategori; ?>" selected><?= $kat->nama_kategori; ?></option>
                    <?php else: ?>
                      <option value="<?= $kat->id_kategori; ?>"><?= $kat->nama_kategori; ?></option>
                    <?php endif ?>
                  <?php endforeach ?>
                </select>
              </div>

               <div class="form-group">
                <label>Jenis Pembayaran</label>
                <input type="text" name="jenis_pembayaran" class="form-control" value="<?= $j->jenis_pembayaran; ?>">
              </div>
              
              <div class="form-group">
                <label>Nominal </label>
                <input type="number" name="nominal" class="form-control" value="<?= $j->nominal; ?>">
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
  <div class="modal modal-blur fade" id="modal-del<?= $j->id_jenis;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <?= $j->jenis_pembayaran; ?> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('keuangan/Jenis_pembayaran/hapus/'.encrypt_url($j->id_jenis)); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>

	  

  
