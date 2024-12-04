<?php 
	@ob_start();
	session_start();
	if(!empty($_SESSION['admin'])){ }else{
		echo '<script>window.location="login.php";</script>';
        exit;
	}
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> penjualan();
?>  
<!DOCTYPE html>
<html>
<head>
    <title>Nota Penjualan</title>
    <style>
        body {
            font-family: monospace;
            margin: 0;
            padding: 0;
            line-height: 1;
        }
        .container {
            width: 58mm; /* Sesuaikan dengan lebar kertas yang diinginkan */
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 4px;
            text-align: left;
            border: none; /* Menghapus border untuk seluruh sel di dalam tabel */
        }
        th {
            border-bottom: 0px dashed #000; /* Menambahkan garis putus-putus di bawah header */
        }
        .pull-right {
            text-align: right;
            /* line-height: 1px; */
        }
        .dashed-border {
            border-bottom: 1px dashed #000; /* Menambahkan garis putus-putus pada border */
            margin-top: 5px; /* Jarak antara baris */
        }
        p{
            margin: 3px;
        }
    </style>
</head>
<body onload="window.print();">
    <div class="container">
        <div>
            <center>
            <img src="assets/img/logo-koperasi.png" alt="Logo" style="max-width: 35%; height: auto; ">
                <p><?php echo $toko['nama_toko'];?></p>
                <p><?php echo $toko['alamat_toko'];?></p>
                <p><?php  echo date("j F Y, G:i");?></p>
                <p>Kasir : <?php  echo htmlentities($_GET['nm_member']);?></p>
            </center>
			<div class="dashed-border"></div>
            <table>
                <tr>
                    <th>Qty</th>
                    <th>Barang</th>
                    <th>Total</th>
                </tr>
                <?php $no=1; foreach($hsl as $isi){?>
                <tr>
                    <td><?php echo $isi['jumlah'];?></td>
                    <td><?php echo strlen($isi['nama_barang']) > 10 ? substr($isi['nama_barang'], 0, 10) . "-<br>" . substr($isi['nama_barang'], 10) : $isi['nama_barang']; ?></td>
                    <td><?php echo $isi['total'];?></td>
                </tr>
                <?php $no++; }?>
            </table>
            <div class="pull-right">
                <?php $hasil = $lihat -> jumlah(); ?>
                <div class="dashed-border"></div>
                <p>Total : Rp.<?php echo number_format($hasil['bayar']);?>,-</p>
                <p>Bayar : Rp.<?php echo number_format(htmlentities($_GET['bayar']));?>,-</p>
                <p>Kembali : Rp.<?php echo number_format(htmlentities($_GET['kembali']));?>,-</p>
            </div>
            <div style="clear:both;"></div>
			<div class="dashed-border"></div>
            <center>
                <p>Terima Kasih Telah berbelanja di toko kami !</p>
            </center>
        </div>
    </div>
</body>
</html>
