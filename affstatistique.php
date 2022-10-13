<?php
session_start();
if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "fr"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

// (D) LOAD LANGUAGE FILE
require "languages/"."lang-" . $_SESSION["lang"] . ".php";//$club = $_SESSION['club'];
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
<HTML lang="fr" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Statisques</TITLE>
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
        </style>
</HEAD>

<BODY id="page-top" onload="endLoading()"
lang="<?=$_SESSION["lang"]?>">
<script>
    function endLoading(){
     var loader=document.getElementById('loader');
   var content=document.getElementById('content');

    loader.style.display="none";
            content.style.display="block";}

    </script>
<div id="wrapper">
<div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
            <div id="content-wrapper" class="d-flex flex-column ">
           
<div  class="ml-1">
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
    <div id="lang" style="display:none"><?php echo $_SESSION["lang"] ?></div>

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
<center> <div id="loader"><div  class="loader"></div>
<div>Chargement en cours...</div>
</div>
</center>
<div id="content" class="container-fluid">
<div class="card shadow mb-4 ml-1">
<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-2 text-gray-800"><?=$_TXT[63]?> </h1>
                       
                                 
                        </div>
                        <p align="center"><input type=button value=<?=$_TXT[37]?> onClick="printthis()" class="btn btn-warning"></p>
 
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
$club11 = "";
if (isset($_POST['club11'])) {
  $club11 = (get_magic_quotes_gpc()) ? $_POST['club11'] : addslashes($_POST['club11']);
}
$sport = "";
if (isset($_POST['sport'])) {
  $sport = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);
}
$ligue = "";
if (isset($_POST['ligue'])) {
  $ligue = (get_magic_quotes_gpc()) ? $_POST['ligue'] : addslashes($_POST['ligue']);
}

?> <table >

<tr>
<td><form name="stat" method="post" action="">
<table >
      <tr><td> <?=$_TXT[14]?>  </td> <td ></td>
        <td><select name="sport" size="1" id="Discipline" tabindex="9"  class="custom-select ">
          <option><?php echo $sport;?></option>
          <option></option>
        <option>وشوكونغ فو</option>
        <option>كمبو</option>
        <option>ديكايتو ريو</option>
        <option>الدفاع عن النفس بودو</option>
        <option>فوفينام فيات فوداو</option>
        <option>فوت وات فان فوداوو و الأنشطة التابعة</option>
        <option>هابكيدو</option>
        <option>الكيسندو</option></select></td>
        <?php
if (($_SESSION['club'] == "ADMIN")or($_SESSION['club'] == "Admin")or($_SESSION['club'] == "admin")){ 
?> 
        <td ><?=$_TXT[13]?></td>
        <td align="center">
          <select name="ligue" size="1" id="club" tabindex="9" class="custom-select ">
          <option><?php echo $ligue;?></option>
          <?php
					   do { 
                                     $res=$rowl['ligue'];
                                        echo "<option >$res</option>";
                       } while ($rowl = mysql_fetch_assoc($resultl));
?>
        </select></td>
        <td ><?=$_TXT[12]?> </td>    <td ></td>
        <td ><select name="club11" size="1" id="club11" tabindex="9" class="custom-select ">
          <option></option>
          <option><?php echo $club11;?></option>
          <?php
					   do { 
                                     $res=$rowc['club'];
                                      echo "<option >$res</option>";
                       } while ($rowc = mysql_fetch_assoc($resultc));
?>
        </select></td>
        <?php } ?>  
        <td><?=$_TXT[0]?> </td> <td ></td>
        <td ><select name="saison" size="1" id="saison" tabindex="9" class="custom-select ">
          <option><?php echo $saison;?></option>
          <?php
					   do { 
                                     $res=$row['saison'];
                                      echo "<option >$res</option>";
                       } while ($row = mysql_fetch_assoc($result));
?>
        </select></td>
        <td ></td>

        <td> <input name="ok" type="submit" onClick="startLoading()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value = <?=$_TXT[20]?> >
        
 </td>

        
      </tr>
   

</table>
    </form></td></tr></table>
<?php 
$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);
$query0 ="insert into athletest select * from athletes where saison = '$saison' and club = '$club' and sport = '$sport'";

