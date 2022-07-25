<div class="container mt-3">

    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <img src="<?= BASEURL; ?>/img/<?= $data['mhs']['gambar']; ?>" class="card-img-top" alt="...">
            <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nrp']; ?></h6>
            <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
            <p class="card-text"><?= $data['mhs']['email']; ?></p>
            <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
        </div>
    </div>


</div>