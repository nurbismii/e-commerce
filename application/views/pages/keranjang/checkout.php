<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Checkout
                                    <a href="<?= base_url('shopping/cart') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <?php
                            $grand_total = 0;
                            if ($cart = $this->cart->contents()) {
                                foreach ($cart as $item) {
                                    $grand_total = $grand_total + $item['subtotal'];
                                }
                            ?>
                                <form class="user" action="<?php echo base_url('shopping//proses_order') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-user" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id_user') ?>">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control form-control-user" name="nama" id="nama" value="<?php echo $this->session->userdata('nama') ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">email</label>
                                                    <input type="email" class="form-control form-control-user" name="email" id="email" value="<?php echo $this->session->userdata('email') ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat">
                                            </div>
                                            <div class="form-group">
                                                <label for="Telp">No Telp</label>
                                                <input type="tel" class="form-control form-control-user" name="telp" id="telp" placeholder="No Telp">
                                                <input type="hidden" class="form-control" name="status" value="Tertunda">
                                            </div>
                                            <div class="form-group  has-success has-feedback">
                                                <div class="col-xs-offset-3 col-xs-9">
                                                    <p class="text-right">Total Belanja : <?php echo number_format($grand_total) ?></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer py-2 text-center">
                                        <button type="submit" class="btn btn-success mr-2 btn-block">Checkout</button>
                                    </div>
                                </form>
                            <?php
                            } else {
                                echo "<h5>Shopping Cart masih kosong</h5>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>