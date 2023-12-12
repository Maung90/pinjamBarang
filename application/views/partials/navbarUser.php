<!-- Navbar -->
<nav class="navbar navbar-expand bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url();?>">PNB - Pinjam Barang</a>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
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
      </ul>
    </div>
  </div>
</nav>
<!-- Tutup Navbar -->