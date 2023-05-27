

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
              <div class="row">

                <div class="col-md-6">
                  <div class="table-responsive">
                  <table width="90%">
                    <tr>
                      <td>Tahun Ajaran</td><td>:</td><td colspan="4"><b><?= $tahunajaran->tahun_ajaran;?></b></td>
                    </tr>
                    <tr>
                      <td>Dari Tanggal</td>
                      <td>:</td>
                      <td>
                        <input type="date" name="tanggal1" id="tanggal1">
                      </td>
                      <td>
                        S/d
                      </td>
                      <td><input type="date" name="tanggal2" id="tanggal2"></td>
                      <td>
                        <button type="button" id="cari" class="btn btn-success btn-sm">cari</button>
                      </td>
                    </tr>
                   
                   
                  </table>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="btn-group text-center">
                                      
                    <button class="btn btn-secondary" type="button" onclick="cetak()"><i class="fas fa-print"></i> Cetak</button>
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

      var tgl1 = $('#tanggal1').val();
      var tgl2 = $('#tanggal2').val();

      $.ajax({
        url:"<?= base_url('sisfo/Presensiguru/ajax_getphguru/');?>",
        type : "post",
        dataType : "JSON",
        data : {tanggal1 : tgl1,tanggal2 : tgl2},
        success : function(data){
          var html ='';
          var no = 1;
          for (var i = 0; i < data.length; i++) {
              no++;
              html+='<tr>'
                   +'<td>'+no+'</td>'
                   +'<td>'+data[i].nip+'</td>'
                   +'<td>'+data[i].nama_lengkap+'</td>'
                   +'<td>'+data[i].hadir+'</td>'
                   +'<td>'+data[i].izin+'</td>'
                   +'<td>'+data[i].sakit+'</td>'
                   +'<td>'+data[i].alfa+'</td>'
                   +'<td><a href="#" class="btn btn-info btn-sm" onclick="detail('+data[i].nip+')">Detail</a></td>'
                   +'</tr>';
          }

          $('#pegawai').html(html);
        }
      });

    });


    function detail(nip){
      var tgl1 = $('#tanggal1').val();
      var tgl2 = $('#tanggal2').val();
      window.location.href = "<?= base_url('sisfo/Presensiguru/detail/');?>"+nip+'/'+tgl1+'/'+tgl2;
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