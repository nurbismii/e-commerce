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
            $("#tableProduct").DataTable({
                columnDefs: [{
                    type: 'date',
                    targets: [6]
                }],
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#tableCategory").DataTable({
                columnDefs: [{
                    type: 'date',
                    targets: [2]
                }],
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#tableUser").DataTable({
                columnDefs: [{
                    type: 'date',
                    targets: [4]
                }],
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#tableRole").DataTable({
                columnDefs: [{
                    type: 'date',
                    targets: [2]
                }],
            });
        });
    </script>

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
                var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
                // mengambil data ongkos kirim
                var total_berat = <?= $berat_total ?>;
                alert(id_kota_tujuan_terpilih);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('rajaongkir/paket') ?>",
                    data: 'ekspedisi' + ekspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                    success: function(paket) {
                        //console.log(paket);
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
                var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);
                // mengubah menjadi format rupiah 
                var reverse2 = total_bayar.toString().split('').reverse().join(''),
                    ribuan_total_bayar = reverse.match(/\d{1,3}/g);
                ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');
                $("#total_bayar").html("Rp. " + ribuan_total_bayar);
            });
        });
    </script>

    </body>

    </html>