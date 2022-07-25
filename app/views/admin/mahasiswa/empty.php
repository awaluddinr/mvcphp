<div class="container">

    <div class="row mt-3">
        <div class="col-lg-6">
            <?php flasher::flash(); ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah Data Mahasiswa
            </button>
            <h3>Daftar Mahasiswa</h3>
            <div class="card">
                <h1 class="text-danger text-center">Data Kosong !!!</h1>
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