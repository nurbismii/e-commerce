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
                <div class="text-center">
                    <div class="error mx-auto" data-text="Hi">Hi</div>
                    <p class="lead text-gray-800 mb-5">Selamat Datang!</p>
                    <p class="text-gray-500 mb-0">Silahkan lihat keperluan kamu</p>
                    <a href="<?= base_url('product/show') ?>">&larr; Pergi belanja </a>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>