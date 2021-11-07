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
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">Pesanan pelanggan
                                    <a href="<?= base_url('order') ?>" class="btn btn-danger btn-sm float-right ">Tutup</a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Penerima</th>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($datas as $row) {
                                            $count++;
                                        ?>
                                            <?php if ($row->id == $this->uri->segment(3)) { ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url('upload/product/') . $row->foto ?>">
                                                                <img class="rounded" width="80" src="<?php echo base_url('upload/product/') . $row->foto ?>">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?= $row->nama_penerima ?>(<?= $row->alamat ?>)<br>
                                                            <?= $row->telepon ?><br>
                                                            <?= $row->kota ?>,<?= $row->provinsi ?>,
                                                            <?= $row->kode_pos ?>
                                                        </td>
                                                        <td>
                                                            <?= $row->nama ?>
                                                        </td>
                                                        <td><?= $row->qty ?></td>
                                                        <td><?= $row->harga ?>(1 Produk)</td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">Pembayaran</h6>
                            </div>
                            <!-- Card Body -->
                            <form action="<?= base_url('order/update') ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-lg">
                                        <?php $count = 0;
                                        foreach ($datas as $row) {
                                            $count++;
                                        ?>
                                            <?php if ($row->id == $this->uri->segment(3)) { ?>
                                                <input type="text" name="id" value="<?= $row->id ?>">
                                                <input type="text" name="qty" value="<?= $row->qty ?>">
                                                <input type="text" name="produk_id" value="<?= $row->id_produk ?>">
                                            <?php } ?>
                                        <?php } ?>

                                        <div class="form-group">
                                            <div class="h3 mb-0 text-gray-800">Total Rp.
                                                <?= number_format($data->total) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Bank</label>
                                            <input class="form-control form-control-user" value="<?= $data->nama_bank ?> a/n <?= $data->atas_nama ?>" disabled="on">
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">No Rekening</label>
                                            <input class="form-control form-control-user" value="<?= $data->no_rek ?>" disabled="on">
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Status Pengiriman</label>
                                            <select name="status_pengiriman" class="form-control">
                                                <option value="<?= $data->status_pengiriman ?>"><?= $data->status_pengiriman ?></option>
                                                <option value="proses">Proses</option>
                                                <option value="dikirim">Dikirim</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">Status Pembayaran</label>
                                            <select name="status_pembayaran" class="form-control">
                                                <option value="<?= $data->status_pembayaran ?>"><?= $data->status_pembayaran ?></option>
                                                <option value="lunas">Lunas</option>
                                                <option value="belum">belum</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Status">No Resi</label>
                                            <input class="form-control form-control-user" name="no_resi" value="<?= $data->no_resi ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Bukti Bayar</label>
                                            <br>
                                            <td>
                                                <a href="<?php echo base_url('upload/bukti/') . $data->bukti_bayar ?>">
                                                    <img class="rounded" width="80" src="<?php echo base_url('upload/bukti/') . $data->bukti_bayar ?>">
                                                </a>
                                            </td>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-2 d-flex flex-row align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-success btn-block btn-sm">Proses</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>