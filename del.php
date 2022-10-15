<?php
session_start();
if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "fr"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

// (D) LOAD LANGUAGE FILE
require "languages/"."lang-" . $_SESSION["lang"] . ".php";
$club5 = $_SESSION['club'];
 if ($club5 == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";
</script>

<?php	 }
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
          <!-- Custom fonts for this template-->
          <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="print.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Consultation competition</title>
</HEAD>
<script language="javascript" type="text/javascript">
// You can place JavaScript like this
</script>
<?php
	   	include('connect.php');

$query ="SELECT club FROM club where club = '$club5'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club5=$row['club'];
//echo $club;

$id = "1";
$qualite = "" ;
$sport= "";
if (isset($_POST['id'])) {$id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);}
if (isset($_POST['comp'])) {  $comp = (get_magic_quotes_gpc()) ? $_POST['comp'] : addslashes($_POST['comp']);}
if (isset($_POST['sport'])) {  $sport = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);}
if (isset($_POST['annee'])) { $annee = (get_magic_quotes_gpc()) ? $_POST['annee'] : addslashes($_POST['annee']);}
if (isset($_POST['lieu'])) {  $lieu = (get_magic_quotes_gpc()) ? $_POST['lieu'] : addslashes($_POST['lieu']);}
if (isset($_POST['equip'])) {  $equip = (get_magic_quotes_gpc()) ? $_POST['equip'] : addslashes($_POST['equip']);}
else {$equip ="_";}
if (isset($_POST['poids'])) {  $poids = (get_magic_quotes_gpc()) ? $_POST['poids'] : addslashes($_POST['poids']);}
else {$poids =0;}
if (isset($_POST['qualite'])) {  $qualite = (get_magic_quotes_gpc()) ? $_POST['qualite'] : addslashes($_POST['qualite']);}
else {$qualite ="_";}
if (isset($_POST['qualif'])) {  $qualif = (get_magic_quotes_gpc()) ? $_POST['qualif'] : addslashes($_POST['qualif']);}
else {$qualif =0;}

if (isset($_GET['cat'])) {  $cat = (get_magic_quotes_gpc()) ? $_GET['cat'] : addslashes($_GET['cat']);}

if (isset($_GET['type'])) {  $type = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);}
else {$type =$_SESSION['type'];}

if (isset($_GET['sport'])) {  $sport = (get_magic_quotes_gpc()) ? $_GET['sport'] : addslashes($_GET['sport']);}
else {$sport =$_SESSION['sport'];}

if (isset($_GET['qualif'])) {  $qualif = (get_magic_quotes_gpc()) ? $_GET['qualif'] : addslashes($_GET['qualif']);}
else {$qualif =$_SESSION['qualif'];}

if (isset($_GET['comp'])) {  $comp = (get_magic_quotes_gpc()) ? $_GET['comp'] : addslashes($_GET['comp']);}
else {$comp =$_SESSION['comp'];}

if (isset($_GET['dat'])) {  $dat1 = (get_magic_quotes_gpc()) ? $_GET['dat'] : addslashes($_GET['dat']);}
else {$dat1 =$_SESSION['dat'];}

if (isset($_GET['lieu'])) { $lieu = (get_magic_quotes_gpc()) ? $_GET['lieu'] : addslashes($_GET['lieu']);}
else {$lieu =$_SESSION['lieu'];}

if (isset($_GET['max'])) { $max = (get_magic_quotes_gpc()) ? $_GET['max'] : addslashes($_GET['max']);}
else {$max =$_SESSION['max'];}

if (isset($_GET['min'])) { $min = (get_magic_quotes_gpc()) ? $_GET['min'] : addslashes($_GET['min']);}
else {$min =$_SESSION['min'];}

