<?php

$ambil = $koneksi->query("SELECT * FROM rule WHERE id_rule='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM rule WHERE id_rule='$_GET[id]'");

echo "<div class='alert alert-info'>Basis Pengetahuan Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=rule'>";

?>
