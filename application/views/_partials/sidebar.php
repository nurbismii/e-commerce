<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-300"> D'fiza <sup>STORE</sup></div>
    </a>

    <hr class="sidebar-divider my-0">
    <?php if ($this->session->userdata('id_user') == 1) { ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php } ?>

    <!-- Nav Item - Tables -->
    <?php if ($this->session->userdata('id_user') == 1) { ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#produk" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>Produk</span>
            </a>
            <div id="produk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Mengatur Komponen :</h6>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "product") ? 'active' : ''; ?>" href="<?= base_url('product') ?>">Produk</a>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "category") ? 'active' : ''; ?>" href="<?= base_url('category') ?>">Kategori</a>
                </div>
            </div>
        </li>

        <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-handshake"></i>
                <span>Transaksi</span>
            </a>
            <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Mengatur Komponen :</h6>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "order") ? 'active' : ''; ?>" href=" <?= base_url('order') ?>">Proses</a>
                    <a class="collapse-item" href=" <?= base_url('order/konfirmasi') ?> ">Menunggu</a>
                </div>
            </div>
        </li>

        <li class=" nav-item <?= ($this->uri->segment(1) == "pembayaran") ? 'active' : ''; ?>">
            <a class="nav-link " href="<?= base_url('pembayaran') ?>">
                <i class="fas fa-fw fa-wallet"></i>
                <span>Pembayaran</span></a>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?= ($this->uri->segment(1) == "user") ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('user') ?>">
                <i class="fas fa-fw fa-address-card"></i>
                <span>User</span></a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "role") ? 'active' : ''; ?>">
            <a class="nav-link " href="<?= base_url('role') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Role</span>
            </a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "setting") ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url('setting') ?>">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Lokasi</span>
            </a>
        </li>
    <?php } ?>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>