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
                <h1 class="h3 mb-4 text-gray-800">Periksa

                </h1>
                <?php
                $grand_total = 0;
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Belanja: Rp." . number_format($grand_total, 0, ",", ".") . "</h4>";
                ?>
                    <hr>
                    <form action="<?php echo base_url('shopping//proses_order') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-sm-8">
                            <div class="col-lg">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id_user') ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $this->session->userdata('nama') ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $this->session->userdata('email') ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="Telp">No Telp</label>
                                    <input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telp">
                                </div>
                                <div class="form-group  has-success has-feedback">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <button type="submit" class="btn btn-primary">Proses Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                    echo "<h5>Shopping Cart masih kosong</h5>";
                }
                ?>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>