<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12">
            <?php if (isset($_SESSION['not'])) : ?>
                <div class="card border-0">
                    <h1 class="text-center"><?= $_SESSION['not']; ?></h1>
                    <?php unset($_SESSION['not']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>