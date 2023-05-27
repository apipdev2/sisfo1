
      
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
                      <td>Cari PD</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nama_peserta" id="nama_peserta" ><button class="btn btn-secondary btn-sm m-2" id="cari"><i class="fas fa-search"></i>cari</button>
                      </td>
                    </tr>
                    
                  </table>

                </div>

                <div class="col-md-6">
                  <div class="btn-group float-end">                    
                    <button class="btn btn-success" type="button" id="export_all" onclick="export_all()"><i class="fas fa-upload"></i>&nbsp; Export All</button>
                    <button class="btn btn-secondary" type="button" onclick="cetak()"><i class="fas fa-print"></i>&nbsp; Cetak All</button>
                  </div>
                </div>

              </div>
            </div>


            	<div class="card-body">
                  
                   <div class="col-md-12" id="view"></div>
              </div>
            	
            </div>

          </div>
        </div>
      </div>


      <script>
        view();

        $('#kategori').change(function(){
        var kat = $('#kategori').val();
          if (kat == "SPP") {

              $.get("<?= base_url('keuangan/Jenis_pembayaran/get_bulan/');?>", {}, function(data, status){           
              $('#form_bulan').html(data);
            });

          }else{
            $('#form_bulan').html('');
          }
          
        });


        function view(){
           $.get("<?= base_url('keuangan/Jenis_pembayaran/data_tagihan/');?>", {}, function(data, status){           
              $('#view').html(data);
            });
        }
      </script>

   

	  

  
