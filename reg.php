<!-- halaman konsultasi -->
<?php
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Isi Data Diri</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="assets/regform/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/regform/css/style.css">
		 <style>
        /*design table 1*/
        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }
        
        .table1, th, td {
            padding: 8px 10px;
        }

        .table1, th {
            font-size: 15px;
        }
    </style>
	</head>

	<body>

		<div class="wrapper" style="background-image: url('assets/regform/images/bg-registration-form-2.jpg');">
			<div class="inner">
				<form method="POST" action="aksi-reg.php">
					<h3>Registration Form</h3>
					<div class="form-wrapper">
						<label for="">Nama Lengkap</label>
							<input type="text" class="form-control" placeholder="Nama Lengkap" name="name" id="name" required>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Jenis Kelamin</label>
							<select name="jk" id="jk" class="form-control" required>
								<option value="">-Pilih-</option>
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Permpuan">Perempuan</option>
							</select>
							<!-- <i class="zmdi zmdi-chevron-down"></i> -->
						</div>
						<div class="form-wrapper">
							<label for="">No. Hp</label>
							<input type="text" class="form-control" placeholder="0812xxxxxx"  name="no_hp" id="no_hp" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Tanggal Lahir</label>
							<span class="lnr lnr-calendar-full"></span>
							<input type="date" class="form-control datepicker-here" id="tgllahir" placeholder="Tanggal Lahir"  name="tgllahir"required >
						</div>
						<div class="form-wrapper">
							<label for="">Umur</label>
							<input type="text" class="form-control" placeholder="umur"  name="umur" id="umur" required>
						</div>
					</div>
					<div class="form-wrapper">
							<label for="">Alamat</label>
							<input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" required>
						</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Tanggal Konsul</label>
							<span class="lnr lnr-calendar-full"></span>
							<input type="date" class="form-control datepicker-here" id="tglkonsul" placeholder="Tanggal Hari ini"  name="tglkonsul"required >
						</div>
						<div class="form-wrapper">
							<label for="">Pekerjaan</label>
							<input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" id="pekerjaan" required>
						</div>
					</div>
					 <?php $ambil=$koneksi->query("SELECT * FROM gejala"); $no=1;?>
                        <table class="table1">
                            <?php while($pecah = $ambil->fetch_assoc()){?>
                                <tr>
                                    <td align="left">
                                        <div class="checkbox form-group">
                                            <input type="checkbox" name="id_gejala[<?php echo $pecah['id_gejala'] ?>]" id="<?php echo 'ya' . $pecah['id_gejala'] ?>" value ="<?php echo $pecah['nilai_ds'];?>"><?php echo $pecah['nama_gejala'];?>
                                            <span class="checkmark"></span>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
					<div class="form-submit">
                            <a href="index.php" class="button">Kembali</a>
                            <input type="reset" value="Reset All" class="button btn-warning submit" name="reset"  id="reset"/>
                            <button type="submit" class="submit" name="submit" id="submit" data-text="Submit Form"><span>Submit Form</span></button>
                        </div>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>