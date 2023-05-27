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
            <div class="card-body">
              
              <form action="<?= base_url('sisfo/Instansi/update'); ?>" method="post">
              <div class="row">
                <div class="col-md-6">

                    <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label">NPSN</label>
                      <div class="col">
                        <input type="text" name="npsn" class="form-control" value="<?= $instansi->npsn; ?>">
                      </div>
                    </div>

                    <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">Nama Sekolah</label>
                      <div class="col">
                        <input type="text" name="nama_sekolah" class="form-control " value="<?= $instansi->nama_sekolah; ?>">                                               
                      </div>
                    </div>

                     <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">Jenjang</label>
                      <div class="col">
                        <input type="text" name="jenjang" class="form-control " value="<?= $instansi->jenjang; ?>" >                                               
                      </div>
                    </div>

                     <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">Status</label>
                      <div class="col">
                        <input type="text" name="status" class="form-control " value="<?= $instansi->status; ?>">                                               
                      </div>
                    </div>

                     <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">Alamat</label>
                      <div class="col">
                        <textarea name="alamat" class="form-control "><?= $instansi->alamat; ?></textarea>  
                      </div>
                    </div>

                     <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">Kepala Sekolah</label>
                      <div class="col">
                        <input type="text" name="kepala_sekolah" class="form-control " value="<?= $instansi->kepala_sekolah; ?>">                                               
                      </div>
                    </div>

                     <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">No Telpon</label>
                      <div class="col">
                        <input type="text" name="no_telepon" class="form-control " value="<?= $instansi->no_telepon; ?>">                                               
                      </div>
                    </div>

                     <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">Email</label>
                      <div class="col">
                        <input type="text" name="email" class="form-control " value="<?= $instansi->email; ?>">                                               
                      </div>
                    </div>

                     <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label required">Website</label>
                      <div class="col">
                        <input type="text" name="website" class="form-control " value="<?= $instansi->website; ?>">                                               
                      </div>
                    </div>

                     <button class="btn btn-success float-end"><i class="fas fa-save"></i>&nbsp save</button>
                  </form>

                </div>

                <div class="col-md-6">
                  <form action="<?= base_url('sisfo/Instansi/updateLogo/'); ?>" method="post" enctype="multipart/form-data">

                    <div class="view-logo col-md-12 bg-light mb-3 d-flex justify-content-center">                    
                     <img src="<?= base_url('assets/img/instansi/'.$instansi->logo); ?>" width="150" alt="...">
                    </div>
                    <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label">Logo</label>
                      <div class="col-7">
                        <input type="file" name="logo" class="form-control">
                      </div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-success float-end" id="logo"><i class="fas fa-save"></i></button>
                      </div>
                    </div>

                  </form>

                   <form action="<?= base_url('sisfo/Instansi/updateHeader/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="view-header col-md-12 bg-light mb-3 d-flex justify-content-center">
                     <img src="<?= base_url('assets/img/instansi/'.$instansi->header); ?>" width="150" alt="...">
                    </div>

                    <div class="form-group mb-3 row">
                      <label class="col-md-3 col-form-label">Header</label>
                      <div class="col-md-7">
                        <input type="file" name="header" class="form-control" >
                      </div>
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-success float-end" id="header"><i class="fas fa-save"></i></button>
                      </div>
                    </div>
                  </form>


                  <form action="<?= base_url('sisfo/Instansi/updateTtd/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="view-ttd col-md-12 bg-light mb-3 d-flex justify-content-center">
                      <img src="<?= base_url('assets/img/instansi/'.$instansi->ttd); ?>" width="150" alt="...">
                    </div>

                    <div class="form-group mb-3 row">
                      <label class="col-3 col-form-label">TTD</label>
                      <div class="col-7">
                        <input type="file" name="ttd" class="form-control"  >
                      </div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-success float-end" id="ttd"><i class="fas fa-save"></i></button>
                      </div>
                    </div>
                  </form>

                    

                </div>

                
              </div>
               
            </div>
        </div>

      <!-- end content -->
    </div>
  </div>

  <script>
    
    $('#logo').click(function(){
      
    });
  </script>


 