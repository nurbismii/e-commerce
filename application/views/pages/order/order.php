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
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Pembelian</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th></th>
                                                <th>Penerima</th>
                                                <th>Bukti Bayar</th>
                                                <th>Rincian</th>
                                                <th>Pesanan</th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($data as $row) {
                                            $count++;
                                        ?>
                                            <tbody>
                                                <tr>

                                                    <td><img class="rounded" width="80" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
                                                    <td>

                                                        <?= $row->nama_penerima ?>(<?= $row->alamat ?>)<br>
                                                        <?= $row->telepon ?><br>
                                                        <?= $row->kota ?>,<?= $row->provinsi ?>,
                                                        <?= $row->kode_pos ?>
                                                    </td>
                                                    <?php if (empty($row->bukti_bayar)) { ?>
                                                        <td>Belum ada</td>
                                                    <?php } else { ?>
                                                        <td>
                                                            <a href="">
                                                                <img class="rounded" width="80" src="<?php echo base_url('upload/bukti/') . $row->bukti_bayar ?>">
                                                            </a>
                                                        </td>
                                                    <?php } ?>
                                                    <td>
                                                        <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#konfirm<?php echo $row->id ?>">
                                                            <span class="text">Lihat</span>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="<?= base_url('order/bukti_bayar/' . $row->id)  ?>">
                                                            <span class="text">Bayar</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal rincian -->
<?php $count = 0;
foreach ($data as $row) { ?>
    <div class="modal fade" id="konfirm<?php echo $row->id ?>" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengiriman</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="user">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>" readonly>
                                    <p class="text-left"><?php echo $row->nama_penerima ?>(<?php echo $row->alamat ?>)<br>
                                        <?php echo $row->telepon ?><br>
                                        <?php echo $row->kota ?>,<?php echo $row->provinsi ?>,
                                        <?php echo $row->kode_pos ?><br>
                                        <hr>

                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th>Produk</th>
                                                    <td>:</td>
                                                    <td><?= $row->nama ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jumlah</th>
                                                    <td>:</td>
                                                    <td><?= $row->qty ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Pesanan</th>
                                                    <td>:</td>
                                                    <td><?= $row->tanggal ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <td><img class="rounded" width="100" width="200" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
                                    <hr>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <th>Estimasi</th>
                                                    <td>:</td>
                                                    <td><?= $row->berat ?><?= $row->satuan ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Estimasi</th>
                                                    <td>:</td>
                                                    <td><?= $row->estimasi ?> Hari</td>
                                                </tr>
                                                <tr>
                                                    <th>Ongkir</th>
                                                    <td>:</td>
                                                    <td><?php echo number_format($row->ongkir) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>:</td>
                                                    <td><?php echo number_format($row->subtotal) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>:</td>
                                                    <td><?php echo number_format($row->total) ?></td>
                                                </tr>
                                            </tbody>
                                            <br>
                                        </table>
                                    </div>
                                    <p>Resi akan terbit setelah melakukan pembayaran & Submit bukti</p>
                                </div>
                                <div class="form-group col-4">
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label for="Status">Bank</label>
                                            <input class="form-control form-control-user" value="<?= $row->nama_bank ?> a/n <?= $row->atas_nama ?>" disabled="on">

                                        </div>
                                        <div class="form-group">
                                            <label for="Status">No Rekening</label>
                                            <input class="form-control form-control-user" value="<?= $row->no_rek ?>" disabled="on">

                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Status Pembayaran</label>
                                            <input class="form-control form-control-user" value="<?php echo ucfirst($row->status_pembayaran) ?>" disabled="on">
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Status Pengiriman</label>
                                            <input class="form-control form-control-user" value="<?php echo ucfirst($row->status_pengiriman) ?>" disabled="on">
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Ekspedisi</label>
                                            <input class="form-control form-control-user" value="<?= strtoupper($row->ekspedisi) ?>" disabled="on">
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">No Resi</label>
                                            <input class="form-control form-control-user" value="<?= $row->no_resi ?>" disabled="on">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- modal rincian end -->