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

               <div class="btn-group">
               		
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
                      <td>Jenis mutasi</td>
                      <td>:</td>
                      <td>
                        <select name="jenis_mutasi" id="jenis_mutasi" style="width: 200px;">
                          <option value="" selected disabled>== Pilih Mutasi ==</option>
                          <option value="masuk">Masuk</option>
                          <option value="keluar">Keluar</option>
                        </select>
                      </td>
                    </tr>
                  </table>

                </div>

                <div class="col-md-6">
                	<div class="btn-group float-end">
                		
	                	
		                <a href="#" class="btn btn-secondary d-none d-sm-inline-block"><i class="fas fa-print"></i>
	                    	Cetak</a>

                	</div>
                </div>               

              </div>
            </div>

            <div class="card-body">            	

              <div  class="table-responsive read">

                <table class="table" id="dtb">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Mutasi</th>
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
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah <?= $title; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Mutasi/tambah'); ?>" method="post">
          <div class="modal-body">

              <div class="form-group">
                <label>Bidang Keahlian</label>
                <input type="text" name="bidang_keahlian" class="form-control">
              </div>

              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>


  <script>

          
     
  	
  	$('#jenis_mutasi').change(function(){

  		var jenis_mutasi = $("#jenis_mutasi").val();
  		
  		if(jenis_mutasi =="masuk"){

  			$.ajax({
  				Type : "POST",
  				url  : "<?= base_url('sisfo/Mutasi/ajax_getMutasiMasuk');?>",
  				dataType : "JSON",
  				success : function(masuk){
  					var no = 0;
  					var html = '';
  					for (var i = 0; i < masuk.length; i++) {
  						// console.log(masuk);
              var date = new Date(masuk[i].tanggal);
              var tanggal = date.toLocaleDateString('id');
  						no++;
  						html+='<tr>'
  							  +'<td>'+no+'</td>'
  							  +'<td>'+tanggal+'</td>'
  							  +'<td>'+masuk[i].nis+'</td>'
  							  +'<td>'+masuk[i].nama_peserta+'</td>'
  							  +'<td>'+masuk[i].kelas+'</td>'
  							  +'<td>'+masuk[i].jenis_mutasi+'</td>'
  							  +'<td><a href="#" class="fas fa-search text-success"></a> | <a href="#" class="fas fa-edit text-warning"></a> | <a href="#" class="fas fa-trash text-danger"></a> | <a href="#" class="fas fa-print text-secondary"></a></td></td>'
  							  +'</tr>';
  					}
  					$('.table-tbody').html(html);
            $('#dtb').DataTable();
  				}
  			});

  		}else{

  			$.ajax({
  				Type : "POST",
  				url  : "<?= base_url('sisfo/Mutasi/ajax_getMutasiKeluar');?>",
  				dataType : "JSON",
  				success : function(keluar){
  					var no = 0;
  					var html = '';
  					for (var i = 0; i < keluar.length; i++) {
  						// console.log(masuk);
              var date = new Date(keluar[i].tanggal);
              var tanggal = date.toLocaleDateString('id');
  						no++;
  						html+='<tr>'
  							  +'<td>'+no+'</td>'
  							  +'<td>'+tanggal+'</td>'
  							  +'<td>'+keluar[i].nis+'</td>'
  							  +'<td>'+keluar[i].nama_peserta+'</td>'
  							  +'<td>'+keluar[i].kelas+'</td>'
  							  +'<td>'+keluar[i].jenis_mutasi+'</td>'
  							  +'<td><a href="#" onclick="restore('+ keluar[i].nis +')" class="fas fa-undo text-danger"></a></td>'
  							  +'</tr>';
  					}
  					$('.table-tbody').html(html);
            $('#dtb').DataTable();
  				}
  			});

  		}

  	});


    function restore(nis){
      window.location.href = "<?= base_url('sisfo/Mutasi/restore/');?>"+nis;
    }

  
  </script>


  