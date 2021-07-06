<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Halaman Masuk!</h1>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                                <?php echo form_open('auth/login') ?>
                                <div class="form-group">
                                    <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="Username..">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                </div>
                                <button type="submit" name="login" class="btn btn-info btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                                <?php echo $this->session->flashdata('failed') ?>
                                <?php echo form_close() ?>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/register') ?>">Buat Akun!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>