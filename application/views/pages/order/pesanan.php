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
                    <!-- Border belum bayar -->
                    <div class="col-lg-12">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Konfirmasi</h6>
                        </div>
                        <div class="card mb-4 py-3 border-left-warning">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Penerima</th>
                                                <th>Pembayaran</th>
                                                <th>Pengiriman</th>
                                                <th>Proses</th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($data as $row) {
                                            
                                        ?>
                                            <?php if ($row->status_pembayaran != "lunas" && $row->status_pembayaran != "diterima") { ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?= ++$count ?>
                                                        </td>
                                                        <td>
                                                            <?= $row->nama_penerima ?>(<?= $row->alamat ?>)<br>
                                                            <?= $row->telepon ?><br>
                                                            <?= $row->kota ?>,<?= $row->provinsi ?>,
                                                            <?= $row->kode_pos ?>
                                                        </td>
                                                        <td><?= ucfirst($row->status_pembayaran) ?></td>
                                                        <td><?= ucfirst($row->status_pengiriman) ?></td>

                                                        <td>
                                                            <a href="<?= base_url('order/orderan_detail/' . $row->id) ?>" class="btn btn-light btn-sm">
                                                                <span class="text">Lihat</span>
                                                            </a>
                                                        </td>
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