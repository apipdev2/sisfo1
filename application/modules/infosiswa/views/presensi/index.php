

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
            <div class="card-body">
              <div class="row">

                <div class="col-md-6">
                  <div class="table-responsive">
                  <table width="90%">
                    <tr>
                      <td>Tahun Ajaran</td><td>:</td><td colspan="4"><b><?= $tahunajaran->tahun_ajaran;?></b></td>
                    </tr>
                    <tr>
                      <td>Bulan</td>
                      <td>:</td>
                      <td>
                        <select name="bln" id="bln" style="width: 120px;">
                          <option value="" selected disabled>::Bulan::</option>
                          <option value="1">Jan</option>
                          <option value="2">Feb</option>
                          <option value="3">Mar</option>
                          <option value="4">Apr</option>
                          <option value="5">Mei</option>
                          <option value="6">Jun</option>
                          <option value="7">Jul</option>
                          <option value="8">Ags</option>
                          <option value="9">Sep</option>
                          <option value="10">Okt</option>
                          <option value="11">Nov</option>
                          <option value="12">Des</option>
                        </select>
                        <select name="thn" id="thn" style="width: 75px;">
                          <option value="" selected disabled>::Tahun::</option>
                           <?php for ($thn=2020; $thn <= 2030 ; $thn++):?>
                            <option value="<?= $thn; ?>"><?= $thn; ?></option>
                           <?php endfor ?>
                         
                        </select>
                      </td>
                      
                      <td>
                      	
                      </td>
                      <td>
                        <button type="button" id="cari" class="btn btn-success btn-sm"><i class="fas fa-search"></i>&nbsp;Cari</button>
                      </td>
                    </tr>
                   
                   
                  </table>
                  </div>
                </div>

                

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
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody id="pegawai">
                    
                  </tbody>
                </table>
              </div>

            
        </div>

      </div>

      <!-- end content -->
    </div>
  </div>


  <script>
    $('#cari').click(function(){

      var bln = $('#bln').val();
      var thn = $('#thn').val();

      $.ajax({
        url:"<?= base_url('infoguru/Presensi/ajax_getphguru/');?>",
        type : "post",
        dataType : "JSON",
        data : {bln : bln,thn : thn},
        success : function(data){
          console.log(data);
          var html ='';
          var no = 1;
              html+='<tr>'
                   +'<td>'+no+'</td>'
                   +'<td>'+data.nip+'</td>'
                   +'<td>'+data.nama_lengkap+'</td>'
                   +'<td>'+data.hadir+'</td>'
                   +'<td>'+data.izin+'</td>'
                   +'<td>'+data.sakit+'</td>'
                   +'<td>'+data.alfa+'</td>'
                   +'<td><a href="#" class="btn btn-info btn-sm" onclick="detail('+data.nip+')"><i class="fas fa-search"></i>&nbsp;Detail</a></td>'
                   +'</tr>';
        

          $('#pegawai').html(html);
        }
      });

    });


    function detail(nip){
      var bln = $('#bln').val();
      var thn = $('#thn').val();
      window.location.href = "<?= base_url('infoguru/Presensi/detail/');?>"+nip+'/'+bln+'/'+thn;
    }

    function cetak(nip){
      var tgl1 = $('#tanggal1').val();
      var tgl2 = $('#tanggal2').val();
      if (tgl1 == '' && tgl2 == '' ) {
        alert('silahkan pilih tanggal');
      } else {
        
      window.open("<?= base_url('sisfo/Presensiguru/cetak_detail/');?>"+tgl1+'/'+tgl2);
      }
    }
  </script>