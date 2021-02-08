<h2>Basis Pengetahuan</h2>
<a href="index.php?halaman=ruletambah" class="btn-primary btn">Tambah Basis Pengetahuan</a>
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Gejala</th>
            <th>Gejala</th>
            <th>Kode Penyakit</th>
            <th>Penyakit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>


        <?php $nomor=1;?>

        <?php $ambil=$koneksi->query("SELECT * FROM rule 
            INNER JOIN gejala ON rule.id_gejala=gejala.id_gejala 
            JOIN penyakit ON rule.id_penyakit=penyakit.id_penyakit
        ");?>
        <?php while($pecah = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['kode_gejala'];?></td>
            <td><?php echo $pecah['nama_gejala'];?></td>
            <td><?php echo $pecah['kode_penyakit'];?></td>
            <td><?php echo $pecah['nama_penyakit'];?></td>
             <td>
                <a href="index.php?halaman=ruleubah&id=<?php echo $pecah['id_rule'];?>" i class="fa fa-clipboard fa-1x btn-primary btn">Edit</a>
                <a href="index.php?halaman=rulehapus&id=<?php echo $pecah['id_rule'];?>" i class="fa fa-times fa-1x btn-danger btn" onclick="return confirm('Apakah yakin ingin menghapus data rule?');">Hapus</a>
            </td> 
            
        </tr>
        <?php $nomor++;?>
        <?php }?> 
    </tbody>
</table>


<!-- SELECT * FROM rule 
            INNER JOIN gejala ON rule.id_gejala = gejala.id_gejala 
            INNER JOIN penyakit ON rule.id_penyakit = penyakit.id_penyakit 
SELECT * FROM rule JOIN gejala ON id_gejala = id_gejala Join penyakit ON id_gejala = id_penyakit
            -->
