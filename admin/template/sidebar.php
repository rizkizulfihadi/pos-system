<?php

$id = $_SESSION['admin']['id_member'];
$hasil_profil = $lihat->member_edit($id);
?>

<div id="app">
    <div class="main-wrapper main-wrapper-1">


        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>

            </form>
            <ul class="navbar-nav navbar-right">

                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="assets/img/user/<?php echo $hasil_profil['gambar']; ?>" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block"><?php echo $hasil_profil['nm_member']; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="index.php?page=user" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>


        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                <div class="mt-2">
					<img src="assets/img/logo-koperasi.png" alt="logo" width="80" class=" rounded-circle">			
                    <a href="index.php" class="d-block" style="line-height: 40px;"> Koperasi IMC</a>
				</div>
                    <!-- <img src="../../assets/img/logo-koperasi.png" width="50" alt=""> -->
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    
                    <a href="index.html">KIMC</a>
                </div>
                <ul class="sidebar-menu mt-3">
                    <!-- MENU -->
                    <li class="menu-header">Menu</li>
                    <li class="<?php echo ($_GET['page'] == '') ? 'active' : ''; ?>"><a class="nav-link" href="index.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                    <li class="<?php echo ($_GET['page'] == 'pengaturan') ? 'active' : ''; ?>"><a class="nav-link" href="index.php?page=pengaturan"><i class="fas fa-solid fa-gear"></i></i> <span>Pengaturan</span></a></li>
                    <!-- END MENU -->
                    <!-- DATA MASTER -->
                    <li class="menu-header">Data Master</li>
                    <li class="<?php echo ($_GET['page'] == 'barang') ? 'active' : ''; ?>"><a class="nav-link" href="index.php?page=barang"><i class="fas fa-solid fa-box"></i> <span>Barang</span></a></li>
                    <li class="<?php echo ($_GET['page'] == 'kategori') ? 'active' : ''; ?>"><a class="nav-link" href="index.php?page=kategori"><i class="fas fa-solid fa-list"></i> <span>Kategori</span></a></li>
                    <!-- END DATA MASTER -->
                    <!-- TRANSAKSI -->
                    <li class="menu-header">Transaksi</li>
                    <li class="<?php echo ($_GET['page'] == 'kasir') ? 'active' : ''; ?>"><a class="nav-link" href="index.php?page=kasir"><i class="fas fa-solid fa-cart-plus"></i> <span>Kasir</span></a></li>
                    <li class="<?php echo ($_GET['page'] == 'laporan') ? 'active' : ''; ?>"><a class="nav-link" href="index.php?page=laporan"><i class="fas fa-solid fa-wallet"></i> <span>Laporan</span></a></li>
                    <!-- END TRANSAKSI -->

                </ul>

            </aside>
        </div>
        