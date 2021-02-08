<h2> Data penyakit</h2>
<a href="index.php?halaman=penyakittambah" class="btn-primary btn">Tambah penyakit</a>
<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penyakit</th>
            <th>Solusi</th>
            <th>Aksi</th>
            
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT * FROM penyakit");?>
        <?php while($pecah = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_penyakit'];?></td>
            <td><?php echo $pecah['solusi'];?></td>
            
            <td>
                <a href="index.php?halaman=penyakitubah&id=<?php echo $pecah['id_penyakit'];?>" i class="fa fa-clipboard fa-1x btn-primary btn">Edit</a>
                <a href="index.php?halaman=penyakithapus&id=<?php echo $pecah['id_penyakit'];?>" i class="fa fa-times fa-1x btn-danger btn" onclick="return confirm('Apakah yakin ingin menghapus data penyakit?');">Hapus</a>
            </td> 
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>