

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
              <form action="<?= base_url('sisfo/Presensiguru/storephguru'); ?>" method="post">
            	<div class="col-md-6">
                  
                  <table width="100%">
                    <tr>
                      <td>Tahun Ajaran</td><td>:</td><td><b><?= $tahunajaran->tahun_ajaran;?></b></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td>:</td>
                      <td>
                        <input type="date" name="tanggal">
                      </td>
                    </tr>
                  </table>

                </div>
            </div>
                <div class="card-body">
                	<div class="table-responsive">
                     <table class="table table-striped">
		                  <thead>
		                    <tr>
		                      <th>No</th>
		                      <th>NIP</th>
		                      <th>Nama</th>
		                      <th>Hadir</th>
		                      <th>Izin</th>
		                      <th>Sakit</th>
		                      <th>Alfa</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                    <?php $no=1; foreach ($pegawai as $pegawai): ?>
		                    <input type="hidden" name="nip[]" value="<?= $pegawai->nip; ?>">
		                      <tr>
		                        <td><?= $no++; ?></td>
		                        <td><?= $pegawai->nip; ?></td>
		                        <td><?= $pegawai->nama_lengkap; ?></td>
		                        <td><input type="checkbox" name="ket[]" value="H"></td>
		                        <td><input type="checkbox" name="ket[]" value="I"></td>
		                        <td><input type="checkbox" name="ket[]" value="S"></td>
		                        <td><input type="checkbox" name="ket[]" value="A"></td>
		                      </tr>
		                    <?php endforeach ?>
		                  </tbody>
                		</table>

                		<button class="btn btn-success m-3 float-end"><i class="fas fa-save"></i>Simpan</button>
              		</div>
                </div>
              </form>

	        </div>

	      </div>

      <!-- end content -->
    </div>
  </div>

