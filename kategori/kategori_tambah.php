<h1 class="mt-4">Tambah Kategori Buku</h1>
    <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
        <form method="post">
            <?php
                if(isset($_POST['submit'])){
                $kategori = $_POST['nama_kategori'];
                $tambah = mysqli_query($koneksi,"INSERT INTO t_kategoribuku (nama_kategori) values ('$kategori')");
                
                if($tambah){
                    echo '<script>alert("Tambah Kategori Berhasil ")</script>';
                }
                else{
                    echo '<script>alert("Maaf gagal menambah kategori ")</script>';
                }
            }
            ?>
                <div class="md-3 row">
                <label class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-md-8">
                    <input type="text" name="nama_kategori" class="form-control">
                </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reser" class="btn btn-secondary">Reset</button>
                <a href="?page=kategori/kategori" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>