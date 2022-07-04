<?php 
    $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $ex = explode('/', $url);
    $urlGenerate = "http://".$ex[2].'/'.$ex[3];
    // echo $urlGenerate;

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if (empty($_SESSION['status'])) {
        $_SESSION['status'] = '';
    }

	if($_SESSION['status'] == "login"){
?>
<nav class="navbar navbar-expand-lg" style="background-color: #712cf8;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Klinik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>/page/pasien/index.php">Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>/page/obat/index.php">Obat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>/page/dokter/index.php">Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>/page/berobat/index.php">Berobat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>/page/resep/index.php">Resep</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>/page/user/index.php">User</a>
                </li>
            </ul>
            <a href="<?php echo $urlGenerate ?>/auth/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>
<?php 
    } else {
?>
<nav class="navbar navbar-expand-lg" style="background-color: #712cf8;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Klinik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white py-3" href="<?php echo $urlGenerate ?>/auth/login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php } ?>