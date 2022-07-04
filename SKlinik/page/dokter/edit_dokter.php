<?php
//including the database connection file
    include_once("../../config.php");
    include_once("../../auth/check_auth.php");

    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM dokter WHERE id_dokter = $id");
    $row   = $result->fetch_assoc();

    if(isset($_POST['update'])) {
        $nama = $_POST['nama'];

        $update = mysqli_query($mysqli, "UPDATE dokter SET nama_dokter='$nama' WHERE id_dokter = $id");

        if ($update) {
            header("location:index.php");
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
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include_once("../../utilities/nav.php"); ?>
        <div class="row justify-content-md-center py-4">
            <div class="col-md-6">
                <h4>Edit Dokter</h4>
                <form method="post" action="edit_dokter.php?id=<?php echo $id ?>" class="mt-4"> 
                    <div class="mb-3">
                        <label class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama_dokter'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update" value="update">Save</button>
                </form>
            </div>      
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>