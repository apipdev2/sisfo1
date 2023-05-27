
      
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

               <div class="col-md-9">
                
                  <div class="card">
                    <div class="card-header bg-info">
                      <i class="fas fa-users"></i> &nbsp; Biodata
                    </div>
                   <!-- timeline -->

                    <div class="card-body">
                    
                    <div class="row">

                      <div class="col-md-3">
                        <img src="<?= base_url('assets/img/siswa/'.$siswa->image); ?>" alt="ini foto" width="200">
                        <form action="<?= base_url('infosiswa/Dashboard/upload/'); ?>" method="post" enctype="multipart/form-data">
                          <input type="file" class="form-control" name="image">
                          <center>
                            
                          <button class="btn btn-success mt-2 btn-sm"><i class="fas fa-upload"></i>Upload</button>
                          </center>
                        </form>
                      </div>

                      <div class="col-md-7">
                        <table width="100%">
                          <tr><th>NIS</th><td>:</td><td><?= $siswa->nis;?></td></tr>
                          <tr><th>NISN</th><td>:</td><td><?= $siswa->nisn;?></td></tr>
                          <tr><th>Nama</th><td>:</td><td><?= $siswa->nama_peserta;?></td></tr>
                          <tr><th>Jenis Kelamin</th><td>:</td><td><?= $siswa->jenis_kelamin;?></td></tr>
                          <tr><th>Tempat, Tanggal Lahir</th><td>:</td><td><?= $siswa->tempat_lahir.', '.date('d-m-Y', strtotime($siswa->tanggal_lahir));?></td></tr>
                          <tr><th>Kelas</th><td>:</td><td><?= $siswa->kelas;?></td></tr>
                          <tr><th>Jurusan</th><td>:</td><td><?= $siswa->jurusan;?></td></tr>
                          <tr><th>Agama</th><td>:</td><td><?= $siswa->agama;?></td></tr>
                          <tr><th>Alamat</th><td>:</td><td><?= $siswa->alamat;?></td></tr>
                          <tr><th>Rt/Rw</th><td>:</td><td><?= $siswa->rt.' / '.$siswa->rw;?></td></tr>
                          <tr><th>Desa</th><td>:</td><td><?= $siswa->desa;?></td></tr>
                          <tr><th>Kecamatan</th><td>:</td><td><?= $siswa->kecamatan;?></td></tr>
                          <tr><th>Kabupaten/Kota</th><td>:</td><td><?= $siswa->kabupaten;?></td></tr>
                          <tr><th>Provinsi</th><td>:</td><td><?= $siswa->provinsi;?></td></tr>
                          <tr><th>Kode pos</th><td>:</td><td><?= $siswa->kode_pos;?></td></tr>     
                          <tr><th>No HP</th><td>:</td><td><?= $siswa->nomor_hp;?></td></tr>
                          <tr><th>Email</th><td>:</td><td><?= $siswa->email;?></td></tr>      
                          <tr><th>Nama Ayah</th><td>:</td><td><?= $siswa->nama_ayah;?></td></tr>      
                          <tr><th>Nama Ibu</th><td>:</td><td><?= $siswa->nama_ibu;?></td></tr>
                           <tr><th>Nama Wali</th><td>:</td><td><?= $siswa->nama_wali;?></td></tr>
                          
                        </table>
                      </div>
                    </div>

                    </div>

                   <!--  -->
                  </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header bg-info">
                    <i class="fas fa-user"></i> &nbsp; Walikelas
                  </div>
                  <div class="card-body">

                    <div class="d-flex justify-content-center">
                        <img src="<?= base_url('assets/img/pegawai/'.$walas->foto); ?>" alt="foto" width="300">
                      </div>
                        <h6><?= $walas->nama_lengkap; ?></h6>
                    
                    <!-- <div id="demo-calendar-basic"></div> -->

                  </div>
                </div>
              </div>


                    

          </div>
        </div>
      </div>

<script>
$(document).ready(function () {
  $("#demo-calendar-basic").zabuto_calendar({
  	//style
  	classname: 'table table-bordered lightgrey-weekends',
  	//langue
  	language: 'id',
  	//custom nama bln, hari
  	translation: {
      "months" : {
        "1":"Januari",
        "2":"Februari",
        "3":"Maret",
        "4":"April",
        "5":"Mei",
        "6":"Juni",
        "7":"Juli",
        "8":"Agustus",
        "9":"September",
        "10":"Oktober",
        "11":"November",
        "12":"Desember"
      },
      "days" : {
        "0":"Minggu",
        "1":"Senin",
        "2":"Selasa",
        "3":"Rabu",
        "4":"Kamis",
        "5":"Jumat",
        "6":"Sabtu"
      }
    },
  	//setup

  	header_format: '[month] / [year]',
    week_starts: 'sunday',
    show_days: true,
    today_markup: '<span class="badge bg-primary">[day]</span>',
    navigation_markup: {
        prev: '<i class="fas fa-chevron-circle-left"></i>',
        next: '<i class="fas fa-chevron-circle-right"></i>'
      }

  });
});
</script>