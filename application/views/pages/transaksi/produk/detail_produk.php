<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-sm">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Detail Produk</h1>
                <?php echo $this->session->flashdata('msg') ?>
                <?php $harga = number_format($data->harga);
                $harga = str_replace(',', '.', $harga); ?>


                <div class="card bg-dark text-black">
                    <img width="100%" height="500" src="<?php echo base_url('upload/product/') . $data->foto ?>" alt="Card image">
                    <div class="card-img-overlay">
                        <h5 class="card-title"><?php echo $data->nama ?></h5>
                        <p class="card-text"><?php echo $data->deskripsi ?></p>
                        <p class="card-text">Rp <?php echo $harga ?></p>
                        <a href="<?= base_url('home') ?>" class="btn btn-light btn-sm btn-icon-split">
                            <span class="icon text-gray-600">
                                <i class="fas fa-undo"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>