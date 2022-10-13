<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Un document bilingue</TITLE>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</HEAD>
<style type="text/css">
body {
	background-color: #3b7ab2;
    color: #fff
}
a {
    color:#fff
}
</style>
<BODY>	
</head>
<?php 
session_start(); 
	include('connect.php');
////$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
 if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";;
</script>
<?php	 }
$query01 ="SELECT saison FROM saison where actif = 1";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);
$saison = $row01[0];
?>

<TABLE class="navbar" >
<TR><TD><?php echo $club; ?> <br> <?php echo $saison;?> </TD></TR>
<TR><TD><br></TD></TR>
 <?PHP if (($club == "ADMIN")or($club == "DTN")){ ?>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="corp.php" target="main">Acceuil</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affarchive.php" target="main">Historiques</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affclub.php" target="main">Club</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affclubs.php" target="main">Club Par Saison</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affsaison.php" target="main">Saison</a></div></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i><a href="affparam.php" target="main">Poids</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affage.php" target="main">Age</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="listeph.php" target="main">Photo</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="listephs.php" target="main">Photo Staff</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> --------------------</TD></TR>
<?PHP } ?>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="changepw.php" target="main">Modification PW</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affentraineur.php" target="main">Entraineurs</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affentraineurs.php" target="main">Entraineurs à valider</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affathlete.php" target="main">Licences</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affathletes.php" target="main">Licences à Valider</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affathletedel.php" target="main">Licences Non Valide</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affprogramme.php" target="main">Competitions</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="findathlete.php" target="main">Recherche</a></TD></TR>
 <?PHP if (($club <> "DTN")){ ?>

 <?PHP } ?>

<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i> <a href="affstatistique.php" target="main">Statistique</a></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i><a href="affpaiementt.php" target="main">Paiement à Valider</a></div></TD></TR>
<TR class="nav-item"><TD><i class="fas fa-fw fa-user"></i><a href="affpaiement.php" target="main">Paiement</a></TD></TR>

</TABLE>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

</html>
