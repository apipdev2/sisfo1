z      
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
                  
                   <table width="100%">
                    <tr>
                      <td>Tahun Ajaran</td><td>:</td><td><b><?= $tahunajaran->tahun_ajaran;?></b></td>
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
                        <select name="kelas" id="kelas" style="width: 200px;">
                          <option value="" selected disabled>::Pilih Kelas::</option>
                        </select>
                      </td>
                    </tr>
                  </table>

                </div>

                <div class="col-md-6">
                  <a href="<?= base_url('keuangan/Laporan/cetak_all'); ?>" class="btn btn-secondary"><span class="fas fa-print"></span>&nbsp; Cetak Semua Kelas</a>
                </div>

              </div>
            </div>


            	<div class="card-body">
                  <div class="table-responsive" id="view1">
                  
                  </div>
              </div>
            	
            </div>

          </div>
        </div>
      </div>


      <script>

         //tingkat
      $('#tingkat').change(function(){
        var id = $('#tingkat').val();
        $.ajax({

          Type : "post",
          url :"<?= base_url('keuangan/Tagihan/ajax_getKelas/');?>"+id,
          dataType : "JSON",
          success:function(res){
            var html ='';
            html+='<option value="" selected disabled>::Pilih Kelas::</option>';

            for (var i = 0; i < res.length; i++) {
              html+='<option value="'+res[i].id_kelas+'">'+res[i].kelas+'</option>';
                   
            }

            $('#kelas').html(html);
            //$('#pd').DataTable();
          }
         });
      });

      //kelas
      $('#kelas').change(function(){
        
         var id_kelas = $('#kelas').val();
          $.get("<?= base_url('keuangan/Laporan/table/');?>"+id_kelas, {}, function(data, status){
           
            $('#view1').html(data);
        });

      });



        function view(nis){
           window.open ("<?= base_url('keuangan/Tagihan/detail/');?>"+nis, "_blank");
        }
      </script>

   

	  

  
