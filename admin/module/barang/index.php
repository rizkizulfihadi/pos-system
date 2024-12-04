<!-- Main Content -->
<div class="main-content">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="fungsi/tambah/tambah.php?barang=tambah" method="POST">
                        <div class="modal-body">
                            <table class="table table-striped bordered">
                                <?php
                                $format = $lihat->barang_id();
                                ?>
                                <tr>
                                    <td>ID Barang</td>
                                    <td><input type="text" readonly="readonly" required value="<?php echo $format; ?>" class="form-control" name="id"></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        <select name="kategori" class="form-control" required>
                                            <option value="#">Pilih Kategori</option>
                                            <?php $kat = $lihat->kategori();
                                            foreach ($kat as $isi) {     ?>
                                                <option value="<?php echo $isi['id_kategori']; ?>">
                                                    <?php echo $isi['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama"></td>
                                </tr>
                                <tr>
                                    <td>Merk Barang</td>
                                    <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
                                </tr>
                                <tr>
                                    <td>Harga Beli</td>
                                    <td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
                                </tr>
                                <tr>
                                    <td>Harga Jual</td>
                                    <td><input type="number" placeholder="Harga Jual" required class="form-control" name="jual"></td>
                                </tr>
                                <tr>
                                    <td>Satuan Barang</td>
                                    <td>
                                        <select name="satuan" class="form-control" required>
                                            <option value="#">Pilih Satuan</option>
                                            <option value="PCS">PCS</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                                </tr>
                                <tr>
                                    <td>Barcode</td>
                                    <td><input type="number" required Placeholder="Barcode" class="form-control" name="barcode"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" name="tgl"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert
                                Data</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="section-header">
            <h1>Barang</h1>
        </div>
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

        <?php
        $sql = " select * from barang where stok <= 3";
        $row = $config->prepare($sql);
        $row->execute();
        $r = $row->rowCount();
        if ($r > 0) {
            echo "
				<div class='alert alert-light'>
					<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
					<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
				</div>
				";
        }
        ?>
        <div class="section-body">
            <button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Insert Data</button>
            <a href="index.php?page=barang&stok=yes" class="btn btn-dark btn-md mr-2">
                <i class="fa fa-list"></i> Sortir Stok Kurang</a>
            <a href="index.php?page=barang" class="btn btn-secondary btn-md">
                <i class="fa fa-refresh"></i> Refresh Data</a>
            <div class="clearfix"></div>
            <br />

            <!-- table barang -->
            <div class="table-responsive">
                      <table class="table table-striped table-sm" id="table-1">
                      <thead>
                        <tr style="background:#babfe3;color:#333;">
                            <th>No.</th>
                            <th>ID Barang</th>
                            <th>Kategori</th>
                            <th>Nama Barang</th>
                            
                            <th>Stok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						$totalBeli = 0;
						$totalJual = 0;
						$totalStok = 0;
						if($_GET['stok'] == 'yes')
						{
							$hasil = $lihat -> barang_stok();

						}else{
							$hasil = $lihat -> barang();
						}
						$no=1;
						foreach($hasil as $isi) {
					?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $isi['id_barang'];?></td>
                            <td><?php echo $isi['nama_kategori'];?></td>
                            <td><?php echo $isi['nama_barang'];?></td>
                            <td>
                                <?php if($isi['stok'] == '0'){?>
                                <button class="btn btn-danger"> Habis</button>
                                <?php }else{?>
                                <?php echo $isi['stok'];?>
                                <?php }?>
                            </td>
                            <td>Rp.<?php echo number_format($isi['harga_beli']);?>,-</td>
                            <td>Rp.<?php echo number_format($isi['harga_jual']);?>,-</td>
                            
                            <td>
                                <?php if($isi['stok'] <=  '3'){?>
                                <form method="POST" action="fungsi/edit/edit.php?stok=edit">
                                    <input type="text" name="restok" class="form-control form-control-sm mb-2">
                                    <input type="hidden" name="id" value="<?php echo $isi['id_barang'];?>"
                                        class="form-control">
                                    <button class="btn btn-primary btn-sm">
                                        Restok
                                    </button>
                                    <a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi['id_barang'];?>"
                                        onclick="javascript:return confirm('Hapus Data barang ?');">
                                        <button class="btn btn-danger btn-sm">Hapus</button></a>
                                </form>
                                <?php }else{?>
                                <a href="index.php?page=barang/details&barang=<?php echo $isi['id_barang'];?>"><button
                                        class="btn btn-primary btn-sm">Detail</button></a>

                                <a href="index.php?page=barang/edit&barang=<?php echo $isi['id_barang'];?>"><button
                                        class="btn btn-info btn-sm">Edit</button></a>
                                <a href="fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi['id_barang'];?>"
                                    onclick="javascript:return confirm('Hapus Data barang ?');"><button
                                        class="btn btn-danger btn-sm">Hapus</button></a>
                                <?php }?>
                        </tr>
                        <?php 
							$no++; 
							$totalBeli += $isi['harga_beli'] * $isi['stok']; 
							$totalJual += $isi['harga_jual'] * $isi['stok'];
							$totalStok += $isi['stok'];
						}
					?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total </td>
                            <th><?php echo $totalStok;?></td>
                            <th>Rp.<?php echo number_format($totalBeli);?>,-</td>
                            <th>Rp.<?php echo number_format($totalJual);?>,-</td>
                            <th colspan="2"></th>
                        </tr>
                    </tfoot>
                      </table>
                    </div>
            <!-- end table barang -->
     
            </tbody>
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