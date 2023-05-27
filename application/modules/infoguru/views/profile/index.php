<!-- Page header -->
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
            <h3>Silahkan Isi Form Berikut : </h3>
          </div>
            <div class="card-body">

              <form action="<?= base_url('infoguru/Profile/update'); ?>" method="post" enctype="multipart/form-data">
              	<div class="row">
              		<div class="col-md-3">

              			<div class="form-group mb-3">
              				<center>
              					<img alt="foto" src="<?= base_url('assets/img/pegawai/'.$pegawai->foto); ?>" width="200">
	                        <input type="file" name="foto" class="form-control m-2"  >
              				</center>
	                                              
	                    </div>

              		</div>
              		<div class="col-md-8">
              			
              			 <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">NIP</label>
	                      <div class="col">
	                        <input type="text" name="nip" class="form-control" value ="<?= $pegawai->nip; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label required">NIK</label>
	                      <div class="col">
	                        <input type="text" name="nik" class="form-control <?php if (form_error('nik')): ?> is-invalid <?php endif ?>" value ="<?= $pegawai->nik; ?>" >
	                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
	                       
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">No KK</label>
	                      <div class="col">
	                        <input type="text" name="no_kk" class="form-control" value="<?= $pegawai->no_kk;  ?>">
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label required">Nama Lengkap</label>
	                      <div class="col">
	                        <input type="text" name="nama_lengkap" class="form-control <?php if (form_error('nama_lengkap')): ?> is-invalid <?php endif ?>" value ="<?= $pegawai->nama_lengkap; ?>">
	                        <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Gelar depan</label>
	                      <div class="col">
	                        <input type="text" name="gelar_depan" class="form-control" value ="<?= $pegawai->gelar_depan; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Gelar belakang</label>
	                      <div class="col">
	                        <input type="text" name="gelar_belakang" class="form-control" value ="<?= $pegawai->gelar_belakang; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Pendidikan Terakhir</label>
	                      <div class="col">
	                        <input type="text" name="pendidikan_terakhir" class="form-control" value ="<?= $pegawai->pendidikan_terakhir; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Jenis Kelamin</label>
	                      <div class="col">
	                        <select name="jenis_kelamin" class="form-control">
	                          <?php foreach ($jenis_kelamin as $jk): ?>
	                          <?php if ($jk == $pegawai->jenis_kelamin): ?>
	                            <option value="<?= $jk; ?>" selected=""><?= $jk; ?></option>
	                          <?php else: ?>
	                            <option value="<?= $jk; ?>"><?= $jk; ?></option>
	                          <?php endif ?>
	                          <?php endforeach ?>
	                        </select>
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Tempat Lahir</label>
	                      <div class="col">
	                        <input type="text" name="tempat_lahir" class="form-control"  value ="<?= $pegawai->tempat_lahir; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Tanggal Lahir</label>
	                      <div class="col">
	                        <input type="date" name="tanggal_lahir" class="form-control" value ="<?= $pegawai->tanggal_lahir; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Alamat</label>
	                      <div class="col">
	                         <textarea name="alamat" class="form-control"><?= $pegawai->alamat; ?></textarea>
	                      </div>
	                    </div>


	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">No HP</label>
	                      <div class="col">
	                        <input type="number" name="telp" class="form-control" value ="<?= $pegawai->telp; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Email</label>
	                      <div class="col">
	                        <input type="email" name="email" class="form-control" value ="<?= $pegawai->email; ?>" >
	                      </div>
	                    </div>

	                    <div class="form-group mb-3 row">
	                      <label class="col-3 col-form-label">Status Pegawai</label>
	                      <div class="col">
	                        <select name="status_pegawai" class="form-select" >
	                          <?php foreach ($status_pegawai as $sp): ?>
	                          <?php if ($sp == $pegawai->status_pegawai): ?>
	                            <option value="<?= $sp; ?>" selected=""><?= $sp; ?></option>
	                          <?php else: ?>
	                            <option value="<?= $sp; ?>"><?= $sp; ?></option>
	                          <?php endif ?>
	                          <?php endforeach ?>
	                        </select>
	                      </div>
	                    </div>

              		</div>
              	</div>
               
                    <button class="btn btn-primary float-end m-1"><i class="fas fa-save m-1"></i> Save</button>
                    
              </form>

            </div>
        </div>

      <!-- end content -->
    </div>
  </div>





 


