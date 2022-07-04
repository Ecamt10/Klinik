<?php
//including the database connection file
    include_once("../../config.php");
    include_once("../../auth/check_auth.php");

    $berobat = mysqli_query($mysqli, "SELECT * FROM berobat INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter ORDER BY id_berobat DESC");
    $obat = mysqli_query($mysqli, "SELECT * FROM obat ORDER BY id_obat DESC");

    if(isset($_POST['submit'])) {
        $berobat = $_POST['berobat'];
        $obat = $_POST['obat'];

        echo $berobat.$obat;
        $insert = mysqli_query($mysqli, "INSERT INTO resep_obat VALUES('', '$berobat', '$obat')") or die(mysqli_error($mysqli));

        if ($insert) {
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
    <title>Resep</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include_once("../../utilities/nav.php"); ?>
        <div class="row justify-content-md-center py-4">
            <div class="col-md-6">
                <h4>Tambah Resep</h4>
                <form method="post" action="tambah_resep.php" class="mt-4"> 
                    <div class="mb-3">
                        <label class="form-label">Data Berobat</label>
                        <select class="form-select" name="berobat" required>
                            <option value>Pilih Data</option>
                            <?php while($res = mysqli_fetch_array($berobat)) {  ?>
                            <option value="<?php echo $res['id_berobat'] ?>"><?php echo $res['id_berobat']."-".$res['nama_pasien']."-".$res['keluhan_pasien']."-".$res['hasil_diagnosa'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Obat</label>
                        <select class="form-select" name="obat" required>
                            <option value>Pilih Obat</option>
                            <?php while($res = mysqli_fetch_array($obat)) {  ?>
                            <option value="<?php echo $res['id_obat'] ?>"><?php echo $res['nama_obat'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </form>
            </div>      
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>