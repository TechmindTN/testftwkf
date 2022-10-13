<?php
session_start();
if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "fr"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

// (D) LOAD LANGUAGE FILE
require "languages/"."lang-" . $_SESSION["lang"] . ".php";
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
if ($club == null) {
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
  <title>Rechercher athlete</title>
  <!-- Custom styles for this template -->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</HEAD>

<html>
<body lang="<?=$_SESSION["lang"]?>">
<div id="wrapper">
<div class="navbar-nav sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
            <div id="content-wrapper" class="d-flex flex-column ">
            <div id="content" class="ml-1">
                <!-- Déconnexion Modal-->
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
                <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à terminer votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="login.php">Déconnexion</a>
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
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span id="currentClub" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $club; ?> </span>
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
                Réglages
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Journal d'activité
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Déconnexion
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->
<div class="container-fluid">
<div class="card shadow mb-4">


<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<table >
<h1 class="h3 mb-2 text-gray-800"><?=$_TXT[81]?> </h1>
                        
                                 
                        </div>               
<?php
	   	include('connect.php');
$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$id = "";
if (isset($_GET['id'])) {
  $id = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);//
}
if (isset($_POST['id'])) {
  $id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
}
 ?>


        <tr>
          <td><form name="stat" method="post" action="">
              <table >
                <tr>
   <td><input name="id" type="text" id="id" size="15" class="form-control " value="<?php echo $id;?>"></td>
                   <td >
<input name="ok" type="submit"  value = <?=$_TXT[20]?> class="btn btn-primary" >
                  </td>

                </tr>
              </table>
          </form></td>
        </tr>
</table>
</div>

