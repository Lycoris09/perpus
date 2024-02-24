<h1 class="mt-4">Laporan Peminjaman</h1>
    <div class="row">
        <div class="col-md-12">
        <a href="cetak.php" target="_blank" class="btn btn-info"><i class="fa fa-print"></i>Cetak Data</a>
        <table id="datatablesSimple" class="table table-striped" style="width:100%">
        <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
        </thead>
                <?php
                        $no =1 ;
                        $query = mysqli_query($koneksi,"SELECT * FROM t_peminjaman LEFT JOIN t_user ON t_user.id_user = t_peminjaman.id_user LEFT JOIN t_buku ON t_buku.id_buku = t_peminjaman.id_buku");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['tgl_peminjaman'];?></td>
                    <td><?php echo $data['tgl_pengembalian'];?></td>
                    <td><?php echo $data['status_peminjaman'];?></td>
                    <td>
                    <?php 
                        if($data['status_peminjaman']!='dikembalikan' && $data['status_peminjaman']=='dipinjam'){
                    ?>
                        <a href="?page=peminjaman/dikembalikan&&id_peminjaman=<?php echo $data['id_peminjaman']?>" onclick="return confirm('Apakah user ini <?php echo $data['nama_lengkap']?> ingin menngembalikan buku yang sudah di pinjam?')"  class="btn btn-success"><i class="fa-solid fa-square-check"></i></a>
                    <?php
                                }
                    ?>
                    <?php 
                        if($data['status_peminjaman']!='dipinjam' && $data['status_peminjaman']=='diajukan'){
                    ?>
                        <a href="?page=peminjaman/dipinjam&&id_peminjaman=<?php echo $data['id_peminjaman']?>" onclick="return confirm('Apakah user ini <?php echo $data['nama_lengkap']?> sudah mengajukan buku yang mau dipinjam?')"  class="btn btn-primary"><i class="fa-solid fa-square-check"></i></a>
                    <?php
                        }
                    ?>        
                    </td>
                </tr>
                <?php
                        }
                ?>
                  
            </table>
        </div>
    </div>