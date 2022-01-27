<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>berita
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="alert alert-info"> Edit Data Artikel</h3>
        <?php
        require 'setting.php';
        //menampilan data dalam table
        if (isset($_GET['url-kode'])) {
            $input_kode = $_GET['url-kode'];
            $query = "SELECT * FROM tbl_artikel WHERE kode ='$input_kode'";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_object($result);
        }
        //simpan data yang telah dirubah dalam table
        if (isset($_POST['simpan'])) {
            $txtjudul = $_POST['txtjudul'];
            $txtisi = $_POST['txtisi'];
            $txtpenulis = $_POST['txtpenulis'];
            $txtgambar = $_POST['txtgambar'];
            $txtgambarbaru = $_POST['txtgambarlama'];
            if($txtgambar == ""){
                $txtgambar = $txtgambarbaru;
            }
            //update syntax dalam mysql
            $sql = "UPDATE tbl_artikel SET 
                         judul='$txtjudul', isi='$txtisi',penulis='$txtpenulis',gambar='$txtgambar' WHERE kode = $input_kode";
            $result = mysqli_query($koneksi, $sql);
            //perulangan jika dia berhasil maka ke index dan data diperbarui
            if ($result) {
                header('location: utama.php');
                //jika salah data tidak berhasil diperbarui dan menghasilkan error
            } else {
                echo 'Query Error' . mysqli_error($koneksi);
            }
        }
        ?>

        <form action="#" method="Post">
            <div class="mb-3">
                <label for="">judul</label>
                <input type="hidden" name="txtkode" class="form-control" value="<?= $data->kode; ?>">
                <input type="text" name="txtjudul" class="form-control" value="<?= $data->judul; ?>">
            </div>
            <div class="mb-3">
                <label for="">isi</label>
                <input type="text" name="txtisi" class="form-control" value="<?= $data->isi; ?>">
            </div>

            <div class="mb-3">
                <label for="">penulis</label>
                <input type="text" name="txtpenulis" class="form-control" value="<?= $data->penulis; ?>">
            </div>

            <div class="mb-3">
                <label for="">gambar</label>
                <input type="file" name="txtgambar" class="form-control" value="<?= $data->gambar; ?>">
                <input type="file" name="txtgambarlama" class="form-control" value="<?= $data->gambar; ?>" hidden>
            </div>
 
            <input type="submit" name="simpan" value="Simpan Perubahan Data" class="btn btn-primary">
            <a href="home.php" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</body>

</html>