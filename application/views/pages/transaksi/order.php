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
                <h1 class="h3 mb-4 text-gray-800">Order</h1>
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableCategory" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($data as $row) {
                                    $count++;
                                ?>
                                    <tbody>
                                        <tr style="text-align:center">
                                            <td><?php echo $row->nama ?></td>
                                            <td><?php echo $row->alamat ?></td>
                                            <td><?php echo $row->telp ?></td>
                                            <td><?php echo $row->nama_produk ?></td>
                                            <td><?php echo $row->qty ?></td>
                                            <td><?php echo $row->harga ?></td>
                                            <td>
                                                <button class="btn btn-info btn-icon-split badge" data-toggle="modal" data-target="#delete<?php echo $row->id ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-reply"></i>
                                                    </span>
                                                    <span class="text">Confirm</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <h1 class="h3 mb-4 text-gray-800">Proses</h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableCategory" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Penerima</th>
                                        <th><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($info as $row) {
                                    $count++;
                                ?>
                                    <?php if ($row->status == "Proses") { ?>
                                        <tbody>
                                            <tr style="text-align:center">
                                                <td><?php echo $row->produk ?></td>
                                                <td><?php echo $row->harga ?></td>
                                                <td><?php echo $row->status ?></td>
                                                <td><?php echo $row->nama ?></td>
                                                <td>
                                                    <button class="btn btn-info btn-icon-split badge" data-toggle="modal" data-target="#update<?php echo $row->id ?>">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-reply"></i>
                                                        </span>
                                                        <span class="text">Confirm</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>


<?php $count = 0;
foreach ($data as $row) {
    $count++;
?>
    <!-- Modal Penilai -->
    <div class="modal fade" id="delete<?php echo $row->id ?>" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengiriman</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('order/add') ?>
                    <div class="form-group col-sm-8">
                        <div class="col-lg">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $row->user_id ?>"></input>
                                <input type="hidden" class="form-control" id="produk_id" name="produk_id" value="<?php echo $row->produk_id ?>">
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <label for="pesan">Pesan</label>
                                    <textarea type="text" class="form-control" id="pesan" name="pesan" placeholder="Pesan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Status">Status Pengiriman</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">- Status -</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Menunggu">Menunggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-sm btn-info">Ya</button>
                        </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php $count = 0;
foreach ($info as $row) {
    $count++;
?>
    <!-- Modal Penilai -->
    <div class="modal fade" id="update<?php echo $row->id ?>" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengiriman</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('order/update') ?>
                    <div class="form-group col-sm-8">
                        <div class="col-lg">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" value="<?php echo $row->id ?>"></input>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="Status">Status Pengiriman</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">- Status -</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-sm btn-info">Ya</button>
                        </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>