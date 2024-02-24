
<h1 class="mt-4">Kembali ke halaman buku</h1>
<a href="?page=buku/buku" class="btn btn-info">kembali</a>
<?php
    date_default_timezone_set('Asia/Jakarta');
      $id_user = $_SESSION['user']['id_user'];
      
      $cek_peminjaman = mysqli_query($koneksi, "SELECT * FROM t_peminjaman WHERE id_user = '$id_user' AND (status_peminjaman = 'diajukan' OR status_peminjaman = 'dipinjam')");
      
      if (mysqli_num_rows($cek_peminjaman) > 0) {
          echo '<script>alert("Anda sudah memiliki peminjaman yang belum selesai. Kembalikan atau batalkan peminjaman sebelum meminjam lagi.") </script>';
      } else {
          $id_buku = $_GET['id_buku'];

          $cek_stok = mysqli_query($koneksi, "SELECT stok FROM t_buku WHERE id_buku = '$id_buku'");
          $data_stok = mysqli_fetch_assoc($cek_stok);
          $stok_buku = $data_stok['stok'];

          if ($stok_buku > 0) {
              $kode = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(kode_peminjaman,3)) as max_kode From t_peminjaman");
              $row = mysqli_fetch_array($kode);
              $max_kode = $row['max_kode'];
              if ($max_kode == null) {
                  $new_kode = 'PM001';
              } else {
                  $new_kode = 'PM' . str_pad($max_kode + 1, 3, '0', STR_PAD_LEFT);
              }
              $stok = '0';
              $batas_diajukan = date('y-m-d H:i:s', strtotime('+3 day'));
              $tambah = mysqli_query($koneksi, "INSERT INTO t_peminjaman (id_user, id_buku, batas_diajukan, status_peminjaman, kode_peminjaman,jumlah) VALUES ('$id_user', '$id_buku', '$batas_diajukan','diajukan','$new_kode','$stok')");

              if ($tambah) {
                  echo '<script>
                  alert("Buku berhasil diajukan");
                  location.href = "index.php?page=peminjaman/peminjaman";
                  </script>';
              } else {
                  echo '<script>alert("Maaf, Anda gagal meminjam ")</script>';
              }
          } else {
              echo '<script>alert("Maaf, stok buku tidak cukup untuk dipinjam")</script>';
          }
      }
  
?>