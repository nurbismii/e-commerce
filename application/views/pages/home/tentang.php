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
                                        <img src="<?= base_url('upload/user/default.jpg') ?>" width="30%" alt="profil" class="img-profile rounded-circle">
                                    </div>
                                    <h3 class="profile-username text-center">Nur Bismi</h3>
                                    <p class="text-muted text-center">Member sejak : 14 Oktober 2021</p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-map-marker mr-2"></i>
                                        Alamat
                                    </strong>
                                    <p class="text-muted">
                                        JL. Kebayoran Residence Cluster Kebayoran Villas Blok E No 07
                                    </p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-envelope mr-2"></i>
                                        Email
                                    </strong>
                                    <p class="text-muted">
                                        nurbismi74@gmail.com
                                    </p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-phone mr-2"></i>
                                        No Tlp
                                    </strong>
                                    <p class="text-muted">
                                        085282810040
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