<?php


 if (($id <> '')){
$query1 = "SELECT * FROM athletes WHERE n_lic = '$id' AND club = '$club' order by saison desc";
$result1 = mysql_query($query1,$connexion);
$totalRows = mysql_num_rows($result1);
$row1 = mysql_fetch_assoc($result1);

$dat1 = date("Y/m/d H:i:s") ;
$query ="SELECT saison FROM saison where actif = 1";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$saison = $row[0];


$cin = $row1['cin'];

$nom = $row1['nom'];
$prenom = $row1['prenom'];

$sexe = $row1['sexe'];
$date_naiss = $row1['date_naiss'];

$ligue=$row1['ligue'];
$club = $row1['club'];
$sport = $row1['sport'];
$photo = $row1['photo'];

$nationalite = $row1['nationalite'];

$photo = $row1['photo'];
$photoid = $row1['photoid'];
$date_saisie = $dat1;
$jour = substr("$date_naiss", 8, 2);
$mois = substr("$date_naiss", 5, 2);
$annee = substr("$date_naiss", 0, 4);

$query2 ="SELECT * FROM age";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$age = "_";

$jours1= substr("$saison", 5, 4) - $annee;



do {
	$dsup = $row2['sup'];
	$dinf = $row2['min'];

if (($jours1>=$dinf) and ($jours1<=$dsup)) {
	$age=$row2['cat'];
}
	
	}while	 ($row2=mysql_fetch_assoc($result2)); 

if (($totalRows > 0)){
?>
<form action="addrenouv.php" method="post" enctype="multipart/form-data" name="MForm">
<div class="card-body">


<div class="table-responsive">
<table class="table table-bordered text-center" id="dataTable" >
    <thead><tr>
      <td  ><?=$_TXT[6]?></td>
      <td   ><?=$_TXT[7]?></td>
      <td colspan="3" ><?=$_TXT[9]?></td>
      <td  ><?=$_TXT[14]?></td>

    </tr>
</thead>
    <tr>
    <td  align="left"><input name="nom" type="text" id="nom" tabindex="1"  value ="<?php echo $nom;?>" class="form-control"></td>
    <td  align="left"><input name="prenom" type="text" id="prenom" tabindex="2"  value ="<?php echo $prenom;?>" class="form-control"></td>
    <td align="center"><?=$_TXT[82]?><input name="jour" type="number" id="jour" tabindex="3" maxlength="2" value ="<?php echo $jour;?>" class="form-control"></td>
      <td align="center"><?=$_TXT[83]?> <input name="mois" type="number" id="mois" tabindex="4"  maxlength="2" value ="<?php echo $mois;?>" class="form-control"></td>
      <td align="center"><?=$_TXT[84]?> <input name="annee" type="number" id="annee" tabindex="5"  maxlength="4" value ="<?php echo $annee;?>" class="form-control"></td>
      <td rowspan="2" align="center"><select name="sport" id="sport" tabindex="6" class="form-control">
        <option><?php echo $sport;?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
    </tr>
       </table></div></div>
       <div class="card-body">


<div class="table-responsive">
<table class="table table-bordered" id="dataTable" >
    <thead>
        <tr>
      <td align="left"><?=$_TXT[5]?> </td>
      <td align="left"><?=$_TXT[10]?></td>
      <td  align="left"><?=$_TXT[8]?></td>
        </tr>
    </thead>
    <tr>
    <td align="left"><input name="cin" type="number" id="cin" tabindex="7"  value ="<?php echo $cin;?>" class="form-control"></td>
    <td  align="left"><select name="sexe" id="sexe" tabindex="9" class="form-control">
        <option><?php echo $sexe;?></option>
        <option>ذكر</option>
        <option>أنثى</option>
      </select>
    </td>
      <td align="left"><input name="nationalite" type="text" id="nationalite" tabindex="10" value ="<?php echo $nationalite;?>" class="form-control"></td>

    </tr>
        </table></div></div>
        <div class="card-body">


<div class="table-responsive">
<table class="table table-bordered" id="dataTable" >

 <thead>
    <tr>
      <td align="left"><?=$_TXT[15]?>
      <input name="photo" type="file" id="photo" size="1" tabindex="10"></td>
      <td align="left"><?=$_TXT[25]?>
     <input name="photoid" type="file" id="photoid" size="1" tabindex="11"></td>
	  <td>Bordereau
      <input name="photobor" type="file" id="photobor" size="1" tabindex="11"></td>
	  <td><?=$_TXT[27]?> 
      <input name="photoeng" type="file" id="photobor" size="1" tabindex="12"></td>
    </tr>
    <tr>
      
      <td  align="left"><img src="./photo/<?php echo $photo;?>" width="33" height="50"></td>
     
      <td align="left"><img src="./photoid/<?php echo $id. ".jpg";?>" width="33" height="50"></td>
   
      <td  align="left"><img src="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
      <td  align="left"><img src="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
    </tr></thead>
  </table></div></div>
<input name="aphoto" type="hidden" id="aphoto" size="1" value ="<?php echo $photo;?>">
      <input name="aphotoid" type="hidden" id="aphotoid" size="1" value ="<?php echo $photoid;?>">
       <input name="aphotobor" type="hidden" id="aphoto" size="1" value ="<?php echo $code. ".jpg";?>"></td>
      <input name="aphotoeng" type="hidden" id="aphoto" size="1" value ="<?php echo $code. ".jpg";?>"></td>
     <input name="ligue" type="hidden" id="ligue" size="1" value ="<?php echo $ligue;?>">
      <input name="date_saisie" type="hidden" id="date_saisie" size="1" value ="<?php echo $dat1;?>">
       <input name="age" type="hidden" id="age" size="1" value ="<?php echo $age;?>">
       <input name="saison" type="hidden" id="age" size="1" value ="<?php echo $saison;?>">
       <input name="lic" type="hidden" id="age" size="1" value ="<?php echo $id;?>">

     
      
      


  <p align="center">
      <input type="submit" name="valider" id="valider" value=<?=$_TXT[57]?> class="btn btn-danger">
  </p>
</form>
</div>
</div></div></div></div>
<?php
}else 
{?>  <div class="alert alert-primary" role="alert">
Vérifier votre num de licence</div>
<?php
	}}

 ?>

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