<h2>Edit Data Penyakit</h2>

<div class="pull-right">
<a href="index.php?halaman=penyakit" class="btn-warning btn"> << Kembali </a>
</div>
<br>
<br>
<?php

$ambil = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>


<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Nama penyakit</label>
<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_penyakit'];?>">
</div>
<div class="form-group">
<label>Solusi</label>
<input type="text" class="form-control" name="solusi" value="<?php echo $pecah['solusi'];?>">
</div>
<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php 
if(isset($_POST['ubah']))
{
    
        $koneksi->query("UPDATE penyakit SET nama_penyakit='$_POST[nama]',
        solusi='$_POST[solusi]' WHERE id_penyakit='$_GET[id]'");
    
echo "<div class='alert alert-info'>Data Berhasil di ubah</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penyakit'>";
}
?>

