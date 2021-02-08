<h2>Tambah Basis Data</h2>
<div class="pull-right">
<a href="index.php?halaman=rule" class="btn-warning btn"> << Kembali </a>
</div>
<br>
<br>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="gejala">Nama Gejala</label>
<select name="gejala" id="gejala" class="form-control" required>
	<option value=""> - Pilih -</option>
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
	<option value=""> - Pilih -</option>
	<?php  
	$ambilpenyakit = $koneksi->query("SELECT * FROM penyakit");
	while($pecah = $ambilpenyakit->fetch_assoc()) {
		echo '<option value="'.$pecah['id_penyakit'].'">'.$pecah['nama_penyakit'].'</option>';
	}
	?>
</select>
</div>
<div class="form-group pull-right">
<button class="btn btn-default " name="rest" type="reset" >Reset</button>
<button class="btn btn-success " name="save">Simpan</button>
</form>
<?php 
if(isset($_POST['save']))
{
    
    $koneksi->query("INSERT INTO rule (id_gejala,id_penyakit) VALUES('$_POST[gejala]','$_POST[penyakit]')");
    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=rule'>";
}
?>
