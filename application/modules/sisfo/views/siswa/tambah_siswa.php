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
            <h3>Silahkan Isi Form Berikut :</h3>
          </div>
            <div class="card-body">
              <form action="" method="post">

                    <div id="pribadi">
                      <h2 class="text-center bg-info">
                        Data Pribadi
                      </h2>
                      <div class="row ">

                        <div class="col-md-6">

                          <div class="form-group mb-3 row mb-3 row">
                            <label class="col-3 col-form-label">Jenis Registrasi</label>
                            <div class="col">
                              <select name="jenis_registrasi" class="form-select">
                                <option value="" selected disabled>::pilih::</option>
                                <?php foreach ($jenis_registrasi as $row): ?>
                                  <option value="<?= $row; ?>"><?= $row; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                          </div>

                          

                          <div class="form-group mb-3 row mb-3 row">
                            <label class="col-3 col-form-label">NISN</label>
                            <div class="col">
                              <input type="text" name="nisn" class="form-control" value="<?= set_value('nisn'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row mb-3 row">
                            <label class="col-3 col-form-label required">NIK</label>
                            <div class="col">
                              <input type="text" name="nik" class="form-control <?php if (form_error('nik')): ?> is-invalid <?php endif ?>" >
                              <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                             
                            </div>
                          </div>
                          

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">No KK</label>
                            <div class="col">                              
                              <input type="number" name="no_kk" class="form-control" value="<?= set_value('no_kk'); ?>">
                            </div>
                          </div>

                           <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">No Akta Lahir</label>
                            <div class="col">
                              <input type="text" name="no_registrasi_akta_lahir" class="form-control" value="<?= set_value('no_registrasi_akta_lahir'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Nama Peserta</label>
                            <div class="col">                              
                              <input type="text" name="nama_peserta" class="form-control" value="<?= set_value('nama_peserta'); ?>">
                            </div>
                          </div>   

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tempat Lahir</label>
                            <div class="col">
                              <input type="text" name="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tanggal Lahir</label>
                            <div class="col">
                              <input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Jenis Kelamin</label>
                            <div class="col">
                              <select  name="jenis_kelamin" class="form-select">
                                <option value="" selected disabled="">Pilih</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Agama</label>
                            <div class="col">
                              <select  name="agama" class="form-select">
                                <option value="" selected disabled="">Pilih</option>
                                <?php foreach ($agama as $agama): ?>
                                  <option value="<?= $agama->agama; ?>"><?= $agama->agama; ?></option>
                                <?php endforeach ?>
                              </select>
                              </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Alamat</label>
                            <div class="col">
                              <textarea name="alamat" class="form-control"><?= set_value('alamat'); ?></textarea>
                            </div>
                          </div>

                           <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Rt/Rw</label>
                            <div class="col-4">
                              <input type="number" name="rt" class="form-control" placeholder="Rt" value="<?= set_value('rt'); ?>">
                            </div>
                            <div class="col-5">
                              <input type="number" name="rw" class="form-control" placeholder="Rw" value="<?= set_value('rw'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Desa / Kelurahan</label>
                            <div class="col">
                              <input type="text" name="desa" class="form-control" value="<?= set_value('desa'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Kecamatan</label>
                            <div class="col">
                              <input type="text" name="kecamatan" class="form-control" value="<?= set_value('kecamatan'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Kabupaten / Kota</label>
                            <div class="col">
                              <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="<?= set_value('kabupaten'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Prov / Kode Pos</label>
                            <div class="col-5">
                              <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Provinsi" value="<?= set_value('provinsi'); ?>">
                            </div>
                            <div class="col-4">
                              <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pose" value="<?= set_value('kode_pos'); ?>">
                            </div>
                          </div>
                          

                        </div>

                        <div class="col-md-6">

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tempat Tinggal</label>
                            <div class="col">
                              <select  name="tempat_tinggal" class="form-control">
                                <option value="">Pilih</option>                     
                                <option value="Bersama orang Tua">Bersama orang Tua</option>
                                <option value="Wali">Wali</option>
                                <option value="Kos">Kos</option>
                                <option value="Asrama">Asrama</option>
                                <option value="Panti Asuhan">Panti Asuhan</option>                              
                              </select>
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Jarak</label>
                            <div class="col">
                              <select  name="jarak" class="form-control">
                                <option value="" selected disabled="">Pilih</option>          
                                <option value="Kurang Dari 1 KM">Kurang Dari 1 KM</option>
                                <option value="Lebih Dari 1 KM">Lebih Dari 1 KM</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Moda Transportasi</label>
                            <div class="col">
                              <select  name="moda_transportasi" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($transportasi as $ts): ?>
                                <option value="<?= $ts->nama_transportasi; ?>"><?= $ts->nama_transportasi; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Berkebutuhan Khusus</label>
                            <div class="col">
                              <select  name="berkebutuhan_khusus" class="form-control">
                                <option value="-" selected disabled="">Pilih</option>
                                <?php foreach ($kebutuhan as $kebutuhan): ?>
                                <option value="<?= $kebutuhan->kebutuhan_khusus; ?>"><?= $kebutuhan->kebutuhan_khusus; ?></option>
                              <?php endforeach ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tinggi Badan (Cm)</label>
                            <div class="col">
                              <input type="number" name="tinggi_badan" class="form-control" value="<?= set_value('tinggi_badan'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Berat Badan (Kg)</label>
                            <div class="col">
                              <input type="number" name="berat_badan" class="form-control" value="<?= set_value('berat_badan'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Anak Ke-</label>
                            <div class="col">
                              <input type="number" name="anak_ke" class="form-control" value="<?= set_value('anak_ke'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Jumlah Saudara Kandung</label>
                            <div class="col">
                              <input type="number" name="jumlah_saudara_kandung" class="form-control" value="<?= set_value('jumlah_saudara_kandung'); ?>">
                            </div>
                          </div>
                            

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Asal Sekolah</label>
                            <div class="col">
                              <textarea name="asal_sekolah" class="form-control"><?= set_value('asal_sekolah');?></textarea>
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">No KIP</label>
                            <div class="col">
                              <input type="text" name="no_kip" class="form-control" value="<?= set_value('no_kip'); ?>">
                            </div>
                          </div>
                          
                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">No HP</label>
                            <div class="col">
                              <input type="number" name="nomor_hp" class="form-control" value="<?= set_value('nomor_hp'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Email</label>
                            <div class="col">
                              <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Seragam Jurusan</label>
                            <div class="col">
                              <select name="size_jurusan" class="form-control">
                                <option value="" selected="" disabled="">pilih</option>
                                <?php foreach ($size_jurusan as $size): ?>
                                <option value="<?= $size; ?>"><?= $size; ?></option>                              
                                <?php endforeach ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Seragam Olahraga</label>
                            <div class="col">
                              <select name="size_olahraga"  class="form-control">
                                <option value="" selected="" disabled="">pilih</option>
                                <?php foreach ($size_olahraga as $size): ?>
                                <option value="<?= $size; ?>"><?= $size; ?></option>                              
                                <?php endforeach ?>
                              </select>
                            </div>
                          </div>

                      </div>
                    </div>

                    <div id="ortu">
                      <h2 class="text-center bg-success">
                        Data Orang Tua
                      </h2>
                      <div class="row">

                        <div class="col-md-6">

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">NIK Ayah</label>
                            <div class="col">
                              <input type="text" name="nik_ayah" class="form-control" value="<?= set_value('nik_ayah'); ?>">
                            </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Nama Ayah</label>
                            <div class="col">
                              <input type="text" name="nama_ayah" class="form-control" value="<?= set_value('nama_ayah'); ?>">
                            </div>
                          </div>
                                          
                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tempat Lahir Ayah</label>
                            <div class="col">
                            <input type="text" name="tempat_lahir_ayah" class="form-control" value="<?= set_value('tempat_lahir_ayah'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tanggal Lahir Ayah</label>
                            <div class="col">
                            <input type="date" name="tanggal_lahir_ayah" class="form-control" value="<?= set_value('tanggal_lahir_ayah'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Pendidikan Ayah</label>
                            <div class="col">
                            <select name="pendidikan_ayah" class="form-control">
                              <option value="" selected disabled="">Pilih Pendidikan</option>
                              <?php foreach ($pendidikan_ayah as $p): ?>
                                <option value="<?= $p->nama_pendidikan; ?>"><?= $p->nama_pendidikan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Pekerjaan Ayah</label>
                            <div class="col">
                            <select name="pekerjaan_ayah" class="form-control">
                              <option value="" selected disabled="">Pilih</option>
                              <?php foreach ($pekerjaan as $pekerjaan): ?>
                                <option value="<?= $pekerjaan->nama_pekerjaan; ?>"><?= $pekerjaan->nama_pekerjaan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Penghasilan Ayah</label>
                            <div class="col">
                            <select name="penghasilan_bulanan_ayah" class="form-control">
                              <option value="" selected disabled="">Pilih</option>
                              <?php foreach ($penghasilan as $penghasilan): ?>          <option value="<?= $penghasilan->penghasilan; ?>"><?= $penghasilan->penghasilan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">No Hp Ayah</label>
                            <div class="col">
                            <input type="number" name="no_ayah" class="form-control" value="<?= set_value('no_ayah'); ?>"> 
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label" >Berkebutuhan Khusus Ayah</label>
                            <div class="col">
                            <select name="berkebutuhan_khusus_ayah" class="form-control">
                              <option value="-" selected disabled="">Pilih</option>
                              <?php foreach ($kebutuhan_ayah as $kebutuhan): ?>
                              <option value="<?= $kebutuhan->kebutuhan_khusus; ?>"><?= $kebutuhan->kebutuhan_khusus; ?></option>
                            <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                        </div>
                        <div class="col-md-6">
                          
                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">NIK ibu</label>
                            <div class="col">
                            <input type="text" name="nik_ibu" class="form-control" value="<?= set_value('nik_ibu'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Nama ibu</label>
                            <div class="col">
                            <input type="text" name="nama_ibu" class="form-control" value="<?= set_value('nama_ibu'); ?>">
                          </div>
                          </div>
                                          
                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tempat Lahir ibu</label>
                            <div class="col">
                            <input type="text" name="tempat_lahir_ibu" class="form-control" value="<?= set_value('tempat_lahir_ibu'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tanggal Lahir ibu</label>
                            <div class="col">
                            <input type="date" name="tanggal_lahir_ibu" class="form-control" value="<?= set_value('tanggal_lahir_ibu'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Pendidikan ibu</label>
                            <div class="col">
                            <select name="pendidikan_ibu" class="form-control">
                              <option value="" selected disabled="">Pilih Pendidikan</option>
                              <?php foreach ($pendidikan_ibu as $p): ?>
                                <option value="<?= $p->nama_pendidikan; ?>"><?= $p->nama_pendidikan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Pekerjaan ibu</label>
                            <div class="col">
                            <select name="pekerjaan_ibu" class="form-control">
                              <option value="" selected disabled="">Pilih</option>
                              <?php foreach ($pekerjaan_ibu as $pekerjaan): ?>          <option value="<?= $pekerjaan->nama_pekerjaan; ?>"><?= $pekerjaan->nama_pekerjaan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Penghasilan ibu</label>
                            <div class="col">
                            <select name="penghasilan_bulanan_ibu" class="form-control">
                              <option value="" selected disabled="">Pilih</option>
                              <?php foreach ($penghasilan_ibu as $penghasilan): ?>          <option value="<?= $penghasilan->penghasilan; ?>"><?= $penghasilan->penghasilan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">No Hp Ibu</label>
                            <div class="col">
                            <input type="number" name="no_ibu" class="form-control" value="<?= set_value('no_ibu'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Berkebutuhan Khusus Ibu</label>
                            <div class="col">
                            <select name="berkebutuhan_khusus_ibu" class="form-control">
                              <option value="-" selected disabled="">Pilih</option>
                              <?php foreach ($kebutuhan_ibu as $kebutuhan): ?>
                              <option value="<?= $kebutuhan->kebutuhan_khusus; ?>"><?= $kebutuhan->kebutuhan_khusus; ?></option>
                            <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div id="wall">
                      <h2 class="text-center bg-warning" >
                        Data Wali 
                      </h2>
                      <div class="row">

                        <div class="col-md-6">


                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">NIK Wali</label>
                            <div class="col">
                            <input type="text" name="nik_wali" class="form-control" value="<?= set_value('nik_wali'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Nama Wali</label>
                            <div class="col">
                            <input type="text" name="nama_wali" class="form-control" value="<?= set_value('nama_wali'); ?>">
                          </div>
                          </div>
                                          
                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tempat Lahir Wali</label>
                            <div class="col">
                            <input type="text" name="tempat_lahir_wali" class="form-control" value="<?= set_value('tempat_lahir_wali'); ?>">
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Tanggal Lahir Wali</label>
                            <div class="col">
                            <input type="date" name="tanggal_lahir_wali" class="form-control" value="<?= set_value('tanggal_lahir_wali'); ?>">
                          </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Pendidikan Wali</label>
                            <div class="col">
                            <select name="pendidikan_wali" class="form-control">
                              <option value="" selected disabled="">Pilih Pendidikan</option>
                              <?php foreach ($pendidikan_wali as $p): ?>
                                <option value="<?= $p->nama_pendidikan; ?>"><?= $p->nama_pendidikan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Pekerjaan Wali</label>
                            <div class="col">
                            <select name="pekerjaan_wali" class="form-control">
                              <option value="" selected disabled="">Pilih</option>
                              <?php foreach ($pekerjaan_wali as $pekerjaan): ?>
                                <option value="<?= $pekerjaan->nama_pekerjaan; ?>"><?= $pekerjaan->nama_pekerjaan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">Penghasilan Wali</label>
                            <div class="col">
                            <select name="penghasilan_bulanan_wali" class="form-control">
                              <option value="" selected disabled="">Pilih</option>
                              <?php foreach ($penghasilan_wali as $penghasilan): ?>
                                <option value="<?= $penghasilan->penghasilan; ?>"><?= $penghasilan->penghasilan; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                          </div>

                          <div class="form-group mb-3 row">
                            <label class="col-3 col-form-label">No Hp Wali</label>
                            <div class="col">
                            <input type="number" name="no_wali" class="form-control" value="<?= set_value('no_wali'); ?>">
                          </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <button class="btn btn-primary float-end m-1"><i class="fas fa-save m-1"></i> Save</button>
                    <a href="<?= base_url('sisfo/Siswa'); ?>" class="btn btn-danger m-1 float-end"><i class="fas fa-undo"></i>Back</a>


              </form>
            </div>
        </div>

      <!-- end content -->
    </div>
  </div>
 <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
   <script type="text/javascript">

      $( "#provinsi" ).autocomplete({
        source: function(req, res){

          $.ajax({
            url : "<?= base_url('sisfo/Siswa/get_prov/?');?>",
            dataType : "JSON",
            method : "POST",
            data :{provinsi:req.term},
            success: function(data){
                res(data);
            }
          });
        }
      });
       
    </script>


 


