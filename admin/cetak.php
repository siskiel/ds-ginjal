<?php
    include('../assets/hasil-konsultasi/plugins/dompdf/autoload.inc.php');
    include('../koneksi.php');
    ob_start();
    $result = $koneksi->query("SELECT * FROM pasien JOIN penyakit ON pasien.id_penyakit = penyakit.id_penyakit WHERE id_pasien='".$_GET['id']."'");
    $detail = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Diagnosa Penyakit</title>

    <style>
        .table {
            width: 100%; background-color: transparent; border-collapse: collapse; display: table;
        }

        .table tr th {
            background: red;
            color: #fff;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <center>
        <h1>Laporan Diagnosa Penyakit</h1>

        <hr/><br/><br/><br/>

        <table class="table" border="1px">
            <tbody>
                <?php
                    
    
                    $no = 1;
                    while($row = mysqli_fetch_array($result)):
                        echo "<tr>";
                        echo "<th>No</th>";
                        echo "<td>" . $no . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Nama Lengkap</th>";
                        echo "<td>" . $row['nama_pasien'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Tgl. Lahir</th>";
                        echo "<td>" . $row['tgl_lahir'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Umur</th>";
                        echo "<td>" . $row['umur'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Jenis Kelamin</th>";
                        echo "<td>" . $row['jk'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Pekerjaan</th>";
                        echo "<td>" . $row['pekerjaan'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>No. Hp</th>";
                        echo "<td>" . $row['no_hp'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Alamat</th>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<th>Tgl. Konsul</th>";
                        echo "<td>" . $row['tgl_konsul'] . "</td>";
                        echo "</tr>";

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
    </center>

    <br><br><br>

    <div style="float: right">
        <p>Medan,                 2020</p> <br><br>

        <p>Nama Dr.</p>
    </div>
</body>
</html>

<?php
$html = ob_get_clean();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_hasil.pdf');
?>