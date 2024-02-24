<?php
    $id=$_GET['id_ulasan'];
    $query = mysqli_query($koneksi,"DELETE FROM t_ulasanbuku WHERE id_ulasan=$id");
?>
<script>
    alert ('ulasan berhasil di hapus');
    location.href ="index.php?page=ulasan";
</script>