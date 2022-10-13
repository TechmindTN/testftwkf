<?php
session_start();
if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "fr"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }
// (D) LOAD LANGUAGE FILE
require "languages/"."lang-" . $_SESSION["lang"] . ".php";
include('connect.php');
//$ip = $_SERVER["REMOTE_ADDR"];
//$query ="SELECT nom,date FROM archive where ip = '$ip' order by date desc";
//$result = mysql_query($query,$connexion);
//$row = mysql_fetch_assoc($result);
$club = $_SESSION['club'];
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
	<!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Liste de Paiement</TITLE>

</HEAD>
<?php
	   	 

$query1 ="SELECT saison from paiement group by saison order by saison";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$query2 ="SELECT club from athletes group by club order by club";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$saison = "";
$club1 = "";
$test = "";
if (isset($_POST['saison'])) {
  $saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);
}
if (isset($_POST['club1'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club1'] : addslashes($_POST['club1']);
}
if (isset($_POST['test'])) {
  $test = (get_magic_quotes_gpc()) ? $_POST['test'] : addslashes($_POST['test']);
}

?>
<body id="page-top" lang="<?=$_SESSION["lang"]?>">
<!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
   <div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
 
  <div id="content-wrapper" class="d-flex flex-column ">
  <div id="content" class="ml-1">
    <!-- D�connexion Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">�</span>
                    </button>
                </div>
                <div class="modal-body">S�lectionnez "D�connexion" ci-dessous si vous �tes pr�t � terminer votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">D�connexion</a>
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
                    <div class="small text-gray-500">Emily Fowler � 58m</div>
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
                    <div class="small text-gray-500">Jae Chun � 1d</div>
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
                    <div class="small text-gray-500">Morgan Alvarez � 2d</div>
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
                    <div class="small text-gray-500">Chicken the Dog � 2w</div>
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
                R�glages
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Journal d'activit�
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php" data-bs-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                D�connexion
            </a>
        </div>
    </li>

</ul>

</nav>
<div id="lang" style="display:none"><?php echo $_SESSION["lang"] ?></div>

<!-- End of Topbar -->
  <div class="container-fluid">
<div class="card shadow mb-4">
<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<table >
<h1 class="h3 mb-2 text-gray-800"><?=$_TXT[47]?></h1><?PHP     if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
                        <a href="paiement.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajouter</a><?php } ?>
                                 
                       
<table >
<tr>
          <td><form name="stat" method="post" action="">
<table>
      <tr><input name="test" type="hidden" id="montant" tabindex="10" size="25" value="1">
        <td ><?=$_TXT[0]?></td>
        <td ><select name="saison" size="1" id="saison" tabindex="9" class="custom-select ">
        <option><?php echo $saison;?> </option>
                      <?php
					   do { 
                                     $res=$row1['saison'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>

 <?PHP     if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>

        <td ><?=$_TXT[12]?></td>
        <td><select name="club1" size="1" id="saison" tabindex="9" class="custom-select ">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res1=$row2['club'];
                                      echo "<option >$res1</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>
      </select></td>
<?php } ?>


      
        <td><input name="ok" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" value=<?=$_TXT[20]?>></td>
      </tr>
</table>
    </form></table> </div>

<?php 
?>
<?php 

if ($test == "1"){
if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){
$query ="SELECT * FROM paiement where club = '$club' and saison = '$saison' and etat = 1";
$query2 ="SELECT SUM(montant) from paiement where club = '$club' and saison = '$saison' and etat = 1";
//$query3 ="SELECT SUM(prix) from athletes where club = '$club' and saison = '$saison'";
}else{
$query ="SELECT * FROM paiement where saison = '$saison' and etat = 1";
if ($saison == "") {$query ="SELECT * FROM paiement where etat = 1";}
if ($club1 <> "") {$query ="SELECT * FROM paiement where saison like '%$saison%' and club = '$club1' and etat = 1";}

$query2 ="SELECT SUM(montant) from paiement where saison = '$saison' and etat = 1";
if ($saison == "") {$query2 ="SELECT SUM(montant) from paiement where etat = 1";}
if ($club1 <> "") {$query2 ="SELECT SUM(montant)  FROM paiement where saison like '%$saison%' and club = '$club1' and etat = 1";}
//$query3 ="SELECT SUM(prix) from athletes where saison = '$saitson'";
}

$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$montantpaye = $row2[0];

// $result3 = mysql_query($query3,$connexion);
// $row3 = mysql_fetch_row($result3);
// $montanttotal = $row3[0];

//$reste = $montanttotal - $montantpaye;
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);

$query0 ="insert into athletest select * from athletes where saison like '%$saison%' and club = '$club'";

if (($club == "ADMIN")or($club == "admin")or($club == "Admin")){

$query0 ="insert into athletest select * from athletes where saison = '$saison'";

if ($saison == "") {$query0 ="insert into athletest select * from athletes";}
if ($club1 <> "") {$query0 ="insert into athletest select * from athletes where saison like '%$saison%' and club = '$club1'";}

}
$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);

$query000 ="select * from age where prix > 0 order by sexe,min";
$result000 = mysql_query($query000,$connexion);
$row000 = mysql_fetch_assoc($result000);
$totalRows = mysql_num_rows($result000) + 1 ;




?>
<div id="divprint">
<div  class="card-body">
<div class="table-responsive">
<table  class="table table-bordered text-center" border="1" id="dataTable"   >
<thead>
<tr>
	    <th rowspan="2" ><?=$_TXT[12]?></th>
	    <th rowspan="2" ><?=$_TXT[13]?></th>
	    <th rowspan="2" ><?=$_TXT[0]?></th>
	    <th colspan="<?php echo $totalRows ; ?>" align="center" > <?=$_TXT[38]?></th>
	    <th rowspan="2" ><?=$_TXT[39]?></th>
	    <th rowspan="2" ><?=$_TXT[41]?></th>
	    <th rowspan="2" ><?=$_TXT[42]?></th>
	</tr>

	<tr>
<?php do { ?>
	  <th ><strong><?php echo $row000['nom'];?></strong></th>

<?php					}while	 ($row000=mysql_fetch_assoc($result000)); 

?>
	  <th><?=$_TXT[40]?></th>
</tr></thead>
<?php 
$query0 ="SELECT club, ligue from athletest group by club, ligue order by ligue, club";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);

