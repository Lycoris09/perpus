<h1 class="mt-4">Ulasan Buku</h1>
    <div class="row">
        <div class="col-md-12">
            <?php
                if($_SESSION['user']['level']=='anggota' ){
            ?>
        <a href="?page=ulasan/ulasan_tambah" class="btn btn-info">+ Tambah</a>
            <?php
                }
            ?>
            <table id="datatablesSimple" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No </th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                    <?php
                        if($_SESSION['user']['level']!='admin'){
                    ?>
                    <th>Aksi</th>
                    <?php
                        }
                    ?>
                </tr>
            </thead>
                <?php
                        $no =1 ;
                        $query = mysqli_query($koneksi,"SELECT * FROM t_ulasanbuku LEFT JOIN t_user ON t_user.id_user = t_ulasanbuku.id_user LEFT JOIN t_buku ON t_buku.id_buku = t_ulasanbuku.id_buku");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['ulasan'];?></td>
                    <td><?php echo $data['rating'];?></td>
                    <?php
                        if($_SESSION['user']['level']!='admin'){
                    ?>
                    <td><a href="?page=ulasan/ulasan_hapus&&id_ulasan=<?php echo $data['id_ulasan']?>" onclick="return confirm('Apakah kamu yakin ingin menghapus ulasan buku <?php echo $data['judul']?> ?')"  class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
                        }
                        }
                ?>
                  
            </table>
        </div>
    </div>