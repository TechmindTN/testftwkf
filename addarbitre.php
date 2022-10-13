<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
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
window.location.href="index.html";
</script>

<?php	 }


$code1 = 0;

if (isset($_POST['cod'])) {
  $code1 = (get_magic_quotes_gpc()) ? $_POST['cod'] : addslashes($_POST['cod']);
}
if ($code1 == 0) {
$query ="select max(n_lic) from `entraineur` where type = 'حكم'";
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
$degre = $_POST['degre'];
$gar = $_POST['gradear'];
$cin = $_POST['cin'];

$grade = $_POST['grade'];
$naiss = $_POST['naiss'];





$aphoto ='';
if (isset($_POST['aphoto'])) {
  $aphoto = (get_magic_quotes_gpc()) ? $_POST['aphoto'] : addslashes($_POST['aphoto']);
}
$photo ='';
$extension = strrchr($_FILES['photo']['name'], ".") ;
if (($extension == '.jpg')or($extension == ".JPG")) {
$photo = $code.".jpg";

 $uploaddir ='./photoarb/' ;




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
$uploaddir ='./diplomearb/' ; 
move_uploaded_file($_FILES['diplome']['tmp_name'], $uploaddir.$diplome);
}
else {
if (isset($_POST['adiplome'])) {
$diplome = $adiplome;}
}


	if ($code1 == 0) {

$query ="INSERT INTO `entraineur` ( `saison` ,`n_lic`,`degre` , `sport`, `nom`, `prenom` , `sexe`  , `club` , `ligue`, `grade` ,  `photo`, `date_saisie`, `type`, `naiss`, `arbitrage`, `cin`) 
VALUES ('$saison','$code','$degre','$sport','$nom','$prenom', '$sexe', '-', '-', '$grade', '$photo', '$dat1' , 'حكم', '$naiss', '$gar', '$cin')";
}
else {
$query ="UPDATE `entraineur` SET `nom`='$nom', `prenom`='$prenom', `degre`='$degre', `sport`='$sport' , `sexe` ='$sexe',   `grade`='$grade' ,  `photo`='$photo',  `type`='حكم',  `naiss`='$naiss',  `arbitrage`='$gar' ,  `cin`='$cin' WHERE (`n_lic`='$code1'and type = 'حكم')";
}

$result = mysql_query($query,$connexion);
?>
 
<script type="text/javascript">
window.location.href="affarbitre.php";
</script>


 

</body>
</html>