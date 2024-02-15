<?= $this->extend('layout/auth'); ?>

<?= $this->section('auth'); ?>


<div class="">

  <section class="container">
    <div class="image-section">
      <div class="image_wrapper">
        <img src="<?= base_url('/image/shopping,png.jpg') ?>" alt="">
      </div>

      <div class="content-container">
        <h1 class="section-heading">Selamat Datang Di <span>Shoju</span></h1>
        <p class="section-paragraph">Belanja mudah dengan sekali sentuhan</p>
      </div>
    </div>

    <div class="form-section">
      <div class="form-wrapper">
        <div class="logo-container">
          <a href="<?= base_url('dashboard') ?>" class="logo-container">
            <img src="<?= base_url('/image/Store.png') ?>" alt="logo">
          </a>
        </div>

        <h2><?= lang('Auth.loginTitle') ?></h2>
        <p>Enter you credentials to access your account.</p>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="<?= url_to('login') ?>" method="post">
          <?= csrf_field() ?>

          <div class="input-container">
            <?php if ($config->validFields === ['email']) : ?>
              <div class="form-group">
                <label for="login"><?= lang('Auth.email') ?></label>
                <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.login') ?>
                </div>
              </div>
            <?php else : ?>

              <div class="form-group">
                <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.login') ?>
                </div>
              </div>
            <?php endif; ?>

            <div class="form-group">
              <label for="password"><?= lang('Auth.password') ?></label>
              <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
              <div class="invalid-feedback">
                <?= session('errors.password') ?>
              </div>
            </div>
          </div>


          <?php if ($config->allowRemembering) : ?>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                <?= lang('Auth.rememberMe') ?>
              </label>
            </div>
          <?php endif; ?>


          <button type="submit" class="login-btn"><?= lang('Auth.loginAction') ?></button>
        </form>


        <div>
          <?php if ($config->activeResetter) : ?>
            <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
          <?php endif; ?>
          <?php if ($config->allowRegistration) : ?>
            <p> <a class="regis-btn" href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
          <?php endif; ?>
        </div>

      </div>

    </div>
  </section>
</div>



<?= $this->endSection(); ?>