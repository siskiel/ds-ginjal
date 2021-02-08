<h2>Tambah Penyakit</h2>

<div class="pull-right">
<a href="index.php?halaman=penyakit" class="btn-warning btn"> << Kembali </a>
</div>
<br>
<br>
<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Nama Penyakit</label>
<input type="text" class="form-control" name="nama">
</div>
<div class="form-group">
<label>Solusi</label>
<input type="text" class="form-control" name="solusi">
</div>
<div class="form-group pull-right">
<button class="btn btn-default " name="rest" type="reset" >Reset</button>
<button class="btn btn-success" name="save">Simpan</button>
</form>
<?php 
if(isset($_POST['save']))
{
    
    $koneksi->query("INSERT INTO penyakit (nama_penyakit,solusi) VALUES('$_POST[nama]','$_POST[solusi]')");
    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penyakit'>";
}
?>
