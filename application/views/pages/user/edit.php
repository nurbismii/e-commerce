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
                                <h6 class="m-0 font-weight-bold text-dark">Edit User
                                    <a href="<?= base_url('user') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <form class="user" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="Id_user">ID User</label>
                                                <input type="text" class="form-control form-control-user" id="id_user" name="id_user" <?php echo form_error('id_user') ? 'is-invalid' : '' ?> value="<?php echo $data->id_user ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="Nama">Nama</label>
                                                <input type="text" class="form-control form-control-user" id="nama" name="nama" <?php echo form_error('nama') ? 'is-invalid' : '' ?> value="<?php echo $data->nama ?>"></input>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control form-control-user" id="username" name="username" <?php echo form_error('username') ? 'is-invalid' : '' ?> value="<?php echo $data->username ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-user" id="password" name="password" <?php echo form_error('password') ? 'is-invalid' : '' ?>required>
                                            <?php echo $this->session->flashdata('msg'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Email</label>
                                            <input type="email" class="form-control form-control-user" id="email" name="email" <?php echo form_error('email') ? 'is-invalid' : '' ?> value="<?php echo $data->email ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Foto">Foto</label>
                                            <input type="file" class="form-control form-control-user" id="userfile" name="userfile">
                                        </div>
                                        <img width="70" src="<?php echo base_url('upload/user/') . $data->picture ?>">
                                        <div class="form-group">
                                            <input type=hidden name="foto_lama" value="<?php echo $data->picture ?>">
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