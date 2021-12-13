<nav class="navbar navbar-expand-lg navbar-light bg-light topbar mb-4 static-top shadow">

    <?php if (($this->session->userdata('id_role') == 2) || ($this->session->userdata('id_role') == "")) { ?>

        <a class="navbar-brand" href="<?= base_url('home') ?>">D'fiza Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link <?= ($this->uri->segment(2) == "produk") ? 'active' : ''; ?>" href="<?= base_url('home/produk') ?>">Produk</a>
                <a class="nav-item nav-link <?= ($this->uri->segment(2) == "kontak") ? 'active' : ''; ?>" href="<?= base_url('home/kontak') ?>">Kontak</a>
                <a class="nav-item nav-link <?= ($this->uri->segment(2) == "tentang") ? 'active' : ''; ?>" href="<?= base_url('home/tentang') ?>">Tentang</a>
            </div>
        </div>

        <form class="form-inline my-2 my-lg-0" action="<?= base_url('home/cari') ?>" method="GET">
            <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

    <?php } ?>
    <!-- Topbar Navbar -->

    <ul class="navbar-nav ml-auto">

        <?php if (($this->session->userdata('id_role') == 2) || ($this->session->userdata('id_role') == "")) { ?>
            <li class="nav-item dropdown no-arrow mx-1">
                <?php
                $cart = $this->cart->contents();
                $jml_item = 0;
                foreach ($cart as $key => $val) {
                    $jml_item =  $jml_item + $val['qty'];
                }

                ?>

                <a class="nav-link dropdown-toggle" href="<?= base_url('home') ?>" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a class="dropdown-item text-center text-gray-800" href="<?= base_url('shopping/cart') ?>">Lihat</a>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
        <?php } ?>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if (!$this->session->userdata('nama')) { ?>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        LOGIN
                    </span>
                <?php } else { ?>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php echo $this->session->userdata('nama') ?>
                    </span>
                    <img class="img-profile rounded-circle" src="<?php echo base_url('upload/user/' . $this->session->userdata('picture')); ?>">
                <?php } ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if (!$this->session->userdata('nama')) { ?>
                    <a class="dropdown-item" href="<?= base_url('auth/loginshop') ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Login
                    </a>
                <?php } else { ?>
                    <a class="dropdown-item" href="<?= base_url('order/pesananku') ?>">
                        <i class="fas fa-handshake fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pesanan saya
                    </a>
                    <a class="dropdown-item" href="<?= base_url('profile') ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
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
                <?php } ?>
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
                <button class="btn btn-light btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-secondary btn-sm" href="<?= site_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>