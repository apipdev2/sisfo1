<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<style type="text/css">
		/* Table */
		body {
			font-family: "lucida Sans Unicode", "Lucida Grande", "Segoe UI", vardana;

			margin:0;
			padding: 0px;
		}
		.demo-table {
			border-collapse: collapse;
			font-size: 12px;
			color: #444;
		}


		.demo-table ,th ,td{
			border:1px solid #95a5a6;
			padding: 7px 10px;
		}
		.demo-table tr:nth-child(even) {
		    background-color: #f2f2f2;
		}

	
		.header{
			width:100%;
			margin-top: 0px;
			text-align: center;
		}

		.header img{
			margin: 0px;
			padding: 0px;
		}
		.logo{
			width:100px;
			display: inline-block;
			/*background: yellow;*/
		}
		.sekolah{
			width: 550px;
			display: inline-block;	
			/*background: red;*/
		}

		hr{
			border:double;
		}

		.title th{
			border:none;
			padding:1px;
			text-align: left;
			font-size: 13px;
		}
		

		
	</style>
</head>
<body>

	<div class="header" >			
			<img src="<?= base_url('assets/img/instansi/'.$instansi->header); ?>" alt="logo" >

	</div>

	<h3 style="text-align: center;"><?= $title; ?></h3>

	

	<table class="demo-table" width="100%">
	  <thead style="background: #2d3436; color: #fff;">
	    <tr>
	     	<th>No</th>
	        <th>NIP</th>
	        <th>Nama</th>
	        <th>JK</th>
	        <th>Tempat Lahir</th>
	        <th>Tanggal Lahir</th>
	        <th>Status Pegawai</th>	
	    </tr>
	  </thead>
	  <tbody>
	  	  <?php $no=1; foreach ($pegawai as $row): ?>
            <tr>
              <td><?= $no++;?></td>  
              <td><?= $row->nip; ?></td>            
              <td><?= $row->nama_lengkap; ?></td>
              <td><?= $row->jenis_kelamin; ?></td>
              <td><?= $row->tempat_lahir; ?></td>
              <td><?= date('d-m-Y',strtotime($row->tanggal_lahir)); ?></td>
              <td><?= $row->status_pegawai; ?></td>
              
            </tr>
          <?php endforeach ?>
	  </tbody>
	</table>
</body>
</html>