<?= $this->extend('layout/auth'); ?>
<?= $this->section('auth'); ?>




<section class="container">
    <div class="image-section">
        <div class="image_wrapper">
            <img src="<?= base_url('/image/cloath.jpg') ?>" alt="">
        </div>

        <div class="content-container">
            <h1 class="section-heading">Selamat Datang Di <span>Shoju</span></h1>
            <p class="section-paragraph">Belanja mudah dengan sekali sentuhan</p>
        </div>
    </div>

    <div class="form-section">
        <div class="form-wrapper">
            <div class="logo-container">
                <a href="#" class="logo-container">
                    <img src="<?= base_url('/image/register.png') ?>" alt="logo">
                </a>
            </div>

            <h2><?= lang('Auth.register') ?></h2>
            <p>Enter you credentials to create your account.</p>
            <?= view('Myth\Auth\Views\_message_block') ?>

            <div class="input-container">
                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="email"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </div>

                    <div class="form-group">
                        <label for="username"><?= lang('Auth.username') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </div>

                    <div class="form-group">
                        <label for="password"><?= lang('Auth.password') ?></label>
                        <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    </div>

                    <button type="submit" class="signup-btn"><?= lang('Auth.register') ?></button>
                </form>
            </div>


            <div>
                <span>you have account?</span>
                <a class="regis-btn" href="login">Login</a>
            </div>

        </div>
    </div>
</section>
<script>
    function goBack() {
        window.history.back();
    }
</script>

<?= $this->endSection(); ?>