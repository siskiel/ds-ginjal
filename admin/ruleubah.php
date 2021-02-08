<h2>Edit Data Basis Pengetahuan</h2>

<div class="pull-right">
<a href="index.php?halaman=rule" class="btn-warning btn"> << Kembali </a>
</div>
<br>
<br>
<?php

$ambil = $koneksi->query("SELECT * FROM rule WHERE id_rule='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="gejala">Nama Gejala</label>
<select name="gejala" id="gejala" class="form-control" required>
	<?php  
	$ambilgejala = $koneksi->query("SELECT * FROM gejala");
	while($pecah = $ambilgejala->fetch_assoc()) {
		echo '<option value="'.$pecah['id_gejala'].'">'.$pecah['nama_gejala'].'</option>';
	}
	?>
</select>
</div>
<div class="form-group">
<label>Nama Penyakit</label>
<select name="penyakit" id="penyakit" class="form-control" required>
	<?php  
	$ambilpenyakit = $koneksi->query("SELECT * FROM penyakit");
	while($pecah = $ambilpenyakit->fetch_assoc()) {
		echo '<option value="'.$pecah['id_penyakit'].'">'.$pecah['nama_penyakit'].'</option>';
	}
	?>
</select>
</div>
<button class="btn-btn primary" name="ubah">Ubah</button>
</form>
<?php 
if(isset($_POST['ubah']))
{
    
        $koneksi->query("UPDATE rule SET id_gejala='$_POST[gejala]',
        id_penyakit='$_POST[penyakit]' WHERE id_rule='$_GET[id]'");
    
echo "<div class='alert alert-info'>Data Berhasil di ubah</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=rule'>";
}
?>

