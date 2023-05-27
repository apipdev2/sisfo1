
      
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
            		Ubah Password
            	</div>
            	<div class="card-body ">
            		<div class="row">
            			<div class="col-md-6">
            				
            				<form action="<?= base_url('infosiswa/Akun/change/'); ?>" method="post">
            		
		            			<div class="form-group">
		            				<label for="">Password Lama</label>
		            				<input type="text" name="password_old" class="form-control">
		            				<?= form_error('password_old', '<small class="text-danger pl-3">', '</small>'); ?>
		            			</div>

		            			<div class="form-group">
		            				<label for="">Password Baru</label>
		            				<input type="text" name="password" class="form-control">
		            				<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
		            			</div>

	            				<button class="btn btn-success mt-3 float-end"><i class="fas fa-save"></i>&nbsp; Save</button>
	            			</form>

            			</div>
            			<div class="col-md-6">
            				
            			</div>
            		</div>
            	</div>
            </div>

          </div>
        </div>
      </div>

   

	  

  
