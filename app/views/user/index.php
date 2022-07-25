<div class="container mt-3">

    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($_SESSION['not'])) : ?>
                <p><?= $_SESSION['not']; ?></p>
                <?php unset($_SESSION['not']); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex flex-wrap">
            <?php foreach ($data['mahasiswa'] as $mhs) : ?>
                <div class="card mb-3 me-3" style="width:350px ;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= BASEURL; ?>/img/<?= $mhs['gambar']; ?>" class="img-fluid rounded-start" alt="" style="height: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title mb-0"><?= $mhs['nama']; ?></h5>
                                <p class="card-text mb-0"><?= $mhs['nrp']; ?></p>
                                <p class="card-text mb-0"><?= $mhs['jurusan']; ?></p>
                                <p class="card-text mb-0"><small class="text-muted"><?= $mhs['email']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



</div>