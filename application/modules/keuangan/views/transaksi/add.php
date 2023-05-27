
      
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
                      <li class="breadcrumb-item"><a href="<?= base_url('keuangan/Pembayaran_Spp'); ?>">Transaksi Pembayaran</a></li>
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
                 
                   	<div class="col-md-6 ">                  
  	                  <table width="100%">
  	                    <tr>
  	                      <td>Tahun Ajaran</td><td>:</td><td><b><?= $tahunajaran->tahun_ajaran;?></b></td>
  	                    </tr>
  	                    <tr>
  	                      <td>NIS</td>
  	                      <td>:</td>
  	                      <td>
  	                        <div class="input-group mb-2">
  	                          <input type="text"  name="nis" id="nis">
  	                          <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#modal-nis"><i class="fas fa-user-plus"></i></button>
  	                        </div>
  	                      </td>
  	                    </tr>

  	                    <tr>
  	                      <td>Nama</td>
  	                      <td>:</td>
  	                      <td>
  	                        <input type="text" name="nama_peserta" readonly disabled>
  	                      </td>
  	                    </tr>

                        <tr>
                          <td>ID Kelas</td>
                          <td>:</td>
                          <td>
                            <input type="text" name="id_kelas" id="id_kelas" readonly disabled>
                          </td>
                        </tr>

  	                    <tr>
  	                      <td>Kelas</td>
  	                      <td>:</td>
  	                      <td>
  	                        <input type="text" name="kelas" readonly disabled>
  	                      </td>
  	                    </tr>
  	                  </table>
					          </div>

                    <div class="col-md-6">
                      
                      <table width="100%">
                        
                        </tr>

                        <tr>
                          <td>Jenis Pembayaran</td>
                          <td>:</td>
                          <td>
                            <select name="id_jenis" id="jenis" >
                              <option value="" selected disabled>Pilih</option>
                              <?php foreach ($jenis as $j): ?>
                                <option value="<?= $j->id_jenis; ?>"><?= $j->jenis_pembayaran; ?></option>
                              <?php endforeach ?>
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td>Bulan</td>
                          <td>:</td>
                          <td>
                            <select name="bulan" id="bulan" >
                              <option value="" selected disabled>Pilih</option>
                              
                            </select>
                          </td>
                        </tr>

                         <tr>
                          <td>Tagihan</td>
                          <td>:</td>
                          <td>
                            <input type="number" name="tagihan" id="tagihan" disabled>
                          </td>
                        </tr>

                         <tr>
                          <td>Pembayaran Masuk</td>
                          <td>:</td>
                          <td>
                            <input type="number" name="pembayaran" id="pembayaran" disabled>
                          </td>
                        </tr>

                        <tr>
                          <td>Nominal</td>
                          <td>:</td>
                          <td>
                            <input type="number" name="nominal" id="nominal" >
                          </td>
                        </tr>

                        <tr>
                          <td>Status</td>
                          <td>:</td>
                          <td>
                            <select name="status_bayar" id="status_bayar">
                              <option value=""selected disabled>::Pilih::</option>
                              <option value="L">Lunas</option>
                              <option value="BL">Belum Lunas</option>
                            </select>
                          </td>
                        </tr>


                        
                      </table>


                    </div>   

                   </div>
                      <button class="btn btn-success float-end" type="button" onclick="bayar();"><span class="fas fa-money-bill"></span>&nbsp;Bayar</button>
                 </div>

                 <div class="card-body">
              		
              		<div  class="table-responsive read">

		                <table class="table datatable" id="pd">
		                  <thead>
		                    <tr>
		                      <th>No</th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Kelas</th>
		                      <th>Jenis Pembayaran</th>
		                      <th>Bulan</th>
                          <th>Nominal</th>
		                      <th>Status</th>
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody id="temp">
		                    
		                  </tbody>
		              	</table>

                    <button type="button" class="btn btn-primary float-end" onclick="simpan()"><i class="fas fa-save"></i> &nbsp;Simpan</button>

	              	</div>
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

console.log('=====AMPUN OM HACKER DAMAI YAH..!!=== ');
console.log('=====peace om damai aja== ');

tampil();
pembayaran();


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

