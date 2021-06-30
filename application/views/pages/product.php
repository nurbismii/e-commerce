<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Produk
                    <button data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Produk</span>
                    </button>
                </h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableProduct" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Produk</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Produk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group col-sm-12">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="id_product">ID Produk</label>
                                <input type="text" class="form-control" id="id_product" name="id_product" placeholder="Contoh B001">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk"></input>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi produk">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Produk</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="10">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="150000">
                            </div>
                            <div class="form-group">
                                <label for="harga">Kategori</label>
                                <select name="kategori" id="kategori">
                                    <option value="1">Baju</option>
                                    <option value="2">Celana</option>
                                    <option value="3">Sepatu</option>
                                    <option value="4">Sweater</option>
                                    <option value="5">Kacamata</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <button type="reset" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ends add modal -->