
      
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
                      <td>Tanggal</td>
                      <td>:</td>
                      <td>
                        <input type="date" name="tanggal1" id="tanggal1" > s/d
                        <input type="date" name="tanggal2" id="tanggal2" >
                        <button class="btn btn-secondary btn-sm m-2" type="button" onclick="tampil()"><i class="fas fa-search"></i> &nbsp; Tampil</button>
                      </td>
                    </tr>
                    
                  </table>

                </div>

                <div class="col-md-6">
                  <div class="btn-group float-end">                    
                    <a href="<?= base_url('keuangan/Pembayaran_Spp/add'); ?>" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Tambah</a>
                    <a href="#" onclick="cetak_byTgl()" class="btn btn-secondary"><i class="fas fa-print"></i>&nbsp;Cetak</a>
                    
                  </div>
                </div>

              </div>
            </div>


            	<div class="card-body">
                  
                   <div class="col-md-12" id="view_pembayaran"></div>
              </div>
            	
            </div>

          </div>
        </div>
      </div>


      <script>
         view();

        function view(){
           $.get("<?= base_url('keuangan/Pembayaran_Spp/get_pembayaran/');?>", {}, function(data, status){           
              $('#view_pembayaran').html(data);
            });
        }

        function tampil(){
          var tanggal1 = $('#tanggal1').val();
          var tanggal2 = $('#tanggal2').val();
          if(tanggal1 == '' || tanggal2 == ''){
            swal('Harap isi tanggal.!', {
                          icon: 'info',
                        });
          }
           $.ajax({
            url :"<?= base_url('keuangan/Pembayaran_Spp/get_pembayaran');?>",
            method : "POST",
            data : {tanggal1:tanggal1, tanggal2:tanggal2},
            success:function(data){ 
              console.log(data);
              $('#view_pembayaran').html(data);
              

              }
            });
        }

        function cetak_byTgl(){

          var tanggal1 = $('#tanggal1').val();
          var tanggal2 = $('#tanggal2').val();
          link = "<?= base_url('keuangan/Pembayaran_Spp/cetak_byTgl/');?>"+btoa(tanggal1)+'/'+btoa(tanggal2);
          if(tanggal1 == '' || tanggal2 == ''){
            swal('Harap isi tanggal.!', {
                          icon: 'info',
                        });
          }
           
            window.open (link, "_blank");
        }
      </script>

   

	  

  
