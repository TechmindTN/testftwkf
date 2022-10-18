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

<?php	 } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<!-- Custom styles for this template-->
<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Modification entraineur</TITLE>
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
<!--


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
</HEAD>

<BODY lang="<?=$_SESSION["lang"]?>">
<div id="wrapper">

<!-- Sidebar -->
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
           
           <div class="row" style="width:100%" >       <h1 class="h4 text-gray-900 mb-4" style=" width:100%">Modifier Entraineur</h1></div>
           </div>
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
<?php
	include('connect.php');
$code=$_GET['code'];
$saison=$_GET['saison'];
$fonct=$_GET['fonct'];

$query ="select * FROM `entraineurs` where `n_lic` = '$code' and saison = '$saison' and type = '$fonct'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$type = $row['type'];
$obs = $row['obs'];
if ($obs ==0){
if ($type == "ممرن"){ $uploaddirp ='./photoentrt/' ; }
if ($type == "مسير"){ $uploaddirp ='./photodirt/' ; }
if ($type == "حكم"){ $uploaddirp ='./photoarbt/' ; }
if ($type == "منشط"){ $uploaddirp ='./photoanimt/' ; }
if ($type == "مرافق"){ $uploaddirp ='./photoacct/' ; }
if ($type == "مدرب فدرالي"){ $uploaddirp ='./photoentrft/' ; }

if ($type == "ممرن"){ $uploaddird ='./diplomeentrt/' ; }
if ($type == "مسير"){ $uploaddird ='./diplomedirt/' ; }
if ($type == "حكم"){ $uploaddird ='./diplomearbt/' ; }
if ($type == "منشط"){ $uploaddird ='./diplomeanimt/' ; }
if ($type == "مرافق"){ $uploaddird ='./diplomeacct/' ; }
if ($type == "مدرب فدرالي"){ $uploaddird ='./photoentrft/' ; }}
else
{
if ($type == "ممرن"){ $uploaddirp ='./photoentr/' ; }
if ($type == "مسير"){ $uploaddirp ='./photodir/' ; }
if ($type == "حكم"){ $uploaddirp ='./photoarb/' ; }
if ($type == "منشط"){ $uploaddirp ='./photoanim/' ; }
if ($type == "مرافق"){ $uploaddirp ='./photoacc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddirp ='./photoentrf/' ; }

if ($type == "ممرن"){ $uploaddird ='./diplomeentr/' ; }
if ($type == "مسير"){ $uploaddird ='./diplomedir/' ; }
if ($type == "حكم"){ $uploaddird ='./diplomearb/' ; }
if ($type == "منشط"){ $uploaddird ='./diplomeanim/' ; }
if ($type == "مرافق"){ $uploaddird ='./diplomeacc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddird ='./photoentrf/' ; }}
?>

 <form action="addentraineur.php" method="post" enctype="multipart/form-data" name="MForm">
 <div class="form-group row">
<div class="col-sm-4 mb-3 mb-sm-0">
                                      <label >Nom :   </label>
                                      <input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $row['nom'];?>" class="form-control form-control-user"   >
                                    </div>
                                    <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                    <label>Prénom : </label>
                                    <input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $row['prenom'];?>" class="form-control form-control-user"  >
                                    </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label>Sexe</label>
                                      <select name="sexe" size="1" id="sexe" tabindex="13" class="custom-select">
        <option><?php echo $row['sexe'];?></option>        <option>ذكر</option>
        <option>أنثى</option>
</select>                                    </div>
                                  
                                </div>
                                <div class="form-group row">
<div class="col-sm-4 mb-3 mb-sm-0">
                                      <label >Discipline :   </label>
                                      <select name="sport" size="1" id="sport" tabindex="6" class="custom-select">
        <option><?php echo $row['sport'];?></option>        <option></option>
        <option>ووشوكونغ فو</option><option>كمبو</option><option> دكايتاريو</option> <option> فو فينام فيات فوداو </option><option>هابكيدو</option><option>الكيسندو</option><option>الكايزن</option><option>المصارعة الصينية</option><option>كمبو</option><option>الدفاع عن النفس بودو</option></select>
</div>                            
        <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                    <label>Degre : </label>
                                    <select name="degre" size="1" id="degre" tabindex="9" class="custom-select">
        <option><?php echo $row['degre'];?> </option>
        <option>مدرب فدرالي</option>
        <option>درجة اولى</option>
        <option>درجة ثانية</option>
        <option>درجة ثالثه</option>
      </select>                                    </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label>Grade</label>
                                      <select name="grade" size="1" id="grade" tabindex="12" class="custom-select">
        <option> <?php echo $row['grade'];?></option>       
       <option>أسود درجة أولى</option>
       <option>أسود درجة ثانية</option>
       <option>أسود درجة ثالثة</option>
       <option>أسود درجة رابعة</option>
       <option>أسود درجة خامسة</option>
       <option>أسود درجة سادسة</option>
       <option>أسود درجة سابعة</option>
      </select>      </div>
                                  
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                    <label>Type : </label>
                                    <select name="type" size="1" id="type" tabindex="9" class="custom-select">
        <option><?php echo $row['type'];?></option>
        <option>مسير</option>
        <option>ممرن</option>
        <option>مدرب فدرالي</option>
        <option>مرافق</option>
      </select>                                    </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label>Date Naissance :</label>
                                      <input name="naiss" type="date" id="naiss" tabindex="1" size="15" value="<?php echo $row['naiss'];?>" class="form-control form-control-user">                    </div>

                             
<div class="col-sm-4 mb-3 mb-sm-0">
                                      <label >CIN  :   </label>
                                      <input name="cin" type="number" id="cin" tabindex="1" size="25" value ="<?php echo $row['cin'];?>"  class="form-control form-control-user">                                </div>
</div>
                                      <div class="form-group row">

                                      <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                    <label>Photo : </label>
                                    <input name="photo" type="file" id="photo" size="1" tabindex="15" class="form-control-file">
                                  </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label>Diplome  :</label>
                                      <input name="diplome" type="file" id="diplome" size="1" tabindex="15" class="form-control-file">                    </div>
                                  
                                </div> 
                                <div class="form-group row">
<div class="col-sm-4 mb-3 mb-sm-0">
<img src="<?php echo $uploaddirp . $row['photo'];?>" width="33" height="50"></div>
                                    <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                   
                                  </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <img src="<?php echo $uploaddird .$row['photo'];?>" width="33" height="50">      </div>
                                  
                                </div> 



  <p align="center">
      <input name="liguee" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['ligue'];?>">
      <input name="clubb" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['club'];?>">
      <input name="cod" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['n_lic'];?>">
      <input name="aphoto" type="hidden" id="aphoto" tabindex="100" size="0" value ="<?php echo $row['photo'];?>">
      <input name="adiplome" type="hidden" id="adiplome" tabindex="100" size="0" value ="<?php echo $row['photo'];?>">
      <input type="submit" name="valider" id="valider" value="Valider" class="btn btn-primary">
  </p>
</form></div></div></div></div></div></div></div>
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
    <script src="template.js"></script>
</body>

</html>