if (isset($_GET['cat'])) { $dat = (get_magic_quotes_gpc()) ? $_GET['cat'] : addslashes($_GET['cat']);}
else {$cat =$_SESSION['cat'];}
if (isset($_GET['sais'])) { $sais = (get_magic_quotes_gpc()) ? $_GET['sais'] : addslashes($_GET['sais']);}
else {$sais =$_SESSION['sais'];}
$i=1;
do {
if (isset($_POST['ppp'.$i])) {  $ppp = (get_magic_quotes_gpc()) ? $_POST['ppp'.$i] : addslashes($_POST['ppp'.$i]);}
else {$ppp ="_";}
if (isset($_POST['codd'.$i])) {  $codd = (get_magic_quotes_gpc()) ? $_POST['codd'.$i] : addslashes($_POST['codd'.$i]);}
else {$codd ="_";}

			if (($ppp <> "_")){
				$query_resultat1 = "UPDATE delegation SET CAtPoids = '$ppp' where code = '$codd'";
				$resultat1 = mysql_query($query_resultat1, $connexion) or die(mysql_error());
			}
			$i = $i+1;
}while ($i<1000);

$_SESSION['comp'] = $comp;
$_SESSION['dat'] = $dat1;
$_SESSION['lieu'] = $lieu;
$_SESSION['sport'] = $sport;
$_SESSION['cat'] = $cat;
$_SESSION['type'] = $type;
$_SESSION['max'] = $max;
$_SESSION['min'] = $min;
$_SESSION['qualif'] = $qualif;
$_SESSION['sais'] = $sais;
$query01 ="SELECT saison FROM saison where actif = 1";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);
$saison = $row01[0];

$sa = $sais - 1;
$sa = $sa . "-" . $sais;
if ($qualite == "Athlete"){
 if ($qualif == 2){
	if ($club5 == "ADMIN"){$query = "SELECT * FROM qualif WHERE id = '$id' and annee = '$sais' and cat= '$cat' and sport = '$sport'";}
	else{$query = "SELECT * FROM qualif WHERE id = '$id' AND Délégation = '$club5' and annee = '$sais' and cat= '$cat' and sport = '$sport'";}
 }else{
	if ($club5 == "ADMIN"){	$query = "SELECT * FROM athletes WHERE n_lic = '$id' and saison = '$sa' and sport = '$sport'";}
	else{$query = "SELECT * FROM athletes WHERE n_lic = '$id' AND club = '$club5' and saison = '$sa' and sport = '$sport'";}
}}
else{
if ($club5 == "ADMIN"){$query = "SELECT * FROM entraineur WHERE n_lic = '$id' AND saison = '$sa' and sport = '$sport'";}
else{$query = "SELECT * FROM entraineur WHERE n_lic = '$id' AND club = '$club5' and saison = '$sa' and sport = '$sport'";}
}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$nom=$row['nom'];
$prenom=$row['prenom'];
	if ($qualif == 2){
		if ($qualite <> "Entraineur"){$club=$row['Délégation'];} else {$club=$row['club'];}}
	else{$club=$row['club'];}

if ($qualite <> "Entraineur"){

	if ($qualif == 2){
		$annee=$row['DateNaissance'];
		$sexe=$row['Sexe'];
		$poids=$row['CAtPoids'];
		$hq=$row['qualif'];
	}else{
		$annee=$row['naiss'];
		$sexe=$row['sexe'];
		$hq=0;	}
}
else 
{$sexe=$row['sexe'];
$poids= "_";}

$dat=$sais;
$dat2=substr("$annee", 0, 4);
$diff = $dat - $dat2;


$query0 = "SELECT sexe FROM param WHERE cat = '$cat' AND poids = '$poids' AND type = '$type' AND sexe = '$sexe'";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);
$sex =$row0['sexe'];

$query5 ="SELECT * FROM param where cat = '$cat' and sexe ='$sexe' AND type = '$type' order by ordre";
$result5 = mysql_query($query5,$connexion);
$row5 = mysql_fetch_assoc($result5);
$totalRows = mysql_num_rows($result5);

