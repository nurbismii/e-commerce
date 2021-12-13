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
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <?php foreach ($produk as $row) { ?>
                                        <a href="<?php echo base_url('product/detail/') . $row->id_produk; ?>">
                                            <img class="card-img-top mySlides" height="300" src="<?php echo base_url('upload/product/') . $row->foto ?>" alt="Card image cap">
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <?php $count = 0;
                                    foreach ($produk as $row) {
                                        $count++;
                                        $rupiah = number_format($row->harga);
                                        $rupiah = str_replace(',', '.', $rupiah);
                                    ?>
                                        <?php if ($row->jumlah != "0") { ?>
                                            <div class="col-sm-3">
                                                <div class="card mb-4">
                                                    <?php echo form_open_multipart('shopping/tambah') ?>
                                                    <a href="<?php echo base_url('upload/product/') . $row->foto ?>">
                                                        <img class="card-img-top" height="220" src="<?php echo base_url('upload/product/') . $row->foto ?>" alt="Card image cap">
                                                    </a>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo substr($row->nama, 0, 17) ?></h5>
                                                        <p class="card-text small"><?php echo substr($row->deskripsi, 0, 22) ?>..<br>
                                                            <span class="card-text small">Stok <?php echo $row->jumlah ?></span><br>
                                                            <span class="card-text small">Berat <?php echo $row->berat ?><?= substr(strtolower($row->satuan), 0, 2) ?></span>
                                                        </p>
                                                        <p class="card-text">Rp <?php echo $rupiah ?></p>
                                                        <input type="hidden" name="id" value="<?php echo $row->id_produk ?>" />
                                                        <input type="hidden" name="nama" value="<?php echo $row->nama ?>" />
                                                        <input type="hidden" name="harga" value="<?php echo $row->harga ?>" />
                                                        <input type="hidden" name="berat" value="<?php echo $row->berat ?>" />
                                                        <input type="hidden" name="satuan" value="<?php echo $row->satuan ?>" />
                                                        <input type="hidden" name="foto" value="<?php echo $row->foto ?>" />
                                                        <input type="hidden" name="jumlah" value="1" />
                                                        <button type="submit" class="btn btn-success btn-sm btn-icon-split">
                                                            <span class="icon text-gray-100">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </span>
                                                            <span class="text">Keranjang</span>
                                                        </button>
                                                        <a href="<?php echo base_url('product/detail/') . $row->id_produk; ?>" class="btn btn-light btn-sm btn-icon-split">
                                                            <span class="icon text-gray-100">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Detail</span>
                                                        </a>
                                                    </div>
                                                    <?php echo form_close() ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
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
    <script>
        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) {
                slideIndex = 1
            }
            x[slideIndex - 1].style.display = "block";
            setTimeout(carousel, 5000); // Change image every 2 seconds
        }
    </script>
</body>

</html>