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
                <h1 class="h3 mb-4 text-gray-800">Keranjang</h1>
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Keranjang</h6>
                    </div>
                    <form action="<?php echo site_url('shopping/ubah_cart') ?>" method="POST" name="frmShopping" enctype="multipart/form-data">
                        <?php if ($cart = $this->cart->contents()) { ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="tableCategory" width="100%" cellspacing="0">
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

                                                    <td><img class="rounded" width="50" src="<?php echo base_url() . 'upload/product/' . $item['gambar']; ?>" /></td>
                                                    <td><?php echo $item['name']; ?></td>
                                                    <td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
                                                    <td><input type="number" min="1" max="5" class="form-control input-sm" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>" /></td>
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
                                                        <button class='btn btn-sm btn-primary' type="submit">Ubah</button>
                                                        <a href="<?php echo base_url() ?>shopping/check_out" class='btn btn-sm btn-info'>Lanjut pembayaran</a>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>

                        <?php } else {

                            echo "<hr><h5><center><b> KERANJANG KOSONG </b></center></h5>";
                        }
                        ?>
                        <hr>
                        <center><a href="<?php echo base_url('home') ?>" class='btn btn-info '>Pergi Belanja</a></center>
                        <hr>
                    </form>
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
                    Anda yakin mau mengosongkan Keranjang?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-sm btn-info">Ya</button>
                </div>

            </form>
        </div>

    </div>
</div>
<!--End Modal-->