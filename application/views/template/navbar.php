  <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?= base_url('sisfo/Dashboard'); ?>" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><circle cx="12" cy="12" r="9" /><line x1="15" y1="15" x2="18.35" y2="18.35" /><line x1="9" y1="15" x2="5.65" y2="18.35" /><line x1="5.65" y1="5.65" x2="9" y2="9" /><line x1="18.35" y1="5.65" x2="15" y2="9" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Data Master
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('sisfo/Instansi'); ?>">
                      Data Instansi
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Pegawai'); ?>">
                      Data Pegawai
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Siswa'); ?>">
                      Data Siswa
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Kelas'); ?>" >
                      Data Kelas
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Jurusan'); ?>" >
                      Data Jurusan
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Tahun_ajaran'); ?>" >
                      Tahun Ajaran
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/User'); ?>" >
                      Data User
                    </a>
                    
                  </div>
                </li>

               

                 <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                         <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Kesiswaan
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('sisfo/Rombel'); ?>">
                      Rombel
                    </a>
                     <a class="dropdown-item" href="<?= base_url('sisfo/Peserta_didik/cari'); ?>">
                      Cari Peserta Didik
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Peserta_didik'); ?>">
                      Data Peserta Didik
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Walas'); ?>">
                      Wali Kelas
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Alumni'); ?>">
                      Alumni
                    </a>

                    
                  </div>
                </li>

                 <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-down-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          					   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          					   <line x1="17" y1="3" x2="17" y2="21"></line>
          					   <path d="M10 18l-3 3l-3 -3"></path>
          					   <line x1="7" y1="21" x2="7" y2="3"></line>
          					   <path d="M20 6l-3 -3l-3 3"></path>
          					</svg>
                    </span>
                    <span class="nav-link-title">
                      Transaksi Kelas
                    </span>
                  </a>
                  <div class="dropdown-menu">
                   
                    <a class="dropdown-item" href="<?= base_url('sisfo/Kenaikan'); ?>">
                      Kenaikan Kelas
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Kenaikan/tinggal_kelas'); ?>">
                      Tinggal Kelas
                    </a>
                     <a class="dropdown-item" href="<?= base_url('sisfo/Kenaikan/kelulusan'); ?>">
                      Kelulusan
                    </a>
                     <a class="dropdown-item" href="<?= base_url('sisfo/Mutasi'); ?>">
                      Mutasi Siswa
                    </a>                   
                    
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                         <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                         <path d="M9 17v-5"></path>
                         <path d="M12 17v-1"></path>
                         <path d="M15 17v-3"></path>
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Presensi
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('sisfo/Presensiguru'); ?>">
                      Presensi Guru
                    </a>
                    <a class="dropdown-item" href="<?= base_url('sisfo/Phsiswa'); ?>">
                      Presensi Siswa
                    </a>
                    
                  </div>
                </li>


              </ul>
             
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-wrapper">

        