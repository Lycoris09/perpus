<h1 class="mt-4">Akun Peminjam</h1>
    <div class="row">
        <div class="col-md-12">
        <table id="datatablesSimple" class="table table-striped" style="width:100%">
        <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Nama Lengkap</th>
                    <th>Alanmat</th>
                </tr>
        </thead>
                <?php
                        $no =1 ;
                        $query = mysqli_query($koneksi,"SELECT * FROM t_user WHERE level='anggota'");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['username'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['telp'];?></td>
                    <td><?php echo $data['nama_lengkap'];?></td>
                    <td><?php echo $data['alamat'];?></td>
                </tr>
                <?php
                        }
                ?>
                  
            </table>
        </div>
    </div>