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
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-dark">Pesanan kamu</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th></th>
                                                <th>Penerima</th>
                                                <th>Produk</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>

                                                <td><img class="rounded" width="80" src="<?php echo base_url('upload/product/') . $data->foto ?>"></td>
                                                <td>

                                                    <?= $data->nama_penerima ?>(<?= $data->alamat ?>)<br>
                                                    <?= $data->telepon ?><br>
                                                    <?= $data->kota ?>,<?= $data->provinsi ?>,
                                                    <?= $data->kode_pos ?>
                                                </td>
                                                <td>
                                                    <?= $data->nama ?>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
                            </div>
                            <!-- Card Body -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-lg">
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
                                            <label for="">Bukti Bayar</label>
                                            <input type="file" class="form-control" name="userfile">
                                            <input type="hidden" class="form-control" name="id" value="<?= $data->id ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-2 d-flex flex-row align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-success btn-block btn-sm">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>