function pembayaran(){
 $.ajax({

  url :"<?= base_url('keuangan/Pembayaran_Spp/get_temp');?>",
  Type : "get",
  dataType : "JSON",
  success:function(data){       
    var no=0;
    var html ='';
    var bln = {"1":'Januari',"2":'Februari',"3":'Maret',"4":'April',"5":'Mei',"6":'Juni',"7":'Juli',"8":'Agustus',"9":'September',"10":'Oktober',"11":'November',"12":'Desember'};
    
    for (var i = 0; i < data.length; i++) {
      no++;
      var status = '';      
      var date = new Date(data[i].tanggal_lahir);
      var tanggal_lahir = date.toLocaleDateString('id');
      var bulan = '';
      if (data[i].bulan == '') {
          bulan = "-";
        }else{
          bulan = bln[data[i].bulan];
        }
      var nominal = parseInt(data[i].nominal);
     
      html+='<tr>'
           +'<td>'+no+'</td>'
           +'<td>'+data[i].nis+'</td>'
           +'<td>'+data[i].nama_peserta+'</td>'
           +'<td>'+data[i].kelas+'</td>'
           +'<td>'+data[i].jenis_pembayaran+'</td>'
           +'<td>'+bulan+'</td>'
           +'<td>'+nominal+'</td>'           
           +'<td>'+data[i].status_bayar+'</td>'
           +'<td><a href="#" data-id="'+data[i].id_pembayaran+'" class="btn btn-danger btn-smal batal"><i class="fas fa-trash"</i></a></td>'
           +'</tr>';
    }
    $('#temp').html(html);
    $('#pd').DataTable();  

  }
 });


}


//cari nis
$('#nis').keyup(function() {
  var nis = $('#nis').val();
    $.ajax({
      url :"<?= base_url('keuangan/Pembayaran_Spp/get_siswa/');?>"+nis,
      Type : "get",
      dataType : "JSON",
      success:function(data){        
        
          $('[name = nama_peserta]').val(data.nama_peserta);
          $('[name = kelas]').val(data.kelas);
          $('[name = id_kelas]').val(data.id_kelas);
         
        }
      });
   
});



$('.table-tbody').on('click','.pilih',function(){
    var nis = $(this).data('nis');
    $.ajax({
		  url :"<?= base_url('keuangan/Pembayaran_Spp/get_siswa/');?>"+nis,
		  Type : "get",
		  dataType : "JSON",
		  success:function(data){        
        
	        $('#modal-nis').modal('hide');
	      	$('[name = nis]').val(data.nis);
	      	$('[name = nama_peserta]').val(data.nama_peserta);
	      	$('[name = kelas]').val(data.kelas);
	      	$('[name = id_kelas]').val(data.id_kelas);
	      }
	    });
   
});


//jenis pem
$('#jenis').change(function(){
  
  var nis = $('#nis').val();
  var id_jenis = $('#jenis').val();

  if(nis == ''){

    swal('Silahkan isi kolom NIS.!', {
                icon: 'info',
              });
  }else{

    $.ajax({
      url :"<?= base_url('keuangan/Pembayaran_Spp/cek_jenis/');?>"+id_jenis,
      Type : "get",
      dataType : "JSON",
      success:function(data){        
        var nis = $('#nis').val();
        var id_kelas =$('#id_kelas').val();
        var kat = data.nama_kategori;

         if(kat == 'SPP'){

          var id_kelas =$('#id_kelas').val();
          
          $.ajax({
            url :"<?= base_url('keuangan/Pembayaran_Spp/get_bulan');?>",
            method : "POST",
            dataType : "JSON",
            data : {nis:nis,id_jenis:id_jenis,id_kelas:id_kelas},
            success:function(data1){ 
              var html ='';
              var bln = {"1":'Januari',"2":'Februari',"3":'Maret',"4":'April',"5":'Mei',"6":'Juni',"7":'Juli',"8":'Agustus',"9":'September',"10":'Oktober',"11":'November',"12":'Desember'};

                 html+='<option value="" selected disabled>::Pilih Bulan::</option>';
                for (var i = 0; i < data1.length; i++) {
                  
                  html+='<option value="'+data1[i].bulan+'">'+bln[data1[i].bulan]+'</option>';
                }

                $('#bulan').html(html);
                $('#tagihan').val(data.nominal); 
                           

              }
            });         

         }else{

          var id_kelas =$('#id_kelas').val();
          
          $.ajax({
            url :"<?= base_url('keuangan/Pembayaran_Spp/get_bulan');?>",
            method : "POST",
            dataType : "JSON",
            data : {nis:nis,id_jenis:id_jenis,id_kelas:id_kelas},
            success:function(data1){ 
              var html ='';                  
                  html+='<option value="">Tidak Ada</option>';                

                $('#bulan').html(html);
                cek_pembayaran();
                $('#tagihan').val(data.nominal);

              }
            });


         }
          
        }
      });

  }


});


