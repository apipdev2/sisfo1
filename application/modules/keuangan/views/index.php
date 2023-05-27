
      
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

            </div>

            <div class="row">
                  <div class="col-md-9">
                     <canvas id="pmb" ></canvas>
                  </div>
                  <div class="col-md-3 ">
                      
                      <div class="col-sm-12 col-lg-12 mt-3">
                        <div class="card card-sm">
                          <div class="card-body">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <span class="bg-success text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                                </span>
                              </div>
                              <div class="col">
                                <div class="font-weight-medium">
                                  Total Pembayaran
                                </div>
                                <div class="text-muted">
                                  <h3>Rp. <?= number_format($pembayaran->nominal); ?></h3>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-12 col-lg-12 mt-3">
                        <div class="card card-sm">
                          <div class="card-body">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                                </span>
                              </div>
                              <div class="col">
                                <div class="font-weight-medium">
                                  Total Tunggakan
                                </div>
                                <div class="text-muted">
                                  <h3>Rp. <?= number_format($tunggakan->nominal - $pembayaran->nominal); ?></h3>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
            </div>


        </div>
      </div>
<!-- chart js -->
<script src="http://localhost/akademik/assets/dist/libs/chartjs/Chart.js"></script>
<script>
 $.getJSON( "<?= base_url('keuangan/Dashboard/chart');?>", function( data ) {

    //buat array untuk label nama kota/kab
    var labels =[];
    //buat array untuk data Jml Perempuan
    var nominal =[];

    $(data).each(function(i){         
        labels.push(data[i].tanggal); 
        nominal.push(data[i].nominal);
    });  

    //deklarasi chartjs untuk membuat grafik 2d di id mychart 
    var ctx = document.getElementById('pmb').getContext('2d');

    var myChart = new Chart(ctx, {
      //chart akan ditampilkan sebagai bar chart
        type: 'line',
        data: {
          //membuat label chart
            labels: labels,
            datasets: [{
                label: "Total Pembayaran",
                backgroundColor: "rgba(245, 40, 145, 0.8)",
                borderColor: "black",
                borderWidth: 1,
                data: nominal
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

      