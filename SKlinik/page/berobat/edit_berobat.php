<?php
//including the database connection file
    include_once("../../config.php");
    include_once("../../auth/check_auth.php");

    $id = $_GET['id'];
    $pasien = mysqli_query($mysqli, "SELECT * FROM pasien ORDER BY id_pasien DESC");
    $dokter = mysqli_query($mysqli, "SELECT * FROM dokter ORDER BY id_dokter DESC");
    
    $data = mysqli_query($mysqli, "SELECT * FROM berobat WHERE id_berobat = $id");
    $row   = $data->fetch_assoc();

    print_r($row);

    if(isset($_POST['submit'])) {
        $pasien = $_POST['pasien'];
        $dokter = $_POST['dokter'];
        $keluhan = $_POST['keluhan'];
        $diagnosa = $_POST['diagnosa'];
        $penatalaksanaan = $_POST['penatalaksanaan'];
        $tanggal = $_POST['tanggal'];

        $update = mysqli_query($mysqli, "UPDATE berobat SET id_pasien = '$pasien', id_dokter = '$dokter', tgl_berobat = '$tanggal', keluhan_pasien = '$keluhan', hasil_diagnosa = '$diagnosa', penatalaksanaan = '$penatalaksanaan' WHERE id_berobat = $id");

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
    <title>Berobat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include_once("../../utilities/nav.php"); ?>
        <div class="row justify-content-md-center py-4">
            <div class="col-md-6">
                <h4>Edit Berobat</h4>
                <form method="post" action="edit_berobat.php?id=<?php echo $id ?>" class="mt-4"> 
                    <div class="mb-3">
                        <label class="form-label">Pasien</label>
                        <select class="form-select" name="pasien" required>
                            <option value>Pilih Pasien</option>
                            <?php while($res = mysqli_fetch_array($pasien)) {  ?>
                            <option value="<?php echo $res['id_pasien'];?>" <?php echo ($row['id_pasien'] == $res['id_pasien'] ? 'selected' : '') ?>><?php echo $res['nama_pasien'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dokter</label>
                        <select class="form-select" name="dokter" required>
                            <option value>Pilih Dokter</option>
                            <?php while($res = mysqli_fetch_array($dokter)) {  ?>
                            <option value="<?php echo $res['id_dokter'] ?>" <?php echo ($row['id_dokter'] == $res['id_dokter'] ? 'selected' : '') ?>><?php echo $res['nama_dokter'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keluhan</label>
                        <textarea class="form-control" name="keluhan" rows="3" required><?php echo $row['keluhan_pasien'] ?></textarea>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Berobat</label>
                        <input type="date" class="form-control" value="<?php echo $row['tgl_berobat'] ?>" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Diagnosa</label>
                        <textarea class="form-control" name="diagnosa" rows="3" required><?php echo $row['hasil_diagnosa'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penatalaksanaan</label>
                        <input type="text" class="form-control" value="<?php echo $row['penatalaksanaan'] ?>" name="penatalaksanaan" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </form>
            </div>      
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>