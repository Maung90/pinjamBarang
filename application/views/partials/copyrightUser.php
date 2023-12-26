    <section id="adv-footer">  
      <footer class="footer bg-primary text-white mt-4">
        <div class="container-fluid container-p-x pt-3">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
              <h5 class="m-0 text-white">Quick Link</h5>
              <ul class="list-unstyled">
                <li><a href="<?=base_url() ?>" class="footer-link d-block pb-2 text-decoration-underline">Home</a></li>
                <li><a href="<?=base_url('User/Status/') ?>" class="footer-link d-block pb-2 text-decoration-underline">Info</a></li>
                <li><a href="<?=base_url('User/Checkout/') ?>" class="footer-link d-block pb-2 text-decoration-underline">Backpack</a></li>
                <?php if ($this->session->userdata('no_identitas') == '' || $this->session->userdata('no_identitas') == null): ?>
                <li><a href="<?=base_url('Login/') ?>" class="footer-link d-block pb-2 text-decoration-underline">Login</a></li> 
              <?php else: ?>
                <li><a href="<?=base_url('Logout/') ?>" class="footer-link d-block pb-2 text-decoration-underline">Logout</a></li> 
              <?php endif;?>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-md-3 mb-4 mb-sm-0">
            <h5 class="m-0 text-white">External Link</h5> 
            <ul class="list-unstyled">
              <li><a href="https://pnb.ac.id/" class="footer-link d-block pb-2 text-decoration-underline">Politeknik Negeri Bali</a></li>
              <li><a href="https://sion.pnb.ac.id/" class="footer-link d-block pb-2 text-decoration-underline">Sion Politeknik Negeri Bali</a></li>
              <li><a href="https://elerning.pnb.ac.id/" class="footer-link d-block pb-2 text-decoration-underline">Elearning Politeknik Negeri Bali</a></li> 
          </ul>
        </div>
        <div class="col-12 col-sm-6 col-md-3 mb-4 mb-sm-0">
         <h5 class="m-0 text-white">Social Media</h5>
         <span>Get ready for better world</span>
         <div class="social-icon my-3">
          <a href="javascript:void(0)" class="text-white me-2">
            <i class="ti ti-brand-facebook"></i>
          </a>
          <a href="javascript:void(0)" class="text-white me-2">
            <i class="ti ti-brand-instagram"></i>
          </a>
          <a href="javascript:void(0)" class="text-white me-2">
            <i class="ti ti-brand-linkedin"></i>
          </a> 
        </div> 
      </div>
      <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
        <h5 class="m-0 text-white">Contact</h5>
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
  </div> 
  <div class="container-xxl">
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
</section>  