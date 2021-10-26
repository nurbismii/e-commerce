<!-- Page Wrapper -->
</style>
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Alamat
                                    <a href="<?= base_url('shopping/checkout') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <!-- Card Body -->
                            <form class="user" action="<?= base_url('alamatpengiriman/store') ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <!-- Nested Row within Card Body -->
                                    <div class="form-group col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input <?php echo form_error('nama_penerima') ?: '' ?> type="text" class="form-control form-control-user" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima">
                                                <input <?php echo form_error('user_id') ?: '' ?> type="hidden" class="form-control form-control-user" id="user_id" name="user_id" value="<?php echo $this->session->userdata('id_user') ?>">
                                            </div>
                                            <div class=" form-group col-md-8">
                                                <input <?php echo form_error('telepon') ?: '' ?> type="number" minlength="10" maxlength="13" class="form-control form-control-user" id="telepon" name="telepon" placeholder="Telepon"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Penerima">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" placeholder="Provinsi">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input <?php echo form_error('kota') ?: '' ?> type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="Kota">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control form-control-user" id="kelurahan" name="kelurahan" placeholder="kelurahan">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input <?php echo form_error('kodepos') ?: '' ?> type="number" class="form-control form-control-user" id="kodepos" name="kodepos" placeholder="Kode Pos">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right py-3">
                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
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