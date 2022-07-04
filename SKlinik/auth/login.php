<?php
//including the database connection file
include_once("../config.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if (empty($_SESSION['status'])) {
        $_SESSION['status'] = '';
    }
	if($_SESSION['status']=="login"){
		header("location:/tugas-crud");
	}
?>
<!-- INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien  -->
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
        <?php include_once("../utilities/nav.php"); ?>
        <div class="row justify-content-md-center py-4">
            <div class="col-md-6">
                <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo' 
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Login gagal! username dan password salah!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            ';
                        }else if($_GET['pesan'] == "logout"){
                            echo' 
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Anda telah berhasil logout
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            ';
                        }else if($_GET['pesan'] == "belum_login"){
                            echo' 
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Anda harus login untuk mengakses halaman ini!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            ';
                        }
                    }
                ?>
                <form method="post" action="cek_login.php"> 
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>      
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>