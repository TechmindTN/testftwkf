<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
</HEAD>
<BODY>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
-->
</style></HEAD>

<body>
<?php
include('connect.php');
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";
</script>

<?php	 }
$query ="SELECT club,ligue FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$ligue=$row['ligue'];
$club = $row['club'];
$type = $_POST['type'];
$dat1 = date("Y/m/d H:i:s") ;
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$saison=$_GET['sais'];
$lic = $_GET['code'];
$type = $_GET['type'];

$code1 = 0;

if (isset($_POST['cod'])) {
  $code1 = (get_magic_quotes_gpc()) ? $_POST['cod'] : addslashes($_POST['cod']);
}

$query ="select * FROM `entraineurs` where `n_lic` = '$lic' and saison = '$saison' and type = '$type'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$nom = $row['nom'];
$prenom = $row['prenom'];
$sexe = $row['sexe'];
$type = $row['type'];
$sport = $row['sport'];
$degre = $row['degre'];
$photo = $row['photo'];
$cin = $row['cin'];
$grade = $row['grade'];
$gar = $row['gradear'];
$naiss = $row['naiss'];
$obs = $row['obs'];



$dat1 = date("Y/m/d H:i:s") ;

if ($obs > 0) {
$code = $obs;
}
else {
$query ="select max(n_lic) from `entraineur` where type = '$type'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code = $row[0]+1;
}



$aphoto ='';
if (isset($_POST['aphoto'])) {
  $aphoto = (get_magic_quotes_gpc()) ? $_POST['aphoto'] : addslashes($_POST['aphoto']);
}
$photo ='';
$extension = strrchr($_FILES['photo']['name'], ".") ;
if (($extension == '.jpg')or($extension == ".JPG")) {
$photo = $code.".jpg";

if ($type == "ممرن"){ $uploaddir ='./photoentr/' ; }
if ($type == "مسير"){ $uploaddir ='./photodir/' ; }
if ($type == "حكم"){ $uploaddir ='./photoarb/' ; }
if ($type == "منشط"){ $uploaddir ='./photoanim/' ; }
if ($type == "مرافق"){ $uploaddir ='./photoacc/' ; }
if ($type == "مرافق"){ $uploaddir ='./photoacc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='./photoentrf/' ; }



//$uploaddir ='./photoentr/';

move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = $aphoto;}
}

$adiplome ='';
if (isset($_POST['adiplome'])) {
  $adiplome = (get_magic_quotes_gpc()) ? $_POST['adiplome'] : addslashes($_POST['adiplome']);
}
$diplome ='';
$extension1 = strrchr($_FILES['diplome']['name'], ".") ;
if (($extension1 == '.jpg')or($extension1 == ".JPG")) {
$diplome = $code.".jpg";
if ($type == "ممرن"){ $uploaddir ='./diplomeentr/' ; }
if ($type == "مسير"){ $uploaddir ='./diplomedir/' ; }
if ($type == "حكم"){ $uploaddir ='./diplomearb/' ; }
if ($type == "منشط"){ $uploaddir ='./diplomeanim/' ; }
if ($type == "مرافق"){ $uploaddir ='./diplomeacc/' ; }
move_uploaded_file($_FILES['diplome']['tmp_name'], $uploaddir.$diplome);
}
else {
if (isset($_POST['adiplome'])) {
$diplome = $adiplome;}
}



$query ="INSERT INTO `entraineur` ( `saison` ,`n_lic`,`degre` , `sport`, `nom`, `prenom` , `sexe`  , `club` , `ligue`, `grade` ,  `photo`, `date_saisie`, `type`, `naiss`, `arbitrage`, `cin`, `etat`) 
VALUES ('$saison','$code','$degre','$sport','$nom','$prenom', '$sexe', '$club', '$ligue', '$grade', '$photo', '$dat1' , '$type', '$naiss', '$gar', '$cin', '1')";

$result = mysql_query($query,$connexion);

$query ="delete FROM `entraineurs` where `n_lic` = '$lic' and saison = '$saison' and type = '$type'";
$result = mysql_query($query,$connexion);
?>
 
<script type="text/javascript">
window.location.href="affentraineur.php";
</script>


</body>
</html>