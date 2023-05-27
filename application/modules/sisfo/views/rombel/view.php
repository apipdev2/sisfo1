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
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('sisfo/Rombel');?>">Rombel</a></li>
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
          <div class="row">
            <div class="col-6">

               <table width="100%">
                    <tr>
                      <td>Tahun Ajaran</td><td>:</td><td><b><?= $tahunajaran->tahun_ajaran;?></b></td>
                    </tr>
                    <tr>
                      <td>Tingkat</td>
                      <td>:</td>
                      <td><?= $kelas->kelas; ?></td>
                    </tr>
                  </table>

            </div>
          </div>
        </div>           
            <div class="card-body">

              <div class="btn-group">
                <a href="" class="btn btn-success mb-2"  data-bs-toggle="modal" data-bs-target="#modal-add" ><i class="fas fa-user-plus"></i> &nbsp; Tambah</a>
                <a href="" class="btn btn-secondary mb-2"  data-bs-toggle="modal" data-bs-target="#import" ><i class="fas fa-download"></i> &nbsp; Import</a>
                 <a href="<?= base_url('sisfo/Rombel/generate/'.encrypt_url($kelas->id_kelas)); ?>" class="btn btn-info mb-2" ><i class="fas fa-key"></i> &nbsp; Generate</a>
              </div>

              <div  class="table-responsive read">
                <table class="table datatable" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($pd as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $row->nis; ?></td>
                          <td><?= $row->nama_peserta; ?></td>
                          <td><?= $row->jenis_kelamin; ?></td>
                          <td><?= $row->tempat_lahir; ?></td>
                          <td><?= date('d-m-Y',strtotime($row->tanggal_lahir)); ?></td>
                          <td><?= $row->kelas; ?></td>
                          <td>
                            <?php if ($row->status_siswa  == "Y"): ?>
                              <div class="fas fa-check-circle text-success" onclick="non('<?= $row->nis;?>')"></div>
                              
                            <?php else : ?>
                              <div class="fas fa-window-close text-danger" onclick="active('<?= $row->nis;?>')"></div>
                            <?php endif ?>  
                          </td>
                          <td>

                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li>
                                <a href="<?= base_url('sisfo/Rombel/reset/'.encrypt_url($row->nis).'/'.encrypt_url($row->id_kelas)); ?>" class="dropdown-item">Reset Password</a>
                              </li>
                              <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_riwayat;?>" class="dropdown-item">Keluarkan Rombel</a>
                              </li>
                              <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#mutasi<?= $row->id_riwayat;?>" class="dropdown-item">Mutasi Keluar</a>
                              </li>
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

      <!-- end content -->
    </div>
  </div>

    <!-- add modal -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Peserta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Rombel/addPeserta'); ?>" method="post">
          <div class="modal-body">

            <input type="hidden" name="id_kelas" value="<?= $kelas->id_kelas; ?>">

             <div class="table-responsive">
                <table class="table datatable" id="datatabel" width="100%">
                 <thead>
                   <tr>
                     <td><input type="checkbox" onchange="checkAll(this)" name="chk[]" ></td>
                     <td>NIS</td>
                     <th>Nama</th>
                     <th>JK</th>
                     <th>Tempat Lahir</th>
                     <th>Tgl Lahir</th>
                     <th>Asal Sekolah</th>
                   </tr>
                 </thead>
                  <tbody class="table-tbody">
                      <?php foreach ($siswa as $row): ?>
                        <tr>
                          <td><input type="checkbox" name="id_siswa[]"  value="<?= $row->id_siswa; ?>"></td>
                          <td><input type="text" name="nis[]" class="form-control" value="<?= $row->nis; ?>"></td>
                          <td><?= $row->nama_peserta; ?></td>
                          <td><?= $row->jenis_kelamin; ?></td>
                          <td><?= $row->tempat_lahir; ?></td>
                          <td><?= date('d-m-Y',strtotime($row->tanggal_lahir)); ?></td>
                          <td><?= $row->asal_sekolah; ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
               </table>
             </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>

   <?php foreach ($pd as $row): ?>


  <!-- modal del -->
  <div class="modal modal-blur fade" id="mutasi<?= $row->id_riwayat;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <form action="<?= base_url('sisfo/Rombel/mutasi'); ?>" method="post">
          <div class="modal-body">

              <input type="hidden" name="nis" value="<?= $row->nis; ?>">
              <div class="form-group">
                <label for="">Keterangan</label>
                <select name="ket" id="" class="form-select">
                  <option value="" selected disabled>::pilih::</option>
                  <option value="Mutasi">Mutasi</option>
                  <option value="Mengundurkan diri">Mengundurkan diri</option>
                  <option value="Dikeluarkan Sekolah">Dikeluarkan Sekolah</option>
                  <option value="Meninggal">Meninggal</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Alasan</label>
                <textarea name="alasan" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label for="">Sekolah Tujuan</label>
                <input type="text" name="sekolah_tujuan" class="form-control">
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button> 
            <button class="btn btn-success">Save</button>           
          </div>
          </form>
        </div>
      </div>
    </div>

  <!--  -->
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_riwayat;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <b><?= $row->nama_peserta; ?></b> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Rombel/hapusPeserta/'.encrypt_url($row->id_riwayat).'/'.encrypt_url($row->id_kelas)); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>


  <?php endforeach ?>


   <!-- import -->
  <div class="modal modal-blur fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
              <h3>Download Format Import Siswa: <a href="<?= base_url('assets/import/Data Siswa.xlsx') ?>" class="btn btn-link text-info">Klik disini</a></h3>
              <form action="<?= base_url('sisfo/Rombel/import'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kelas" value="<?= $kelas->id_kelas; ?>">
                <div class="form-group">
                  <label>File Import siswa</label>
                  <input type="file" name="upload_file" class="form-control">
                </div>
                <button type="button" class="btn btn-warning mt-3 link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-info mt-3 float-end">Import Siswa</button>
              </form>
          </div>
          
        </div>
      </div>
    </div>

    <script>
      function active(nis){
        $.ajax({
          url:'<?= base_url('sisfo/Rombel/active/');?>'+nis,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            location.reload();
          }
        });
      }

      function non(nis){
        
        $.ajax({
          url:'<?= base_url('sisfo/Rombel/non_active/');?>'+nis,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            location.reload();
          }
        });
      }
    </script>

    <script>
      $(document).ready(function () {
          $('#datatabel').DataTable();
      });
    </script>
    
    <script type="text/javascript">
     function checkAll(ele) {
          var checkboxes = document.getElementsByTagName('input');
          if (ele.checked) {
              for (var i = 0; i < checkboxes.length; i++) {
                  if (checkboxes[i].type == 'checkbox' ) {
                      checkboxes[i].checked = true;
                  }
              }
          } else {
              for (var i = 0; i < checkboxes.length; i++) {
                  if (checkboxes[i].type == 'checkbox') {
                      checkboxes[i].checked = false;
                  }
              }
          }
      }
    </script>


