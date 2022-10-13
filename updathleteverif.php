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

<?php	 }?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Modification des athletes</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
function TryCallFunction() {
	var sd = document.MForm.txt_mydate.value.split("\/");
	document.MForm.txt_mymonth.value = sd[0];
	document.MForm.txt_myday.value = sd[1];
	document.MForm.txt_myyear.value = sd[2];
}

function submitdnld() {
	document.form1.submit();
}
</script>
<script language="JavaScript" type="text/javascript">



function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<link href="Calendar.css" rel="stylesheet" type="text/css" />
<link href="../../styles/default.css" rel="stylesheet" type="text/css" />
<meta name="Keywords" content="Popup Date Picker, Softricks Javascript Calendar" />
<meta name="Description" content="Softricks Javascript Popup date picker calendar. The most versatile and feature-packed popup calendar for taking date inputs on the web." />
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<!-- Custom styles for this template-->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
</HEAD>

<BODY style="background-color:#fafafa"  lang="<?=$_SESSION["lang"]?>">
<?php
	include('connect.php');
$code=$_GET['code'];
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$query ="select * FROM `athletess` where `n_lic` = '$code' and saison = '$saison'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$date_naiss = $row['date_naiss'];
$jour=substr("$date_naiss", 8, 2);
$mois=substr("$date_naiss", 5, 2);
$annee= substr("$date_naiss", 0, 4);

?>
<div id="wrapper">
<div class="navbar-nav sidebar sidebar-dark accordion">
<!-- Sidebar -->
<div id='side'></div></div> 
<div class="content" style="width:100%">
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
<div class="container ">        
<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4 text-center ml-1">
<div class="row" style="width:100%" ><h1 class="h4 text-gray-900 mb-4" style=" width:100%"><?=$_TXT[85]?></h1></div></div>
<div class="card-body p-0">
<div class="row">    
<div class="col-lg-12">
       
<div class="p-5"> 
<form action="addathleteverif.php" method="post" enctype="multipart/form-data" name="MForm">

