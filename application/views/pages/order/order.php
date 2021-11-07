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
                                <h6 class="m-0 font-weight-bold text-dark">Pesanan kamu</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Penerima</th>
                                                <th></th>
                                                <th>Bukti Transfer</th>
                                                <th>Ekspedisi</th>
                                                <th>Jasa Layanan</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($data as $row) {
                                            $count++;
                                        ?>
                                            <?php if ($row->status_pengiriman != "diterima") { ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?= $row->nama_penerima ?>(<?= $row->alamat ?>)<br>
                                                            <?= $row->telepon ?><br>
                                                            <?= $row->kota ?>,<?= $row->provinsi ?>,
                                                            <?= $row->kode_pos ?>
                                                        </td>
                                                        <?php if (empty($row->bukti_bayar)) { ?>
                                                            <td>
                                                                <a class="btn btn-success btn-sm" href="<?= base_url('order/bukti_bayar/' . $row->id)  ?>">
                                                                    <span class="text">Bayar</span>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <a class="btn btn-light btn-sm" href="<?= base_url('order/status_pesananku/' . $row->id) ?>">
                                                                    <span class="text">Lihat</span>
                                                                </a>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if (empty($row->bukti_bayar)) { ?>
                                                            <td>Belum ada</td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <a href="<?= base_url('upload/bukti/') . $row->bukti_bayar ?>">
                                                                    <img class="rounded" width="80" src="<?php echo base_url('upload/bukti/') . $row->bukti_bayar ?>">
                                                                </a>
                                                            </td>
                                                        <?php } ?>
                                                        <td><?= strtoupper($row->ekspedisi) ?></td>
                                                        <td><?= strtoupper($row->jasa_layanan) ?></td>
                                                        <td>Rp.<?= number_format($row->total) ?></td>

                                                    </tr>
                                                </tbody>
                                            <?php } ?>
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