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
                    <div class="col-lg-12">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Order</h6>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Penerima</th>
                                                <th>Bukti Bayar</th>
                                                <th>Pengiriman</th>
                                                <th>Proses</th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($data as $row) { ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= ++$count ?></td>
                                                    <td>
                                                        <?= $row->nama_penerima ?>(<?= $row->alamat ?>)<br>
                                                        <?= $row->telepon ?><br>
                                                        <?= $row->kota ?>,<?= $row->provinsi ?>,
                                                        <?= $row->kode_pos ?>
                                                    </td>
                                                    <?php if ($row->bukti_bayar != "") { ?>
                                                        <td>
                                                            <a href="<?= base_url('upload/bukti/') . $row->bukti_bayar ?>">
                                                                <img class="rounded" width="80" src="<?php echo base_url('upload/bukti/') . $row->bukti_bayar ?>">
                                                            </a>
                                                        </td>
                                                        <td><?= ucfirst($row->status_pengiriman) ?></td>
                                                    <?php } else { ?>
                                                        <td>Menunggu</td>
                                                        <td>Menunggu</td>
                                                    <?php } ?>
                                                    <td>
                                                        <a class="btn btn-light btn-sm" href="<?= base_url('order/orderan_detail/' . $row->id) ?>">
                                                            <span class="text">Lihat</span>
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