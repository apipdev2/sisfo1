<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/instansi/'.$sekolah->logo); ?>">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Presensi</title>
    <style>
    	.time {
		    display: flex;
		    border-radius: 0px;
		    overflow: hidden;
		    width: 360px;
		    margin: 1px auto;
		}
		.bars{
		    float: left;
		    width: 50px;
		    height: 100px;
		    /*background-color: rgb(48, 44, 44);*/
		}
		.time p {
		    font-weight: bold;
		    color: #000;
		    font-size: 36px;
		    text-align: center;
		    margin-top: 3px;
		}
    </style>
  </head>
  <body class="bg-light">

  	<div class="container-fluid">
  	<!-- header -->
  	<div class="header bg-white">
  		<div class="text-center p-2">
  			
		  	<img src="<?= base_url('assets/img/instansi/'.$sekolah->logo); ?>" width="100" alt="...">
		    <!-- <h1>SISFO AKADEMIK</h1> -->
		    <h2><?= $sekolah->nama_sekolah; ?></h2>

  		</div>
  	</div>
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	 <div class="container-fluid nav justify-content-end">
	 	<button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-cog"></i> Setting</button>
	 	<a href="<?= base_url('presensi/auth/logout'); ?>" class="btn btn-outline-warning m-1" ><i class="fas fa-sign-out"></i> Logout</a>
	 </div>
	</nav>

  	<div class="row mt-3">
  		<div class="col-md-5">
  			<div class="card" style="height: 250px !important;">
  			<!-- jam -->
			<div class="time d-flex justify-content-center">
		        <div class="bars">
		            <p><i class='fas fa-clock' ></i></p>
		        </div>        
		        <div class="bars">
		            <p id="jam"></p>
		        </div>
		        <div class="bars">
		            <p >:</p>
		        </div>
		        <div class="bars">
		            <p id="minute"></p>
		        </div>
		        <div class="bars">
		            <p >:</p>
		        </div>
		        <div class="bars">
		            <p id="second"></p>
		        </div>
		    </div>
    <!-- end jam -->

  			<h3 class="text-center"><?= date_indo(date('Y-m-d')); ?></h3>
			<div class="d-flex justify-content-center"> 								
				<input type="number" name="nis" id="nis"  autofocus>
			</div>
  			<h4 class="text-center" id="nama">Presensi : <?= $setting->status; ?></h4>

			
			</div>
  		</div>

  		<div class="col-md-7">
  			<div class="card">
  			<div class="table-responsive">
  			<table class="table table-striped">
  				<thead class="bg-dark text-white">
  					<tr>
  						<th>No</th>
  						<th>Tanggal</th>
  						<th>IN</th>
  						<th>Out</th>
  						<th>Nama</th>
  						<th>Kelas</th>
  					</tr>
  				</thead>
  				<tbody id="view"></tbody>
  			</table>
  			</div>
  			</div>
  		</div>
  	</div>

  	


  		
  	</div>

  	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Setting Presensi</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form method="post" id="form">
	        <div class="row mb-3">
			  <label for="colFormLabel" class="col-sm-2 col-form-label">Tahun Ajaran</label>
			  <div class="col-sm-10">
			    <select name="id_tahun" id="id_tahun" class="form-select">
			    	<?php foreach ($tahun as $tahun): ?>
			    		<?php if ($setting->id_tahun == $tahun->id_tahun): ?>
			    			<option value="<?= $tahun->id_tahun; ?>" selected><?= $tahun->tahun_ajaran; ?></option>
			    		<?php else: ?>
			    			<option value="<?= $tahun->id_tahun; ?>"><?= $tahun->tahun_ajaran; ?></option>
			    		<?php endif ?>			    		
			    	<?php endforeach ?>
			    </select>
			  </div>
			</div>

			 <div class="row mb-3">
			  <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
			  <div class="col-sm-10">
			    <select name="status" id="status" class="form-select">
			    	<?php foreach ($status as $s): ?>
			    		<?php if ($setting->status == $s): ?>
			    			<option value="<?= $s; ?>" selected><?= $s; ?></option>
			    		<?php else: ?>
			    			<option value="<?= $s; ?>"><?= $s; ?></option>
			    		<?php endif ?>			    		
			    	<?php endforeach ?>
			    </select>
			  </div>
			</div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="save">Save</button>
	      </div>
	    </div>
	  </div>
	</div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
   
    <!-- jquery -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>


    	window.setTimeout("waktu()", 1000);
 
		function waktu() {
		    var waktu = new Date();
		    setTimeout("waktu()", 1000);
		    document.getElementById("jam").innerHTML = waktu.getHours();
		    document.getElementById("minute").innerHTML = waktu.getMinutes();
		    document.getElementById("second").innerHTML = waktu.getSeconds();
		}
    </script>
    <script>
    	view();
    	function view(){$.ajax({url:"<?= base_url('presensi/Presensi/view');?>",Type:"post",dataType:"JSON",success:function(data){var html="";var no=0;for(var i=0;i<data.length;i++){no++;html+="<tr>"+"<td>"+no+"</td>"+"<td>"+data[i].tanggal+"</td>"+"<td>"+data[i].time_in+"</td>"+"<td>"+data[i].time_out+"</td>"+"<td>"+data[i].nama_peserta+"</td>"+"<td>"+data[i].kelas+"</td>"+"</tr>"}$('#view').html(html)}})}$("#nis").on('input',function(){var nis=$('#nis').val();var status=$('#status').val();$.ajax({url:"<?= base_url('presensi/Presensi/cari/');?>"+nis+"/"+status,Type:"post",dataType:"JSON",success:function(data){document.getElementById("nis").value="";view();toastr.info(data.message);toastr.options.timeOut=2000}})});$('#save').on('click',function(){var data_form=$('#form').serialize();$.ajax({url:"<?= base_url('presensi/Presensi/set/');?>",method:'post',dataType:"JSON",data:data_form,success:function(data1){if(data1.message=='Berhasil'){$('#exampleModal').modal('hide');toastr.success(data1.message);toastr.options.timeOut=2000;location.reload()}else{$('#exampleModal').modal('hide');toastr.warning(data1.message);toastr.options.timeOut=2000;location.reload()}}})});
    </script>
  </body>
</html>