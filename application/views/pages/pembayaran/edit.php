<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Pembayaran

                </h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <div class="col-lg">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Id_kategori">ID Pembayaran</label>
                                    <input type="text" class="form-control" id="id_norek" name="id_norek" <?php echo form_error('id_norek') ? 'is-invalid' : '' ?> value="<?php echo $data->id_norek ?>">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="bank">Bank</label>
                                    <input type="text" class="form-control" id="bank" name="nama_bank" <?php echo form_error('nama_bank') ? 'is-invalid' : '' ?> value="<?php echo $data->nama_bank ?>"></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_bank') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rekening">No Rekening</label>
                                    <input type="text" class="form-control" id="no_rek" name="no_rek" <?php echo form_error('no_rek') ? 'is-invalid' : '' ?> value="<?php echo $data->no_rek ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>

                            <a href="<?= base_url('metode_pembayaran') ?>" class="btn btn-light 
                            ">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>