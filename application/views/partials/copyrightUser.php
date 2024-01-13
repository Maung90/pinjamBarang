  <footer class="footer bg-primary text-white pt-5 pb-3 mt-3">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4 mb-4 mb-md-0">
          <h5 class="fw-bolder text-white">Politeknik Negeri Bali</h5>
          <span>Politeknik Negeri Bali (PNB) yang lebih dikenal dengan nama Poltek Bali merupakan lembaga pendidikan tinggi bidang vokasi yang lebih mengedepankan praktik daripada teori.</span>
        </div>
        <div class="col-sm-6 col-md-2 mb-4 mb-md-0">
          <h5 class="fw-bolder text-white">Quick Link</h5>
          <ul class="list-unstyled">
            <li><a href="<?=base_url() ?>" class="footer-link d-block pb-2">Home</a></li>
            <li><a href="<?=base_url('User/Status/') ?>" class="footer-link d-block pb-2">Info</a></li>
            <li><a href="<?=base_url('User/Checkout/') ?>" class="footer-link d-block pb-2">Backpack</a></li>
            <?php if ($this->session->userdata('no_identitas') == '' || $this->session->userdata('no_identitas') == null): ?>
            <li><a href="<?=base_url('Login/') ?>" class="footer-link d-block pb-2">Login</a></li> 
            <?php else: ?>
            <li><a href="<?=base_url('Logout/') ?>" class="footer-link d-block pb-2">Logout</a></li> 
            <?php endif;?>
          </ul>
        </div>
        <div class="col-sm-6 col-md-3 mb-4 mb-md-0">
        <h5 class="fw-bolder text-white">External Link</h5>
          <ul class="list-unstyled">
            <li><a href="https://pnb.ac.id/" class="footer-link d-block pb-2">Politeknik Negeri Bali</a></li>
            <li><a href="https://sion.pnb.ac.id/" class="footer-link d-block pb-2">Sion Politeknik Negeri Bali</a></li>
            <li><a href="https://elerning.pnb.ac.id/" class="footer-link d-block pb-2">Elearning Politeknik Negeri Bali</a></li> 
          </ul>
        </div>
        <div class="col-sm-12 col-md-3 mb-4 mb-md-0">
        <h5 class="fw-bolder text-white">Contact Us</h5>
          <ul class="list-unstyled">
            <li>
              <span class="footer-link cursor-pointer d-block pb-2"><i class="ti ti-map-pin me-1"></i> Uluwatu St No.45, Jimbaran, South Kuta, Badung Regency, Bali 80361 </span>
            </li>
            <li>
              <span class="footer-link cursor-pointer d-block pb-2"><i class="ti ti-phone me-1"></i> +62 (0361)701981</span>
            </li>
            <li>
              <span class="footer-link cursor-pointer d-block pb-2"><i class="ti ti-message me-1"></i> poltek@pnb.ac.id</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-container d-flex align-items-center justify-content-between pb-2 flex-md-row flex-column">
        <div>
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          ,   made with ❤️ by <a href="<?=base_url();?>" target="_blank" class="footer-text fw-bolder">Team--</a>
        </div> 
      </div>
    </div>
  </footer>