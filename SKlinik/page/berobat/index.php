<?php
//including the database connection file
include_once("../../config.php");
include_once("../../auth/check_auth.php");

$result = mysqli_query($mysqli, "SELECT * FROM berobat INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter ORDER BY id_berobat ASC");
?>
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
        <div class="row my-5">
            <div class="col-md-12">
                <!-- <a href="add.html">Add New Data</a><br/><br/> -->
                <a href="tambah_berobat.php" class="btn btn-primary">Tambah</a>
                <table class="table table-striped">

                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Tanggal Berobat</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Penatalaksanaan</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                $no = 1;
                while($res = mysqli_fetch_array($result)) { 		
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$res['id_berobat']."</td>";
                    echo "<td>".$res['nama_pasien']."</td>";
                    echo "<td>".$res['nama_dokter']."</td>";
                    echo "<td>".$res['tgl_berobat']."</td>";
                    echo "<td>".$res['keluhan_pasien']."</td>";
                    echo "<td>".$res['hasil_diagnosa']."</td>";
                    echo "<td>".$res['penatalaksanaan']."</td>";
                    echo '<td><a href="edit_berobat.php?id='.$res['id_berobat'].'" class="btn btn-primary">Edit</a> <a href="delete_berobat.php?id='.$res['id_berobat'].'" class="btn btn-danger">Delete</a></td>';
                    echo "</tr>";
                    // echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
                }
                ?>
                </table>
            </div>      
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>