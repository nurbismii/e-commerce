<nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form action="<?= base_url('dashboard/home') ?>" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input name="keyword" type="text" class="form-control bg-light border-0 small" placeholder="Cari produk kamu" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        <li class="nav-item dropdown no-arrow mx-1">
            <?php
            $cart = $this->cart->contents();
            $jml_item = 0;
            foreach ($cart as $key => $val) {
                $jml_item =  $jml_item + $val['qty'];
            }

            ?>

            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge badge-danger badge-counter"><?= $jml_item ?></span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Keranjang
                </h6>
                <?php if ($cart = $this->cart->contents()) { ?>
                    <?php
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item) :

                        $grand_total = $grand_total + $item['subtotal'];
                    ?>
                        <a class="dropdown-item d-flex align-items-center" href="#">

                            <div class="dropdown-list-image mr-3">

                                <img class="rounded" height="50" src="<?php echo base_url() . 'upload/product/' . $item['gambar']; ?>" alt="...">
                                <div class="small text-gray-600"><?php echo $i++ ?></div>
                            </div>
                            <div class="font-weight-bold">

                                <div class="text-truncate"><?php echo substr($item['name'], 0, 15); ?></div>
                                <div class="small text-gray-800">Rp. <?php echo number_format($item['price'], 0, ",", "."); ?></div>

                                <div class="small text-gray-800">Qty : <?php echo $item['qty']; ?></div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php } else {
                    echo "<h6><b><center> Keranjang kosong </center></b></h6>";
                }
                ?>
                <a class="dropdown-item text-center text-gray-800" href="<?= base_url('shopping/tampil_cart') ?>">Cek Keranjang</a>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama') ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('upload/user/' . $this->session->userdata('picture')); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Kelola Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin logout.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-info" href="<?= site_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>