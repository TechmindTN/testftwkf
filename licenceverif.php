<?php
session_start();
if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "fr"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

// (D) LOAD LANGUAGE FILE
require "languages/"."lang-" . $_SESSION["lang"] . ".php";
//$club=  $_SESSION['club'];
$club = $_GET['club1'];
if ( $_SESSION['club'] == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";
</script>

<?php	 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
      <!-- Custom styles for this template -->
	  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Vérification athlete</TITLE>
<style>

#delid{
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
</style>
</HEAD>

<BODY  lang="<?=$_SESSION["lang"]?>">

<div id="wrapper">
<div class="navbar-nav sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
            <div id="content-wrapper" class="d-flex flex-column ">
<!--<div align="center" class="style2"> Liste des Athletes</div>-->
  

<div id="content " class="ml-1">
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
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                Réglages
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Journal d'activité
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php" data-bs-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Déconnexion
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->
 <div  class="container-fluid">
<?php


	   	include('connect.php');


$date_naiss=$_GET['naiss'];
$clubb=$_GET['club'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$n_lic=$_GET['code'];
$cin=$_GET['cin'];

$query000 ="select * from age where prix > 0 order by sexe,min";
$result000 = mysql_query($query000,$connexion);
$row000 = mysql_fetch_assoc($result000);
$query0001 ="select * from athletest";
$result0001 = mysql_query($query0001,$connexion);
$row0001 = mysql_fetch_assoc($result0001);
$tprix =0;
do {
$saison0=$row0001['saison'];;
$club0=$row0001['club'];;
$age1 = $row000['cat'];
$sexe1 = $row000['sexe'];
$prix = $row000['prix'];
$query1 ="SELECT sum(n) from athletest where club = '$club0' and saison = '$saison0' and age = '$age1' and sexe = '$sexe1'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);

$tprix = $tprix + $row1[0] * $prix;

				}while	 ($row000=mysql_fetch_assoc($result000)); 


$query9 ="SELECT SUM(montant) from paiement where club = '$club0' and saison = '$saison0' and etat = 1";
$result9 = mysql_query($query9,$connexion);
$row9 = mysql_fetch_row($result9);
$tpai = $row9[0];
$bilan = $tpai - $tprix ;

?>
      <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="h3 mb-2 text-gray-800"><?=$_TXT[86]?> </div>
                      </div>
					  <div class="card-body">


<div class="table-responsive">						
	<table class="table table-bordered" id="dataTable">
	
	<thead><tr>
	    <td ><div align="center"><strong><?=$_TXT[0]?> </strong> </div> </td>
		<td> <div align = "center"> <strong><?=$_TXT[4]?>  </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[5]?>  </strong> </div> </td>
		<td> <div align = "center"> <strong>  <?=$_TXT[6]?> </strong> </div> </td>
		<td> <div align = "center"> <strong>  <?=$_TXT[7]?> </strong> </div> </td>		
        
		<td> <div align = "center"> <strong>  <?=$_TXT[8]?> </strong> </div> </td>
        <td> <div align = "center"> <strong>  <?=$_TXT[9]?> </strong> </div> </td>
		<td> <div align = "center"> <strong>  <?=$_TXT[10]?> </strong> </div> </td>
		<td> <div align = "center"> <strong>  <?=$_TXT[11]?> </strong> </div> </td>
		<td> <div align = "center"> <strong>  <?=$_TXT[12]?> </strong> </div> </td>
		<td> <div align = "center"> <strong>  <?=$_TXT[13]?> </strong> </div> </td>

		<td> <div align = "center"> <strong>  <?=$_TXT[14]?></strong> </div> </td>
	</tr>
			</thead>
<?php


$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$query ="SELECT * FROM athletes where date_naiss = '$date_naiss' order by saison desc";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {

similar_text(strtolower($nom), strtolower($row['nom']), $percentn); 
similar_text(strtolower($prenom), strtolower($row['prenom']), $percentpn); 
similar_text(strtolower($nom), strtolower($row['prenom']), $percentn1); 
similar_text(strtolower($prenom), strtolower($row['nom']), $percentpn1); 


if ((($percentn >50) or ($percentpn >50)or($percentn1 >50) or ($percentpn1 >50))and ($saison == $row['saison'])) {


?>
	<tr bgcolor="#FF0000">
    
<?php }else {?>
	<tr  >
<?php }?>


	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row['cin'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>	  
      
	  <td><div align="center"><?php echo $row['nationalite'];?></div></td>

	  <td><div align="center"><?php echo $row['date_naiss'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['age'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>

	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  
  
  </tr>
<?php					}
while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table></div></div>
<p>&nbsp;</p>

<div class="card-body">


<div class="table-responsive">						
	<table class="table table-bordered" id="dataTable">
	<thead>
	<tr>
	    <td ><div align="center"><strong> <?=$_TXT[0]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[4]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[5]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[6]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[7]?> </strong> </div> </td>		
        
		<td> <div align = "center"> <strong> <?=$_TXT[8]?> </strong> </div> </td>
<td> <div align = "center"> <strong> <?=$_TXT[9]?>  </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[10]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[11]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[12]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[13]?> </strong> </div> </td>

		<td> <div align = "center"> <strong> <?=$_TXT[14]?></strong> </div> </td>
		<td><div align="center"><strong><?=$_TXT[23]?></strong></div></td>
	</tr>
</thead>
<?php  
$query ="SELECT * FROM athletess where n_lic = '$n_lic'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$ident = $row['photoid'];
$ren = $row['obs'];
if ($bilan >0){
?>
	<tr>
<?php }else{
?>
	<tr >
<?php }
?>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row['cin'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>	  
      
	  <td><div align="center"><?php echo $row['nationalite'];?></div></td>

	  <td><div align="center"><?php echo $row['date_naiss'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['age'];?></div></td>
	  <td><div id="cl" align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>

	  <td><div align="center"><?php echo $row['sport'];?></div></td>
      
      <td ><div align="center" ><a href ='updathletess.php?code<?php echo "=$row[n_lic]";?>&club<?php echo "=$row[club]";?>'><b>Modifier</b></a>

      <div align="center"><a  href ='licencevalid.php?code<?php echo "=$row[n_lic]";?>&club<?php echo "=$row[club]";?>'><b>Validate</b></a>
      <!-- <button id="delid" style="color:#fff" onclick="getReason" ><b>Supprimer</b></button></td> -->
      <div><button type="button" id="delid"><b>Supprimer</b></button></div>
  
  </tr>
</table></div>

<div class="card-body">


<div class="table-responsive">						
	<table class="table table-bordered" >
  <tr>
<?php
$ren = $row['obs'];

if ($ren <> "") {$phott =$ren; }
else {$phott =$row['n_lic']; }
if ($ren <> "")  {
 ?>
	  <td valign="top"><img src="./photo/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="53" height="105"><td>
	  <td><img src="./photoid/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"><td>
  <td><img src="./photobor/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
  <td><img src="./photoeng/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
      <?PHP 
	  }
else {
 ?>
	  <td valign="top"><img src="./photot/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="53" height="105"></td>
	  <td><img src="./photoidt/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></td>
  <td><img src="./photobor/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
  <td><img src="./photoeng/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
      <?PHP 
	  }?>
  
  
  </tr>
  
</table></div></div>
	</div> 	</div>
	</div>
	</div></div>
    <script> var a="";
    document.getElementById('delid').addEventListener("click",getReason)
        function getReason(){
            // alert('dsdsd')
             
              reason=prompt("Quel est la raison de supprimer ce athlete")
            //   alert(reason)
              cl=document.getElementById('cl').innerText
              window.location.href="delathletess.php?code=<?php echo $_GET['code'];?>&club="+cl+"&raison="+reason
            //  alert("sasasa")
            //  console.log("klklklkl")
       // Simulate a mouse click:
    //    if(a!=null){
        // window.location.href = "delathletess.php?code="+<?php echo $_GET['code'];?>+"&club="+<?php echo $_GET['club'];?>+"&raison=";

    //    }
            }
        </script>
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