<!<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print Data Pembayaran</title>
	<style>
		
		@page { 
			size: auto;
			margin-left: 2mm; 
			margin-top:75px;
		}

		.kertas{			
			height: 800px;
			width: 793px;
			font-size: 12px;
		}


	</style>
</head>
<body>

	<div class="kertas">
		
		<table border="0">   	
	      	
	   		<?php $no=1; foreach ($pembayaran as $row): ?>
	      	<?php foreach ($id_bayar as $byr): ?>
	          <?php 

	            if ($row->status_bayar == 'BL') {
	              $sb = 'BELUM LUNAS';
	            }else{
	              $sb = 'LUNAS';
	            }
	           ?>

	           	

	           	<tr>            
		            <td style="width:10.6px; padding:3px; text-align: center; <?php if ($byr != $row->id_pembayaran): ?>color:white;<?php endif ?>"><?= $no++; ?></td>
		            <td style="width:74.4px; padding:3px; text-align: center; <?php if ($byr != $row->id_pembayaran): ?>color:white;<?php endif ?>"><?= date('d-m-Y',strtotime($row->tgl_bayar));?></td>
		            <td style="width:132.7px; padding:3px; text-align: left; <?php if ($byr != $row->id_pembayaran): ?>color:white;<?php endif ?>"><?= $row->jenis_pembayaran.' '.nama_bulan($row->bulan);?></td>
		            <td style="width:56.9px; padding:3px; "><span style="float: right;<?php if ($byr != $row->id_pembayaran): ?>color:white;<?php endif ?>"><?= number_format($row->nominal);?></span></td>
		            <td style="width:93.1px; height:21px; padding:3px; text-align: center;<?php if ($byr != $row->id_pembayaran): ?>color:white;<?php endif ?>"><?= $sb;?></td>
		        </tr>


	          <?php endforeach ?>	
	      <?php endforeach ?>
   		</table>	

	</div>

			

</body>
</html>