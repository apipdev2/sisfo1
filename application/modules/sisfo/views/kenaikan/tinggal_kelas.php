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
        		<form action="" method="post">
        		<div class="row">
        			<div class="col-md-5">
        				<div class="form-group">
        					<label>Tahun Ajaran</label>
        					<input type="text" class="form-control" value="<?= $tahunajaran->tahun_ajaran; ?>" disabled>
        				</div>
        			</div>
        			<div class="col-md-5">
        				<div class="form-group">
        					<label>Kelas</label>
        					<select name="id_kelas" class="form-select">
        					<option value="" selected disabled>::Pilih Kelas::</option>
        					<?php foreach ($kelas as $kelas): ?>
        						<option value="<?= $kelas->id_kelas; ?>"><?= $kelas->kelas; ?></option>
        					<?php endforeach ?>
        					</select>
        				</div>
        			</div>
        			<div class="col-md-2">
        				<div class="form-group">        					
        					<button class="btn btn-info mt-3">Cari</button>
        				</div>
        			</div>
        		</div>
        		</form>
        	</div>

        	<form action="<?= base_url('sisfo/Kenaikan/tinggal'); ?>" method="post">
            <div class="card-body">
              	<div  class="table-responsive read">

                <table class="table" id="dt">
                    <thead>
                      <tr>
                        <th><input type="checkbox" onchange="checkAll(this)" name="chk[]" > Check All</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Kelas</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php foreach ($siswa as $row): ?>
                      	<tr>
                          <td><input type="checkbox" name="nis[]" value="<?= $row->nis; ?>"></td>
                          <td><?= $row->nis; ?></td>
                          <td><?= $row->nama_peserta; ?></td>
                           <td><?= $row->jenis_kelamin; ?></td>
                          <td><?= $row->kelas; ?></td>
                          
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                 </table>


              </div>
            </div>

            <div class="card-body bg-light">
            	
            	<div class="row">
            		<div class="col-md-4">

            			<div class="form-group">
            				<label>Tahun Ajaran Tujuan</label>
            				<select name="id_tahun" id="tahun" class="form-select">
            					<option value="" selected disabled>::Pilih Tahun Ajaran::</option>
            				<?php foreach ($ta as $ta): ?>
            					<option value="<?= $ta->id_tahun; ?>"><?= $ta->tahun_ajaran; ?></option>
            				<?php endforeach ?>
            				</select>
            			</div>


            		</div>

            		<div class="col-md-4">
            			
            			<div class="form-group">
        					<label>Kelas Tujuan</label>
        					<select name="id_kelas" id="kelas" class="form-select">
        					
        					</select>
        				</div>

            		</div>
            		<div class="col-md-2">
            			<button class="btn btn-warning mt-3">Tinggal Kelas</button>
            		</div>
            	</div>
            </div>
            </form>

           
        </div>

      <!-- end content -->
    </div>
  </div>

<script type="text/javascript">

  function checkAll(ele) {
       var checkboxes = document.getElementsByTagName('input');
       if (ele.checked) {
           for (var i = 0; i < checkboxes.length; i++) {
               if (checkboxes[i].type == 'checkbox'  && !(checkboxes[i].disabled) ) {
                   checkboxes[i].checked = true;
               }
           }
       } else {
           for (var i = 0; i < checkboxes.length; i++) {
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = false;
               }
           }
       }
   }

   //tahun
   $('#tahun').change(function(){

      var id_tahun = $('#tahun').val();
      $.ajax({
        Type : "POST",
        url : "<?= base_url('sisfo/Kenaikan/ajax_getKelas/');?>"+id_tahun,
        dataType :"JSON",
        success : function(data){
          
          var html = '';
            html+='<option value="" selected disabled>::Pilih::</option>';
          for (var i = 0; i < data.length; i++) {
            
            html+='<option value="'+data[i].id_kelas+'">'+data[i].kelas+'</option>';
          }
          $('#kelas').html(html);
        }
      });
   });

 </script>


 

   