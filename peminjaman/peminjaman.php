<h1 class="mt-4">Pinjam Buku</h1>
    <div class="row">
        <div class="col-md-12">
        <table id="datatablesSimple" class="table table-striped" style="width:100%">
        <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Kode Peminjaman</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Batas Diajukan</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
        </thead>
                <?php
                        $no =1 ;
                        $query = mysqli_query($koneksi,"SELECT * FROM t_peminjaman LEFT JOIN t_user ON t_user.id_user = t_peminjaman.id_user LEFT JOIN t_buku ON t_buku.id_buku = t_peminjaman.id_buku WHERE t_peminjaman.id_user=" . $_SESSION['user']['id_user'] );
                        while($data = mysqli_fetch_array($query)){
                        $batas_diajukan = date('Y-m-d', strtotime($data['tgl_peminjaman'] . ' + 3 days'));
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['kode_peminjaman'];?></td>
                    <td><?php echo $data['tgl_peminjaman'];?></td>
                    <td><?php echo $data['tgl_pengembalian'];?></td>
                    <td><?php echo $data['batas_diajukan'];?></td>
                    <td><?php echo $data['status_peminjaman'];?></td>
                    <td>
                    <?php
                        if ($data['status_peminjaman'] != 'dipinjam' && $data['status_peminjaman'] != 'dikembalikan' && $data['status_peminjaman'] != 'expired') {
                            if (strtotime($batas_diajukan) < strtotime(date('Y-m-d H:i:s'))) {
                                mysqli_query($koneksi, "UPDATE t_peminjaman SET status_peminjaman='expired' WHERE id_peminjaman=" . $data['id_peminjaman']);
                                echo '<script>alert("Data peminjaman melebihi batas diajukan.")</script>';
                            } else {
                        ?>
                            <a href="?page=peminjaman_hapus&&id_peminjaman=<?php echo $data['id_peminjaman'] ?>" onclick="return confirm('Apakah kamu yakin ingin membatalkan <?php echo $data['judul'] ?> dari Peminjaman?')" class="btn btn-danger">Batal</a>
                        <?php
                            }
                        }
                        if ($data['status_peminjaman'] != 'dipinjam' && $data['status_peminjaman'] != 'dikembalikan' && $data['status_peminjaman'] != 'diajukan') {
                        ?>
                          <a href="?page=peminjaman_hapus&&id_peminjaman=<?php echo $data['id_peminjaman'] ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus hisroty?')" class="btn btn-danger">Hapus</a>
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