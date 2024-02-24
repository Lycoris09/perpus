<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellpading="5" width="100%" >
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjam</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                </tr>
                <?php
                        include 'koneksi.php';
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
                </tr>
                <?php
                        }
                ?>
                  
            </table>
            <script>
                window.print();
                setTimeout(function() {
                    window.close();
                },100);
            </script>