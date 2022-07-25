<div class="container mt-3">
    <div class="row text-center d-flex justify-content-center">
        <div class="col-lg-8 ">
            <form action="<?= BASEURL; ?>/user/cari" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control shadow-none" placeholder="Cari Mahasiswa" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" autocomplete="off">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari">
                        <i class="fa fa-search"></i>
                        Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>