<div class="container mt-4">

    <div class="row" style="min-height: 65vh;">
        <div class="col-lg-4 mx-auto my-auto">
            <form method="POST" class="p-3 rounded-2 " style="background-color: #1E2020 ;" action="<?= BASEURL; ?>/Log/masuk">
                <div class="mb-3 text-center">
                    <h4 class="text-white">LOGIN</h4>
                </div>
                <!-- pesan kesalahan -->
                <div class="mb-0">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <p><?= $_SESSION['error'] ?></p>
                            <?php unset($_SESSION['error']); ?>
                        </div>
                    <?php elseif (isset($_SESSION['false'])) : ?>
                        <div class="alert alert-danger">
                            <p><?= $_SESSION['false']; ?></p>
                            <?php unset($_SESSION['false']); ?>
                        </div>
                    <?php elseif (isset($_SESSION['passFail'])) : ?>
                        <div class="alert alert-danger">
                            <p><?= $_SESSION['passFail']; ?></p>
                            <?php unset($_SESSION['passFail']); ?>
                        </div>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="username" class="form-label text-white">Username</label>
                <input type="text" class="form-control" id="username" name="user" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control" id="password" name="pass">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label text-white" for="remember">Remember Me</label>
            </div>
            <div class="mb-1 text-center mt-3 py-2">
                <button type="submit" class="btn btn-light">Submit</button>
            </div>
            </form>
        </div>
    </div>



</div>