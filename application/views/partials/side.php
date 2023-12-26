<!-- Menu -->
<?php 
$this->db->select('status_peminjaman,COUNT(status_peminjaman) as jumlah');
$this->db->from('tb_peminjaman');
$this->db->group_by('status_peminjaman'); 
$query = $this->db->get()->result(); 
foreach ($query as $d) { 
  if (strtolower($d->status_peminjaman) == 'pending') {
   $pending = $d->jumlah;
 }else if(strtolower($d->status_peminjaman) == 'dipinjam'){
   $dipinjam = $d->jumlah;
 }else{
  $dikembalikan = $d->jumlah;
}
}
?>
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
        <a href="#" class="app-brand-link">
          <span class="app-brand-logo demo">
            <img src="https://elearning.pnb.ac.id/img/logo-pnb.3aae610b.png" width="22" height="22" fill="none"></img>
          </span>
          <span class="app-brand-text menu-text fw-bold">PNB - Pinjam Barang</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
          <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
          <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
      </div>

      <div class="menu-inner-shadow"></div>
      <ul class="menu-inner py-1 gap-1">
        <?php if ($this->session->userdata('id_role') == 1): ?>
          <li class="menu-item active">
            <a href="<?=base_url('Master/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-smart-home"></i>
              <div>Data Admin</div>
            </a>
          </li>
        <?php elseif ($this->session->userdata('id_role') == 2) : ?>
          <li class="menu-item active">
            <a href="<?=base_url('Dashboard/');?>" class="menu-link">
              <i class="menu-icon tf-icons ti ti-smart-home"></i>
              <div>Dashboard</div>
            </a>
          </li>
          <li class="menu-item"> 
            <a href="javascript:void(0);" class="menu-link menu-toggle">
             <i class="menu-icon tf-icons ti ti-history"></i>
             <div>History</div> 
           </a>
           <ul class="menu-sub">
            <li class="menu-item">
              <a href="<?=base_url('History/Pending/');?>" class="menu-link">
                <div>Pending</div>
                <div class="badge bg-label-primary rounded-pill ms-auto"><?=$pending;?></div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?=base_url('History/Pinjam/');?>" class="menu-link">
                <div>Dipinjam</div>
                <div class="badge bg-label-primary rounded-pill ms-auto"><?=$dipinjam;?></div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?=base_url('History/Kembali/');?>" class="menu-link">
                <div>Kembali</div>
              </a>
            </li> 
          </ul>
        </li> 
        <li class="menu-item active">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
            <div>Data Master</div>
            <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item active">
              <a href="<?=base_url('Peminjam/');?>" class="menu-link">
                <div>Data User</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?=base_url('Barang/');?>" class="menu-link">
                <div>Data Barang</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?=base_url('Kategori/');?>" class="menu-link">
                <div>Data Kategori</div>
              </a>
            </li> 
          </ul>
        </li> 
      <?php else: ?> 
      <?php endif ?>
    </ul>
  </aside>
