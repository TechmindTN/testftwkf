<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
// $cin = $_SESSION['cin'];
//$club = $_GET['club'];include('connect.php');
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
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Liste des arbitres</TITLE>
</HEAD>
<style>
	.ml-1 {
  margin-left:10.5% !important;
}

</style>
<BODY id="page-top "  lang="<?=$_SESSION["lang"]?>">

<?php 
	   	include('connect.php');
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
// $saison = $row1[0];
$query2="select saison from `saison`";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$query3="select club from `club` order by club";
$result3 = mysql_query($query3,$connexion);
$row3 = mysql_fetch_assoc($result3);

if(isset($_POST['cl'])){
	$cl=$_POST['cl'];
}
else{
	$cl=$_SESSION['club'];
}
if(isset($_POST['sai'])){
	$sai=$_POST['sai'];
}
else{
	$sai=$row1['saison'];
}

if($cl=='Tous'){
	$query4="SELECT * FROM `entraineur` where saison='".$sai."' and type = 'حكم'";

}
else{
	$query4="SELECT * FROM `entraineur` where club='".$cl."' and saison='".$sai."' and type = 'حكم'";

}
$result4 = mysql_query($query4,$connexion);
$row4 = mysql_fetch_assoc($result4);

if(($sai=="")and($cl=='Tous')){
    $querye ="SELECT count(*) FROM entraineur  ";
}else if(($sai=="")and($cl!='Tous')){
    $querye ="SELECT count(*) FROM `entraineur` where club='".$cl."' and type = 'حكم'";

}
else if(($sai!="")and($cl=='Tous')){
    $querye ="SELECT count(*) FROM `entraineur` where saison='".$sai."' and type = 'حكم'";

}
else{
    $querye ="SELECT count(*) FROM `entraineur` where club='".$cl."' and saison='".$sai."' and type = 'حكم'";

}

$resulty = mysql_query($querye,$connexion);
$rowy = mysql_fetch_row($resulty);



?>
<script>
console.log("<?php echo $sai ?>");
console.log("<?php echo $cl ?>");
console.log("<?php echo $result4 ?>");


</script>
<div id="wrapper">

<!-- Sidebar -->
<div class="navbar-nav sidebar sidebar-dark accordion bg-gradient-primary">
            <!-- Sidebar -->
            <div id='side'></div></div>

			<div id="content-wrapper"  class="d-flex flex-column ">
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
            <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Déconnexion
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->
<div id="content" class="container-fluid">

<div class="card shadow mb-4" >

<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<form name="stat" method="post" action="affarbitre.php">
<table>
<tr>
<td >
<h1 style="margin-right:80px" class="h3 mb-2 text-gray-800">Liste des arbitres </h1>
</td>
<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
<td >
<a style="margin-right:20px" href="arbitre.php"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Ajouter</a>
								</td>
								<?php } ?>
								<td>
Saison</td><td> <select style="margin-right:20px" class="custom-select "name="sai" size="1" id="club" tabindex="9">
        <option><?php echo $row4['saison'];?> </option>
		<option></option>
                      <?php
					   do { 
                                    //  $res=$row2['saison'];
                                      echo "<option >".$row2['saison']."</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>
</td><td>
      </select></td>
	  
	  <?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
	  <td>
	  Club</td><td > <select style="margin-right:20px" class="custom-select "name="cl" size="1" id="club" tabindex="9">
	  <?php
	 if (($_SESSION['club'] == "ADMIN")or($_SESSION['club'] == "Admin")or($_SESSION['club'] == "admin")){ 
	  ?><option >Tous</option>"<?php } ?>
                      <?php
					   do { 
                                    //  $res=$row1['cat'];
                                      echo "<option >".$row3['club']."</option>";
                       } while ($row3 = mysql_fetch_assoc($result3));
?>
      </select>
	  </td>
	 <?php } ?> 
	  <td>
<input name="ok" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value = "rechercher">
</td>
   </tr>              
</table>
          </form>
        

</div>
<div class="card-body">
	<div class="table-responsive">
<table  class="table table-bordered"  id="dataTable">
<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
    Total :
<?php echo $rowy[0]; }?>
<thead>
	<tr>
	    <td ><div align="center" ><strong>Saison </strong> </div> </td>
		<td> <div align = "center"> <strong> N° Lic </strong> </div> </td>
		<td> <div align = "center"> <strong> CIN </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td> <div align = "center"> <strong> Prénom </strong> </div> </td>
		<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
	    <td ><div align="center"><strong>Date Naissance</strong></div></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
		<td> <div align = "center"> <strong> Ligue </strong> </div> </td>
		<td ><div align="center"><strong>Grade</strong></div></td>
		<td ><div align="center"><strong>Degre</strong></div></td>
		<td ><div align="center"><strong>Function</strong></div></td>
		<td> <div align = "center"> <strong> Discipline</strong> </div> </td>
		<td ><div align="center"><strong>Photo</strong></div></td>
		<td ><div align="center"><strong>Diplome</strong></div></td>
		<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
		<td ><div align="center"><strong>Actions</strong></div></td><?php } ?>
	</tr>
	</thead>
	<tbody>
<?php


// $query ="SELECT * FROM entraineur where cin = '$cin' and saison = '$saison' and type = 'حكم'";

// $result = mysql_query($query,$connexion);
// $row = mysql_fetch_assoc($result);
do {

 $uploaddir ='arb/' 


?>

	<tr>

	  <td><div align="center"><?php echo $row4['saison'];?></div></td>
	  <td><div align="center"><?php echo $row4['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row4['cin'];?></div></td>
	  <td><div align="center"><?php echo $row4['nom'];?></div></td>
	  <td><div align="center"><?php echo $row4['prenom'];?></div></td>
	  <td><div align="center"><?php echo $row4['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row4['naiss'];?></div></td>
	  <td><div align="center"><?php echo $row4['club'];?></div></td>
	  <td><div align="center"><?php echo $row4['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row4['grade'];?></div></td>
	  <td><div align="center"><?php echo $row4['degre'];?></div></td>
	  <td><div align="center"><?php echo $row4['type'];?></div></td>
	  <td><div align="center"><?php echo $row4['sport'];?></div></td>
	  <td><div align="center"><img src="./photo<?php echo $uploaddir.$row4['photo'];?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><div align="center"><img src="./diplome<?php echo $uploaddir.$row4['photo'];?>?<?php echo time(); ?>" width="33" height="50"></div></td>
      

	  <?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
      <td>
        <div align="center"><a href ='updarbitre.php?code<?php echo "=$row4[n_lic]";?>&saison<?php echo "=$row4[saison]";?>&fonct<?php echo "=$row4[type]";?>'><b>Modifier</b></a>
        </div>
		<p align="center">  <a  onclick="return confirm('Vous etes sure de supprimer cet arbitre??')" href ='delarbitre.php?code<?php echo "=$row4[n_lic]";?>'><b>supprimer</b></a></p>

        </td>
  
  </tr>
<?php			}		}while	 ($row4=mysql_fetch_assoc($result4)); 


?> 
</tbody>
</table>


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
</div>
</div>
</div>
</div>
</div>


<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	</div>
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