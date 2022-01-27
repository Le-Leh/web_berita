<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERITA</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <?php
        include 'navbar.php';
        ?>
        <h2 class="alert alert-info mb-3 mt-5">DATA BERITA</h2>
        <?php
        require 'setting.php';
        if (isset($_POST['simpan'])) {
            $txtjudul = $_POST['txtjudul'];
            $txtisi = $_POST['txtisi'];
            $txtpenulis = $_POST['txtpenulis'];
            $txtgambar = $_POST['txtgambar'];
            $sql = "INSERT INTO tbl_artikel VALUES (NULL, '$txtjudul', '$txtisi', '$txtpenulis', '$txtgambar')";
            $query = mysqli_query($koneksi, $sql);
            if ($query) {
                header('location: utama.php');
            } else {
                echo 'Query Error : ' . mysqli_error($koneksi);
            }
        }

        ?>
        <form action="#" method="POST">
            <div class="mb-3">
                <label>judul</label>
                <input type="text" name="txtjudul" class="form-control">
            </div>

            <div class="mb-3">
                <label>isi</label>
                <input type="text" name="txtisi" class="form-control">
            </div>

            <div class="mb-3">
                <label>penulis</label>
                <input type="text" name="txtpenulis" class="form-control">
            </div>

            <div class="mb-3">
                <label>gambar</label>
                <input type="file" name="txtgambar" class="form-control">
            </div>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="home.php" class="btn btn-secondary"> HOME </a>
        </form>

        <?php
        include 'footer.php';
        ?>
    </div>
</body>
