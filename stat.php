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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Statistiques entraineur</TITLE>
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<style>
.ml-1 {
  margin-left: 20% !important;
}</style>
</HEAD>
<BODY lang="<?=$_SESSION["lang"]?>">

<?php
	   	include('connect.php');

$query ="SELECT saison from athletes group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$queryc ="SELECT club from athletes group by club order by club";
$resultc = mysql_query($queryc,$connexion);
$rowc = mysql_fetch_assoc($resultc);
$queryl ="SELECT ligue from athletes group by ligue order by ligue";
$resultl = mysql_query($queryl,$connexion);
$rowl = mysql_fetch_assoc($resultl);

$saison = "";
if (isset($_POST['saison'])) {
  $saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);
}
$crit = "";
if (isset($_POST['crit'])) {
  $crit = (get_magic_quotes_gpc()) ? $_POST['crit'] : addslashes($_POST['crit']);
}
$test = "";
if (isset($_POST['ligue'])) {
  $crit = (get_magic_quotes_gpc()) ? $_POST['ligue'] : addslashes($_POST['ligue']);
}
if (isset($_POST['club'])) {
    $crit = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
  }
?>
<BODY id="page-top">
<div id="wrapper">
<div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
            <div id="content-wrapper" class="d-flex flex-column ">
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
<div id="content" class="ml-1">
<div class="container-fluid">
<div class="card shadow mb-4">
<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-2 text-gray-800"><?=$_TXT[63]?>
 </h1>
                       
                                 
                        </div>
    <form name="stat" method="post" action="">

	<div class="form-group row"><div class="col-sm-1 mb-3 mb-sm-0"></div>
	<div class="col-sm-3 mb-3 mb-sm-0">
	<label><?=$_TXT[87]?></label>
		<select name="crit" size="1" id="Discipline" tabindex="9" class="custom-select">
          <option><?php echo $crit;?></option>
          <option>جهات</option>
          <option>نوادي</option>
        </select>
</div> 
				 <div class="col-sm-3 mb-3 mb-sm-2">
                               
				 <label><?=$_TXT[0]?></label>
		<select name="saison" size="1" id="saison" tabindex="9" class="custom-select">
          <option><?php echo $saison;?></option>
          <?php
					   do { 
                                     $res=$row['saison'];
                                      echo "<option >$res</option>";
                       } while ($row = mysql_fetch_assoc($result));
?>
        </select>
					
								</div>  
								<div class="col-sm-1 mb-1 mb-sm-0"><br>
								<input name="ok" type="submit" class="btn btn-primary" value = <?=$_TXT[20]?>>
      </div>			<div class="col-sm-2 mb-1 mb-sm-0"><br>

								<input type=button value="Imprimer" onClick="printthis()" class="btn btn-warning" >
      </div>
</div>
    
        
        

     
    </form>
<?php 
$query0 ="delete from entraineurt";
$result0 = mysql_query($query0,$connexion);
$query0 ="insert into entraineurt select * from entraineur where saison = '$saison'";


if ($crit == "جهات"){$critere = "ligue";}
if ($crit == "نوادي"){$critere = "club";}







?>
<div id="divprint">
<p style="page-break-before:always">
<table width="100%" border="0">
  <tr>
    <td align="right" valign="middle" width="40%">الجامعة التونسية للوشو كونغ فو و الرياضات التابعة</td>
    <td align="center" width="20%"><img src="image/logo.png" alt="" width="60" height="60"></td>
    <td align="left" valign="middle" width="40%">FEDERATION TUNISIENNE DE WUSHU KUNG FU ET DISCIPLINES ASSOCIEES</td>
  </tr>
</table>
  
  
  
<div align="center" class="style2">الإحصائيات</div><br>
<div align="center"><?php echo $saison;?></div></p>
<div class="card-body">


<div class="table-responsive">
<table class="table " id="dataTable"  border="1">
	<tr class="text-center">
	    <td ><strong>الموسم</strong></td>
       <?php if ($crit == "جهات"){ ?>   <td ><strong>/الجهة</strong> </td><?php } ?>
       <?php if ($crit == "نوادي"){ ?> <td > <strong>/النادي</strong> </td><?php } ?>
       </td>
	    <td ><strong>ممرنين</strong></td>
	    <td ><strong>مدرب فدرالي
</strong></td>
	    <td ><strong>حكام</strongv></td>
	    <td ><strong>مسيرين</strong></td>
	    <td ><strong>مرافقين</strong></td>
        <td ><strong>محب</strong></td>
	    <td ><strong>المجموع العام</strong></td>
	</tr>
<?php 

if ($crit == "جهات"){$query0 ="select ligue from entraineur where saison = '$saison' group by ligue order by ligue";}
if ($crit == "نوادي"){$query0 ="select club from entraineur where saison = '$saison' group by club order by club";}


$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {

if ($crit == "جهات"){$test = $row0['ligue'];}
if ($crit == "نوادي"){$test = $row0['club'];}



?>
	<tr>
	  <td><div align="center"><?php echo $saison;?></div></td>
	  <td><div align="center"><?php echo $test;?></div></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'ممرن'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'ممرن'";}


$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'مدرب فدرالي '";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'مدرب فدرالي'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>


                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'حكم'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'حكم'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'مسير'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'مسير'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'مرافق'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'مرافق'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>
      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'محب'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'محب'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>








  </tr>
<?php					}while	 ($row0=mysql_fetch_assoc($result0)); 
?>
	<tr>
	  <td colspan="2"><div align="center"><strong>المجموع العام</strong></div></div></td>




                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'ممرن'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'مدرب فدرالي'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>


                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'حكم'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'مسير'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'مرافق'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>
      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'محب'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>
                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>








  </tr>



</table></div></div>
</div></div></div>
<?php 
?>
<script>
   function printthis(){

    // divprint=document.getElementById("divprint").innerHTML;
    // divprint.document.getElementById('datatable').id="";
    //  dataTable=document.getElementById("dataTable").innerHTML
    //  dataTable.id="blabla";

            var a = window.open('', '', 'height=500, width=500');
            // document.getElementById('dataTable').removeAttribute('id');
            
            a.document.write('<html>');
            a.document.write(`<head>
       
    <style>
    @page{
        size:portrait;
        
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









































