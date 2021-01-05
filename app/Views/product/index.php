<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="text-center mt-5 ml-5">
    <h1>List Items</h1>
</div>
<div class="container">
    <div class="float-left">
        <form method="get" action="" class="form-group form-inline">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" name="keywords" placeholder="Nama...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary my-5 mb-5 my-sm-0" type="Submit">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <!--            <tr>-->
        <div class="row">



            <?php foreach ($items as $i) : ?>
                <a href="/cart/beli/<?= $i['id']; ?>" style="display:block">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <img src="/img/<?= $i['photo']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $i['name']; ?></h5>
                                <p class="card-text">Rp. <?= $i['price']; ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?= $this->endSection(); ?>