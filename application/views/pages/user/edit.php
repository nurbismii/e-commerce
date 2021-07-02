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
                <h1 class="h3 mb-4 text-gray-800">Edit user</h1>
                <?php echo $this->session->flashdata('msg'); ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <div class="col-lg">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Id_user">ID User</label>
                                    <input type="text" class="form-control" id="id_user" name="id_user" <?php echo form_error('id_user') ? 'is-invalid' : '' ?> value="<?php echo $data->id_user ?>" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" <?php echo form_error('nama') ? 'is-invalid' : '' ?> value="<?php echo $data->nama ?>"></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" <?php echo form_error('username') ? 'is-invalid' : '' ?> value="<?php echo $data->username ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" <?php echo form_error('password') ? 'is-invalid' : '' ?>required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Email</label>
                                <input type="text" class="form-control" id="email" name="email" <?php echo form_error('email') ? 'is-invalid' : '' ?> value="<?php echo $data->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="Foto">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <img width="50" src="<?php echo base_url('upload/user/') . $data->picture ?>">
                            <div class="form-group">
                                <input type=hidden name="foto_lama" value="<?php echo $data->picture ?>">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>

                            <a href="<?= base_url('user') ?>" class="btn btn-light">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>