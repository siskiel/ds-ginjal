<?php $ambil=$koneksi->query("SELECT * FROM pasien WHERE pasien.id_pasien='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<h2>Detail Pasien <?php echo $detail['nama_pasien']; ?> </h2>
<div class="pull-right">
<a href="index.php?halaman=diagnosa" class="btn btn-warning"> << Kembali </a>
</div>
<br>
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p> Tanggal Lahir</p> 
            <input type="text" readonly value="<?php  echo date ('d F Y', strtotime($detail['tgl_lahir']));?>" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p>Umur</p> 
            <input type="text" readonly value="<?php echo $detail['umur']; ?> Tahun" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p>Jenis Kelamin</p> 
            <input type="text" readonly value="<?php echo $detail['jk']; ?>" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p>Pekerjaan</p> 
            <input type="text" readonly value="<?php echo $detail['pekerjaan']; ?>" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p>No. HP</p> 
            <input type="text" readonly value="<?php echo $detail['no_hp']; ?>" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p>Alamat</p> 
            <input type="text" readonly value="<?php echo $detail['alamat']; ?>" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p>Tanggal Konsul</p> 
            <input type="text" readonly value="<?php echo date ('d F Y', strtotime( $detail['tgl_konsul'])); ?>" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-6">
            <p>Total Perhitungan</p> 
            <input type="text" readonly value="<?php echo round($detail['total_perhitungan'],2); ?>" class="form-control"> 
        </div>
    </div>
</div> 
<div class="form-row">
    <div class="form-group">
        <div class="col-md-12">
            <h4><strong>Detail Gejala</strong></h4> 
            <table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2">Penjelasan</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
                    $result = $koneksi->query("SELECT * FROM pasien JOIN penyakit ON pasien.id_penyakit = penyakit.id_penyakit WHERE id_pasien='".$_GET['id']."'");
    
                    $no = 1;
                    while($row = mysqli_fetch_array($result)):
                        echo "<tr>";
                        echo "<th>Penyakit</th>";
                        echo "<td>" . $row['kode_penyakit'] . " <br> " . $row['nama_penyakit'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th>Gejala</th>";
                        echo "<td>";
                        $gejala = unserialize($row['gejala']);
                        foreach ($gejala as $key => $value) {
                            $result_gejala = $koneksi->query("SELECT * FROM gejala WHERE id_gejala='".$value."'");
                            while($row_gejala = mysqli_fetch_array($result_gejala)):
                                echo $key+1 . ". " . $row_gejala['nama_gejala'] . "<br>";
                            endwhile;
                        }
                        echo "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Solusi</th>";
                        echo "<td>" . $row['solusi'] . "</td>";
                        echo "</tr>";
                        
                        $no++;
                    endwhile;
    
                    mysqli_close($koneksi);
                ?>
        
    </tbody>
</table>
        </div>
    </div>
</div>
<!-- <div class="pull-right">
<a href="cetak.php&id=<?php echo $detail['id_pasien'];?>" class="btn btn-primary" > <i class="fa fa-print">  Print</i> </a>
</div> -->

