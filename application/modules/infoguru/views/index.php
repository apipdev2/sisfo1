
      
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
        </div>
      </div>

       <script>
$(document).ready(function () {
  $("#demo-calendar-basic").zabuto_calendar({
  	//style
  	classname: 'table table-bordered lightgrey-weekends',
  	//langue
  	language: 'id',
  	//custom nama bln, hari
  	translation: {
      "months" : {
        "1":"Januari",
        "2":"Februari",
        "3":"Maret",
        "4":"April",
        "5":"Mei",
        "6":"Juni",
        "7":"Juli",
        "8":"Agustus",
        "9":"September",
        "10":"Oktober",
        "11":"November",
        "12":"Desember"
      },
      "days" : {
        "0":"Minggu",
        "1":"Senin",
        "2":"Selasa",
        "3":"Rabu",
        "4":"Kamis",
        "5":"Jumat",
        "6":"Sabtu"
      }
    },
  	//setup

  	header_format: '[month] / [year]',
    week_starts: 'sunday',
    show_days: true,
    today_markup: '<span class="badge bg-primary">[day]</span>',
    navigation_markup: {
        prev: '<i class="fas fa-chevron-circle-left"></i>',
        next: '<i class="fas fa-chevron-circle-right"></i>'
      }

  });
});
</script>