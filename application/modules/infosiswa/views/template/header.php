<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $title; ?> | INFO SISWA</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/instansi/'.$instansi->logo); ?>">
    <!-- CSS files -->
    <link href="<?= base_url('assets/dist/css/tabler.min.css?166828786');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-flags.min.css?166828786');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-payments.min.css?166828786');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-vendors.min.css?166828786');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/demo.min.css?166828786');?>" rel="stylesheet"/>

    
    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <!-- calendar -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
   
   <!-- timeline -->
   <link href="<?= base_url('assets/dist/css/timeline.css');?>" rel="stylesheet"/>
    <!-- jquery -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- zabuto -->
    <script src="<?= base_url();?>assets/dist/zabuto/zabuto_calendar.js"></script>
    <link href="<?= base_url();?>assets/dist/zabuto/zabuto_calendar.css" rel="stylesheet">
    
    
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }

      table.lightgrey-weekends tbody td:nth-child(n+6) {
        background-color: #f3f3f3;
      }
    </style>
  </head>
  <body >
    <script src="<?= base_url('assets/dist/js/demo-theme.min.js');?>"></script>
    <div class="page">
