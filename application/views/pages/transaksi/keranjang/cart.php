<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Keranjang Belanja</h1>
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-cart_ align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
                            </div>
                            <!-- Card Body -->
                            <form action="<?php echo site_url('shopping/ubah_cart') ?>" method="POST" name="frmShopping" enctype="multipart/form-data">
                                <?php if ($cart = $this->cart->contents()) { ?>
                                    <div class="card-body">
                                        <table class="table table-borderless" width="100%" cellspacing="0">
                                            <thead>
                                                <tr style="text-align:justify;">
                                                    <td width="2%">No</td>
                                                    <td width="10%">Gambar</td>
                                                    <td width="33%">Item</td>
                                                    <td width="17%">Harga</td>
                                                    <td width="8%">Qty</td>
                                                    <td width="20%">Jumlah</td>
                                                    <td width="10%">Hapus</td>
                                                </tr>
                                            </thead>

                                            <?php
                                            
                                            $grand_total = 0;
                                            $i = 1;

                                            foreach ($cart as $item) :
                                                $grand_total = $grand_total + $item['subtotal'];
                                            ?>
                                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][id_produk]" value="<?php echo $item['id']; ?>" />
                                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>" />
                                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>" />
                                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>" />
                                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][gambar]" value="<?php echo $item['gambar']; ?>" />
                                                <input type="hidden" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" />
                                                <tbody>
                                                    <tr style="text-align:justify">
                                                        <td><?php echo $i++; ?></td>

                                                        <td><img class="img-responsive" width="50" src="<?php echo base_url() . 'upload/product/' . $item['gambar']; ?>" /></td>
                                                        <td><?php echo $item['name']; ?></td>
                                                        <td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
                                                        <td><input type="number" class="form-control input-sm" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" /></td>
                                                        <td><?php echo number_format($item['subtotal'], 0, ",", ".") ?></td>
                                                        <td><a href="<?php echo base_url() ?>shopping/hapus/<?php echo $item['rowid']; ?>" class="btn btn-sm btn-danger"><span class="icon text-gray-300">
                                                                    <i class="fas fa-trash"></i>
                                                                </span></a></td>
                                                    <?php endforeach; ?>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="bg-gray-300">
                                                        <td colspan="3"><b>Total Pembayaran: Rp <?php echo number_format($grand_total, 0, ",", "."); ?></b></td>
                                                        <td colspan="4" align="right">
                                                            <a data-toggle="modal" data-target="#myModal" class='btn btn-sm btn-danger' rel="noopener noreferrer">Kosongkan</a>
                                                            <button class='btn btn-sm btn-success' type="submit">Mengubah</button>
                                                            <a href="<?php echo base_url() ?>shopping/check_out" class='btn btn-sm btn-primary'>Lanjut pembayaran</a>
                                                    </tr>
                                                </tfoot>
                                        </table>
                                    </div>
                                <?php } else {
                                    echo "<center> Keranjang belanja masih kosong </center>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>

<!-- Modal Penilai -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="post" action="<?php echo base_url() ?>shopping/hapus/all">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin mau mengosongkan Shopping Cart?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-sm btn-light">Ya</button>
                </div>

            </form>
        </div>

    </div>
</div>
<!--End Modal-->