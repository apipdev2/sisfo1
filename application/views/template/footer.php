 <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  
                 
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; <?= date('Y'); ?>
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
   
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/dist/js/tabler.min.js');?>" defer></script>
    <script src="<?= base_url('assets/dist/js/demo.min.js');?>" defer></script>
    
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