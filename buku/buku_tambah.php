<h1 class="mt-4">Tambah Buku</h1>
    <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-10">
        <form method="post" enctype="multipart/form-data">
        <?php
                        if(isset($_POST['submit'])){
                            $id_kategori = $_POST['id_kategori'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];
                            $stok = $_POST['stok'];
                            $foto = $_FILES['foto'];
                            $nama_foto = $foto['name'];
                            $ukuran_foto = $foto['size'];
                            $tmp_foto = $foto['tmp_name'];
                            $lokasi_simpan = 'assets/img/';
                        
                            if (!empty($nama_foto)) {
                                $ukuran_maksimum = 5 * 1024 * 1024; // 5 MB

                                if ($ukuran_foto <= $ukuran_maksimum) {
                                    $lokasi_upload = $lokasi_simpan . $nama_foto;
                                    
                                    if (move_uploaded_file($tmp_foto, $lokasi_upload)) {
                                        $tambah = mysqli_query($koneksi, "INSERT INTO t_buku (judul, id_kategori, deskripsi, penulis, penerbit, tahun_terbit, stok, foto) VALUES ('$judul','$id_kategori','$deskripsi','$penulis','$penerbit','$tahun_terbit','$stok','$lokasi_upload')");
                                
                                        if ($tambah) {
                                            echo '<script>alert("Tambah buku Berhasil ")</script>';
                                        } else {
                                            echo '<script>alert("Maaf gagal menambah buku ")</script>';
                                        }
                                    } else {
                                        echo '<script>alert("Gagal mengupload file")</script>';
                                    }
                                } else {
                                    echo '<script>alert("Ukuran file melebihi batas maksimum (5 MB)")</script>';
                                }
                            } else {
                                echo '<script>alert("Pilih file foto terlebih dahulu")</script>';
                            }
                        }
                    ?>

                <div class="md-3 row">
                <label class="col-sm-2 col-form-label">foto</label>
                <div class="col-md-8">
                    <input type="file" name="foto" class="form-control">
                </div>
                </div>
                <div class="md-3 row">
                <label class="col-sm-2 col-form-label">Judul</label>
                <div class="col-md-8">
                    <input type="text" name="judul" class="form-control">
                </div>
                </div>
                <div class="md-3 row">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-md-8">
                    <select name="id_kategori" class="form-control">
                        <?php
                        $kat = mysqli_query($koneksi,"SELECT * FROM t_kategoribuku ");
                        while($kategori = mysqli_fetch_array($kat)){ 
                        ?>
                        <option value="<?php echo $kategori['id_kategori'];?>"><?php echo $kategori['nama_kategori'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                </div>
                <div class="md-3 row "> 
                <label class="col-sm-2 col-form-label">penulis</label> 
                <div class="col-md-8">
                    <input type="text" name="penulis" class="form-control">
                </div>
                </div>
                <div class="md-2 row"> 
                <label class="col-sm-2 col-form-label">penerbit</label>
                <div class="col-md-8">
                    <input type="text" name="penerbit" class="form-control">
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Tahun terbit</label>
                <div class="col-md-8">
                    <input type="text" name="tahun_terbit" class="form-control">
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-md-8">
                    <textarea name="deskripsi" rows="5" class="form-control py-3"></textarea>
                </div>
                </div>
                <div class="md-2 row">
                <label class="col-sm-2 col-form-label">Stok</label>
                <div class="col-md-8">
                    <input type="number" name="stok" class="form-control">
                </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reser" class="btn btn-secondary">Reset</button>
                <a href="?page=buku/buku" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>