$query7 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And annee = '$dat' And cat = '$cat' And type = '$type' And lieu = '$lieu' and Sexe ='$sexe' and sport = '$sport'";
$result7 = mysql_query($query7,$connexion);
$row7 = mysql_fetch_assoc($result7);
$totalRows_poidst = mysql_num_rows($result7);

$totalRows_doublon8 = 0;

if ($totalRows_poidst > 0) {
$query8 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And cat = '$cat' And annee = '$dat' And lieu = '$lieu' And type = '$type' And id = '$id' and sport = '$sport'";
$result8 = mysql_query($query8,$connexion)or die(mysql_error());
$row8 = mysql_fetch_assoc($result8);
$totalRows_doublon8 = mysql_num_rows($result8);
}
$totalRows_doublon9 = 0;
if ($totalRows_poidst > 0) {
$query9 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And cat = '$cat' And annee = '$dat' And lieu = '$lieu' And type = '$type'  And CAtPoids = '$poids' And groupe = '$equip' and sport = '$sport'";
$result9 = mysql_query($query9,$connexion)or die(mysql_error());
$row9 = mysql_fetch_assoc($result9);
$totalRows_doublon9 = mysql_num_rows($result9);
}


$query08 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And cat = '$cat' And annee = '$dat' And lieu = '$lieu' And type = '$type' And qualif = 0 And Sexe = '$sexe' and sport = '$sport'";
$result08 = mysql_query($query08,$connexion)or die(mysql_error());
$row08 = mysql_fetch_assoc($result08);
$totalRows_doublon08 = mysql_num_rows($result08);




$query_poids = "SELECT * FROM param where cat = '$cat' AND type = '$type' order by sexe, ordre";
$resultat_poids = mysql_query($query_poids, $connexion) or die(mysql_error());
$row_poids = mysql_fetch_assoc($resultat_poids);


//if (($club5 <> "ADMIN")AND($club5 <> "ADMIN")AND($club5 <> "ADMIN")){ 


?>
    <style>
.ml-1 {
  margin-left: 15% !important;
}</style>
<body lang="<?=$_SESSION["lang"]?>">
<div></div>
<div id="wrapper">
<div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
<div id="content-wrapper" class="d-flex flex-column ">

<div id="content" class="ml-1">
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à partir??</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
   <!-- Topbar -->
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
<li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <form method="post">
      <input type="submit" name="lang" value="fr" class="btn"/>
      <input type="submit" name="lang" value="ar" class="btn"/>
      <div id="lang" style="display:none"><?php echo $_SESSION["lang"] ?></div>

    </form>
                            </a>
                            <!-- Dropdown - Alerts -->
                           
                        </li>
    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Rechercher..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">AfficherAll Alerts</a>
        </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter">7</span>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
                Message Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="assets/img/undraw_profile_1.svg"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                        problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="assets/img/undraw_profile_2.svg"
                        alt="...">
                    <div class="status-indicator"></div>
                </div>
                <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how
                        would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="assets/img/undraw_profile_3.svg"
                        alt="...">
                    <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with
                        the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                        told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span id="currentClub" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['club']; ?> </span>
            <img class="img-profile rounded-circle"
                src="assets/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->
<div class="container-fluid">
<div class="card shadow mb-4">


<div class="mb-4 ">


<table >
<div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800"><?=$_TXT[99]?></h1>
                        
						
                 

   
                    </div>
        <tr>
          <td><form name="stat" method="post" action="">
            
<div class="card-body">


<div class="table-responsive">
              <table class="table table-bordered" id="dataTable" >
  <tr>
      <td  ><div align="center"><strong><?=$_TXT[59]?></strong></div></td>
      <td  ><div align="center"><strong><?=$_TXT[14]?></strong></div></td>
      <td  ><div align="center"><strong><?=$_TXT[11]?> </strong></div></td>
      <td  ><div align="center"><strong><?=$_TXT[60]?> </strong></div></td>
      <td  ><div align="center"><strong><?=$_TXT[84]?>  </strong></div></td>
      <td  ><div align="center"><strong><?=$_TXT[61]?> </strong></div></td>
      <td  ><div align="center"><strong><?=$_TXT[100]?> </strong></div></td>
      <td ><div align="center"> <strong><?=$_TXT[4]?></strong></div></td>
