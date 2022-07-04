<?php 
    include_once("../../config.php");
    include_once("../../auth/check_auth.php");

    $id = $_GET['id'];
    mysqli_query($mysqli, "SET FOREIGN_KEY_CHECKS=0");
    $delete = mysqli_query($mysqli, "DELETE FROM obat WHERE id_obat = $id");
    
    if ($delete) {
        mysqli_query($mysqli, "SET FOREIGN_KEY_CHECKS=1");
        header("location:index.php");
    }
?>