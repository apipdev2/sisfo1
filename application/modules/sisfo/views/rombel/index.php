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

        <div class="">
            <div class="card-body">

             <!-- col -->
              <div class="col-12">
                <div class="row row-cards">

                  <?php foreach ($rombel as $rombel): ?>
                    
                    <!-- card -->
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-info text-white avatar" >
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                               <path d="M9 21v-6a2 2 0 0 1 2 -2h1.6"></path>
                               <path d="M20.001 11.001l-8.001 -8.001l-9 9h2v7a2 2 0 0 0 2 2h4.159"></path>
                               <circle cx="18.001" cy="18" r="2"></circle>
                               <path d="M18.001 14.5v1.5"></path>
                               <path d="M18.001 20v1.5"></path>
                               <path d="M21.032 16.25l-1.299 .75"></path>
                               <path d="M16.27 19l-1.3 .75"></path>
                               <path d="M14.97 16.25l1.3 .75"></path>
                               <path d="M19.733 19l1.3 .75"></path>
                            </svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?= $rombel->kelas; ?>
                            </div>
                            <div class="text-muted">
                              <?php
                               $jml = $this->db->get_where('riwayatkelas',[
                                      'id_tahun'=>$this->session->userdata('id_tahun'),
                                      'id_kelas'=>$rombel->id_kelas,
                                      'status_siswa' =>'Y'
                                      ])->num_rows();
                               echo $jml.' / '.$rombel->kapasitas;
                              ?>
                            </div>
                              <a href="<?= base_url('sisfo/Rombel/view/'.encrypt_url($rombel->id_kelas)); ?>" ><i class="fas fa-search"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end card -->

                  <?php endforeach ?>
                


                </div>
              </div>
              <!-- end col -->

             
            </div>
        </div>

      <!-- end content -->
    </div>
  </div>