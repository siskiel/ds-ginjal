<?php
include '../config/koneksi.php';

if(!isset($_SESSION['user']))
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Batu Karang - Expert System</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"> <?=$_SESSION['user']['nama_lengkap'];?> Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><span id="tanggalwaktu">   </span> 
           <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">    Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/images.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=gejala"><i class="fa fa-question fa-2x"></i>Gejala</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=penyakit"><i class="fa fa-search fa-2x"></i> Penyakit</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=rule"><i class="fa fa-cloud fa-2x"></i> Basis Pengetahuan</a>
                    </li> 
                    <li>
                        <a href="index.php?halaman=diagnosa"><i class="fa fa-clipboard fa-2x"></i>Diagnosa</a>
                    </li>     
                    <li>
                        <a href="index.php?halaman=logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a>
                    </li>               	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman']))
                {
                    if($_GET['halaman']=="gejala"){
                        include 'gejala.php';
                    }
                    elseif($_GET['halaman']=="gejalahapus"){
                        include 'gejalahapus.php';
                    }
                    elseif($_GET['halaman']=="gejalaubah"){
                        include 'gejalaubah.php';
                    }
                    elseif($_GET['halaman']=="gejalatambah"){
                        include 'gejalatambah.php';
                    }
                    elseif($_GET['halaman']=="penyakit"){
                        include 'penyakit.php';
                    }
                    elseif($_GET['halaman']=="penyakithapus"){
                        include 'penyakithapus.php';
                    }
                    elseif($_GET['halaman']=="penyakittambah"){
                        include 'penyakittambah.php';
                    }
                    elseif($_GET['halaman']=="penyakitubah"){
                        include 'penyakitubah.php';
                    }
                    elseif($_GET['halaman']=="rule"){
                        include 'rule.php';
                    }
                    elseif($_GET['halaman']=="ruletambah"){
                        include 'ruletambah.php';
                    }
                    elseif($_GET['halaman']=="ruleubah"){
                        include 'ruleubah.php';
                    }
                    elseif($_GET['halaman']=="rulehapus"){
                        include 'rulehapus.php';
                    }
                    elseif($_GET['halaman']=="diagnosa"){
                        include 'diagnosa.php';
                    }
                    elseif($_GET['halaman']=="diagnosadetail"){
                        include 'diagnosadetail.php';
                    }
                    
                    elseif($_GET['halaman']=="logout"){
                        include 'logout.php';
                    }
                }
                else{
                    include 'home.php';
                }
                ?>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

<!-- tanggal dan waktu  -->
        <script>
 var tw = new Date();
                                    if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
                                    else (a=tw.getTime());
                                    tw.setTime(a);
                                    var tahun= tw.getFullYear ();
                                    var hari= tw.getDay ();
                                    var bulan= tw.getMonth ();
                                    var tanggal= tw.getDate ();
                                    var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
                                    var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
                                    document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+" Jam " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes() + (" WIB ");
                                    </script>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    
   
</body>
</html>
