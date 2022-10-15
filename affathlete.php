<?php
session_start();
if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "fr"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

// (D) LOAD LANGUAGE FILE
require "languages/"."lang-" . $_SESSION["lang"] . ".php";
////$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];

//$_SESSION['club'] = $club2;


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Liste des athletes</TITLE>
<style>
 #content{
            display:none
        }
        .loader {
            display:block;
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.ml-1 {
  margin-left:10.5% !important;
       
}</style>
</HEAD>

<BODY  id="page-top" onload="endLoading()">
<script>
    function endLoading(){
     var loader=document.getElementById('loader');
   var content=document.getElementById('content');

    loader.style.display="none";
            content.style.display="block";}

    </script>

<div id="lang" style="display:none"><?php echo $_SESSION["lang"] ?></div>
 
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
<div id="lang" style="display:none"><?php echo $_SESSION["lang"] ?></div>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

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
                                <form method="post">
      <input type="submit" name="lang" value="fr" class="btn"/>
      <input type="submit" name="lang" value="ar" class="btn"/>

    </form>
                            </a>
                            <!-- Dropdown - Alerts -->
                           
                        </li> 
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

<center> <div id="loader"><div  class="loader"></div>
<div>Chargement en cours...</div>
</div>
</center>

<!-- End of Topbar -->
 <div id="content" class="container-fluid">

 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="h3 mb-2 text-gray-800"><?=$_TXT[17]?></div>
                        <a href="athletes.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> <?=$_TXT[16]?></a>
   <?PHP 
	   	include('connect.php');
 $club1 = "";
 $saison1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['sais'])) {
  $saison1 = (get_magic_quotes_gpc()) ? $_POST['sais'] : addslashes($_POST['sais']);
}
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];
if ($saison1 == "") {$saison1 = $saison;}
$query01 ="SELECT saison FROM `saison`";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);
if(($club1=="")and($saison1=='')){
    $queryy ="SELECT count(*) FROM athletes ";
}else if(($club1=="")and($saison1!='')){
    $queryy ="SELECT count(*) FROM athletes where saison='$saison1'";

}
else if(($club1!="")and($saison1=='')){
    $queryy ="SELECT count(*) FROM athletes where club='$club1'";

}
else{
$queryy ="SELECT count(*) FROM athletes where club = '$club1' and saison = '$saison1'";
}
$resulty = mysql_query($queryy,$connexion);
$rowy = mysql_fetch_row($resulty);

    if (($club=="admin")or($club=="ADMIN")or($club=="Admin") or ($club == "CENTRE")or($club == "Centre")or($club == "centre") or ($club == "NORD")or($club == "Nord")or($club == "nord") or ($club == "SUD")or($club == "Sud")or($club == "sud")) {
	?>
   <a href ='liste.php' class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i><?=$_TXT[18]?></a>
 


   
   <?php
	
	}
if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
if (($club=="dtn")or($club=="DTN")or($club=="Dtn")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
	 

$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

	  ?>
   
   <a href="rechathlete.php?club<?php echo "=$club";?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">

<?=$_TXT[19]?></a>
 <form name="stat" method="post" action="">


                <table><tr><td> <?=$_TXT[0]?></td> 
   <td><select name="sais" size="1" id="sais" tabindex="9" class="custom-select " >
        <option></option>
                      <?php
					   do { 
                                     $res=$row01['saison'];
                                      echo "<option >$res</option>";
                       } while ($row01 = mysql_fetch_assoc($result01));
?>
      </select>
    <?php if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {	 ?>
    
    
    
    </td><td><?=$_TXT[12]?> </td><td><select class="custom-select " name="club" size="1" id="club" tabindex="9">
        <option></option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
                    }
?>
      </select></td><td>
<input name="ok" type="submit"  class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" value = <?=$_TXT[20]?>>
                 
<td></tr></table>


          </form>
     

 </div>
 
      <?PHP // } 
	  $query ="SELECT * FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$actif=$row['actif'];


$query ="SELECT * FROM athletes where club = '$club' and saison = '$saison1'";

if (($club == "ADMIN")or($club == "admin")or($club == "Admin")or($club == "dtn")or($club == "DTN")or($club == "Dtn")){
if ($club1 <> "") {$query ="SELECT * FROM athletes where club = '$club1' and saison = '$saison1'";}
if ($club1 == "") {$query ="SELECT * FROM athletes where saison = '$saison1'";}
}
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
$nbr=1
?>       
<br>



<div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered" width="100%" id="Table1"  >
<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
Total :
<?php echo $rowy[0]; }?>
	<thead>
  <tr>
  <td ><div align="center"><strong></strong> </div> </td>

	    <td ><div align="center"><strong><?=$_TXT[0]?></strong> </div> </td>
		<td> <div align = "center"> <strong><?=$_TXT[4]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[5]?></strong> </div> </td>
		<td> <div align = "center"> <strong><?=$_TXT[6]?></strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[7]?></strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[8]?></strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[9]?> </strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[10]?> </strong> </div> </td>
		<td> <div align = "center"> <strong><?=$_TXT[11]?></strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[12]?></strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[13]?></strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[14]?></strong> </div> </td>
		<td> <div align = "center"> <strong> <?=$_TXT[15]?></strong> </div> </td>
        <?php 
        if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {	 ?>

        <td ><div align = "center"> <strong><?=$_TXT[23]?> </strong> </div> </td>
    </tr>
	</thead>
<?php }
//$federation = $_SESSION['federation'];
//$pers = $_SESSION['pers'];
//$tache = $_SESSION['tache'];
//$sexe = $_SESSION['sexe'];
//$age = $_SESSION['age'];
//$saison = $_SESSION['saison'];


do {

?>

	<tr>
    <td><div align="center"><?php echo $nbr;?></div></td>

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
	  <td><div align="center">
      
 
       <?php 
               $nbr++;

	   $extension = strrchr($row['photo'], ".") ;
	   $nphot = strstr($row['photo'], ".",true) ;
$filename = './photo/'.$nphot.'.jpg';
if (file_exists($filename)) {
 ?>
      <img src="./photo/<?php echo $nphot.".jpg";?>?<?php echo time(); ?>" width="66" height="100"></div>
<?php } 
 else {
$filename = './photo/'.$nphot.'.JPG';

if (file_exists($filename)) {
 ?>
      <img src="./photo/<?php echo $nphot.".JPG";?>?<?php echo time(); ?>" width="66" height="100">
<?php } }
  
 ?>

 
    </td>
    <?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
      <td>
        <div align="center">
          <a href ='updathletes.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&club<?php echo "=$club";?>'><b><?=$_TXT[21]?></b></a>

        </div>
      
     
     <p align="center">  <a  onclick="return confirm('Vous etes sure de supprimer cet athlete?')" href ='delathlete.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>'><b><?=$_TXT[22]?></b></a></p>
   
     
        
        </td>   <?PHP  } ?> 
 
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 

</table>
</div>
</div>
<p>&nbsp;</p>
<?php
//if ((($pers == null)and ($federation != "المركز الوطني لإعداد النخبة") and ($federation != "المراكز الإقليمية")) or ($tache =="ممرن وطني")){ 
?>

</div>
</div>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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