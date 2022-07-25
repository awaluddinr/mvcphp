<div class="container mt-4">

    <div class="row mt-3">
        <div class="col-lg-6 mx-auto">
            <?php flasher::flash(); ?>
        </div>
    </div>


    <div class="row" style="min-height: 65vh;">
        <div class="col-lg-4 mx-auto my-auto">
            <form method="POST" action="<?= BASEURL; ?>/Log/addUser" class="p-3 rounded-2 " style="background-color: #1E2020 ;">
                <div class="mb-3 text-center">
                    <h4 class="text-white">REGISTRASI</h4>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Username</label>
                    <input type="text" class="form-control" id="username" name="user" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password</label>
                    <input type="password" class="form-control" id="password" name="pass">
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label text-white">Ulangi Password</label>
                    <input type="password" class="form-control" id="password2" name="pass2">
                </div>
                <div class="mb-1 text-center mt-3 py-2">
                    <button type="submit" class="btn btn-light">Submit</button>
                </div>
            </form>
        </div>
    </div>



</div>