if ($club == "ADMIN"){

if ($sport <> ""){$query0 ="insert into athletest select * from athletes where saison = '$saison' and club like '%$club11%' and ligue like '%$ligue%' and sport = '$sport'";}
if ($sport == ""){$query0 ="insert into athletest select * from athletes where saison = '$saison' and club like '%$club11%' and ligue like '%$ligue%'";}

}


$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);

$query ="SELECT * FROM age where sexe = 'ذكر'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result)+1;
$query ="SELECT * FROM age where sexe = 'أنثى'";
$result = mysql_query($query,$connexion);
$female = mysql_num_rows($result)+1;



$queryagem ="SELECT * FROM age where sexe = 'ذكر' order by min";
$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$queryagef ="SELECT * FROM age where sexe = 'أنثى' order by min";
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);


?>
<div id="divprint" class="card-body">

<p id="pprint" style="page-break-before:always">
<table align="center"   >
  <tr>
    <td align="right" valign="middle" width="40%">الجامعة التونسية للوشو كونغ فو و الرياضات التابعة</td>
    <td align="center" width="20%"><img src="image/logo.png" alt="" width="60" height="60"></td>
    <td align="left" valign="middle" width="40%">FEDERATION TUNISIENNE DE WUSHU KUNG FU ET DISCIPLINES ASSOCIEES</td>
  </tr>
</table>
    
  
<div align="center" class="style2">الإحصائيات</div><br>
<div align="center" class="style2"><?php echo $sport;?></div><br>
<div align="center"><?php echo $saison;?></div></p>
<div  class="table-responsive">

<table border="1" width:"100%" class="table table-bordered" >
	<thead>
<tr>
	    <td rowspan="2" ><strong>الموسم</strong></td>
	    <td rowspan="2" ><strong>النادي</strong></td>
	    <td rowspan="2" ><strong>الرابطة</strong></td>
	    <td colspan="<?php echo $male;?>" align="center" ><strong>ذكور</strong></td>
	    <td colspan="<?php echo $female;?>" align="center" ><strong>إناث</strong></td>
	    <td rowspan="2" ><strong>المجموع العام</strong></td>
	</tr>
	<tr>
                      <?php
					   do { 

                                     $res=$rowagem['cat'];?>
	  <td align="center"><strong><?php echo $res;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));
                   
?>

	  <td align="center"><strong>م ذكور</strong></td>

                      <?php
					   do { 
                                     $res=$rowagef['cat'];?>
	  <td align="center"><strong><?php echo $res;?></strong></td>

                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
?>

	  <td align="center"><strong>م إناث</strong></td>
  </tr>
<?php 

if ($sport == ""){
$query0 ="select club, ligue from athletest where saison = '$saison' group by club, ligue order by ligue, club";}
else {
$query0 ="select club, ligue from athletest where saison = '$saison' group by club, ligue order by ligue, club";}
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {
$club0 = $row0['club'];
$ligue0 = $row0['ligue'];

$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);

?>
	<tr>
	  <td><div align="center"><?php echo $saison;?></div></td>
	  <td><div align="center"><?php echo $row0['club'];?></div></td>
	  <td><div align="center"><?php echo $row0['ligue'];?></div></td>



                      <?php
					   do { 
                                     $res=$rowagem['cat'];
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and age = '$res' and club = '$club0' and ligue = '$ligue0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));

$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                      <?php
					   do { 
                                     $res=$rowagef['cat'];
									 
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and age = '$res' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

<?php 
$query ="SELECT * FROM athletest where sport like '%$sport%' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>




  </tr>
<?php					

}while	 ($row0=mysql_fetch_assoc($result0)); 

?>

<tr>	  <td colspan="3"><div align="center">المجموع</div></td>

                      <?php
$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);
					   do { 
                                     $res=$rowagem['cat'];
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and age = '$res'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));

$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>

	  <td align="center"><strong><?php echo $male;?></strong></td>
                      <?php
					   do { 
                                     $res=$rowagef['cat'];
									 
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and age = '$res'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>

	  <td align="center"><strong><?php echo $male;?></strong></td>


<?php 
$query ="SELECT * FROM athletest where sport like '%$sport%'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

  </tr>

             
  </thead>

</table></div></div></div>
<?php 
?>
<p style="page-break-before:always">


<script>
   function printthis(){

    // divprint=document.getElementById("divprint").innerHTML;
    // divprint.document.getElementById('datatable').id="";
        pprint= document.getElementById("pprint").innerHTML;
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
</div></div></div></div></div>
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