<?php if ($type == "Equipe"){ ?>
     <td ><div align="center"><strong><?=$_TXT[12]?></strong></div></td>
<?php } ?>
<?php if ($qualif <> 2){ ?>
     <td ><div align="center"><strong><?=$_TXT[68]?></strong></div></td>
<?php } ?>
    </tr>
                <tr>
    <td ><input name="comp" type="hidden" id="comp" size="30" value="<?php echo $comp;?>"><?php echo $comp;?></td>
    <td ><input name="sport" type="hidden" id="cat" size="5" value="<?php echo $sport;?>"><?php echo $sport;?></td>
    <td ><input name="cat" type="hidden" id="cat" size="5" value="<?php echo $cat;?>"><?php echo $cat;?></td>
    <td ><input name="type" type="hidden" id="type" size="5" value="<?php echo $type;?>"><?php echo $type;?></td>
    <td ><input name="annee" type="hidden" id="annee" size="5" value="<?php echo $dat;?>"><?php echo $dat;?></td>
    <td ><input name="lieu" type="hidden" id="lieu" size="5" value="<?php echo $lieu;?>"><?php echo $lieu;?></td>
   <td >                 <select name="qualite" class="custom-select">
        <option><?php echo $qualite;?></option>
        <option>Entraineur</option>
        <option>Athlete</option>

                  </select></td>
    <td ><input name="id" type="text" id="id" size="5" value="" class="form-control"></td>
<?php if ($type == "Equipe"){ ?>
                 <td>
                    <select name="equip" class="custom-select">
        <option>A</option>
        <option>B</option>

                  </select></td>
<?php } ?>

 <?php if ($qualif <> 2){ ?>
                 <td>
                    <select name="poids" class="custom-select">
                      <option>-</option>
                      <?php
					  if ($type <> 'Kata'){
					   do { 
                                     $res=$row_poids['poids'];
                                      echo "<option >$res</option>";
                       } while ($row_poids = mysql_fetch_assoc($resultat_poids));
					  }else {?>
        <option>Nage No Kata (Tori)</option>
        <option>Nage No Kata (Uke)</option>
        <option>Katame No Kata (Tori)</option>
        <option>Katame No Kata (Uke)</option>
        <option>Kime No Kata (Tori)</option>
        <option>Kime No Kata (Uke)</option>

                       <?php 
						   
						   }
					   
					    ?>
                  </select></td>
<?php } ?>


                </tr>
                <tr>
                  <td colspan="9" valign="center"><div align="center">
<input name="ok" type="submit" class="btn btn-danger" value=<?=$_TXT[16]?> >
                  </td>
                </tr>
              </table></div></div>
          </form></td>
        </tr>
</table>
</td></tr>
</table>

