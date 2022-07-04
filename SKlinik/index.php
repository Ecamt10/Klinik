<?php
//including the database connection file
include_once("config.php");

    // session_start();
	// if($_SESSION['status']!="login"){
	// 	header("location:auth/login.php?pesan=belum_login");
	// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include_once("utilities/nav.php"); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="px-3 py-5">
                    <h2>Selamat Datang</h2>
                    <p>Website ini berisi data - data klinik. website dinamis ini dibuat untuk memenuhi tugas matakuliah Sistem Basis Data pada pertemuan 10</p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>