$('#bulan').change(function(){
  var nis = $('#nis').val();
  var id_kelas =$('#id_kelas').val();
  var id_jenis = $('#jenis').val();
  var bulan = $('#bulan').val();

  $.ajax({

      url :"<?= base_url('keuangan/Pembayaran_Spp/cek_pembayaran');?>",
      method : "POST",
      dataType : "JSON",
      data : {nis:nis,id_jenis:id_jenis,id_kelas:id_kelas,bulan:bulan},
      success:function(data){ 
        var pmb = '';
        if (data.nominal == null) {
           pmb = 0;
        }else{
          pmb = data.nominal;
        }
       
         $('[name = pembayaran]').val(pmb);

         //sum
                var tagihan = $('#tagihan').val();
                var pembayaran = $('#pembayaran').val()

               var total =  parseInt(tagihan) - parseInt(pembayaran);
               $('#nominal').val(total);    

        }
      });
});


//cek_pembayaran lainnya
function cek_pembayaran(){
  var nis = $('#nis').val();
  var id_kelas =$('#id_kelas').val();
  var id_jenis = $('#jenis').val();
  var bulan = $('#bulan').val();

  $.ajax({

      url :"<?= base_url('keuangan/Pembayaran_Spp/cek_pembayaran');?>",
      method : "POST",
      dataType : "JSON",
      data : {nis:nis,id_jenis:id_jenis,id_kelas:id_kelas,bulan:bulan},
      success:function(data){ 

        var pmb = '';
        if (data.nominal == null) {
           pmb = 0;
        }else{
          pmb = data.nominal;
        }
       
        $('[name = pembayaran]').val(pmb);
        //sum
                var tagihan = $('#tagihan').val();
                var pembayaran = $('#pembayaran').val()

               var total =  parseInt(tagihan) - parseInt(pembayaran);
               $('#nominal').val(total);

        }
      });
}





function bayar(){

  var nis = $('#nis').val();
  var id_jenis = $('#jenis').val();
  var id_kelas = $('#id_kelas').val();
  var bulan = $('#bulan').val();
  var nominal = $('#nominal').val();
  var status_bayar = $('#status_bayar').val();

  if(status_bayar == null || nis == '' || id_jenis == null || bulan == null){
     swal('Silahkan lakukan pembayaran.!', {
                icon: 'info',
              });
  }else{
    $.ajax({
      url :"<?= base_url('keuangan/Pembayaran_Spp/add_temp');?>",
      method : "POST",
      dataType : "JSON",
      data : {nis:nis,id_jenis:id_jenis,id_kelas:id_kelas,bulan:bulan,nominal,nominal,status_bayar:status_bayar},
      success:function(data){ 
        if (data.status=='502') {
           swal('info! Jumlah Pembayaran lebih besar dari Tagihan!', {
                icon: 'info',
              });
        }else if(data.status=='503'){
            swal('info! Data Sudah Ada!', {
                icon: 'info',
              });
        }else{

        pembayaran();
        location.reload();
        }
        
      }

      });

  }

  

}



$('#temp').on('click','.batal',function(){
  var id_pembayaran = $(this).data('id');
  $.ajax({
      url :"<?= base_url('keuangan/Pembayaran_Spp/del_temp');?>",
      method : "POST",
      dataType : "JSON",
      data : {id_pembayaran : id_pembayaran},
      success:function(data){ 
        
        pembayaran();
        
      }

      });
});


function simpan(){

  // alert();


   $.ajax({
      url :"<?= base_url('keuangan/Pembayaran_Spp/simpan');?>",
      method : "POST",
      dataType : "JSON",
      success:function(data){ 
        if(data.status == '200'){
          swal('success! Data tersimpan!', {
                icon: 'success',
              });
          pembayaran();
        }else{
          swal('error! Data kosong!', {
                icon: 'error',
              });
        }
          
        
          // window.location.replace('<?= base_url();?>keuangan/Pembayaran_Spp'); 
          console.log(data);   
      }

      });

}

</script>

   

	  

  
