<!-- Page Wrapper -->
<div id="wrapper">
    <?php
    if ($this->session->userdata('id_role') == 1)
        $this->load->view('_partials/sidebar');
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <?php echo $this->session->flashdata('msg') ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Alamat Pengiriman</h6>
                            </div>
                            <div class="card-body">
                                <?php foreach ($alamat as $penerima) { ?>
                                    <p>
                                        <b class="m-0 font-weight-bold text-dark">
                                            <?php echo $penerima->nama_penerima ?>
                                        </b>
                                        [<?php echo $penerima->alamat ?>]<br>
                                        <small><?php echo $penerima->telepon ?></small>
                                    </p>
                                    <p>
                                        <?php echo $penerima->alamat ?><br>
                                        <?php echo $penerima->kecamatan ?>,Kota
                                        <?php echo $penerima->kota ?>,
                                        <?php echo $penerima->kodepos ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="card-footer py-3">
                                <a href="<?= base_url('alamatpengiriman') ?>" class="btn btn-light btn-sm">Tambah alamat</a>
                            </div>
                        </div>
                        <!-- card body alamat pengiriman end -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Keranjang
                                </h6>
                            </div>
                            <?php if ($cart = $this->cart->contents()) { ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless" width="100%" cellspacing="0">
                                            <thead>
                                                <tr style="text-align:justify;">
                                                    <td width="2%">No</td>
                                                    <td width="10%">Gambar</td>
                                                    <td width="33%">Item</td>
                                                    <td width="15%">Harga</td>
                                                    <td width="10%">Qty</td>
                                                    <td width="10%">Jumlah</td>
                                                </tr>
                                            </thead>

                                            <?php

                                            $grand_total = 0;
                                            $i = 1;

                                            foreach ($cart as $item) :
                                                $grand_total = $grand_total + $item['subtotal'];
                                            ?>

                                                <tbody>
                                                    <tr style="text-align:justify">
                                                        <td><?php echo $i++; ?></td>

                                                        <td><img class="rounded" width="50" src="<?php echo base_url() . 'upload/product/' . $item['gambar']; ?>" /></td>
                                                        <td><?php echo $item['name']; ?></td>
                                                        <td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
                                                        <td><?php echo $item['qty']; ?></td>
                                                        <td><?php echo number_format($item['subtotal'], 0, ",", ".") ?></td>
                                                    <?php endforeach; ?>
                                                    </tr>
                                                </tbody>

                                        </table>
                                    </div>
                                </div>

                            <?php } else {

                                echo "<hr><h5><center><b> KERANJANG KOSONG </b></center></h5>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Ringkasan
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
                                <form class="user" action="<?php echo base_url('shopping/order') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-user" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id_user') ?>">
                                                <?php foreach ($alamat as $penerima) { ?>
                                                    <?php if ($penerima->user_id == $this->session->userdata('id_user')) { ?>
                                                        <input type="hidden" name="alamat_id" value="<?php echo $penerima->id ?>">
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">No Invoice</label>
                                                <input type="text" class="form-control form-control-user" name="invoice" id="invoice" value="INV/<?php echo random_string('numeric') ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-user" name="status_pembayaran" value="belum">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-user" name="status_pengiriman" value="menunggu pembayaran">
                                            </div>
                                            <div class="form-group">
                                                <div class="m-0 font-weight-bold text-dark text-right">
                                                    <p>Subtotal : <?php echo number_format($grand_total) ?></p>
                                                    <input type="hidden" class="form-control form-control-user" name="subtotal" value="<?php echo number_format($grand_total) ?>">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="m-0 font-weight-bold text-dark text-right">
                                                    <?php $total = $grand_total + $ekspedisi = 0 ?>
                                                    <p>Total Pembayaran : <?php echo number_format($total) ?></p>
                                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer py-2 text-center">
                                        <button type="submit" class="btn btn-success mr-2 btn-block">Buat Pesanan</button>
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