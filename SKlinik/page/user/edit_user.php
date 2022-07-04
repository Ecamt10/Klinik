<?php
//including the database connection file
    include_once("../../config.php");
    include_once("../../auth/check_auth.php");

    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
    $row   = $result->fetch_assoc();

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        $cekUsename = mysqli_query($mysqli, "SELECT * FROM users WHERE username LIKE '$username' AND id != $id") or die(mysqli_error($mysqli));

        $data = "username = '$username', nama_lengkap = '$name'";

        if (!empty($password)) {
            $data .= ", password = '$password'";
        }

        if ($cekUsename->num_rows == 0) {
            $insert = mysqli_query($mysqli, "UPDATE users SET $data WHERE id = $id")  ;

            if ($insert) {
                header("location:index.php");
            }
        } else {
            header("location:?id=".$id."&pesan=gagal");
        }
    }
?>
<!-- INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include_once("../../utilities/nav.php"); ?>
        <div class="row justify-content-md-center py-4">
            <div class="col-md-6">
            <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo' 
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Username sudah dipakai!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            ';
                        }
                    }
                ?>
                <h4>Ubah User</h4>
                <form method="post" action="edit_user.php?id=<?php echo $id ?>" class="mt-4"> 
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['nama_lengkap'] ?>" required>
                    </div>

                    <h6 class="mb-3">Ubah Password <small>(Isi untuk mengubah Password)</small></h6>
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </form>
            </div>      
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>