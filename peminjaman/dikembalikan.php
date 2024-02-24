<?php
$id = $_GET['id_peminjaman'];
    $tambah = mysqli_query($koneksi, "UPDATE t_peminjaman SET status_peminjaman= 'dikembalikan',jumlah='0' WHERE t_peminjaman.id_peminjaman='$id' ");


?>
<script>
    alert ('Buku berhasil di dikembalikan');
    location.href ="index.php?page=peminjaman/laporan_peminjaman";
</script>
