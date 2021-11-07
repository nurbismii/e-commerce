<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_partials/header') ?>
</head>

<body id="page-top">

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="<?= base_url('upload/user/default.jpg') ?>" width="30%" alt="profil" class="img-profile rounded-circle">
                                    </div>
                                    <h3 class="profile-username text-center"><?= $data->nama ?></h3>
                                    <p class="text-muted text-center">Member sejak : <?= substr($data->created_at, 0, 10) ?></p>
                                    <strong>
                                        <i class="fas fa-envelope mr-2"></i>
                                        Email
                                    </strong>
                                    <p class="text-muted">
                                        <?= $data->email ?>
                                    </p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-phone mr-2"></i>
                                        No Tlp
                                    </strong>
                                    <p class="text-muted">
                                        085282810040
                                    </p>
                                    <hr>
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-info btn-block btn-sm">Setting</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Rincian</th>
                                                    <th>Invoice</th>
                                                    <th>Penerima</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <?php $count = 0;
                                            foreach ($datas as $row) {
                                                $count++;
                                            ?>
                                                <?php if ($row->status_pengiriman == "diterima") { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a class="btn btn-dark btn-sm" href="<?= base_url('order/status_pesananku/' . $row->id) ?>">
                                                                    <span class="text">Lihat</span>
                                                                </a>
                                                            </td>
                                                            <td> <?= $row->no_invoice ?></td>
                                                            <td>
                                                                <?= $row->nama_penerima ?>(<?= $row->alamat ?>)<br>
                                                                <?= $row->telepon ?><br>
                                                                <?= $row->kota ?>,<?= $row->provinsi ?>,
                                                                <?= $row->kode_pos ?>
                                                            </td>
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
            <?php $this->load->view('_partials/footer') ?>
        </div>
    </div>
    <?php $this->load->view('_partials/js') ?>
</body>

</html>