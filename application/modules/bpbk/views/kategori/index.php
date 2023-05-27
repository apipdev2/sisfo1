
      
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
            
            <div class="row row-deck row-cards">

               <div class="col-12">
                
                <div class="card">                	
                <div class="card-header">
	                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-add" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp; Tambah</a>
	             </div>
                <div class="card-body">
                	<div class="table-responsive">
                   <table class="table datatable" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($kategori as $row): ?>
                      	<tr>
                      		<td><?= $no++;?></td>
                      		<td><?= $row->kategori_pelanggaran;?></td>
                      		<td>
                      			<a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $row->id_kat;?>" class="fas fa-edit text-info"></a>
                      			<a href="<?= base_url('bpbk/Kategori_pelanggaran/delete/'.encrypt_url($row->id_kat));?>" class="fas fa-trash text-danger"></a>
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
      </div>


 <!-- add modal -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('bpbk/Kategori_pelanggaran/add'); ?>" method="post">
          <div class="modal-body">
             
               <div class="form-group">
                <label>Kategori Pelanggaran</label>
                <input type="text" name="kategori_pelanggaran" class="form-control" >
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

    <?php foreach ($kategori as $row): ?>
    <div class="modal modal-blur fade" id="modal-edit<?= $row->id_kat;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('bpbk/Kategori_pelanggaran/edit/'.encrypt_url($row->id_kat)); ?>" method="post">
          <div class="modal-body">
             
               <div class="form-group">
                <label>Kategori Pelanggaran</label>
                <input type="text" name="kategori_pelanggaran" class="form-control" value="<?= $row->kategori_pelanggaran;?>">
              </div>              
              

          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach ?>
      