<?php

$ambil = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM penyakit WHERE id_penyakit='$_GET[id]'");

echo "<div class='alert alert-info'>Penyakit Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penyakit'>";

?>
