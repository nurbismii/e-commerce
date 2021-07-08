<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                        </div>
                        <?php echo form_open('auth/register') ?>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="fullname" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">

                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="email">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-user btn-block">
                            Daftar Akun
                        </button>
                        <?php echo form_close() ?>
                        <hr>
                        <?php echo validation_errors(); ?>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth') ?>">Sudah memiliki akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>