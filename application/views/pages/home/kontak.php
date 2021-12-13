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
                    <?= $this->session->flashdata('msg') ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <form class="user" action="<?= base_url('kontak/add') ?>" method="POST">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Kontak</h1>
                                        </div>
                                        <form class="user">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" value="<?= $this->session->userdata('nama'); ?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control form-control-user" name="pesan" placeholder="Isi pesan" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" name="email" value="<?= $this->session->userdata('email') ?>">
                                            </div>

                                            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">

                                            <button type="submit" class="btn btn-outline-success btn-user btn-block">
                                                Kirim Pesan
                                            </button>
                                        </form>
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
    <?php $this->load->view('_partials/js') ?>
</body>

</html>