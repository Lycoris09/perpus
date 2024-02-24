<h1 class="mt-4">Buku</h1>
    <div class="row">
        <div class="col-md-12">
            <?php
                if($_SESSION['user']['level']!='anggota'){
            ?>
        <a href="?page=buku/buku_tambah" class="btn btn-info">+ Tambah</a>
        <?php
                }
        ?>
        <div class="row">
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $query = mysqli_query($koneksi,"SELECT * FROM t_buku LEFT JOIN t_kategoribuku on t_buku.id_kategori = t_kategoribuku.id_kategori");
            while($data = mysqli_fetch_array($query)){
            ?>
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 20rem; margin:5px;">
                    <img src="<?php echo $data['foto']; ?>" class="card-img-top" style="height:40vh;" alt="<?php echo $data['judul']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                        <p class="card-text"><textarea class="form-control py-3" style="border:none ;" readonly ><?php echo $data['deskripsi']; ?></textarea></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kategori: <?php echo $data['nama_kategori']; ?></li>
                            <li class="list-group-item">Penulis: <?php echo $data['penulis']; ?></li>
                            <li class="list-group-item">Penerbit: <?php echo $data['penerbit']; ?></li>
                            <li class="list-group-item">Tahun Terbit: <?php echo $data['tahun_terbit']; ?></li>
                            <li class="list-group-item">Stok: <?php echo $data['stok']; ?></li>
                        </ul>
                        <div class="mt-3">
                            <?php
                            if($_SESSION['user']['level']!='anggota'){
                            ?>
                            <a href="?page=buku/buku_ubah&&id_buku=<?php echo $data['id_buku']?>" class="btn btn-info">Ubah</a>
                            <a href="?page=buku/buku_hapus&&id_buku=<?php echo $data['id_buku']?>" onclick="return confirm('Apakah kamu yakin ingin menghapus <?php echo $data['judul']?>?')"  class="btn btn-danger">Hapus</a>
                            <?php
                            }
                            else{
                            ?>
                            <a href="?page=peminjaman/peminjaman_tambah&&id_buku=<?php echo $data['id_buku']?>" onclick="return confirm('Apakah kamu mau meminjam buku ini?')" class="btn btn-info">Pinjam</a>
                            <?php
                                        }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        </div>
    </div>
    