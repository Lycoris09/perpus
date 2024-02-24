<?php
 include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Perpustakaan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                        <?php
                                         if(isset($_POST['register'])){
                                            $nama = $_POST['nama_lengkap'];
                                            $email = $_POST['email'];
                                            $telp = $_POST['telp'];
                                            $alamat = $_POST['alamat'];
                                            $username = $_POST['username'];
                                            $password = md5($_POST['password']);
                                            $level = $_POST['level'];
                                            
                                            $tambah = mysqli_query($koneksi, "INSERT INTO `t_user`(username,password,email,telp,nama_lengkap,alamat,level) VALUES ('$username','$password','$email','$telp','$nama','$alamat','$level')");

                                            if($tambah){
                                                echo'<script>alert("selamat anda telah berhasil membuat akun"); location.href="index.php"</script>';
                                            }
                                            else{
                                                echo'<script>alert("maaf anda gagal membuat akun");</script>';
                                            }
                                         }
                                        ?>
                                        <form method="post">
                                        <div class="md-3 row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-md-8">
                                            <input type="text" name="username" class="form-control" placeholder="Masukan Username" style="margin: 5px;" required >
                                        </div>
                                        </div>
                                        <div class="md-3 row">
                                        <label class="col-sm-3 col-form-label">password</label>
                                        <div class="col-md-8">
                                            <input type="password" name="password" class="form-control" placeholder="Masukan Password" style="margin: 5px;" required >
                                        </div>
                                        </div>
                                        <div class="md-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-md-8">
                                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap" style="margin: 5px;" required >
                                        </div>
                                        </div>
                                        <div class="md-3 row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-md-8">
                                            <input type="text" name="email" class="form-control" placeholder="Masukan Email" style="margin: 5px;" required >
                                        </div>
                                        </div>
                                        <div class="md-3 row">
                                        <label class="col-sm-3 col-form-label">No telp</label>
                                        <div class="col-md-8">
                                            <input type="text" name="telp" class="form-control" placeholder="Masukan no telp" style="margin: 5px;" required >
                                        </div>
                                        </div>
                                        <div class="md-3 row">
                                        <label class="col-sm-3 col-form-label">Level</label>
                                        <div class="col-md-8">
                                            <select name="level" class="form-control" style="margin:5px;">
                                                <option value="admin">Admin</option>
                                                <option value="Petugas">Petugas</option>
                                            </select>
                                        </div>
                                        </div>
                                            <div class="form-group">
                                            <label class="small mb-1">Alamat</label>
                                                <textarea name="alamat" rows="5" class="form-control py-3" required></textarea>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-success" type="submit" name="register" value="register">Register</button>
                                                <a href="index.php" class="btn btn-primary">Kembali</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        &copy; 2024 Perpustakaan Digital 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
