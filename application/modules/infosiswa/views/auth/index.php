
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta12
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>SISFO | InfoSiswa</title>
     <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/menu/instansi/'.$instansi->logo); ?>">
    <!-- CSS files -->
    <link href="<?= base_url('assets/dist/css/tabler.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-flags.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-payments.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-vendors.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/demo.min.css');?>" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
        --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
  </head>
  <body  class=" d-flex flex-column bg-white">
    <script src="<?= base_url('assets/dist/js/demo-theme.min.js');?>"></script>
    <div class="row g-0 flex-fill">
      <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
        <div class="container container-tight my-5 px-lg-5">
          <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/instansi/'.$instansi->logo);?>" height="80" alt=""></a>
            <h2><?= $instansi->nama_sekolah; ?></h2>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <h2 class="h3 text-center mb-3">
            <?= $title; ?>
          </h2>
          <form action="<?= base_url('infosiswa/Auth'); ?>" method="post">
            <div class="mb-3">
              <label class="form-label">NIS</label>
              <input type="number" name="nis" class="form-control" value="<?= set_value('nis'); ?>">
              <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-2">
              <label class="form-label">Password </label>
                <input type="password" name="password" class="form-control <?php if (form_error('password')): ?>
                  is-invalid
                <?php endif ?>" id="password">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> 
            </div>

            <div class="mb-2">
              <label class="form-label">Tahun Ajaran</label>
                <select name="id_tahun" class="form-select">
                  <option value="" selected disabled>::Tahun Ajaran::</option>
                <?php foreach ($tahun_ajaran as $ta): ?>
                  <option value="<?= $ta->id_tahun; ?>"><?= $ta->tahun_ajaran; ?></option>
                <?php endforeach ?>
                </select>
                <?= form_error('id_tahun', '<small class="text-danger pl-3">', '</small>'); ?>
              
            </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Login</button>
              <a href="<?= base_url('Home'); ?>" class="btn btn-info w-100 mt-2">Home</a>
            </div>
          </form>
          
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
        <div class="bg-cover h-100 min-vh-100" style="background-image: url(<?= base_url('assets/img/login2.jpg');?>);"></div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/dist/js/tabler.min.js'); ?>" defer></script>
    <script src="<?= base_url('assets/dist/js/demo.min.js'); ?>" defer></script>
    <script>
      function show()
      { 
        document.getElementById('password').type = 'text';
      }
    </script>
  </body>
</html>