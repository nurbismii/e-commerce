<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Pembayaran Baru
                                    <a href="<?= base_url('pembayaran') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <form class="user" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="Id_kategori">ID Pembayaran</label>
                                                <input type="text" class="form-control form-control-user" id="id_norek" name="id_norek" <?php echo form_error('id_norek') ? 'is-invalid' : '' ?> value="<?php echo $data->id_norek ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="bank">Bank</label>
                                                <input type="text" class="form-control form-control-user" id="bank" name="nama_bank" <?php echo form_error('nama_bank') ? 'is-invalid' : '' ?> value="<?php echo $data->nama_bank ?>"></input>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama_bank') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="rekening">No Rekening</label>
                                            <input type="text" class="form-control form-control-user" id="no_rek" name="no_rek" <?php echo form_error('no_rek') ? 'is-invalid' : '' ?> value="<?php echo $data->no_rek ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-3 text-right">
                                    <button type="submit" class="btn btn-success btn-sm mr-2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>