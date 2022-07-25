<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">
            <?php flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php if (isset($_SESSION['alreadyN'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p class="mb-0">NRP telah terdaftar</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php unset($_SESSION['alreadyN']); ?>
                </div>
            <?php elseif (isset($_SESSION['alreadyU'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p class="mb-0">Email telah terdaftar</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php unset($_SESSION['alreadyU']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary mb-4 modalTambah" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah Data Mahasiswa
            </button>
            <h3>Daftar Mahasiswa</h3>
            <div class="card">
                <ul class="list-group list-group-flush ">
                    <?php foreach ($data['mhs'] as $mhs) : ?>
                        <li class="list-group-item"><?= $mhs['nama']; ?>
                            <form action="<?= BASEURL; ?>/mahasiswa/delete" method="POST" class="float-end ms-1">
                                <input type="hidden" name="idhapus" value="<?= $mhs['id'];  ?>">
                                <button class="btn-sm badge bg-danger border-0" type="submit" name="hapus" onclick="return confirm('Yakin Ingin menghapus Data ?')">
                                    Hapus
                                </button>
                            </form>
                            <!-- <a href="<?= BASEURL; ?>/mahasiswa/delete/<?= $mhs['id']; ?>" class="float-end ms-1" onclick="return confirm('Yakin Ingin menghapus Data ?')">
                                <span class="badge bg-danger">Hapus</span>
                            </a> -->
                            <a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>" class="float-end ms-1 modalUbah" data-bs-toggle="modal" data-bs-target="#tambah" data-id="<?= $mhs['id']; ?>">
                                <span class="badge bg-warning">Edit</span>
                            </a>
                            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="float-end ms-1">
                                <span class="badge bg-primary">Detail</span>
                            </a>
                        </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group mb-1">
                            <label for="nama" class="form-label">Nama </label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group mb-1">
                            <label for="nrp" class="form-label">Nrp </label>
                            <input type="number" class="form-control" id="nrp" name="nrp">
                        </div>
                        <div class="form-group mb-1">
                            <label for="jurusan">Jurusan </label>
                            <select class="form-select px-1" aria-label="Default select example" id="jurusan" name="jurusan">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                                <option value="Teknik Farmasi">Teknik Farmasi</option>
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group mb-1">
                            <label for="file" class="form-label mb-0">Gambar </label>
                            <small class="d-flex flex-column mb-1">
                                <font class="text-danger">* Ekstensi Gambar Harus Jpg atau Png</font>
                                <font class="text-danger">* Ukuran gambar tidak boleh lebih dari 1 MB</font>
                            </small>
                            <input type="hidden" name="gambarLama" id="gambarLama">
                            <img src="" alt="" id="gambar1" width="180">
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/jpeg, image/png">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>