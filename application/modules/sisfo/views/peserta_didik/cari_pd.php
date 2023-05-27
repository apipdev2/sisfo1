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
                  
                  <table width="100%">
                    <tr>
                      <td>Tahun Ajaran</td><td>:</td><td><b><?= $tahunajaran->tahun_ajaran;?></b></td>
                    </tr>
                    <tr>
                      <td>Cari PD</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nama_peserta" id="nama_peserta" ><button class="btn btn-secondary btn-sm m-2" id="cari">cari</button>
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
        </div>

      <!-- end content -->
    </div>
  </div>

  <!-- add modal -->
  <div class="modal modal-blur fade" id="view" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>          
          <div class="modal-body">


             

          </div>
          
        </div>
      </div>
    </div>


  <script>
    
    tampil();

      //kelas
      $('#cari').on('click',function(){

         var nama_peserta = $('#nama_peserta').val();
         $.ajax({

          url :"<?= base_url('sisfo/Peserta_didik/ajax_getSiswaByNama');?>",
          method : "POST",
          dataType : "JSON",
          data : {nama_peserta: nama_peserta},
          success:function(data){    
          console.log(data);        
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
                   +'<td><a href="#" onClick="view('+data[i].nis+')" class="fas fa-search text-info"></a> | <a href="#" onClick="print('+data[i].nis+')" class="fas fa-print text-secondary"></a></td>'
                   +'</tr>';
            }
            $('.table-tbody').html(html);
            $('#pd').DataTable();
          }
         });

      });

      function tampil(){
         $.ajax({

          url :"<?= base_url('sisfo/Peserta_didik/ajax_getSiswa');?>",
          Type : "get",
          dataType : "JSON",
          success:function(data){    
          console.log(data);        
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
                   +'<td><a href="#" onClick="view('+data[i].nis+')" class="fas fa-search text-info"></a> | <a href="#" onClick="print('+data[i].nis+')" class="fas fa-print text-secondary"></a></td>'
                   +'</tr>';
            }
            $('.table-tbody').html(html);
            $('#pd').DataTable();
          }
         });
      }


      //view detail
      function view(nis){

         $.get("<?= base_url('sisfo/Peserta_didik/view/');?>"+nis, {}, function(data, status){
            $(".modal-title").html('Detail Peserta Didik');
            $('.modal-body').html(data);
            $('#view').modal('show');
        });

      }

      //cetak perkelas
      function cetak(){
        
          window.open ("<?= base_url('sisfo/Peserta_didik/cetak_pd_all/');?>"+"_blank");
        
      }

       function print(nis){

          window.open ("<?= base_url('sisfo/Peserta_didik/cetak_pd/');?>"+nis, "_blank");
        
      }

      //cetak perkelas
      function export_all(){
        
          window.open ("<?= base_url('sisfo/Peserta_didik/export_pd_all/');?>"+"_blank");
        
      }

  </script>

  