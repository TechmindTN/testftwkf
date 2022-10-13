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

$code1 = 0;

if (isset($_POST['cod'])) {
  $code1 = (get_magic_quotes_gpc()) ? $_POST['cod'] : addslashes($_POST['cod']);
}
if ($code1 == 0) {
$query ="select max(n_lic) from `entraineurs` where type = '$type'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code = $row[0]+1;
}
else {
$code = $code1;
}
$dat1 = date("Y/m/d H:i:s") ;
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$sport = $_POST['sport'];
$cin = $_POST['cin'];
$naiss = $_POST['naiss'];

$degre = $_POST['degre'];
$gar = $_POST['gradear'];
$grade = $_POST['grade'];

$clubb = $_POST['clubb'];
$liguee = $_POST['liguee'];




$aphoto ='';
if (isset($_POST['aphoto'])) {
  $aphoto = (get_magic_quotes_gpc()) ? $_POST['aphoto'] : addslashes($_POST['aphoto']);
}
$photo ='';
$extension = strrchr($_FILES['photo']['name'], ".") ;
if (($extension == '.jpg')or($extension == ".JPG")) {
$photo = $code.".jpg";

if ($type == "ممرن"){ $uploaddir ='./photoentrt/' ; }
if ($type == "مسير"){ $uploaddir ='./photodirt/' ; }
if ($type == "حكم"){ $uploaddir ='./photoarbt/' ; }
if ($type == "منشط"){ $uploaddir ='./photoanimt/' ; }
if ($type == "مرافق"){ $uploaddir ='./photoacct/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='./photoentrft/' ; }



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
if ($type == "ممرن"){ $uploaddir ='./diplomeentrt/' ; }
if ($type == "مسير"){ $uploaddir ='./diplomedirt/' ; }
if ($type == "حكم"){ $uploaddir ='./diplomearbt/' ; }
if ($type == "منشط"){ $uploaddir ='./diplomeanimt/' ; }
if ($type == "مرافق"){ $uploaddir ='./diplomeacct/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='./diplomeentrft/' ; }
move_uploaded_file($_FILES['diplome']['tmp_name'], $uploaddir.$diplome);
}
else {
if (isset($_POST['adiplome'])) {
$diplome = $adiplome;}
}

if (($type == "مرافق") or ($type == "مسير"))
{ $etat = 1 ;}else {$etat = 0;}
if (($nom <> '')and($prenom <> '')and($sport <> '')and($sexe <> '')and($photo <> '')and(($diplome <> '')or ($type == "مسير") or ($type == "مرافق")))
{
	if ($code1 == 0) {

$query ="INSERT INTO `entraineurs` ( `saison` ,`n_lic`,`degre` , `sport`, `nom`, `prenom` , `sexe`  , `club` , `ligue`, `grade` ,  `photo`, `date_saisie`, `type`, `naiss`, `arbitrage`, `cin`, `etat`) 
VALUES ('$saison','$code','$degre','$sport','$nom','$prenom', '$sexe', '$club', '$ligue', '$grade', '$photo', '$dat1' , '$type', '$naiss', '$gar', '$cin', '$etat')";
}
else {
$query ="UPDATE `entraineurs` SET `nom`='$nom', `prenom`='$prenom', `degre`='$degre', `sport`='$sport' , `sexe` ='$sexe',  `club`= '$clubb', `ligue`='$liguee', `grade`='$grade' ,  `photo`='$photo',  `type`='$type',  `naiss`='$naiss',  `arbitrage`='$gar' ,  `cin`='$cin' WHERE (`n_lic`='$code1' and `saison`='$saison' and type = '$type')";
}

$result = mysql_query($query,$connexion);
?>
 
<script type="text/javascript">
window.location.href="affentraineur.php";
</script>

<?php 
}
?>

</body>
</html>