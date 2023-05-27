
    
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
                  <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-white">
                      Tahun Ajaran <?= $tahunajaran->tahun_ajaran; ?>
                    </a>
                  </span>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">

               <div class="col-12">
                <div class="row row-cards">

                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm" style="background-color: #c56cf0 ; color:#fff;">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-light text-dark avatar">
                              <i class="fas fa-chalkboard-teacher"></i>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                             <h3>Guru</h3>
                            </div>
                            <div class="text-muted">
                             <h2 class="text-light"><?= $j_guru; ?></h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm" style="background-color: #3ae374 ; color:#fff;">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-light text-dark avatar">
                              <i class="fas fa-user-tie"></i>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                             <h3>Tendik</h3>
                            </div>
                            <div class="text-muted">
                             <h2 class="text-light"><?= $j_tendik; ?></h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm" style="background-color: #17c0eb ; color:#fff;">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-light text-dark avatar">
                              <i class="fas fa-users"></i>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                             <h3>Peserta Didik</h3>
                            </div>
                            <div class="text-muted">
                             <h2 class="text-light"><?= $j_pd; ?></h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm" style="background-color: #ffaf40 ; color:#fff;">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-light text-dark avatar">
                              <i class="fas fa-home"></i>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                             <h3>Rombel</h3>
                            </div>
                            <div class="text-muted">
                             <h2 class="text-light"><?= $j_kls; ?></h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
          
               <div class="col-md-12 bg-light">
                 <div class="card">
                   <div class="card-header">
                     Statistik Siswa Berdasarkan Jenis Kelamin
                   </div>
                   <div class="card-body">
                     <canvas id="myChart" ></canvas>
                   </div>
                 </div>
               </div>
              

            </div>
          </div>
        </div>

        
       
<script>
 $.getJSON( "<?= base_url('sisfo/Dashboard/chart');?>", function( data ) {

    //buat array untuk label nama kota/kab
    var labels =[];
    //buat array untuk data Jml Perempuan
    var data_P =[];
     //buat array untuk data Jml Laki-laki
    var data_L =[];

    $(data).each(function(i){         
        labels.push(data[i].kelas); 
        data_L.push(data[i].j_laki);
        data_P.push(data[i].J_perempuan);
    });  

    //deklarasi chartjs untuk membuat grafik 2d di id mychart 
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
      //chart akan ditampilkan sebagai bar chart
        type: 'bar',
        data: {
          //membuat label chart
            labels: labels,
            datasets: [{
                label: "Jumlah Laki-laki",
                backgroundColor: "rgba(255, 77, 77,1.0)",
                borderColor: "red",
                borderWidth: 1,
                data: data_L
              },
              {
                label: "Jumlah Perempuan",
                backgroundColor: "rgba(24, 220, 255,1.0)",
                borderColor: "rgba(24, 220, 255,1.0)",
                borderWidth: 1,
                data: data_P
              }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });  
});
</script>
