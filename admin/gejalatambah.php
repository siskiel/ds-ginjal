<h2>Tambah Gejala</h2>
<div class="pull-right">
<a href="index.php?halaman=gejala" class="btn btn-warning"> << Kembali </a>
</div>
<br>
<br>

<form method="post">
<div class="form-group">
<label>Nama Gejala</label>
<input type="text" class="form-control" name="nama">
</div>
<div class="form-group">
<label>Nilai Densistas</label>
<input type="float" class="form-control" name="nilai">
</div>
<div class="form-group pull-right">
<button class="btn btn-default " name="rest" type="reset" >Reset</button>
<button class="btn btn-success" name="save">Simpan</button>
</form>
<?php 
if(isset($_POST['save']))
{
    
    $koneksi->query("INSERT INTO gejala (nama_gejala,nilai_ds) VALUES('$_POST[nama]','$_POST[nilai]')");
    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=gejala'>";
}
?>
