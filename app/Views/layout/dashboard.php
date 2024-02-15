<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoju</title>
    <link rel="stylesheet" href="<?= base_url('/scss/main.css'); ?>">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>

    <nav class="navbar">

        <div class="logo" style="margin:auto;">
            <i class="fa-solid fa-font-owesome"></i>
            <a href="#">SHOJU</a>
        </div>

        <!-- SEARCH BAR -->

        <!-- SEARCH BAR SELESAI -->

        <div class="menu">

            <?php if (logged_in()) : ?>
                <?php if (in_groups('admin')) : ?>
                    <!-- Menu untuk Admin -->
                    <div class="menu-links">
                        <a href="<?= base_url('Inventory') ?>">Inventory <i class="fa-solid fa-warehouse"></i></a>
                        <a href="<?= base_url('Masuk') ?>">Stock In <i class="fa-solid fa-boxes-stacked"></i></a>
                        <a href="<?= base_url('Keluar') ?>">Order Katalog <i class="fa-solid fa-truck-moving"></i></a>
                    </div>
                <?php elseif (in_groups('user')) : ?>
                    <!-- Menu untuk User -->
                    <div class="menu-links">
                        <a href="<?= base_url('dashboard') ?>">Home <i class="i-home fi fi-rr-home"></i></a>
                        <a href="<?= base_url('katalog') ?>">Belanja <i class=" i-belanja fi fi-rr-shopping-bag "></i></a>
                        <a href="<?= base_url('transaksi') ?>">Transaksi <i class="i-keranjang fi fi-rr-shopping-cart"></i></a>
                        <a href="<?= base_url('about') ?>">About <i class="i-about fi fi-rr-interrogation"></i></a>
                    </div>



                <?php endif; ?>

                <div class="profil">
                    <div class="profil-u">
                     <a href="<?= base_url('profile')?>"><?= user()->username; ?></a>
                    </div>
                </div>
                <div class="menu">
                    <a href="<?= base_url('/logout') ?>"><button class="log-in">Logout</button></a>
                </div>
            <?php else : ?>
                <!-- Menu untuk Pengunjung (tidak ada yang login) -->
                <div class="menu-links">
                    <a href="<?= base_url('dashboard') ?>">Home <i class="i-home fi fi-rr-home"></i></a>
                    <a href="<?= base_url('katalog') ?>">Belanja <i class=" i-belanja fi fi-rr-shopping-bag "></i></a>
                    <a href="<?= base_url('transaksi') ?>">Transaksi <i class="i-keranjang fi fi-rr-shopping-cart"></i></a>
                    <a href="<?= base_url('about') ?>">About <i class="i-about fi fi-rr-interrogation"></i></a>
                </div>


                <div class="menu">
                    <a href="<?= route_to('login') ?>"><button class="log-in">Login</button></a>
                    <!-- Tambahkan tautan atau tombol registrasi jika diperlukan -->
                </div>
            <?php endif; ?>
        </div>


        <div class="menu-btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>
    <!-- banner -->
    <div class="banner" id="home1">
        <div class="content-banner">
            <h3>fashions fade <span>style is eternal</span></h3>
        </div>
    </div>


    <!-- content-1 -->
    <section class="content-1" id="card">
        <div class="container-card">
            <div class="card" style="--clr: #009688">
                <div class="img-box">
                    <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                <div class="content">
                    <h2>Celana</h2>
                    <p>
                        Celana Shoju: gaya modern, kenyamanan tinggi. Terbuat dari bahan berkualitas untuk tampil trendi
                        dan
                        nyaman sepanjang hari.
                    </p>
                    <a href="<?= base_url('katalog') ?>">Read More</a>
                </div>
            </div>
            <div class="card" style="--clr: #FF3E7F">
                <div class="img-box">
                    <img src="https://partojambe.com/asset/foto_produk/86c171b7f1f3871ae8c8dd460393592d.jpg">
                </div>
                <div class="content">
                    <h2>Baju</h2>
                    <p>
                        Baju Shoju: Gaya trendi, kenyamanan luar biasa. Pilih kualitas untuk penampilan fashion yang
                        elegan
                        sepanjang hari.
                    </p>
                    <a href="<?= base_url('katalog') ?>">Read More</a>
                </div>
            </div>
            <div class="card" style="--clr: #03A9F4">
                <div class="img-box">
                    <img src="https://images.unsplash.com/photo-1605763240000-7e93b172d754?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                <div class="content">
                    <h2>Dress</h2>
                    <p>
                        Dress Shoju: Elegan dan nyaman. Tampil modis sepanjang hari dengan dress berkualitas tinggi ini.
                    </p>
                    <a href="<?= base_url('katalog') ?>">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- content-2 -->
    <div class="content-2">
        <h1>SHOJU </h1>
        <p>Shoju adalah sebuah toko baju yang menawarkan berbagai pilihan pakaian trendy dan stylish untuk memenuhi
            kebutuhan fashion Anda. Dengan komitmen untuk memberikan pengalaman berbelanja yang menyenangkan dan
            memuaskan,
            Shoju menghadirkan koleksi terbaru dengan desain yang up-to-date dan kualitas yang tak tertandingi..</p>
        <a href="#">Learn more</a>
    </div>

    <div class="blank"></div>


    <div class="content-3 second">
        <div class="item">
            <div class="img-content-3 img-first"></div>
            <div class="card">
                <h3>Toko</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae cumque dolorum ducimus aut laboriosam
                    quis
                    itaque laborum expedita nemo ex?</p>
                <a href="#">Lihat</a>
            </div>
        </div>
        <div class="item">
            <div class="img-content-3 img-second"></div>
            <div class="card">
                <h3>Alamat</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem soluta nulla beatae dolore fugit
                    consequuntur facere quo fugiat commodi architecto?
                </p>
                <a href="#">Lihat</a>
            </div>
        </div>
        <div class="item">
            <div class="img-content-3 img-third"></div>
            <div class="card">
                <h3>Tentang Penjual</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, temporibus repudiandae
                    consequuntur
                    quia minus facilis suscipit aliquam voluptate praesentium quo! </p>
                <a href="#">Lihat</a>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">watch</a></li>
                        <li><a href="#">bag</a></li>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">dress</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>