<h1 class="mt-4">Ulasan Buku</h1>
    <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
        <form method="post">
            <?php
                if(isset($_POST['submit'])){
                $id_buku = $_POST['id_buku'];
                $ulasan = $_POST['ulasan'];
                $id_user = $_SESSION['user']['id_user'];
                $rating = $_POST['rating'];
                $tambah = mysqli_query($koneksi,"INSERT INTO t_ulasanbuku (id_user,id_buku,ulasan,rating) VALUES('$id_user','$id_buku','$ulasan','$rating')");
                
                if($tambah){
                    echo '<script>alert("Tambah ulasan Berhasil ")</script>';
                }
                else{
                    echo '<script>alert("Maaf gagal menambah ulasan ")</script>';
                }
            }
            ?>
                <div class="col-md-4"> Buku </div>
                <div class="col-md-8">
                    <select name="id_buku" class="form-control">
                        <?php
                        $book = mysqli_query($koneksi,"SELECT * FROM t_buku ");
                        while($buku = mysqli_fetch_array($book)){ 
                        ?>
                        <option value="<?php echo $buku['id_buku'];?>"><?php echo $buku['judul'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4"> Ulasan </div>
                <div class="col-md-8">
                    <textarea name="ulasan" rows="5" class="form-control py-3"></textarea>
                </div>
                <div class="col-md-4"> Rating</div>
                <div class="col-md-8">
                <select name="rating" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reser" class="btn btn-secondary">Reset</button>
                <a href="?page=ulasan/ulasan" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>