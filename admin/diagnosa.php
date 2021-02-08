<h2> Diagnosa</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Tanggal Konsul</th>
            <th>Umur</th>
            <th>No.Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT * FROM pasien
        
            ");?>
        <?php while($pecah = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_pasien'];?></td>
            <td><?php echo date ('d F Y', strtotime($pecah['tgl_konsul']));?></td>
            <td><?php echo $pecah['umur'];?></td>
            <td><?php echo $pecah['no_hp'];?></td>
            <td>
                <a href="index.php?halaman=diagnosadetail&id=<?php echo $pecah['id_pasien']?>" class="btn-info btn">Detail</a>
            </td> 
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>