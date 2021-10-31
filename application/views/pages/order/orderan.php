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
                    <!-- Border Left Utilities -->
                    <div class="col-lg-6">
                        <div class="card mb-4 py-3 border-left-warning">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Pembayaran</th>
                                                <th>Rincian</th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($data as $row) {
                                            $count++;
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><img class="rounded" width="80" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
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
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4 py-3 border-left-success">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Bukti Bayar</th>
                                                <th>Rincian</th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($data as $row) {
                                            $count++;
                                        ?>
                                            <tbody>
                                                <tr>

                                                    <td><img class="rounded" width="80" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
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
                <form action="<?= base_url('order/update') ?>" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8">
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
                                    <td><img class="rounded" width="100" width="200" src="<?php echo base_url('upload/bukti/') . $row->bukti_bayar ?>"></td>
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
                                            <select name="status_pembayaran" class="form-control">
                                                <option value=""><?= $row->status_pembayaran ?></option>
                                                <option value="lunas">Lunas</option>
                                                <option value="belum">Belum</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Status Pengiriman</label>
                                            <select name="status_pengiriman" class="form-control">
                                                <option value=""><?= $row->status_pengiriman ?></option>
                                                <option value="dikirim">Dikirim</option>
                                                <option value="proses">Proses</option>
                                                <option value="tertunda">tertunda</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Ekspedisi</label>
                                            <input class="form-control form-control-user" value="<?= strtoupper($row->ekspedisi) ?>" disabled="on">
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">No Resi</label>
                                            <input class="form-control form-control-user" name="no_resi">
                                        </div>

                                        <!-- Simpan data -->
                                        <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                        <input type="hidden" name="produk_id" value="<?php echo $row->produk ?>">
                                        <input type="hidden" name="qty" value="<?php echo $row->qty ?>">
                                        <!-- -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-light">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- modal rincian end -->