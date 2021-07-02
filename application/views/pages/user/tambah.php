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
                <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
                <?php echo form_open_multipart('user/add') ?>
                <div class="form-group col-sm-8">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap"></input>
                        </div>
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input <?php echo form_error('username') ?: '' ?> type="text" class="form-control" id="Username" name="username" placeholder="Username">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="Password">Password</label>
                                <input <?php echo form_error('password') ?: '' ?> type="password" class="form-control" id="Password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="Password2">Confirm Password</label>
                                <input <?php echo form_error('password2') ?: '' ?> type="password" class="form-control" id="password2" name="password2" placeholder="Confirm password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Username">Email</label>
                            <input <?php echo form_error('email') ?: '' ?> type="email" class="form-control" id="email" name="email" placeholder="contoh@mail.com">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="id_role" id="id_role">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="userfile" name="userfile">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-light">Hapus</button>
                        <a href="<?= base_url('user') ?>" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>