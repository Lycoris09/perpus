<h1 class="mt-4"> Buku</h1>
    <div class="card">
    <div class="card-body">
    <div class="row mb">
        <div class="col-md-10">
        <form method="post" enctype="multipart/form-data">
            <?php
                    $id = $_GET['id_buku'];

                    // Jika tombol submit ditekan
                    if (isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $deskripsi = $_POST['deskripsi'];
                        $stok = $_POST['stok'];

                        // Foto handling
                        $foto = $_FILES['foto'];
                        $nama_foto = $foto['name'];
                        $ukuran_foto = $foto['size'];
                        $tmp_foto = $foto['tmp_name'];
                        $lokasi_simpan = 'assets/img/';

                        // Cek apakah ada foto yang diupload
                        if (!empty($nama_foto)) {
                            $ukuran_maksimum = 5 * 1024 * 1024; // 5 MB
                            if ($ukuran_foto <= $ukuran_maksimum) {
                                // Lokasi upload
                                $lokasi_upload = $lokasi_simpan . $nama_foto;

                                // Pindahkan file foto ke lokasi upload
                                move_uploaded_file($tmp_foto, $lokasi_upload);

                                // Perbarui data buku termasuk foto
                                $update = mysqli_query($koneksi, "UPDATE t_buku SET judul='$judul',id_kategori='$id_kategori',deskripsi='$deskripsi',penulis='$penulis',penerbit='$penerbit',tahun_terbit='$tahun_terbit',stok='$stok',foto='$lokasi_upload' WHERE id_buku='$id'");

                                if ($update) {
                                    echo '<script>alert("Ubah Buku Berhasil")</script>';
                                } else {
                                    echo '<script>alert("Maaf, gagal mengubah buku")</script>';
                                }
                            } else {
                                echo '<script>alert("Ukuran file melebihi batas maksimum (5 MB)")</script>';
                            }
                        } else {
                            // Jika tidak ada foto yang diupload, perbarui data buku tanpa memperbarui foto
                            $update = mysqli_query($koneksi, "UPDATE t_buku SET judul='$judul',id_kategori='$id_kategori',deskripsi='$deskripsi',penulis='$penulis',penerbit='$penerbit',tahun_terbit='$tahun_terbit',stok='$stok' WHERE id_buku='$id'");

                            if ($update) {
                                echo '<script>alert("Ubah Buku Berhasil")</script>';
                            } else {
                                echo '<script>alert("Maaf, gagal mengubah buku")</script>';
                            }
                        }
                    }

                    // Ambil data buku berdasarkan ID
                    $query = mysqli_query($koneksi, "SELECT * FROM t_buku WHERE id_buku=$id");
                    $data = mysqli_fetch_array($query);
            ?>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">foto</label>
                <div class="col-md-8">
                <input type="file" name="foto" class="form-control">
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Judul</label>
                <div class="col-md-8">
                    <input type="text" name="judul" value="<?php echo $data['judul']; ?>" class="form-control">
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-md-8">
                    <select name="id_kategori" class="form-control">
                        <?php
                        $kat = mysqli_query($koneksi,"SELECT * FROM t_kategoribuku ");
                        while($data2 = mysqli_fetch_array($kat)){ 
                        ?>
                        <option <?php if($data2['id_kategori'] == $data['id_kategori']) echo 'selected'; ?>value="<?php echo $data2['id_kategori'];?>"><?php echo $data2['nama_kategori'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">penulis</label>
                <div class="col-md-8">
                    <input type="text" name="penulis" value="<?php echo $data['penulis'];?>" class="form-control">
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-md-8">
                    <input type="text" name="penerbit" value="<?php echo $data['penerbit'];?>" class="form-control">
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-md-8">
                    <input type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit'];?>" class="form-control">
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Deksripsi</label>
                <div class="col-md-8">
                    <textarea name="deskripsi" rows="5" class="form-control py-3"><?php echo $data['deskripsi'];?></textarea>
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Stok</label>
                <div class="col-md-8">
                    <input type="number" name="stok" class="form-control" value="<?php echo $data['stok']?>">
                </div>
                    </div>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=buku/buku" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>