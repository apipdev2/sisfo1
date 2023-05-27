<div class="row">

  <div class="col-md-3">
    <img src="<?= base_url('assets/img/siswa/'.$siswa->image); ?>" alt="ini foto" width="200">
  </div>

  <div class="col-md-7">
    <table width="100%">
      <tr><th colspan="3" style="border-top: 2px dotted #000; border-bottom: 2px dotted #000;"><h3>Data Siswa</h3></th></tr>
      <tr><th>NIS</th><td>:</td><td><?= $siswa->nis;?></td></tr>
      <tr><th>NISN</th><td>:</td><td><?= $siswa->nisn;?></td></tr>
      <tr><th>NIK</th><td>:</td><td><?= $siswa->nik;?></td></tr>
      <tr><th>No KK</th><td>:</td><td><?= $siswa->no_kk;?></td></tr>
      <tr><th>No KIP</th><td>:</td><td><?= $siswa->no_kip;?></td></tr>
      <tr><th>Nama</th><td>:</td><td><?= $siswa->nama_peserta;?></td></tr>
      <tr><th>Jenis Kelamin</th><td>:</td><td><?= $siswa->jenis_kelamin;?></td></tr>
      <tr><th>Tempat, Tanggal Lahir</th><td>:</td><td><?= $siswa->tempat_lahir.', '.date('d-m-Y',strtotime($siswa->tanggal_lahir));?></td></tr>
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
      <tr><th>Tempat Tinggal</th><td>:</td><td><?= $siswa->tempat_tinggal;?></td></tr>
      <tr><th>Jarak</th><td>:</td><td><?= $siswa->jarak;?></td></tr>
      <tr><th>Moda Transportasi</th><td>:</td><td><?= $siswa->moda_transportasi;?></td></tr>
      <tr><th>Berkebutuhan Khusus</th><td>:</td><td><?= $siswa->berkebutuhan_khusus;?></td></tr>
      <tr><th>Tinggi Badan</th><td>:</td><td><?= $siswa->tinggi_badan;?></td></tr>
      <tr><th>Berat Badan</th><td>:</td><td><?= $siswa->berat_badan;?></td></tr>
      <tr><th>Anak Ke-</th><td>:</td><td><?= $siswa->anak_ke;?></td></tr>
      <tr><th>Jml Saudara Kandung</th><td>:</td><td><?= $siswa->jumlah_saudara_kandung;?></td></tr>      
      <tr><th>Asal Sekolah</th><td>:</td><td><?= $siswa->asal_sekolah;?></td></tr>
      <tr><th>No HP</th><td>:</td><td><?= $siswa->nomor_hp;?></td></tr>
      <tr><th>Email</th><td>:</td><td><?= $siswa->email;?></td></tr>
      <tr><th>Size Jurusan</th><td>:</td><td><?= $siswa->size_jurusan;?></td></tr>
      <tr><th>Size Olahraga</th><td>:</td><td><?= $siswa->size_olahraga;?></td></tr>

      <!-- Data Ortu -->
      <tr><th colspan="3" style="border-top: 2px dotted #000;border-bottom: 2px dotted #000;"><h3>Data Orang Tua</h3></th></tr>
      <tr><th>NIK Ayah</th><td>:</td><td><?= $siswa->nik_ayah;?></td></tr>
      <tr><th>Ayah</th><td>:</td><td><?= $siswa->nama_ayah;?></td></tr>
      <tr><th>Tempat, Tanggal Lahir</th><td>:</td><td><?= $siswa->tempat_lahir_ayah.', '.date('d-m-Y',strtotime($siswa->tanggal_lahir_ayah));?></td></tr>
      <tr><th>Pendidikan</th><td>:</td><td><?= $siswa->pendidikan_ayah;?></td></tr>
      <tr><th>Pekerjaan</th><td>:</td><td><?= $siswa->pekerjaan_ayah;?></td></tr>
      <tr><th>Penghasilan</th><td>:</td><td><?= $siswa->penghasilan_bulanan_ayah;?></td></tr>
      <tr><th>No HP</th><td>:</td><td><?= $siswa->no_ayah;?></td></tr>
      <tr><th>Berkebutuhan Khusus</th><td>:</td><td><?= $siswa->berkebutuhan_khusus_ayah;?></td></tr>

      <tr><th>NIK Ibu</th><td>:</td><td><?= $siswa->nik_ibu;?></td></tr>
      <tr><th>Ibu</th><td>:</td><td><?= $siswa->nama_ibu;?></td></tr>
      <tr><th>Tempat, Tanggal Lahir</th><td>:</td><td><?= $siswa->tempat_lahir_ibu.', '.date('d-m-Y',strtotime($siswa->tanggal_lahir_ibu));?></td></tr>
      <tr><th>Pendidikan</th><td>:</td><td><?= $siswa->pendidikan_ibu;?></td></tr>
      <tr><th>Pekerjaan</th><td>:</td><td><?= $siswa->pekerjaan_ibu;?></td></tr>
      <tr><th>Penghasilan</th><td>:</td><td><?= $siswa->penghasilan_bulanan_ibu;?></td></tr>
      <tr><th>No HP</th><td>:</td><td><?= $siswa->no_ibu;?></td></tr>
      <tr><th>Berkebutuhan Khusus</th><td>:</td><td><?= $siswa->berkebutuhan_khusus_ibu;?></td></tr>

      <tr><th>NIK Wali</th><td>:</td><td><?= $siswa->nik_wali;?></td></tr>
      <tr><th>Wali</th><td>:</td><td><?= $siswa->nama_wali;?></td></tr>

      <?php if ($siswa->tanggal_lahir_wali == '' || $siswa->tanggal_lahir_wali == null): ?>
        <tr><th>Tempat, Tanggal Lahir</th><td>:</td><td><?= $siswa->tempat_lahir_wali.', '.$siswa->tanggal_lahir_wali;?></td></tr>
      <?php else: ?>
        <tr><th>Tempat, Tanggal Lahir</th><td>:</td><td><?= $siswa->tempat_lahir_wali.', '.date('d-m-Y',strtotime($siswa->tanggal_lahir_wali));?></td></tr>
      <?php endif ?>

      <tr><th>Pendidikan</th><td>:</td><td><?= $siswa->pendidikan_wali;?></td></tr>
      <tr><th>Pekerjaan</th><td>:</td><td><?= $siswa->pekerjaan_wali;?></td></tr>
      <tr><th>Penghasilan</th><td>:</td><td><?= $siswa->penghasilan_bulanan_wali;?></td></tr>
      <tr><th>No HP</th><td>:</td><td><?= $siswa->no_wali;?></td></tr>
    </table>
  </div>
</div>