<?php
 if (($poids <> '0')AND($poids <> null)){
 if (($totalRows_doublon8 <1)or($type == "Kata")or($type == "Demonstration")){
 if (($totalRows_doublon08 ==0) or ($hq == 1)or ($qualif <> 2)or ($qualite == "Entraineur")){
 //if (($totalRows_doublon08 ==0) ){
 if (($nom <> null)){
 if (($sexe == $sex)or($type == "Kata")or($type == "Demonstration")or ($qualite == "Entraineur")){
 if ((($diff>=$min)and($diff <= $max))or($qualite == "Entraineur")){
 if (($totalRows_doublon9 <2)or($type <> "Equipe")){

if ($qualite== "Entraineur"){
$query_resultat1 = "insert into delegation  (`id` ,`comp`,`sport` ,`lieu` ,`annee`,`cat` ,`type` ,`nom` , `prenom`  , `CAtPoids` , `Délégation` , `DateNaissance`, `sexe`, `qualif`) values  ('$id','$comp','$sport','$lieu','$dat','$cat','$type','$nom', '$prenom', '$qualite', '$club', '$annee','$sexe','1')";
}else 
{	 
$query_resultat1 = "insert into delegation  (`id` ,`comp`,`sport` ,`lieu` ,`annee`,`cat` ,`type` ,`nom` , `prenom`  , `CAtPoids` , `Délégation` , `DateNaissance`, `Sexe`, `qualif`, `groupe`) values  ('$id','$comp','$sport','$lieu','$dat','$cat','$type','$nom', '$prenom', '$poids', '$club', '$annee', '$sexe', '$hq', '$equip')";
}

$resultat1 = mysql_query($query_resultat1, $connexion) or die(mysql_error());
}else { ?> <div align="center"><strong class="test">Vous ne pouvez pas entrer Deux Athletes dans la Même Catégorie de Poids</strong></div><?php };
}else { ?> <div align="center"><strong class="test">L'âge du joueur n'a pas le droit de participer</strong></div><?php };
}else { ?><div align="center"><strong class="test">Le sexe du joueur et le poids ne coïncide pas</strong></div><?php };
}else { ?><div align="center"><strong class="test">l'Athlete n'existe pas</strong></div><?php };
}else { ?> <div align="center"><strong class="test">Vous ne pouvez pas entrer qu'un seul athlete Hors Quota</strong></div><?php };
}else { ?> <div align="center"><strong class="test">Vous ne pouvez pas entrer la même personne deux fois</strong></div><?php };
}
//}
//$totalRows_resultat = mysql_num_rows($resultat);
?>


<h1 class="h3 mb-2 text-gray-1000 text-center"><?=$_TXT[17]?> </h1><div class="card-body">


<div class="table-responsive">
<table class="table table-bordered" id="dataTable" >
    <tr style="color:#fff">
     <td width="81"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[68]?></strong></div></td>
      <td width="159"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[4]?></strong></div></td>
      <td width="159"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[6]?> </strong></div></td>
      <td width="159"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[7]?> </strong></div></td>
<td width="257"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[12]?></strong></div></td>
 <?php if ($type == "Equipe"){ ?>
     <td rowspan="2" bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[12]?></strong></div></td>
<?php } ?>
     <td width="257"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[13]?> </strong></div></td>      
      
      <td width="135" bgcolor="#0000FF" ><div align="center"><strong><?=$_TXT[9]?></strong></div></td>
      <td colspan="2" rowspan="3" bgcolor="#0000FF" align="center"><strong><?=$_TXT[101]?> </strong></td>
    </tr>
    <tr>
      <td bgcolor="#0000FF" border="0"><div align="center" style="color:#fff">(DD/MM/YYYY)</div></td>
    </tr>
                      <?php
//if (($club5 <> "ADMIN")AND($club5 <> "ADMIN")AND($club5 <> "DTN")){ 
if (($club5 <> "ADMIN")AND ($club5 <> "DTN")){ 

$query11 ="SELECT * FROM delegation where Délégation = '$club5' And comp = '$comp' And sport = '$sport' And annee = '$dat' And lieu = '$lieu' And cat = '$cat' And type = '$type'and Sexe ='Masculin' and CAtPoids <>'Entraineur' order by CAtPoids";}
else 
{
$query11 ="SELECT * FROM delegation where comp = '$comp' And sport = '$sport' And annee = '$dat' And lieu = '$lieu' And cat = '$cat' And type = '$type' and Sexe ='Masculin' and CAtPoids <>'Entraineur' order by CAtPoids";}
$i = 0;	
$result11 = mysql_query($query11,$connexion);
$totalRows = mysql_num_rows($result11);
$row11 = mysql_fetch_assoc($result11);

?>    <tr>
      <td colspan="9" bgcolor="#00FF00"><div align="center" style="color:#fff"><strong><?=$_TXT[102]?> (<?php echo $totalRows;?>)</strong></div></td><td bgcolor="#00FF66" ><div align="center" style="color:#fff" ><strong><?=$_TXT[23]?> </strong></div></td>
    </tr>



    <?PHP 

do {
$i = $i+1;
                   $poids = $row11['CAtPoids'];
                   $nom1 = $row11['nom'];
                   $prenom1 = $row11['prenom'];
                   $annee0 = $row11['DateNaissance'];
                   $cod = $row11['id'];
                 $club1= $row11['Délégation'];
                 $equipe1= $row11['groupe'];
$query12 ="SELECT ligue FROM club where club = '$club1'";
$result12 = mysql_query($query12,$connexion);
$row12 = mysql_fetch_assoc($result12);
                   $ligue1= $row12['ligue'];
				   
if ($annee0 != ""){
$annee1=substr("$annee0", 8, 2). "-".substr("$annee0", 5, 2)."-".substr("$annee0", 0, 4);}
else {$annee1="";}

$query_poids1 = "SELECT * FROM param where cat = '$cat' AND type = '$type' AND sexe = 'ذكر' order by sexe, ordre";
$resultat_poids1 = mysql_query($query_poids1, $connexion) or die(mysql_error());
$row_poids1 = mysql_fetch_assoc($resultat_poids1);

?>
   <tr>
<?PHP     if ($club5 == "ADMIN"){?>   
                  <td valign="top">
                    		<form name="refr" method="post" action="" >
 							<input name="<?php echo "codd".$i; ?>" type="hidden" id="<?php echo "codd".$i; ?>" value = "<?php echo $row11['code']; ?>">
                   			<select name="<?php echo "ppp".$i; ?>" class="custom-select" onChange="document.refr.submit();">
                      		<option><?php echo $poids;?></option>
                      		<?php
					   		do { 
                                     $res=$row_poids1['poids'];
                                      echo "<option >$res</option>";
                       		} while ($row_poids1 = mysql_fetch_assoc($resultat_poids1));
?>
                  	</form>
                  </td>
                         <?php 
						   
						   } else {?>
							   
    <td><?php echo $poids;?> </td>
						 <?php  }
					   
					    ?>
                
                  
    <td><?php echo $cod;?> </td>
    <td><?php echo $nom1;?></td>
    <td><?php echo $prenom1;?></td>
     <td><?php echo $club1;?></td>   

 <?php if ($type == "Equipe"){ ?>
     <td><?php echo $equipe1;?></td>   
<?php } ?>

   <td><?php echo $ligue1;?></td>    
   
    <td><?php echo $annee1;?></td>
<?PHP     if (($club5 == "ADMIN")){?>   

    <td width="23"><a href ='qualif.php?code<?php echo "=$row11[code]"; ?>&poid<?php echo "=$code";?>' ><div class="bleu"> <?=$_TXT[104]?></div></a></td>
    <td width="23"><a href ='nqualif.php?code<?php echo "=$row11[code]"; ?>&poid<?php echo "=$code";?>'><div class="bleu"><?=$_TXT[105]?></div></a></td>
 
 <?PHP }if (($club5 <> "DTN")){ ?>
    <td width="23"><a href ='deldel.php?code<?php echo "=$row11[code]"; ?>' ><img src="sup.png" width="16" height="16"></a></td>
   </tr>
<?php }
					}while	 ($row11=mysql_fetch_assoc($result11)); 
if (($club5 <> "ADMIN")AND ($club5 <> "DTN")){ 

$query11 ="SELECT * FROM delegation where Délégation = '$club5' And comp = '$comp' And sport = '$sport' And annee = '$dat' And lieu = '$lieu' And cat = '$cat'  And type = '$type' and Sexe ='Féminin' and CAtPoids <>'Entraineur' order by CAtPoids";}
else 
{
$query11 ="SELECT * FROM delegation where comp = '$comp' And sport = '$sport' And annee = '$dat' And lieu = '$lieu' And cat = '$cat'  And type = '$type' and Sexe ='Féminin' and CAtPoids <>'Entraineur' order by CAtPoids";}


$result11 = mysql_query($query11,$connexion);
$totalRows = mysql_num_rows($result11);
$row11 = mysql_fetch_assoc($result11);

?>
    <tr>
      <td colspan="9" bgcolor="#FF0099"><div align="center"style="color:#fff"><strong><?=$_TXT[103]?> (<?php echo $totalRows;?>)</strong></div></td><td bgcolor="#FF0099" ><div align="center" style="color:#fff" ><strong><?=$_TXT[23]?> </strong></div></td>
    </tr>
    <?PHP 

do {
$i = $i+1;
                   $poids = $row11['CAtPoids'];
                   $nom1 = $row11['nom'];
                   $prenom1 = $row11['prenom'];
                   $annee0 = $row11['DateNaissance'];
                 $club1= $row11['Délégation'];
                 $equipe1= $row11['groupe'];
                   $cod = $row11['id'];
$query12 ="SELECT ligue FROM club where club = '$club1'";
$result12 = mysql_query($query12,$connexion);
$row12 = mysql_fetch_assoc($result12);
                   $ligue1= $row12['ligue'];
if ($annee0 != ""){
$annee1=substr("$annee0", 8, 2). "-".substr("$annee0", 5, 2)."-".substr("$annee0", 0, 4);}
else {$annee1="";}
$query_poids1 = "SELECT * FROM param where cat = '$cat' AND type = '$type' AND sexe = 'أنثى' order by sexe, ordre";
$resultat_poids1 = mysql_query($query_poids1, $connexion) or die(mysql_error());
$row_poids1 = mysql_fetch_assoc($resultat_poids1);

?>
   <tr>
<?PHP     if ($club5 == "ADMIN"){?>   
                  <td valign="top">
                    		<form name="refr" method="post" action="" >
 							<input name="<?php echo "codd".$i; ?>" type="hidden" id="<?php echo "codd".$i; ?>" value = "<?php echo $row11['code']; ?>">
                   			<select name="<?php echo "ppp".$i; ?>" class="custom-select" onChange="document.refr.submit();">
                      		<option><?php echo $poids;?></option>
                      		<?php
					   		do { 
                                     $res=$row_poids1['poids'];
                                      echo "<option >$res</option>";
                       		} while ($row_poids1 = mysql_fetch_assoc($resultat_poids1));
?>
                  	</form>
                  </td>
                         <?php 
						   
						   } else {?>
							   
    <td><?php echo $poids;?> </td>
						 <?php  }
					   
					    ?>
    <td><?php echo $cod;?></td>
    <td><?php echo $nom1;?></td>
    <td><?php echo $prenom1;?></td>
        <td><?php echo $club1;?></td>   
  <?php if ($type == "Equipe"){ ?>
     <td><?php echo $equipe1;?></td>   
<?php } ?>
  <td><?php echo $ligue1;?></td>    

    <td><?php echo $annee1;?></td>
<?PHP     if (($club5 == "ADMIN")){?>   

    <td width="23"><a href ='qualif.php?code<?php echo "=$row11[code]"; ?>' ><div class="bleu"> <?=$_TXT[104]?></div></a></td>
    <td width="23"><a href ='nqualif.php?code<?php echo "=$row11[code]"; ?>' ><div class="bleu"> <?=$_TXT[105]?></div></a></td>
  
 <?PHP } 
 if (($club5 <> "DTN")){
 ?>
    <td width="23"><a href ='deldel.php?code<?php echo "=$row11[code]"; ?>' ><img src="sup.png" width="16" height="16"></a></td>
 <?PHP  } ?>
   </tr>
<?php
					}while	 ($row11=mysql_fetch_assoc($result11)); 



?>
<p>&nbsp;</p>
  <table border="0"><tr>
  <?php 
//  echo $club;
//if (($club5 == "ADMIN")or($club5 == "ADMIN")or($club5 == "ADMIN")){ 
if (($club5 == "ADMIN")or($club5 == "DTN")){ 
?>     
</p>
      <td><div align="center"><a href ='exp.php?cat<?php echo "=$cat";?>&comp<?php echo "=$comp";?>&dat<?php echo "=$dat";?>&lieu<?php echo "=$lieu";?>&type<?php echo "=$type";?>' ><div  class="btn btn-warning"><?=$_TXT[18]?> </div></a></td>
      
  <?php 
}else {
?>     
      
      <td><div align="center"><a href ='expw.php?cat<?php echo "=$cat";?>&comp<?php echo "=$comp";?>&dat<?php echo "=$dat";?>&lieu<?php echo "=$lieu";?>&type<?php echo "=$type";?>' target="new" class="bleu" ><strong>Imprimer</strong></a></td>

<?php
}
 ?>
</tr>
</table>
<h1 class="h3 mb-2 text-gray-1000 text-center"><?=$_TXT[30]?> </h1> <div class="card-body">


<div class="table-responsive">
<table class="table table-bordered" id="dataTable" >
   <tr style="color:#fff">
      	<td width="103" bgcolor="#0000FF"  ><div align="center"><strong><?=$_TXT[6]?> </strong></div></td>
		<td width="103" bgcolor="#0000FF"  ><div align="center"><strong><?=$_TXT[7]?> </strong></div></td>
     	<td width="278" bgcolor="#0000FF"  ><div align="center"><strong><?=$_TXT[12]?> </strong></div></td>
     	<td width="278" bgcolor="#0000FF"  ><div align="center"><strong><?=$_TXT[13]?> </strong></div></td>
 		<td width="257"  bgcolor="#0000FF"><div align="center"><strong><?=$_TXT[10]?>  </strong></div></td>
    	<td width="18" bgcolor="#0000FF"><?=$_TXT[23]?> </td>
   </tr>
<?php 

if (($club5 <> "ADMIN")AND ($club5 <> "DTN")){ 

$query1 ="SELECT * FROM delegation where Délégation = '$club5' And comp = '$comp' And sport = '$sport' And annee = '$dat' And lieu = '$lieu' And cat = '$cat'  And type = '$type' and CAtPoids ='Entraineur' order by Délégation";}
else 
{
$query1 ="SELECT * FROM delegation where comp = '$comp' And sport = '$sport' And annee = '$dat' And lieu = '$lieu' And cat = '$cat'  And type = '$type' and CAtPoids ='Entraineur'  order by Délégation";}



$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
do {
                   $nom1 = $row1['nom'];
                   $prenom1 = $row1['prenom'];
                   $sexe = $row1['Sexe'];
                 $club= $row1['Délégation'];
$query12 ="SELECT ligue FROM club where club = '$club'";
$result12 = mysql_query($query12,$connexion);
$row12 = mysql_fetch_assoc($result12);
                   $ligue1= $row12['ligue'];
?> 
  <tr>
    <td><?php echo $nom1;?></td>
    <td><?php echo $prenom1;?></td>
    <td><?php echo $club;?></td>   
   <td><?php echo $ligue1;?></td>    
     <td ><?php echo $sexe;?> </td>

     
<?PHP  //   if (($Login <> "ADMIN")AND($Login <> "Admin")AND($Login <> "admin")){ 
if (($club5 <> "DTN")){
?>     
    <td width="23"><a href ='deldel.php?code<?php echo "=$row1[code]"; ?>' ><b><?=$_TXT[22]?> </b></a></td>
<?php  }
?>
  </tr>
<?php
					}while	 ($row1=mysql_fetch_assoc($result1)); 
?>
  </table></div></div>
  </div></div></div></div></div></div>

<!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="template.js"></script>
  </body>
</html>