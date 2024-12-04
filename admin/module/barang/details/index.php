<?php
$id = $_GET['barang'];
$hasil = $lihat->barang_edit($id);
?>

<?php if (isset($_GET['success-stok'])) { ?>
  <div class="alert alert-success">
    <p>Tambah Stok Berhasil !</p>
  </div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
  <div class="alert alert-success">
    <p>Tambah Data Berhasil !</p>
  </div>
<?php } ?>
<?php if (isset($_GET['remove'])) { ?>
  <div class="alert alert-danger">
    <p>Hapus Data Berhasil !</p>
  </div>
<?php } ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section" id="hasil-pencarian">
    <div class="section-header">
      <div class="section-header-back">
        <a href="index.php?page=barang" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Barang</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Detail Barang</h2>
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <td>ID Barang</td>
            <td><?php echo $hasil['id_barang']; ?></td>
          </tr>
          <tr>
            <td>Kategori</td>
            <td><?php echo $hasil['nama_kategori']; ?></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td><?php echo $hasil['nama_barang']; ?></td>
          </tr>
          <tr>
            <td>Merk Barang</td>
            <td><?php echo $hasil['merk']; ?></td>
          </tr>
          <tr>
            <td>Harga Beli</td>
            <td><?php echo $hasil['harga_beli']; ?></td>
          </tr>
          <tr>
            <td>Harga Jual</td>
            <td><?php echo $hasil['harga_jual']; ?></td>
          </tr>
          <tr>
            <td>Satuan Barang</td>
            <td><?php echo $hasil['satuan_barang']; ?></td>
          </tr>
          <tr>
            <td>Stok</td>
            <td><?php echo $hasil['stok']; ?></td>
          </tr>
          <tr>
            <td>Barcode</td>
            <td><?php echo $hasil['barcode']; ?></td>
          </tr>
          <tr>
            <td>Tanggal Input</td>
            <td><?php echo $hasil['tgl_input']; ?></td>
          </tr>
          <tr>
            <td>Tanggal Update</td>
            <td><?php echo $hasil['tgl_update']; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </section>
</div>

<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; Koperasi indonesia Migran Center 2024
  </div>
  <div class="footer-right">

  </div>
</footer>