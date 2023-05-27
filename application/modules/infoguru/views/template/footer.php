 <!-- Libs JS -->

    <!-- Tabler Core -->
    <script src="<?= base_url('assets/dist/js/tabler.min.js?166828786');?>" defer></script>
    <script src="<?= base_url('assets/dist/js/demo.min.js?166828786');?>" defer></script>
    <!-- data table -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
    <!-- sweet alert -->
    <script src="<?= base_url('assets/dist/libs/sweetalert/sweetalert.min.js');?>"></script>

   

   

    <script>
      $(document).ready(function () {
          $('#dt').DataTable();
      });
    </script>

    <?php if ($this->session->userdata('message')): ?>
        <?php echo $this->session->userdata('message'); ?>
    <?php endif ?>
   
  </body>
</html>