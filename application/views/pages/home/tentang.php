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
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tentang</h1>
                                    </div>
                                    <div class="text-center">
                                        <img src="<?= base_url('upload/user/default.jpg') ?>" width="30%" alt="profil" class="img-profile rounded-circle">
                                    </div>
                                    <h3 class="profile-username text-center">Nur Bismi</h3>
                                    <p class="text-muted text-center">NIM : 181011401128</p>
                                    <hr>
                                    <p class="text-muted">
                                        E-Commerce sederhana ini dibuat untuk memenuhi tugas mata kuliah e-commerce
                                    </p>
                                    <hr>
                                </div>
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