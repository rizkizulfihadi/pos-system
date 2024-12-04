<!-- Main Content -->
<div class="main-content">
    
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <?php
        $sql = " select * from barang where stok <= 3";
        $row = $config->prepare($sql);
        $row->execute();
        $r = $row->rowCount();
        if ($r > 0) {
        ?>
        <?php
            echo "
                <div class='alert alert-light'>
                    <span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
                    <span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
                </div>
                ";
        }
        ?>
        <?php $hasil_barang = $lihat->barang_row(); ?>
        <?php $hasil_kategori = $lihat->kategori_row(); ?>
        <?php $stok = $lihat->barang_stok_row(); ?>
        <?php $jual = $lihat->jual_row(); ?>
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-solid fa-box"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Produk</h4>
                        </div>
                        <div class="card-body">
                            <?php echo number_format($hasil_barang); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-solid fa-dolly"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Stok</h4>
                        </div>
                        <div class="card-body">
                            <?php echo number_format($stok['jml']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-solid fa-cart-arrow-down"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Terjual</h4>
                        </div>
                        <div class="card-body">
                            <?php echo number_format($jual['stok']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-solid fa-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kategori</h4>
                        </div>
                        <div class="card-body">
                            <?php echo number_format($hasil_kategori); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    </section>
</div>
<footer class="main-footer">
    <div class="text-center">
        Copyright &copy; Koperasi indonesia Migran Center 2024
    </div>
    <div class="footer">

    </div>
</footer>