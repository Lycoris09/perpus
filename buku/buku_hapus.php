<?php
    $id=$_GET['id_buku'];
    $query = mysqli_query($koneksi,"DELETE FROM t_buku WHERE id_buku=$id");
?>
<script>
    alert ('buku berhasil di hapus');
    location.href ="index.php?page=buku";
</script>