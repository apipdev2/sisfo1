

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
                      <td>Tingkat</td>
                      <td>:</td>
                      <td>
                        <select name="tingkat" id="tingkat" style="width: 200px;" >
                          <option value="" selected disabled>::Pilih Tingkat::</option>
                          <?php foreach ($tingkat as $tingkat): ?>
                            <option value="<?= $tingkat->tingkat; ?>"><?= $tingkat->tingkat; ?></option>
                          <?php endforeach ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Kelas</td>
                      <td>:</td>
                      <td>
                        <select name="id_kelas" id="id_kelas" style="width: 200px;">
                          <option value="" selected disabled>::Pilih Kelas::</option>
                        </select>
                      </td>
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
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><button class="btn btn-secondary btn-sm" id="cari"><i class="fas fa-search"></i> Cari</button></td>
                    </tr>
                   
                   
                  </table>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="btn-group text-center">
                                       
                    <button class="btn btn-secondary" type="button" onclick="cetakPH()"><i class="fas fa-print"></i> Cetak</button>
                  </div>
                </div>

                

              </div>
            </div>
            <div class="card-body">
        	
        			<div class="table-responsive">
                		<table class="table table-striped" width="100%">
		                  <thead>
		                    <tr>
		                      <th>No</th>
		                      <th>NIS</th>
		                      <th>Nama</th>
                          <th>JK</th>
                          <th>H</th>
                          <th>I</th>
                          <th>S</th>
                          <th>A</th>                          
		                      <th>#</th>
		                    </tr>
		                  </thead>
		                  <tbody id="phsiswa">
		                    
		                  </tbody>
		                </table>
          			</div>
        		
        	</div>
              

            
        </div>

      </div>

      <!-- end content -->
    </div>
  </div>

<script>   
    

      //tingkat
      $('#tingkat').change(function(){
        var id = $('#tingkat').val();
        $.ajax({

          Type : "post",
          url :"<?= base_url('sisfo/Peserta_didik/ajax_getKelas/');?>"+id,
          dataType : "JSON",
          success:function(res){
            var html ='';
            html+='<option value="" selected disabled>::Pilih Kelas::</option>';

            for (var i = 0; i < res.length; i++) {
              html+='<option value="'+res[i].id_kelas+'">'+res[i].kelas+'</option>';
                   
            }

            $('#id_kelas').html(html);
          }
         });
      });

      //getph

      $('#cari').on('click',function(){
        var id_kelas = $('#id_kelas').val();
        var bln = $('#bln').val();
        var thn = $('#thn').val();

        $.ajax({

          url : "<?= base_url('sisfo/Phsiswa/ajax_getPh');?>",
          method :'POST',
          dataType :"JSON",
          data :{ id_kelas : id_kelas,bln : bln,thn:thn },
          success : function(data){
            var html ='';
            var no =0;
            for (var i = 0; i < data.length; i++) {
              no++;
              html+='<tr>'
                  +'<td>'+no+'</td>'
                  +'<td>'+data[i].nis+'</td>'
                  +'<td>'+data[i].nama_peserta+'</td>'
                  +'<td>'+data[i].jenis_kelamin+'</td>'
                  +'<td>'+data[i].H+'</td>'
                  +'<td>'+data[i].I+'</td>'
                  +'<td>'+data[i].S+'</td>'
                  +'<td>'+data[i].A+'</td>'
                  +'<td><button class="btn btn-sm btn-info" onclick="detail('+data[i].nis+','+bln+','+thn+')"><i class="fas fa-search"></i></button></td>'
                  +'</tr>';
            }
            $('#phsiswa').html(html);
          }
        });
      });

      function detail(nis, bln, thn){
        window.location.href = "<?= base_url('sisfo/Phsiswa/detailPH/');?>"+nis+'/'+bln+'/'+thn;
      }

      function addPH(){
       let id_kelas = $('#id_kelas').val();
        window.location.href = "<?= base_url('sisfo/Phsiswa/addPH/');?>"+id_kelas;
      }

      function cetakPH(){
       var id_kelas = $('#id_kelas').val();
       var bln = $('#bln').val();
       var thn = $('#thn').val();

         window.open("<?= base_url('sisfo/Phsiswa/cetak_ph/');?>"+id_kelas+'/'+bln+'/'+thn);
      }

</script>

  