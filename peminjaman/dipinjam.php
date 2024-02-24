<?php
date_default_timezone_set('Asia/Jakarta');
$id = $_GET['id_peminjaman'];

// Perbarui status peminjaman menjadi 'dipinjam' dan jumlah menjadi '1'
$ubah = mysqli_query($koneksi, "UPDATE t_peminjaman SET status_peminjaman='dipinjam', jumlah='1',batas_diajukan=NULL WHERE t_peminjaman.id_peminjaman='$id'");

if ($ubah) {
    $query = mysqli_query($koneksi, "SELECT tgl_peminjaman FROM t_peminjaman WHERE id_peminjaman='$id'");
    $data = mysqli_fetch_assoc($query);
    $tgl_peminjaman = date('y-m-d H:i:s');

    $tgl_pengembalian = date('Y-m-d H:i:s', strtotime($tgl_peminjaman . ' + 7 days'));

    // Update tanggal pengembalian di database
    mysqli_query($koneksi, "UPDATE t_peminjaman SET tgl_peminjaman='$tgl_peminjaman',tgl_pengembalian='$tgl_pengembalian' WHERE id_peminjaman='$id'");

    echo '<script>
            alert("Buku memperbarui status");
            location.href = "index.php?page=peminjaman/laporan_peminjaman";
          </script>';
} else {
    echo '<script>
            alert("Gagal memperbarui status peminjaman");
            history.go(-1);
          </script>';
}
?>
