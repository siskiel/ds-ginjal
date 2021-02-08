<?php

$ambil = $koneksi->query("SELECT * FROM gejala WHERE id_gejala='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM gejala WHERE id_gejala='$_GET[id]'");

echo "<div class='alert alert-info'>Gejala Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=gejala'>";

?>
