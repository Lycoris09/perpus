<?php
    $id=$_GET['id_kategori'];
    $query = mysqli_query($koneksi,"DELETE FROM t_kategoribuku WHERE id_kategori=$id");
?>
<script>
    alert ('Kategori berhasil di hapus');
    location.href ="index.php?page=kategori";
</script>