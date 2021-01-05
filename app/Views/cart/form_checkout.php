<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h1 class="text-center mb-5">Form Beli</h1>
    <div class="card">
        <div class="card-header">Silahkan isi data-data berikut</div>
        <div class="card-body">
            <form action="/order/confirmation" method="post" enctype="m ultipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hp" name="hp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Kota Tujuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kota" name="kota">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/cart" type="button" class="btn btn-success">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>