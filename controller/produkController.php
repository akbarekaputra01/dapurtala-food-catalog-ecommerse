<!-- CRUD. Create, Read, Update, Delete. -->
<!-- D:\RabkaUniversity\belajar\CRUD-PHP-MySQL -->

<?php
// mengkoneksikan dengan file koneksi.php
include 'koneksi.php';

// memulai/mengaktifkan session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link href="../assets/vendor/fontawesome-free-6.4.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free-6.4.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free-6.4.0-web/css/solid.css" rel="stylesheet">

    <!-- Data Tables/JQuery -->
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/datatables.min.css" />
    <script type="text/javascript" src="../assets/vendor/datatables/datatables.min.js"></script>

    <link rel="icon" href="assets/images/logoRabkaera.png" type="image/icon type">
    <title>Controller Produk D'Tala</title>
</head>

<body>
    <form method="POST" style="padding: 20px;">
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $password = $_POST['password'];

        if($password == "admin123"){
            echo '<script>alert("Success!");</script>';
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Controller Produk D'Tala
            </a>
        </div>
    </nav>

    <!-- membuat tampilan menjadi container -->
    <div class="container mb-5">

        <!-- Judul -->
        <h1 class="mt-4">Dapur Tala</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi Data Produk Dapur Tala.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD. <cite title="Source Title">Create, Read, Update, Delete.</cite>
            </figcaption>
        </figure>
        <a href="kelolaProduk.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i>
            Tambah Produk
        </a> <a href="../index.php" type="button" class="btn btn-success mb-3">
            <!-- <i class="fa fa-plus"></i> -->
            D'Tala Main Page
        </a>

        <!-- alert with session -->
        <?php
        if (isset($_SESSION['hasil'])) :
            $split = explode(",", $_SESSION['hasil']);
        ?>
        <div class="alert alert-<?php echo $split[1]; ?> alert-dismissible fade show" role="alert">
            <strong><?php echo $split[0]; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- mematikan session supaya ketika reload, session mati/hilang -->
        <?php
            session_destroy();
        endif;
        ?>

        <!-- Table -->
        <div class="table-responsive">
            <table id="dt" class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>Nama Produk</th>
                        <th>Varian Produk</th>
                        <th>Harga Produk</th>
                        <th>Foto Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- memunculkan output result ke variable result-->
                    <?php
                    // code query untuk menampilkan seua data di table siswa
                    $query = "SELECT * FROM tb_produk;";
                    // running query
                    $sql = mysqli_query($conn, $query);

                    // untuk nomer table
                    $no = 0;

                    // menyimpan output sql ke $result
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <!-- mengeluarkan result ke datatables -->
                        <td>
                            <center>
                                <?php echo ++$no; ?>.
                            </center>
                        </td>
                        <td>
                            <?php echo $result['nama_produk']; ?>
                        </td>
                        <td>
                            <?php echo $result['varian_produk']; ?>
                        </td>
                        <td>
                            Rp<?php echo number_format($result['harga_produk'], 0, ',', '.'); ?>
                        </td>
                        <td>
                            <center>
                                <img class="rounded" style="max-height: 100px;"
                                    <?php if ($result['foto_produk'] != ""){ ?>
                                    src="../assets/images/<?php echo $result['foto_produk']; ?>">
                                <?php } else if ($result['foto_produk'] == ""){ ?>
                                src="../assets/images/pp-blank.png">
                                <?php } ?>
                            </center>
                        </td>
                        <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <center>
                                <!-- meminta $_POST. setiap tabel pada user memiliki nilai "ubah" yang berbeda, misal user 1, maka nilai "ubah" miliknya adalah "1" -->
                                <a href="kelolaProduk.php?ubah=<?php echo $result['id_produk']; ?>" type="button"
                                    class="btn btn-success btn-sm mb-1">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <!-- meminta $_GET. setiap tabel pada user memiliki nilai "hapus" yang berbeda, misal user 1, maka nilai "hapus" miliknya adalah "1" -->
                                <a href="proses.php?hapusProduk=<?php echo $result['id_produk']; ?>" type="button"
                                    class="btn btn-danger btn-sm"
                                    onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </center>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- div container end -->

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
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
    <!-- Footer -->
    <?php
    } else {
        echo '<script>alert("Wrong password!");</script>';
        }
    }
    ?>

    <!-- JS -->
    <script>
    // untuk menggunakan datatables
    $(document).ready(function() {
        $('#dt').DataTable();
    });

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