<div class="form-group row">
<div class="col-sm-4 mb-3 mb-sm-0">
                                      <label ><?=$_TXT[6]?>   </label>
                                        <input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $row['nom'];?>" class="form-control form-control-user"   >
                                    </div>
                                    <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                    <label><?=$_TXT[7]?> </label>
                                    <input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $row['prenom'];?>"class="form-control form-control-user" required >
                                    </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label><?=$_TXT[5]?></label>
                                    <input name="cin" type="number" id="cin" tabindex="7" size="25" value ="<?php echo $row['cin'];?>" class="form-control form-control-user" required>
                                    </div>
                                  
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                <label><?=$_TXT[9]?></label>
                                     <div class="form-group row">
                                   <div class="col-sm-4 mb-3 mb-sm-0"><label><?=$_TXT[82]?> </label>  <input  name="jour" id="jour" type="number" tabindex="3" size="4" maxlength="2" value ="<?php echo $jour;?>" class="form-control form-control-user" required></div> 
                                   <div class="col-sm-4 mb-3 mb-sm-0"> <label><?=$_TXT[83]?> </label>
                                   <input name="mois" type="number" id="mois" tabindex="4" size="4" maxlength="2" value ="<?php echo $mois;?>" class="form-control form-control-user" required>
                                  </div> 
                                   <div class="col-sm-4 mb-3 mb-sm-0"><label><?=$_TXT[84]?></label> <input required name="annee" type="number" id="annee" tabindex="5" size="8" maxlength="4" value ="<?php echo $annee;?>" class="form-control form-control-user"></div></div>
                                     
                                  </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label><?=$_TXT[10]?> </label>
                                    <select  class="form-control form-control-user" name="sexe" size="1" id="sexe" required>
                                       <option> <?php echo $row['sexe'];?></option>
                                       <option>ذكر</option>
                                       <option>أنثى</option>
                                     </select>
                                  </div>
                                  <div class="col-sm-4 mb-3 mb-sm-0">
                                  <label><?=$_TXT[8]?> </label>
                                  <input  name="nationalite" type="text" id="nationalite" tabindex="10" size="25" value ="<?php echo $row['nationalite'];?>" class="form-control form-control-user">
                                  
                                  </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label ><?=$_TXT[14]?>  </label><select name="sport" size="1" id="sport" tabindex="6"class="form-control form-control-user" required>
        <option><?php echo $row['sport'];?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select>
                                     
                                    </div>
                                    <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                    <label><?=$_TXT[15]?> </label>
                                    <input name="photo" type="file" id="photo" size="1" tabindex="10" class="form-control-file" value="./photo/<?php echo $code. ".jpg";?>" >
                                    </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label><?=$_TXT[25]?></label>
                                    <input name="photoid" type="file" id="photoid" size="1" tabindex="11"  class="form-control-file" value="./photoid/<?php echo $code. ".jpg";?>">
                                    </div>
                                  
                                </div>
                                                                          
                                <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                <label>Bordereau : </label>
                                <input name="photobor" type="file" id="photobor" size="1" tabindex="11"class="form-control-file"  value="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>"> 
                                  </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label><?=$_TXT[27]?> </label>
                                    <input name="photoeng" type="file" id="photobor" size="1" tabindex="11" class="form-control-file" value="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" >                                  </div>
                                  <div class="col-sm-4 mb-3 mb-sm-0 text-center">

                                  </div>
                                  </div>
                                  <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0" align="center">
                                <img src="./photo/<?php echo $code. ".jpg";?>" width="33" height="50">
                                  </div>
                                <div class="col-sm-3 mb-3 mb-sm-0 " align="center">
                                <img src="./photoid/<?php echo $code. ".jpg";?>" width="33" height="50">
                              </div>
                                  <div class="col-sm-3 mb-3 mb-sm-0 " align="center">
                                  <img src="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50">
                                  </div>
                                  <div class="col-sm-3 mb-3 mb-sm-0" align="center">
                                  <img src="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></div>
                                  <div class="col-sm-4 mb-3 mb-sm-0 text-center">
                                  <input name="club" type="hidden" id="cin" tabindex="10" size="25" value ="<?php echo $club ; ?> ">
  
                                  </div>
                                  </div>
  <table >
        

   
     
 
    <tr>
      <td align="left">&nbsp;</td>

<?php if ($obs == "") {?>
      <td align="left"><img src="./photot/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
<?php }?>
<?php if ($obs <> "") {?>
      <td align="left"><img src="./photo/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
<?php }?>

      <td align="left">&nbsp;</td>

<?php if ($obs == "") {?>
      <td align="left"><img src="./photoidt/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
<?php }?>
<?php if ($obs <> "") {?>
      <td align="left"><img src="./photoid/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
<?php }?>

      <td>&nbsp;</td>
      <td align="left"><img src="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
      <td>&nbsp;</td>
      <td align="left"><img src="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
      <td colspan="3" align="center">&nbsp;</td>
    </tr>
  </table>


<p align="center">
      <input name="club" type="hidden" id="clubb" size="1" value ="<?php echo $club;?>">
      <input name="clubb" type="hidden" id="clubb" size="1" value ="<?php echo $row['club'];?>">
      <input name="obs" type="hidden" id="clubb" size="1" value ="<?php echo $row['obs'];?>">
      <input name="cod" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['n_lic'];?>">
      <input name="aphotoid" type="hidden" id="aphotoid" size="1" value ="<?php echo $row['photoid'];?>">
      <input name="aphoto" type="hidden" id="aphoto" size="1" value ="<?php echo $row['photo'];?>">
      <input name="aphotobor" type="hidden" id="aphotoeng" size="1" value ="<?php echo $code. ".jpg";?>">
      <input name="aphotoeng" type="hidden" id="aphotoeng" size="1" value ="<?php echo $code. ".jpg";?>">
      <input name="lic" type="hidden" id="aphoto" size="1" value ="<?php echo $row['obs'];?>">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
</div></div></div></div></div></div></div></div>
<!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <script src="template.js"></script>
</body>

</html>