$ttprix = 0;

do {
$club0 = $row0['club'];
$ligue0 = $row0['ligue'];
$tprix = 0;
$total = 0;
$query00 ="SELECT saison from athletest where club = '$club0' group by saison order by saison";
$result00 = mysql_query($query00,$connexion);
$row00 = mysql_fetch_assoc($result00);
$totalsais = mysql_num_rows($result00) ;
?>
	<tr>
	  <td rowspan="<?php echo $totalsais;?>"><div align="center"><?php echo $row0['club'];?></div></td>
	  <td rowspan="<?php echo $totalsais;?>"><div align="center"><?php echo $row0['ligue'];?></div></td>
<?php
do {
$saison0 = $row00['saison'];
?>	  <td><div align="center"><?php echo $saison0;?></div></td>
<?php
$result000 = mysql_query($query000,$connexion);
$row000 = mysql_fetch_assoc($result000);
$total =0;
do {
$age1 = $row000['cat'];
$sexe1 = $row000['sexe'];
$prix = $row000['prix'];
$query1 ="SELECT sum(n) from athletest where club = '$club0' and saison = '$saison0' and age = '$age1' and sexe = '$sexe1'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
?>
	  <td><div align="center"><?php echo $row1[0];?></div></td>

<?php	

$tprix = $tprix + $row1[0] * $prix;
$total = $total + $row1[0] ;

				}while	 ($row000=mysql_fetch_assoc($result000)); 

//$query7 ="SELECT sum(n)  from athletest where club = '$club0' and saison = '$saison' and sexe = '???'";
//$query8 ="SELECT sum(prix)from athletest where club = '$club0' and saison = '$saison' and sexe = '???'";
$query9 ="SELECT SUM(montant) from paiement where club = '$club0' and saison = '$saison0' and etat = 1";




//$result7 = mysql_query($query7,$connexion);
//$row7 = mysql_fetch_row($result7);
//$total= $row7[0];
//$result8 = mysql_query($query8,$connexion);
//$row8 = mysql_fetch_row($result8);
$result9 = mysql_query($query9,$connexion);
$row9 = mysql_fetch_row($result9);

?>
	  <td><div align="center"><?php echo $total;?></div></td>
	  <td><div align="center"><?php echo $tprix;?></div></td>
	  <td><div align="center"><?php echo $row9[0];?></div></td>
	  <td><div align="center"><?php echo $tprix-$row9[0];?></div></td>
  </tr>
<?php	
$ttprix = $ttprix+$tprix;
					}while	 ($row00=mysql_fetch_assoc($result00)); 
				}while	 ($row0=mysql_fetch_assoc($result0)); 

