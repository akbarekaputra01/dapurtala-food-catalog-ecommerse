<!DOCTYPE html>

<?php
// mengkoneksikan dengan file "koneksi.php"
include 'koneksi.php';

// membuat varibale untuk default
$id_pelanggan = '';
$nama_pelanggan = '';
$role_pelanggan = '';
$foto_pelanggan = '';
$ulasan_pelanggan = '';
$rate_pelanggan = '';

// jika klik buton berisi $_GET dan bernama "ubah"
if (isset($_GET['ubah'])) {
    // membuat id siswa dari id db yang diambil memlalui $_GET
    $id_pelanggan = $_GET['ubah'];

    // query untuk mengambil data dari db dimana id siswa yang diminta haru sesuai dengan di db
    $query = "SELECT * FROM tb_ulasan WHERE id_pelanggan = '$id_pelanggan';";
    // run query
    $sql = mysqli_query($conn, $query);
    // menyimpan output query ke variable $result
    $result = mysqli_fetch_assoc($sql);

    // membuat variable dari db untuk view atau value input ketika user mengedit data
    $nama_pelanggan = $result['nama_pelanggan'];
    $role_pelanggan = $result['role_pelanggan'];
    $ulasan_pelanggan = $result['ulasan_pelanggan'];
    $rate_pelanggan = $result['rate_pelanggan'];
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
    <title>Ulasan Pelanggan Dapur Tala</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Ulasan Pelanggan Dapur Tala
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <!-- membuat value input dari db -->
            <input type="hidden" value="<?php echo $id_pelanggan; ?>" name="id_pelanggan">

            <div class="mb-3 row">
                <label for="nama_pelanggan" class="col-sm-2 col-form-label">
                    Nama Pelanggan
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan"
                        placeholder="Example: AKBAR EKA PUTRA" value="<?php echo $nama_pelanggan; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="rolePelanggan" class="col-sm-2 col-form-label">
                    Role Pelanggan
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="role_pelanggan" class="form-control" id="rolePelanggan"
                        placeholder="Example: Customer" value="<?php echo $role_pelanggan; ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">
                    Foto Pelanggan
                </label>
                <div class="col-sm-10">
                    <!-- jika user di page tambah data bukan di page edit, maka form foto harus diisi (required) -->
                    <input <?php if (!isset($_GET['ubah'])) {
                                // echo "required";
                            } ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="ratePelanggan" class="col-sm-2 col-form-label">
                    Rate Pelanggan
                </label>
                <div class="col-sm-10">
                    <select required id="ratePelanggan" name="rate_pelanggan" class="form-select">
                        <!-- option default -->
                        <option value="">Rate Pelanggan</option>
                        <!-- jika Rate Pelanggan di db adalah laki laki, makan vaue laki laki akan di selected -->
                        <option <?php if ($rate_pelanggan == '5') {
                                    echo "selected";
                                } ?> value="5">
                            ⭐⭐⭐⭐⭐</option>
                        <!-- jika Rate Pelanggan di db adalah perempuan, makan vaue perempuan akan di selected -->
                        <option <?php if ($rate_pelanggan == '4') {
                                    echo "selected";
                                } ?> value="4">
                            ⭐⭐⭐⭐</option>
                        <option <?php if ($rate_pelanggan == '3') {
                                    echo "selected";
                                } ?> value="3">
                            ⭐⭐⭐</option>
                        <!-- jika Rate Pelanggan di db adalah perempuan, makan vaue perempuan akan di selected -->
                        <option <?php if ($rate_pelanggan == '2') {
                                    echo "selected";
                                } ?> value="2">
                            ⭐⭐</option>
                        <option <?php if ($rate_pelanggan == '1') {
                                    echo "selected";
                                } ?> value="1">
                            ⭐</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="ulasan_pelanggan" class="col-sm-2 col-form-label">
                    Ulasan Pelanggan
                </label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="ulasan_pelanggan" name="ulasan_pelanggan" rows="3"
                        placeholder="Example: Recommended."
                        oninput="sanitizeInput(this)"><?php echo $ulasan_pelanggan; ?></textarea>
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
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fas fa-floppy-disk" aria-hidden="true"></i>
                        Simpan Perubahan
                    </button>
                    <?php
                    }
                    // jika user tidak di pake ubah atau mungkin di page tambah data, maka button berfungsi sebagai tambah data
                    else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                        Tambahkan Ulasan
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