<?php
    $id=$_GET['id_peminjaman'];
    $query = mysqli_query($koneksi,"DELETE FROM t_peminjaman WHERE id_peminjaman=$id");
?>
<script>
    alert ('peminjaman berhasil di batalkan');
    location.href ="index.php?page=peminjaman";
</script>