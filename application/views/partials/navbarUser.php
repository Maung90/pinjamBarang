<!-- Navbar -->
<nav class="navbar navbar-expand bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url();?>">PNB - Pinjam Barang</a>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav d-flex align-items-center">
        <?php if ($url == 'Home'){ ?>
          <li class="nav-item ">
            <a class="nav-link active text-decoration-underline" aria-current="page" href="<?=base_url();?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('User/Status/') ?>">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('User/Checkout/')?>">  
              <i class="fas fa-suitcase"></i>
              <span class="badge bg-danger rounded-pill badge-notifications" id="notif"><?=$jumlahOrder?></span>
            </a>
          </li>
        <?php } elseif ($url == 'Status') { ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?=base_url();?>">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-decoration-underline" href="<?=base_url('User/Status/') ?>">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('User/Checkout/')?>">  
              <i class="fas fa-suitcase"></i>
              <span class="badge bg-danger rounded-pill badge-notifications" id="notif"><?=$jumlahOrder?></span>
            </a>
          <?php } elseif ($url == 'Checkout') { ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?=base_url();?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('User/Status/') ?>">Info</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="<?=base_url('User/Checkout/')?>">  
                <i class="fas fa-suitcase text-white"></i>
                <span class="badge bg-danger rounded-pill badge-notifications" id="notif"><?=$jumlahOrder?></span>
              </a>
            <?php }else{?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?=base_url();?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('User/Status/') ?>">Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('User/Checkout/')?>">  
                  <i class="fas fa-suitcase text-white"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications" id="notif"><?=$jumlahOrder?></span>
                </a>
              </li>
            <?php } ?>

            <?php if ($this->session->userdata('no_identitas') == '' || $this->session->userdata('no_identitas') == null){ ?> 
              <li class="nav-item">  
                <a class="nav-link text-decoration-underline" href="<?=base_url('Login/') ?>">Login</a>
              </a>
            </li>
          <?php }else{ ?>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"> 
                <span class="ti ti-user" style="line-height:1 !important;font-size: 1.12rem !important;"></span> 
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <span class="ti ti-user h-auto rounded-circle border p-2"></span> 
                        </div>
                      </div>
                      <div class="flex-grow-1 d-flex align-items-center">
                        <span class="fw-semibold d-block">  <?=$this->session->userdata('nama_peminjam');   ?> </span> 
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="<?=base_url('ChangePassword/')   ?> ">
                    <i class="ti ti-user-check me-2 ti-sm"></i>
                    <span class="align-middle">Change Password</span>
                  </a>
                </li> 
                <li>
                  <a class="dropdown-item" href="<?=base_url('Logout/');?>">
                    <i class="ti ti-sign-in me-2 ti-sm"></i>
                    <span class="align-middle">Log Out</span>
                  </a>
                </li>
              </ul>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
<!-- Tutup Navbar -->