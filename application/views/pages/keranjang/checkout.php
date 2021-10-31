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
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Keranjang
                                    <a href="<?= base_url('shopping/cart') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <?php if ($cart = $this->cart->contents()) { ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless" width="100%" cellspacing="0">
                                            <thead>
                                                <tr style="text-align:justify;">
                                                    <td width="2%">No</td>
                                                    <td width="15%">Gambar</td>
                                                    <td width="33%">Item</td>
                                                    <td width="10%">Harga</td>
                                                    <td width="8%">Berat</td>
                                                    <td width="8%">Qty</td>
                                                    <td width="11%">Total Harga</td>
                                                    <td width="18%">Total Berat</td>

                                                </tr>
                                            </thead>
                                            <?php

                                            $grand_total = 0;
                                            $berat_total = 0;
                                            $tot_berat = 0;
                                            $i = 1;

                                            foreach ($cart as $item) :

                                                $grand_total = $grand_total + $item['subtotal'];
                                                $berat_total = $item['berat'] * $item['qty'];
                                                $tot_berat = $tot_berat + $berat_total;

                                            ?>
                                                <tbody>
                                                    <tr style="text-align:justify">
                                                        <td><?php echo $i++; ?></td>

                                                        <td><img class="rounded" height="80" width="100" src="<?php echo base_url() . 'upload/product/' . $item['gambar']; ?>" /></td>
                                                        <td><?php echo $item['name']; ?></td>
                                                        <td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
                                                        <td><?php echo number_format($item['berat'], 0, ",", ".") ?></td>
                                                        <td><?= $item['qty']; ?></td>
                                                        <td><?php echo number_format($item['subtotal'], 0, ",", ".") ?></td>
                                                        <td><?= $berat_total ?><?php echo strtolower(substr($item['satuan'], 0, 2)) ?></td>

                                                    <?php endforeach; ?>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="bg-gray-100">
                                                        <td colspan="9" style="text-align: right;">
                                                            <b>Total : Rp <?php echo number_format($grand_total, 0, ",", "."); ?></b>
                                                        </td>
                                                    </tr>
                                                </tfoot>

                                        </table>
                                    </div>
                                </div>
                            <?php } else {
                                echo "<hr><h5><center><b> KERANJANG KOSONG </b></center></h5>";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- end keranjang -->
                    <div class="col-lg-12">
                        <?php echo $this->session->flashdata('msg') ?>
                        <!-- card body alamat pengiriman end -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Tujuan</h6>
                            </div>
                            <?php if ($cart = $this->cart->contents()) { ?>
                                <?php
                                $grand_total = 0;
                                if ($cart = $this->cart->contents()) {
                                    foreach ($cart as $item) {
                                        $grand_total = $grand_total + $item['subtotal'];
                                    } ?>
                                    <form action="<?php echo base_url('shopping/order') ?>" method="POST" enctype="multipart/form-data">
                                        <!-- Nested Row within Card Body -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-8">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="nama_peneriam">Nama Penerima</label>
                                                            <input type="text" class="form-control form-control-user" name="nama_penerima">
                                                        </div>
                                                        <div class=" form-group col-md-6">
                                                            <label for="telepon">Telepon</label>
                                                            <input type="number" class="form-control" name="telepon"></input>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="Provinsi">Provinsi</label>
                                                            <select class="form-control form-control-user" name="provinsi"></select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="Kota">Kota</label>
                                                            <select class="form-control form-control-user" name="kota"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="ekspedisi">Ekspedisi</label>
                                                            <select class="form-control form-control-user" name="ekspedisi"></select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Jasa Layanan</label>
                                                            <select class="form-control form-control-user" name="paket"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label for="Alamat">Alamat Penerima</label>
                                                            <input type="text" class="form-control form-control-user" name="alamat">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Kode Pos</label>
                                                            <input class="form-control form-control-user" name="kodepos"></input>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <div class="card shadow mb-4">
                                                        <div class="form-group col-sm-12">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control form-control-user" name="user_id" id="user_id" value="<?= $this->session->userdata('id_user') ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">No Invoice</label>
                                                                <input type="text" class="form-control form-control-user" name="invoice" id="invoice" value="INV/<?php echo random_string('numeric') ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Metode Pembayaran</label>
                                                                <select id="pembayaran_id" name="pembayaran_id" class="form-control" required>
                                                                    <?php foreach ($pembayaran as $rek) { ?>
                                                                        <option value="<?= $rek->id_norek ?>"><?= $rek->nama_bank ?></option>
                                                                    <?php  } ?>
                                                                </select>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless" width="100%" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="text-left">Subtotal</th>
                                                                            <td class="text-right">Rp.<?= number_format($grand_total) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="text-left">Ongkir</th>
                                                                            <td class="text-right" id="ongkir"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="text-left">Berat</th>
                                                                            <td class="text-right"><?= $tot_berat ?>gr</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="text-left">Total Bayar</th>
                                                                            <td class="text-right" id="total_bayar"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>


                                                            <!-- Simpan transaksi -->
                                                            <input type="hidden" name="status_pembayaran" value="belum">
                                                            <input type="hidden" name="status_pengiriman" value="menunggu pembayaran">
                                                            <input type="hidden" name="ongkir">
                                                            <input type="hidden" name="estimasi">
                                                            <input type="hidden" name="berat" value="<?= $berat_total ?>">
                                                            <input type="hidden" name="subtotal" value="<?= $grand_total ?>">
                                                            <input type="hidden" name="total_bayar">
                                                            <!-- end simpan transaksi -->

                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-success mr-2 btn-block">Buat Pesanan</button>
                                                </div>

                                            <?php } else {
                                            echo "<hr><center><h5>Tidak ada ringkasan</h5></center><hr>";
                                        } ?>

                                            </div>
                                    </form>
                                <?php } else {
                                echo "<hr><center><b> Isi keranjang tidak ada </b></center><hr>";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>






<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>


<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(provinces) {
                //console.log(provinces);
                $("select[name=provinsi]").html(provinces);
            }
        });

        $("select[name=provinsi]").on("change", function() {
            var provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + provinsi_terpilih,
                success: function(cities) {
                    //console.log(cities);
                    $("select[name=kota]").html(cities);
                }
            });
        });
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/ekspedisi') ?>",
                success: function(ekspedisi) {
                    //console.log(cities);
                    $("select[name=ekspedisi]").html(ekspedisi);
                }
            });
        });

        $("select[name=ekspedisi]").on("change", function() {
            //mendapatkan ekspedisi terpilih
            var ekspedisi_terpilih = $("select[name=ekspedisi]").val()
            //mendapatkan id kota tujuan terpilih
            var id_kota = $("option:selected", "select[name=kota]").attr('id_kota');
            // mengambil data ongkos kirim
            var total_berat = <?= $tot_berat ?>;
            //alert(ekspedisi_terpilih);
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: '&ekspedisi=' + ekspedisi_terpilih + '&id_kota=' + id_kota + '&berat=' + total_berat,
                success: function(paket) {
                    //console.log(id_kota);
                    $("select[name=paket]").html(paket);
                }
            });
        });
        //nama paket
        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var ongkir = $("option:selected", this).attr('ongkir');
            // mengubah menjadi format rupiah 
            var reverse = ongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
            $("#ongkir").html("Rp. " + ribuan_ongkir);
            //menghitung total bayar
            var total_bayar = parseInt(<?= $grand_total ?>) + parseInt(ongkir);
            // mengubah menjadi format rupiah
            var reverse2 = total_bayar.toString().split('').reverse().join(''),
                ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
            ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');
            $("#total_bayar").html("Rp. " + ribuan_total_bayar);

            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(ongkir);
            $("input[name=total_bayar]").val(total_bayar);
        });
    });
</script>


</body>

</html>