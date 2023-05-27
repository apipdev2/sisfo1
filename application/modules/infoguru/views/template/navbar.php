<!-- Sidebar -->
      <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark">
             <a href="<?= base_url('infoguru/Dashboard'); ?>">
              <img src="<?= base_url('assets/img/instansi/'.$instansi->logo); ?>" width="500" alt="Tabler" class="navbar-brand-image">
            </a>
            <?= $instansi->nama_sekolah;?>
          </h1>
          <div class="navbar-nav flex-row d-lg-none">
            
            <div class="d-none d-lg-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
              </a>
              <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                  <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                  <span class="badge bg-red"></span>
                </a>
               
              </div>

            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(<?= base_url('assets/img/user/'.$this->session->userdata('image'));?>)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div><?= $this->session->userdata('username'); ?></div>
                  <div class="mt-1 small text-muted"><?= $this->session->userdata('email'); ?></div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="<?= base_url('infoguru/Auth/logout'); ?>" class="dropdown-item">Logout</a>
              </div>
            </div>

          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('infoguru/Dashboard'); ?>" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fas fa-home"></i>
                  </span>
                  <span class="nav-link-title">
                    Home
                  </span>
                </a>
              </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fas fa-school"></i>
                  </span>
                  <span class="nav-link-title">
                    Akademik
                  </span>
                </a>
                <div class="dropdown-menu">
                  
                  <a class="dropdown-item" href="<?= base_url('infoguru/Akademik'); ?>">
                    Data PD
                  </a>

                  <a class="dropdown-item" href="<?= base_url('infoguru/Akademik/cari'); ?>">
                    Cari PD
                  </a>
                  
                
                </div>
              </li>

               <!--  -->

               <li class="nav-item">
                <a class="nav-link" href="<?= base_url('infoguru/Presensi'); ?>" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="fas fa-fingerprint"></i>
                  </span>
                  <span class="nav-link-title">
                    Presensi
                  </span>
                </a>
              </li>

               

               <li class="nav-item">
                <a class="nav-link" href="<?= base_url('infoguru/Dokumen'); ?>" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fas fa-book"></i>
                  </span>
                  <span class="nav-link-title">
                    Dokumen
                  </span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fas fa-cog"></i>
                  </span>
                  <span class="nav-link-title">
                    Setting
                  </span>
                </a>
                <div class="dropdown-menu">
                  
                  <a class="dropdown-item" href="<?= base_url('infoguru/Profile'); ?>">
                    Profile
                  </a>

                  <a class="dropdown-item" href="<?= base_url('infoguru/ChangePassword'); ?>">
                    Ganti Password
                  </a>
                  
                
                </div>
              </li>
            
             

            </ul>
          </div>
        </div>
      </aside>
      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
              </a>
              
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(<?= base_url('assets/img/user/'.$this->session->userdata('image'));?>)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div><?= $this->session->userdata('username'); ?></div>
                  <div class="mt-1 small text-muted"><?= $this->session->userdata('email'); ?></div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="<?= base_url('infoguru/Auth/logout'); ?>" class="dropdown-item">Logout</a>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            
          </div>
        </div>
      </header>