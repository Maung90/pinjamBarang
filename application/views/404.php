<link rel="stylesheet" href="<?=base_url()?>assets/vendor/css/pages/page-misc.css"/>
<!-- Error -->
<?php 


if ($this->session->userdata('no_identitas') != null) {
  $url = base_url();
} else if ($this->session->userdata('id_role') != null) { 

  if ($this->session->userdata('id_role') == '1') { 
    $url = base_url('Master/');
  }else if ($this->session->userdata('id_role') == '2') { 
    $url = base_url('Dashboard/');
  } 

}else{
  $url = base_url('Login/');
} ?>

<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-1 mt-4">Page Not Found :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
    <a href="<?=$url;   ?> " class="btn btn-primary mb-4">Back to home</a>
    <div class="mt-4">
      <img
      src="<?=base_url()?>/assets/img/illustrations/page-misc-error.png"
      alt="page-misc-error"
      width="225"
      class="img-fluid" />
    </div>
  </div>
</div>
<div class="container-fluid misc-bg-wrapper">
  <img
  src="<?=base_url()?>assets/img/illustrations/bg-shape-image-light.png"
  alt="page-misc-error"
  data-app-light-img="illustrations/bg-shape-image-light.png"
  data-app-dark-img="illustrations/bg-shape-image-dark.png" />
</div>
    <!-- /Error -->