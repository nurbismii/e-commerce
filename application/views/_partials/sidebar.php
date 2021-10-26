<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

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
        <li class="nav-item 
       
        ">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>Master</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Mengatur Komponen :</h6>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "product") ? 'active' : ''; ?>" href="<?= base_url('product') ?>">Produk</a>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "category") ? 'active' : ''; ?>" href="<?= base_url('category') ?>">Kategori</a>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "order") ? 'active' : ''; ?>" href="<?= base_url('order') ?>">Order</a>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "metode_pembayaran") ? 'active' : ''; ?>" href="<?= base_url('pembayaran') ?>">Pembayaran</a>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "user") ? 'active' : ''; ?>" href="<?= base_url('user') ?>">User</a>
                    <a class="collapse-item <?= ($this->uri->segment(1) == "role") ? 'active' : ''; ?>" href="<?= base_url('role') ?>">Role</a>
                </div>
            </div>
        </li>
    <?php } ?>
    <li class="nav-item <?= ($this->uri->segment(1) == 'home') ? 'active' : ''; ?>">
        <a class="nav-link " href="<?= base_url('home') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(2) == 'show') ? 'active' : ''; ?>">
        <a class="nav-link " href="<?= base_url('product/show') ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Produk</span></a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($this->uri->segment(2) == 'category') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-tags"></i>
            <span>Kategori</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih kategori:</h6>
                <?php $kategori = $this->m_category->getData(); ?>
                <?php foreach ($kategori as $key => $value) { ?>
                    <a class="collapse-item <?= ($this->uri->segment(3) == $value->id_kategori) ? 'active' : ''; ?>" href="<?= base_url('product/category/') . $value->id_kategori ?>"><?php echo $value->kategori ?></a>
                <?php } ?>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Kontak</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="">
            <i class="fas fa-fw fa-book"></i>
            <span>Tentang Kami</span></a>
    </li>
</ul>