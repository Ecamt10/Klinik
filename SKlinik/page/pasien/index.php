<?php
//including the database connection file
include_once("../../config.php");
include_once("../../auth/check_auth.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM pasien ORDER BY id_pasien ASC"); // using mysqli_query instead
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include_once("../../utilities/nav.php"); ?>
        <div class="row my-5">
            <div class="col-md-12">
                <!-- <a href="add.html">Add New Data</a><br/><br/> -->
                <a href="tambah_pasien.php" class="btn btn-primary">Tambah</a>
                <table class="table table-striped">

                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                $no = 1;
                while($res = mysqli_fetch_array($result)) { 		
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$res['id_pasien']."</td>";
                    echo "<td>".$res['nama_pasien']."</td>";
                    echo "<td>".$res['jenis_kelamin']."</td>";
                    echo "<td>".$res['umur']."</td>";
                    echo '<td><a href="edit_pasien.php?id='.$res['id_pasien'].'" class="btn btn-primary">Edit</a> <a href="delete_pasien.php?id='.$res['id_pasien'].'" class="btn btn-danger">Delete</a></td>';
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