<h1 class="mt-4">History Peminjaman</h1>
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
                    <th>Status Peminjaman</th>
                </tr>
            </thead>
                <?php
                        $no =1 ;
                        $query = mysqli_query($koneksi,"SELECT * FROM t_peminjaman LEFT JOIN t_user ON t_user.id_user = t_peminjaman.id_user LEFT JOIN t_buku ON t_buku.id_buku = t_peminjaman.id_buku WHERE status_peminjaman='dikembalikan'" );
                        while($data = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['kode_peminjaman'];?></td>
                    <td><?php echo $data['tgl_peminjaman'];?></td>
                    <td><?php echo $data['tgl_pengembalian'];?></td>
                    <td><?php echo $data['status_peminjaman'];?></td>
                </tr>
                <?php
                        }
                ?>
                  
            </table>
        </div>
    </div>