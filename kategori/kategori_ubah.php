<h1 class="mt-4">Ubah Kategori Buku</h1>
    <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
        <form method="post">
            <?php
                $id = $_GET['id_kategori'];
                if(isset($_POST['submit'])){
                $kategori = $_POST['nama_kategori'];
                $ubah = mysqli_query($koneksi,"UPDATE t_kategoribuku set nama_kategori='$kategori' where id_kategori=$id");
                
                if($ubah){
                    echo '<script>alert("Kategori berhasil di ubah")</script>';
                }
                else{
                    echo '<script>alert("Maaf gagal mengubah kategori ")</script>';
                }
            }
            $query = mysqli_query($koneksi,"SELECT * FROM t_kategoribuku where id_kategori='$id'");
            $data = mysqli_fetch_array($query);
            ?>
                <div class="col-md-4"> Nama Kategori </div>
                <div class="col-md-8">
                    <input type="text" name="nama_kategori" class="form-control" value="<?php echo $data['nama_kategori']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reser" class="btn btn-secondary">Reset</button>
                <a href="?page=kategori/kategori" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>