<?php include 'islem/baglan.php';
include 'fonksiyonlar.php';

oturumkontrol();

$sorgu=$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:kullanici_id");
$sorgu->execute(array(


    'kullanici_id' => $_SESSION['kullanici_id']

));
$kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $ayarcek["site_baslik"]?></title>
    <link rel="shortcut icon" type="image/png" href="dosyalar/<?php echo $ayarcek['site_logo'] ?>">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-center">
                    <img src="dosyalar/<?php echo $ayarcek['site_logo'] ?>" style="width: 60%; height: auto;">
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a href="index.php" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Anasayfa</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a href="ayarlar.php" class="nav-link">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Ayarlar</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a href="profil.php" class="nav-link">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profil</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <h5><?php echo $ayarcek["site_baslik"] ?></h5>
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>




            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $kullanici['kullanici_isim']?></span>
                <img class="img-profile rounded-circle"
                src="dosyalar/<?php echo $ayarcek['site_logo'] ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profil.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profil
            </a>
            <a class="dropdown-item" href="ayarlar.php">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Ayarlar
            </a>


            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Çıkış
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->

<!-- /.container-fluid -->

<!-- </div> -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Oturumu kapat</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Çıkmak istediğinizden emin misiniz?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
            <a class="btn btn-primary" href="islem/cikis.php">Kapat</a>
        </div>
    </div>
</div>
</div>