?>
</table></div></div>
<div class="card-body">
<div class="table-responsive ">
<table  border="1" class="table table-bordered " id="dataTable "   >
	<tr>
	    <td ><div align="center"><strong><?=$_TXT[39]?> </strong></div></td>
	    <td ><div align="center"><strong><?php echo $ttprix ;?> </strong></div></td>
	    <td ><div align="center"><strong><?=$_TXT[41]?></strong></div></td>
	    <td ><div align="center"><strong><?php echo $montantpaye ;?>  </strong></div></td>
	    <td ><div align="center"><strong><?=$_TXT[42]?></strong></div></td>
	    <td ><div align="center"><strong><?php echo $ttprix - $montantpaye ;?> </strong></div></td>
	</tr>

</table></div></div>
<br>
<div class="card-body">

<div class="table-responsive">

<table border="1" class="table table-bordered" id="dataTable"   >	<tr>
	    <td ><strong>Saison</strong></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
	    <td ><div align="center"><strong>Montant</strong></div></td>
	    <td ><div align="center"><strong>Date</strong></div></td>
        <td ><div align="center"><strong>Recu</strong></div></td>
	    <td ><div align="center"><strong>Actions</strong></div></td>

	</tr>
<?php






do {

?>

	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['montant'];?></div></td>
	  <td><div align="center"><?php echo $row['date'];?></div></td>
	  <td><div align="center"><?=$_TXT[45]?></div></td>
      <td align="center"><a href ='delpai.php?code<?php echo "=$row[id]";?>' onclick="return confirm('Vous etes sure de supprimer paiement?')" ><?=$_TXT[22]?></a>
        
        </td>

  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table></div></div>
</div>

<?php } ?>
<p style="page-break-before:always">

<p align="center"><input type="button" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" value="Imprimer" onClick="printthis()"></p>

</div>
</div></div>


<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
<script>
   function printthis(){

    // divprint=document.getElementById("divprint").innerHTML;
    // divprint.document.getElementById('datatable').id="";
        // pprint= document.getElementById("pprint").innerHTML;
    //  dataTable=document.getElementById("dataTable").innerHTML
    //  dataTable.id="blabla";

    original=document.getElementById("wrapper").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            // document.getElementById('dataTable').removeAttribute('id');
            
            a.document.write('<html>');
            a.document.write(`<head>
         
    <style>
    @page{
        size:landscape;
        
    }
    table{
        table-layout: auto;
        border-collapse: collapse;
    },
   
    </style>
</HEAD>`)
            a.document.write('<body > ');
            // a.document.write(pprint);
            // a.document.write(dataTable);
            divprint=document.getElementById("divprint").innerHTML;

            a.document.write(divprint);
            // a.document.getElementById('dataTable').id="bla";
            a.document.write('</body></html>');
            a.document.close();
            // a.document.style.size='landscape';
            a.print();
    // divprint.print();
    // document.body.innerHTML=divprint;
    // window.print();
    // document.body.innerHTML=original;
    // window.print();
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