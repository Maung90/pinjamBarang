<!-- Navbar -->
<nav class="navbar navbar-expand bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url();?>">PNB - Pinjam Barang</a>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav d-flex align-items-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url();?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('User/Status/') ?>">Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('User/Checkout/')   ?> ">  
            <i class="fas fa-suitcase text-white"></i>
            <span class="badge bg-danger rounded-pill badge-notifications" id="notif"><?=$jumlahOrder?></span>
          </a>
        </li>
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"> 
            <span class="ti ti-user" style="line-height:1 !important;font-size: 1.12rem !important;"></span> 
          </a>
          <?php if ($this->session->userdata('no_identitas') == '' || $this->session->userdata('no_identitas') == null): ?>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="<?=base_url('Login/');?>">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <span class="ti ti-user h-auto rounded-circle" style="background-color: #E9E9E9;padding: 6px;"></span> 
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">
                      <div class="alert alert-dark" role="alert">
                        Silahkan Login!
                      </div>
                    </span> 
                  </div>
                </div>
              </a>
            </li> 
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="<?=base_url('Login/');?>"> 
                <i class="ti ti-login me-2 ti-sm"></i>
                <span class="align-middle">Login</span>
              </a>
            </li>
          </ul>
        <?php else: ?>
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
                    <span class="fw-semibold d-block"> Users</span> 
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="pages-profile-user.html">
                <i class="ti ti-user-check me-2 ti-sm"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
            <!-- <li>
              <a class="dropdown-item" href="pages-account-settings-account.html">
                <i class="ti ti-settings me-2 ti-sm"></i>
                <span class="align-middle">Settings</span>
              </a>
            </li>  -->
            <!-- <li>
              <div class="dropdown-divider"></div>
            </li> -->
            <li>
              <a class="dropdown-item" href="<?=base_url('Login/Logout');?>">
                <i class="ti ti-sign-in me-2 ti-sm"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        <?php endif ?>
      </li>
    </ul>
  </div>
</div>
</nav>
<!-- Tutup Navbar -->