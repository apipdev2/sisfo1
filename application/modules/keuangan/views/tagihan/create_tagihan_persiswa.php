
      
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
               <form action="<?= base_url('keuangan/Tagihan/add_tagihan_persiswa'); ?>" method="post">
                 
                 <div class="row m-3">
                   <div class="col-md-6 ">

                    <div class="mb-3">
                        <label>NIS</label>
                        <div class="input-group mb-2">
                          <input type="text" class="form-control" name="nis">
                          <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#modal-nis"><i class="fas fa-user-plus"></i></button>
                        </div>
                    </div>

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


      <div class="modal modal-blur fade" id="modal-nis" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data Siswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                            
              <div  class="table-responsive read">

                 <table class="table datatable" id="pd">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>JK</th>
                      <th>Tempat Lahir</th>
                      <th>Tgl Lahir</th>
                      <th>Kelas</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-tbody">
                    
                  </tbody>
              </table>

              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
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

      <script>
    
    tampil();


      function tampil(){
         $.ajax({

          url :"<?= base_url('keuangan/Akademik/ajax_getSiswa');?>",
          Type : "get",
          dataType : "JSON",
          success:function(data){       
            var no=0;
            var html ='';
            for (var i = 0; i < data.length; i++) {
              no++;
              var status = '';
              var date = new Date(data[i].tanggal_lahir);
              var tanggal_lahir = date.toLocaleDateString('id');
             
              html+='<tr>'
                   +'<td>'+no+'</td>'
                   +'<td>'+data[i].nis+'</td>'
                   +'<td>'+data[i].nama_peserta+'</td>'
                   +'<td>'+data[i].jenis_kelamin+'</td>'
                   +'<td>'+data[i].tempat_lahir+'</td>'
                   +'<td>'+tanggal_lahir+'</td>'
                   +'<td>'+data[i].kelas+'</td>'
                   +'<td><a href="#" data-nis="'+data[i].nis+'" class="btn btn-info btn-smal pilih">></a></td>'
                   +'</tr>';
            }
            $('.table-tbody').html(html);
            $('#pd').DataTable();
          }
         });


      }


    
      $('.table-tbody').on('click','.pilih',function(){
            var nis = $(this).data('nis');
            $('#modal-nis').modal('hide');
              $('[name = nis]').val(nis);
      });







     

  </script>

   

	  

  
