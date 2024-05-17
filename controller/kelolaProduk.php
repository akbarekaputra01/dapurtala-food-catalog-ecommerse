<!DOCTYPE html>

<?php
// mengkoneksikan dengan file "koneksi.php"
include 'koneksi.php';

// membuat varibale untuk default
$id_produk = '';
$nama_produk = '';
$varian_produk = '';
$harga_produk = '';
$foto_produk = '';

// jika klik buton berisi $_GET dan bernama "ubah"
if (isset($_GET['ubah'])) {
    // membuat id siswa dari id db yang diambil memlalui $_GET
    $id_produk = $_GET['ubah'];

    // query untuk mengambil data dari db dimana id siswa yang diminta haru sesuai dengan di db
    $query = "SELECT * FROM tb_produk WHERE id_produk = '$id_produk';";
    // run query
    $sql = mysqli_query($conn, $query);
    // menyimpan output query ke variable $result
    $result = mysqli_fetch_assoc($sql);

    // membuat variable dari db untuk view atau value input ketika user mengedit data
    $nama_produk = $result['nama_produk'];
    $varian_produk = $result['varian_produk'];
    $harga_produk = $result['harga_produk'];
    $foto_produk = $result['foto_produk'];
}
?>

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

    <link rel="icon" href="../assets/images/logoRabkaera.png" type="image/icon type">
    <title>Produk Dapur Tala</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Produk Dapur Tala
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <!-- membuat value input dari db -->
            <input type="hidden" value="<?php echo $id_produk; ?>" name="id_produk">

            <div class="mb-3 row">
                <label for="nama_produk" class="col-sm-2 col-form-label">
                    Nama produk
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_produk" class="form-control" id="nama_produk"
                        placeholder="Example: AKBAR EKA PUTRA" value="<?php echo $nama_produk; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="varianProduk" class="col-sm-2 col-form-label">
                    Varian produk
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="varian_produk" class="form-control" id="varianProduk"
                        placeholder="Example: Cumi Cabe Ijo" value="<?php echo $varian_produk; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="hargaProduk" class="col-sm-2 col-form-label">
                    Harga produk
                </label>
                <div class="col-sm-10">
                    <input required type="number" name="harga_produk" class="form-control" id="hargaProduk"
                        placeholder="Example: 15000" value="<?php echo $harga_produk; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">
                    Foto produk
                </label>
                <div class="col-sm-10">
                    <!-- jika user di page tambah data bukan di page edit, maka form foto harus diisi (required) -->
                    <input <?php if (!isset($_GET['ubah'])) {
                                echo "required";
                            } ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
                </div>
            </div>

            <script>
            function sanitizeInput(element) {
                const sanitizedValue = element.value.replace(/[^\x20-\x7E]/g, '');
                element.value = sanitizedValue;
            }
            </script>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <!-- jika user di page ubah/edit, maka button berfungi sebagai simpan perubahan -->
                    <?php
                    if (isset($_GET['ubah'])) {
                    ?>
                    <button type="submit" name="aksi" value="editProduk" class="btn btn-primary">
                        <i class="fas fa-floppy-disk" aria-hidden="true"></i>
                        Simpan Perubahan
                    </button>
                    <?php
                    }
                    // jika user tidak di pake ubah atau mungkin di page tambah data, maka button berfungsi sebagai tambah data
                    else {
                    ?>
                    <button type="submit" name="aksi" value="addProduk" class="btn btn-primary">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                        Tambahkan Produk
                    </button>
                    <?php
                    }
                    ?>
                    <a href="../index.php" onclick="" type="button" class="btn btn-success">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        D'Tala Main Page
                    </a>
                </div>
            </div>

        </form>
        <!-- form end -->
    </div>
    <!-- container end -->

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