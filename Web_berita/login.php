<?php
session_start();

require 'setting.php';

if (isset($_GET['login'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username' AND password  = '$password'");

    if (mysqli_num_rows($query) === 1) {
        header('location: index.php');
        $data = mysqli_fetch_object($query);

        $_SESSION['login'] = true;
        $_SESSION['hak_akses'] = $data->hak_akses;
    }
    //    echo $error = 'Username atau password yang anda masukan salah';
}
?>
<!DOCTYPE html>
<html lang="en">

<head background="gambar/images(1).jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web_berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://parsleyjs.org/src/parsley.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="https://parsleyjs.org/dist/i18n/id.js"></script>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="" style="margin-top:50px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">Login Admin</h3>
                    </div>
                    <form method="GET" id="form" data-parsley-validate>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Password" required data-parsley-trigger="keyup" class="form-control" />
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" id="submit" name="login" value="Submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#form').parsley();
</script>

</html>

<-- ini contoh untuk validasi parsley dibagian login -->