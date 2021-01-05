<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h1 class="text-center mb-5">Konfirmasi Order</h1>
    <div class="card">
        <div class="card-header">List Barang</div>
        <div class="card-body">
            <!-- tampilkan pesan success -->
            <?php if (session()->getFlashdata('success') != null) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
            <?php } ?>
            <!-- selesai menampilkan pesan success -->
            <?php if (count($items) != 0) { // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: 
            ?>
                <div class="table-responsive">
                    <?php echo form_open('cart/update'); ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sub Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $key => $item) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><img src="<?php echo base_url('img/' . $item['photo']); ?>" width="100px"></td>
                                    <td><?php echo $item['quantity']; ?></td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                    <td>Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                            <a href="<?php echo base_url('cart/remove/' . $item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?')"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="5" class="text-right">Jumlah</td>
                                <td>Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>

                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card">
        <div class="row">
            <div class="col">
                <div class="card my-3 ml-5" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nama : <?= $nama; ?></h5>
                                <p class="card-text">No Hp : <?= $hp; ?></p>
                                <p class="card-text">Alamat : <?= $alamat; ?></p>
                                <p class="card-text">Kecamatan : <?= $kecamatan; ?></p>
                                <p class="card-text">Kota : <?= $kota; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="/order/save" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="hp" name="hp" value="<?= $hp; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="kecamatan" name="kecamatan" value="<?= $kecamatan; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="kota" name="kota" value="<?= $kota; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/cart/form" type="button" class="btn btn-success">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection(); ?>