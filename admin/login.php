<?php
include '../config/koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login E-xpert system</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">

				<?php 
					if(isset($_POST['login']))
					{
						$ambil = $koneksi->query("SELECT * FROM user WHERE email='$_POST[email]'
						AND password='$_POST[pass]'");
						$yangcocok = $ambil->num_rows;
						if ($yangcocok==1)
						{
							$_SESSION['user']=$ambil->fetch_assoc();
							echo "<div class='alert alert-info'>Login Berhasil</div>";
   							 echo "<meta http-equiv='refresh' content='1;url=index.php'>";
						}
						else{
							echo "<div class='alert alert-danger'>Login Gagal</div>";
   							 echo "<meta http-equiv='refresh' content='1;url=login.php'>";
						}
						

					}
				?>
					<span class="login100-form-title p-b-43">
						Login Administrator
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
						<br>
						<br>
						<br>
						<a class="btn btn-warning btn-block" href="../index.php" role="button">Kembali</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../assets/login/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	

	
	
<!--===============================================================================================-->
	<script src="../assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../assets/login/js/main.js"></script>

</body>
</html>