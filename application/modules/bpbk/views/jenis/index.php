
      
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
                        <th>Jenis Pelanggaran</th>
                        <th>Point</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($jenis as $row): ?>
                      	<tr>
                      		<td><?= $no++;?></td>
                      		<td><?= $row->kategori_pelanggaran;?></td>
                      		<td><?= $row->jenis_pelanggaran;?></td>
                      		<td><?= $row->point;?></td>
                      		<td>
                      			<a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit<?= $row->id_jenis;?>" class="fas fa-edit text-info"></a>
                      			<a href="<?= base_url('bpbk/Jenis_pelanggaran/delete/'.encrypt_url($row->id_jenis));?>" class="fas fa-trash text-danger"></a>
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
          <form action="<?= base_url('bpbk/Jenis_pelanggaran/add'); ?>" method="post">
          <div class="modal-body">

          		<div class="form-group mb-3">
          			<label>Kategori</label>
          			<select name="id_kategori" class="form-select">
          				<option value="" selected disabled>::- Kategori -::</option>
          				<?php foreach ($kategori as $kat): ?>
          				<option value="<?= $kat->id_kat;?>"><?= $kat->kategori_pelanggaran;?></option>
          				<?php endforeach ?>
          			</select>
          		</div>
             
               <div class="form-group mb-3">
                <label>Jenis Pelanggaran</label>
                <input type="text" name="jenis_pelanggaran" class="form-control" >
              </div>

              <div class="form-group">
                <label>Point</label>
                <input type="number" name="point" class="form-control" >
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

    <?php foreach ($jenis as $row): ?>
    <div class="modal modal-blur fade" id="modal-edit<?= $row->id_jenis;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('bpbk/Jenis_pelanggaran/edit/'.encrypt_url($row->id_jenis)); ?>" method="post">
          <div class="modal-body">

          		<div class="form-group mb-3">
          			<label>Kategori</label>
          			<select name="id_kategori" class="form-select">
          				<?php foreach ($kategori as $kat): ?>
          					<?php if ($row->id_kategori == $kat->id_kat): ?>
          						<option value="<?= $kat->id_kat;?>" selected ><?= $kat->kategori_pelanggaran;?></option>
          					<?php else: ?>
          						<option value="<?= $kat->id_kat;?>"><?= $kat->kategori_pelanggaran;?></option>
          					<?php endif ?>          				
          				<?php endforeach ?>
          			</select>
          		</div>
             
               <div class="form-group">
                <label>Kategori Pelanggaran</label>
                <input type="text" name="jenis_pelanggaran" class="form-control" value="<?= $row->jenis_pelanggaran;?>">
              </div> 

              <div class="form-group">
                <label>Point</label>
                <input type="number" name="point" class="form-control" value="<?= $row->point;?>">
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
      