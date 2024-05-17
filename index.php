<?php
// mengkoneksikan dengan file koneksi.php
include './controller/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Tala</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/images/logoDapurTala/logoDapurTalaRounded-V2.png" type="image/svg+xml">

    <!-- custom css link -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap"
        rel="stylesheet">

    <!-- preload images -->
    <link rel="preload" as="image" href="./assets/images/hero-banner.png" media="min-width(768px)">
    <link rel="preload" as="image" href="./assets/images/hero-banner-bg.png" media="min-width(768px)">
    <link rel="preload" as="image" href="./assets/images/hero-bg.jpg">

    <!-- fontawesome -->
    <link rel="stylesheet" href="./assets/vendor/fontawesome-free-6.4.0-web/css/all.min.css">

    <style>
        .navbar-link:is(:hover,
            :focus) {
            color: var(--dark-orange);
        }
    </style>
</head>

<body id="top">
    <!-- #HEADER -->
    <header class="header" data-header>
        <div class="container">
            <h1>
                <a href="#" class="logo">@dapurtala33<span class="span">.</span></a>
            </h1>
            <nav class="navbar" data-navbar style="height: 235px;">
                <ul class="navbar-list">
                    <li class="nav-item">
                        <a href="#home" class="navbar-link" data-nav-link>Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#food-menu" class="navbar-link" data-nav-link>Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#ulasan" class="navbar-link" data-nav-link>Ulasan</a>
                    </li>
                    <li class="nav-item">
                        <a href="#footer" class="navbar-link" data-nav-link>Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#form-order" class="navbar-link" data-nav-link>Order Now</a>
                    </li>
                </ul>
            </nav>

            <div class="header-btn-group">
                <button class="btn btn-hover" onclick="window.location.href='#form-order'">Order Now</button>
            </div>

            <div class="header-btn-group" style="display: flex; align-items: center; gap: 20px;">
                <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
                    <span class="line top"></span>
                    <span class="line middle"></span>
                    <span class="line bottom"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- #SEARCH BOX -->
    <div class="search-container" data-search-container>
        <div class="search-box">
            <input type="search" name="search" aria-label="Search here" placeholder="Type keywords here..."
                class="search-input">
            <button class="search-submit" aria-label="Submit search" data-search-submit-btn>
                <ion-icon name="search-outline"></ion-icon>
            </button>
        </div>
        <button class="search-close-btn" aria-label="Cancel search" data-search-close-btn></button>
    </div>

    <!-- #MAIN -->
    <main>
        <article>
            <!-- #HERO -->
            <section class="hero" id="home"
                style="background-image: url('./assets/images/hero-bg.png'); height: 100vh; padding: 50px;">
                <div class="container welcome" style="display: flex; flex-direction: row;">
                    <div class="hero-content">
                        <p class="hero-subtitle">Home Made</p>
                        <h2 class="h1 hero-title" style="text-shadow: 2px 2px 4px #008F6C">By dapurRT</h2>
                        <p class="hero-text">Quality is Our Priority.</p>
                        <button class="btn" onclick="window.location.href='#food-menu'">Menu</button>
                    </div>
                    <center>
                        <img src="./assets/images/logoDapurTala/logoDapurTalaRounded-V2.png" width="200" height="200"
                            loading="lazy" alt="Burger" class="" style="margin-left: 100px;">
                    </center>
                </div>
            </section>

            <!-- #BEST SELLER -->
            <section class="section section-divider white promo">
                <div class="container">
                    <center>
                        <h1 style="font-size: 50px; color:#008F6C; margin-bottom: 20px;">BEST SELLER!</h1>
                    </center>

                    <ul class="promo-list has-scrollbar">
                        <li class="promo-item">
                            <div class="promo-card">
                                <h3 class="h3 card-title">Ricebowl D'Tala</h3>
                                <p class="card-text">
                                    Varian: Cumi Cabe Ijo
                                </p>
                                <div class="card-icon">
                                    <img src="./assets/images/rb-cumi-cabe-ijo.jpg" alt="" width="300px"
                                        style="border-radius: 20px">
                                </div>
                            </div>
                        </li>

                        <li class="promo-item">
                            <div class="promo-card">
                                <h3 class="h3 card-title">Ricebowl D'Tala</h3>
                                <p class="card-text">
                                    Varian: Ayam Teriyaki
                                </p>
                                <div class="card-icon">
                                    <img src="./assets/images/rb-ayam-teriyaki.jpg" alt="" width="300px"
                                        style="border-radius: 20px">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- #FOOD MENU -->
            <section class="section food-menu" id="food-menu">
                <div class="container">
                    <!-- <p class="section-subtitle">Popular Dishes</p> -->
                    <h2 class="h2 section-title" style="margin-bottom: 20px;">
                        Our <span class="span" style="color: #008F6C">Menu</span>
                    </h2>

                    <ul class="food-menu-list">
                        <!-- memunculkan output result ke variable result-->
                        <?php
                        // code query untuk menampilkan seua data di table siswa
                        $query = "SELECT * FROM tb_produk ORDER BY id_produk DESC;";
                        // running query
                        $sql = mysqli_query($conn, $query);

                        // untuk nomer table
                        $no = 0;

                        // menyimpan output sql ke $result
                        while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                        <li>
                            <div class="food-menu-card">
                                <div class="card-banner">
                                    <?php if ($result['foto_produk'] != ""){ ?>
                                    <img src="./assets/images/<?php echo $result['foto_produk']; ?>" width="300"
                                        height="300" loading="lazy" alt="Fried Chicken Unlimited" class="w-100"
                                        style="border-radius: 20px">
                                    <?php } else if ($result['foto_produk'] == ""){ ?>
                                    <img src="./assets/images/pp-blank.png" width="300" height="300" loading="lazy"
                                        alt="Fried Chicken Unlimited" class="w-100" style="border-radius: 20px">
                                    <?php } ?>

                                    <!-- <div class="badge">-15%</div> -->
                                    <button class="btn food-menu-btn" onclick="window.location.href='#form-order'">Order
                                        Now</button>
                                </div>
                                <div class="wrapper">
                                    <p class="category">Varian: </p>
                                    <div class="rating-wrapper">
                                        <b><?php echo $result['varian_produk']; ?></b>
                                    </div>
                                </div>
                                <h3 class="h3 card-title"><?php echo $result['nama_produk']; ?></h3>
                                <div class="price-wrapper">
                                    <p class="price-text">Harga:</p>
                                    <data
                                        class="price">Rp<?php echo number_format($result['harga_produk'], 0, ',', '.'); ?></data>
                                    <!-- <del class="del" value="69.00">$69.00</del> -->
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>
                </div>
            </section>

            <!-- #DELIVERY -->
            <section class="section section-divider gray delivery">
                <div class="container">
                    <div class="delivery-content">
                        <h2 class="h2 section-title">
                            Free Delivery <span class="span">Bekasi - JAKTIM.</span>
                        </h2>
                        <p class="section-text">
                            Kamu bisa dapatkan pesanan kamu tanpa perlu keluar rumah, hanya perlu menunggu pesanaan kamu
                            sampai dirumah dan nikmati pesanan kamu. Penawaran ini berlaku untuk wilayah kota Bekasi -
                            Jakarta Timur. Untuk lebih detailnya, silahkan hubungi admin.
                        </p>
                        <button class="btn btn-hover" onclick="window.location.href='#form-order'">Order Now</button>
                    </div>
                    <figure class="delivery-banner">
                        <img src="./assets/images/delivery-banner-bg.png" width="700" height="602" loading="lazy"
                            alt="clouds" class="w-100">
                        <img src="./assets/images/delivery-boy.svg" width="1000" height="880" loading="lazy"
                            alt="delivery boy" class="w-100 delivery-img" data-delivery-boy>
                    </figure>
                </div>
            </section>

            <!-- #TESTIMONIALS -->
            <section class="section section-divider white testi" id="ulasan">
                <div class="container">
                    <p class="section-subtitle">Testimoni</p>
                    <h2 class="h2 section-title">
                        Ulasan <span class="span">Pelanggan Kami</span>
                    </h2>
                    <p class="section-text">
                        Biarkan ulasan pelanggan kami yang memberi tau kepada anda.
                    </p>

                    <ul class="testi-list has-scrollbar">
                        <!-- memunculkan output result ke variable result-->
                        <?php
                        // code query untuk menampilkan seua data di table ulasan
                        $query = "SELECT * FROM tb_ulasan ORDER BY id_pelanggan DESC;";
                        // running query
                        $sql = mysqli_query($conn, $query);

                        // untuk nomer table
                        $no = 0;
                                                    
                        // Data rating ulasan
                        // Inisialisasi array untuk menyimpan semua nilai rating
                        $ratings = array();

                        // menyimpan output sql ke $result
                        while ($result = mysqli_fetch_assoc($sql)) {

                        // mengumpulkan semua rate
                        $ratings[] = $result['rate_pelanggan'];

                        ?>
                        <li class="testi-item">
                            <div class="testi-card">
                                <div class="profile-wrapper">
                                    <figure class="avatar" style="width: 80px; height: 80px; overflow: hidden;">
                                        <?php if ($result['foto_pelanggan'] != ""){ ?>
                                        <div class="avatar-image"
                                            style="background-image: url('./assets/images/<?php echo $result['foto_pelanggan']; ?>'); width: 100%; height: 100%; background-size: cover; background-position: center;">
                                        </div>
                                        <?php } else if ($result['foto_pelanggan'] == ""){ ?>
                                        <div class="avatar-image"
                                            style="background-image: url('./assets/images/pp-blank.png'); width: 100%; height: 100%; background-size: cover; background-position: center;">
                                        </div>
                                        <?php } ?>
                                    </figure>

                                    <div>
                                        <h3 class="h4 testi-name"><?php echo $result['nama_pelanggan']; ?></h3>
                                        <p class="testi-title"><?php echo $result['role_pelanggan']; ?></p>
                                    </div>
                                </div>
                                <blockquote class="testi-text">
                                    <?php echo $result['ulasan_pelanggan']; ?>
                                </blockquote>
                                <div class="rating-wrapper">
                                    <?php
                                    switch ($result['rate_pelanggan']) {
                                        case '5':
                                            for ($i = 0; $i < 5; $i++) {
                                                echo '<ion-icon name="star"></ion-icon>';
                                            }
                                            break;
                                        case '4':
                                            for ($i = 0; $i < 4; $i++) {
                                                echo '<ion-icon name="star"></ion-icon>';
                                            }
                                            break;
                                        case '3':
                                            for ($i = 0; $i < 3; $i++) {
                                                echo '<ion-icon name="star"></ion-icon>';
                                            }
                                            break;
                                        case '2':
                                            for ($i = 0; $i < 2; $i++) {
                                                echo '<ion-icon name="star"></ion-icon>';
                                            }
                                            break;
                                        case '1':
                                            echo '<ion-icon name="star"></ion-icon>';
                                            break;
                                    }
                                    ?>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php 
                // Menghitung jumlah total rating
                $totalRating = array_sum($ratings);

                // Menghitung jumlah data rating
                $totalData = count($ratings);

                // Menghitung rata-rata
                $averageRating = $totalRating / $totalData;

                // Memformat hasil rata-rata dengan dua angka di belakang koma
                $formattedRating = number_format($averageRating, 1);
                ?>
                <p class="section-text" style="margin-top: 20px;">
                    Rata-Rata: ⭐ <?php echo $formattedRating; ?>
                </p>
                <div>
                    <center>
                        <button class="btn btn-hover" onclick="window.location.href='./controller/kelolaUlasan.php'"
                            style="margin-top: 20px;">
                            <i class="fa fa-plus" style="margin-right: 7px;"></i>
                            Berikan Ulasan
                        </button>
                    </center>
                </div>
            </section>
        </article>
    </main>

    <!-- #FOOTER -->
    <footer class="footer" id="footer">
        <div class="footer-top" style="background-image: url('./assets/images/footer-illustration.png')">
            <div class="container">
                <div class="footer-brand">
                    <a href="" class="logo">Dapur Tala<span class="span">.</span></a>
                    <p class="footer-text">
                        Temukan kami di media sosial berikut.
                    </p>
                    <ul class="social-list">
                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>

                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title">Contact Info</p>
                    </li>
                    <li>
                        <p class="footer-list-item">0823-1128-9987</p>
                    </li>
                    <li>
                        <address class="footer-list-item">Jl. Cipinang Muara I, Jakarta Timur</address>
                    </li>
                </ul>

                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title">Jam Operasional</p>
                    </li>
                    <li>
                        <p class="footer-list-item">Everyday (09:00 WIB - 19:00 WIB)</p>
                    </li>
                </ul>

                <form action="" class="footer-form" id="form-order">
                    <p class="footer-list-title">Form Order</p>
                    <div class="input-wrapper">
                        <input type="text" name="full_name" required placeholder="Nama Kamu" aria-label="Your Name"
                            class="input-field" id="inputName">
                        <input type="text" name="email_address" required placeholder="Kontak Kamu (Email/No. HP)"
                            aria-label="Email" class="input-field" id="inputContact">
                    </div>
                    <textarea name="message" required placeholder="Pesanan Kamu" aria-label="Message"
                        class="input-field" id="inputPesanan"></textarea>
                    <a style="background-color: #008F6C; color: var(--white); font-family: var(--ff-rubik); font-size: var(--fs-4); font-weight: var(--fw-500); padding: 10px;"
                        onclick="submit()">
                        <center>Kirim</center>
                    </a>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container" style="padding-top: 15px;">
                <center>
                    <p class="copyright-text">
                        &copy; <?php echo $year = date("Y"); ?> <a href="https://instagram.com/rabkaweb"
                            class="copyright-link" style="text-decoration: none;">Rabkaweb</a> All Rights
                        Reserved.
                    </p>
                </center>
            </div>
        </div>
    </footer>

    <!-- #BACK TO TOP -->
    <a href="#top" class="back-top-btn" aria-label="Back to top" data-back-top-btn>
        <ion-icon name="chevron-up"></ion-icon>
    </a>

    <!-- custom js link -->
    <script src="./js/script.js" defer></script>

    <!-- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        const submit = () => {
            let inputName = document.getElementById('inputName').value;
            let inputContact = document.getElementById('inputContact').value;
            let inputPesanan = document.getElementById('inputPesanan').value;

            let message = `Dari ${inputName} (${inputContact}). Pesanan: ${inputPesanan}`;
            let whatsappUrl = `https://wa.me/6282311289987?text=${message}`;

            if (inputName == "" || inputContact == "" || inputPesanan == "") {
                alert("harap lengkapi form")
            } else {
                window.location.href = whatsappUrl;
            }
        }
    </script>

    <!-- JS -->
    <script>
        // remove watermark 000webhost
        document.addEventListener('DOMContentLoaded', () => {
            var disclaimer = document.querySelector("img[alt='www.000webhost.com']");
            if (disclaimer) {
                disclaimer.remove();
            }
        });
    </script>
</body>

</html>