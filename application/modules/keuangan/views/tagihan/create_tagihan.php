
      
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
               <form action="<?= base_url('keuangan/Tagihan/add_tagihan'); ?>" method="post">
                 
                 <div class="row m-3">
                   <div class="col-md-6 ">

                    <div class="mb-3 ">
                           <label >Kategori</label>
                          <select name="kategori" id="kategori" class="form-select">
                            <option value="" selected disabled>::Pilih Kategori::</option>
                              <?php foreach ($kategori as $kat): ?>
                                <?php if ($kat->id_kategori == $j->id_kategori): ?>
                                  <option value="<?= $kat->nama_kategori; ?>" selected><?= $kat->nama_kategori; ?></option>
                                <?php else: ?>
                                  <option value="<?= $kat->nama_kategori; ?>"><?= $kat->nama_kategori; ?></option>
                                <?php endif ?>
                              <?php endforeach ?>
                            </select>
                        
                      </div>

                      <div class="mb-3">
                           <label>Jenis Pembayaran</label>
                          <select name="id_jenis" id="id_jenis" class="form-select">
                            <option value="" selected disabled>::Pilih Jenis::</option>
                            <?php foreach ($jenis as $j): ?>
                              <option value="<?= $j->id_jenis ;?>"><?= $j->jenis_pembayaran ;?></option>                              
                            <?php endforeach ?>
                          </select>
                      </div>

                      <div class="mb-3">
                           <label>Tingkat</label>
                          <select name="tingkat" class="form-select">
                            <option value="" selected disabled>::Pilih Tingkat::</option>
                            <?php foreach ($tingkat as $t): ?>
                              <option value="<?= $t->tingkat ;?>"><?= $t->tingkat ;?></option>                              
                            <?php endforeach ?>
                          </select>
                      </div>
                     


                      <div id="form_bulan"></div>

                      <button class="btn btn-success float-end"><i class="fas fa-save"></i>&nbsp; Simpan</button>

                   </div>
                   

                   </div>
                 </div>
               </form>
              </div>
            	
            </div>

          </div>
        </div>
      </div>


      <script>

        $('#id_jenis').change(function(){
        var id_jenis = $('#id_jenis').val();
          if (id_jenis == "2") {

              $.get("<?= base_url('keuangan/Tagihan/get_bulan1/');?>", {}, function(data, status){           
              $('#form_bulan').html(data);
            });
          }else if(id_jenis == '3'){

            $.get("<?= base_url('keuangan/Tagihan/get_bulan2/');?>", {}, function(data, status){           
              $('#form_bulan').html(data);
            });

          }else{
            $('#form_bulan').html('');
          }
          
        });
        
      </script>

   

	  

  
