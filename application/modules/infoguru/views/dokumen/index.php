
      
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
            		<a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-add"><i class="fas fa-upload"></i> &nbsp;Upload</a>
            	</div>
            	<div class="card-body">
            		<form action="<?= base_url('infoguru/Dokumen/del'); ?>" method="post">
            		<div class="table-responsive">
            			<table class="table table-striped">
            				<thead>
            					<tr>
            						<th>#</th>
            						<th>Keterangan</th>
            						<th>File</th>
            						<th>Type</th>
            						<th>Size</th>
                        <th>Opsi</th>
            					</tr>
            				</thead>
            				<tbody>
        					<?php foreach ($dokumen as $dok): ?>
        						<tr>
        							<td><input type="checkbox" name="id_dokumen[]" value="<?= $dok->id_dokumen; ?>"></td>
        							<td><?= $dok->keterangan;?></td>
        							<td><?= $dok->filename;?></td>
        							<td><?= $dok->type;?></td>
        							<td><?= $dok->size;?></td>
                      <td>
                        <a href="<?= base_url('assets/img/dokumen/'.$dok->filename); ?>" class="fas fa-download text-info" download></a>
                      </td>
        							
        						</tr>
        					<?php endforeach ?>

            				</tbody>
            			</table>
            		</div>
            		<button class="btn btn-danger mt-3 float-end"><i class="fas fa-trash"></i>&nbsp; Delete</button>
            		</form>
            	</div>
            </div>

          </div>
        </div>
      </div>

     <!-- modal -->
   <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('infoguru/Dokumen/add'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

             <div class="form-group">
                <label>File Broswe</label>
                <input type="file" name="dokumen" class="form-control">
              </div>

              <div class="form-group">
              	<label>Keterangan</label>
              	<input type="text" name="keterangan" class="form-control">
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


	  

  
