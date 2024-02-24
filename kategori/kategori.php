<h1 class="mt-4">Kategori Buku</h1>
    <div class="row">
        <div class="col-md-12">
        <a href="?page=kategori/kategori_tambah" class="btn btn-info">+ Tambah</a>
            <table id="datatablesSimple" class="table table-striped" style="width:100%">
               <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
               </thead>
                <?php
                        $no =1 ;
                        $query = mysqli_query($koneksi,"SELECT * FROM t_kategoribuku");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_kategori'];?></td>
                    <td><a href="?page=kategori/kategori_ubah&&id_kategori=<?php echo $data['id_kategori']?>" class="btn btn-info">Ubah</a>
                    <a href="?page=kategori/kategori_hapus&&id_kategori=<?php echo $data['id_kategori']?>" onclick="return confirm('Apakah kamu yalin ingin menghapus <?php echo $data['nama_kategori']?> dari kategori?')"  class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
                        }
                ?>
                  
            </table>
        </div>
    </div>