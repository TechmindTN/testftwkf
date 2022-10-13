<?php
session_start();
$club = $_POST['club'];

//$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
<style type="text/css">
.style2 {	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
.style2 {	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
</style>
</HEAD>


<body>
<?php

include('connect.php');
$query ="SELECT club,ligue FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$ligue=$row['ligue'];
$club = $row['club'];

$code1 = 0;

if (isset($_POST['cod'])) {
  $code1 = (get_magic_quotes_gpc()) ? $_POST['cod'] : addslashes($_POST['cod']);
}
if ($code1 == 0) {
$query ="select max(n_lic) from `athletess`";
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
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$date_naissance = $_POST['annee']. "-".$_POST['mois']. "-".$_POST['jour'];
$sport = $_POST['sport'];
$cin = $_POST['cin'];

$nationalite = $_POST['nationalite'];

$query1 ="SELECT * FROM age";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$age = "_";

$jours1= substr("$saison", 5, 4) - $annee;
$prix = 0;

do {
	$dsup = $row1['sup'];
	$dinf = $row1['min'];

if (($jours1>=$dinf) and ($jours1<=$dsup)) {
	$age=$row1['cat'];
	
	}
	
	}while	 ($row1=mysql_fetch_assoc($result1)); 

$aphoto ='';
$aphotoid ='';
$aphotobor ='';
$aphotoeng ='';

if (isset($_POST['aphoto'])) {
  $aphoto = (get_magic_quotes_gpc()) ? $_POST['aphoto'] : addslashes($_POST['aphoto']);
}
if (isset($_POST['aphotoid'])) {
  $aphotoid = (get_magic_quotes_gpc()) ? $_POST['aphotoid'] : addslashes($_POST['aphotoid']);
}
if (isset($_POST['aphotobor'])) {
  $aphotobor = (get_magic_quotes_gpc()) ? $_POST['aphotobor'] : addslashes($_POST['aphotobor']);
}
if (isset($_POST['aphotoeng'])) {
  $aphotoeng = (get_magic_quotes_gpc()) ? $_POST['aphotoeng'] : addslashes($_POST['aphotoeng']);
}

$photo ='';
$photoid ='';
$photobor ='';
$photoeng ='';

$extension = strrchr($_FILES['photo']['name'], ".") ;
$extensionid = strrchr($_FILES['photoid']['name'], ".") ;
$extensionbor = strrchr($_FILES['photobor']['name'], ".") ;
$extensioneng = strrchr($_FILES['photoeng']['name'], ".") ;
$size1 = $_FILES['photo']['size'];
$size2 = $_FILES['photoid']['size'];
$size3 = $_FILES['photobor']['size'];
$size4 = $_FILES['photoeng']['size'];

if ((($extension == '.jpg')or($extension == ".JPG"))and ($size1<524288)) {
$photo = $code.'.jpg';
$uploaddir ='./photot/';
move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = $aphoto;
$extension = '.jpg';
$size1=1;
}}

if ((($extensionid == '.jpg')or($extensionid == ".JPG"))and ($size2<1024000)) {
$photoid = $code.'.jpg';
$uploaddir ='./photoidt/';
move_uploaded_file($_FILES['photoid']['tmp_name'], $uploaddir.$photoid);
}
else {
if (isset($_POST['aphotoid'])) {
$photoid = $aphotoid;
$extensionid = '.jpg';
$size2=1;}
}

if ((($extensionbor == '.jpg')or($extensionbor == ".JPG"))and ($size3<1024000)) {
$photobor = $code.'.jpg';
$uploaddir ='./photobor/'.$saison . '/';
move_uploaded_file($_FILES['photobor']['tmp_name'], $uploaddir.$photobor);
}
else {
if (isset($_POST['aphotobor'])) {
$photobor = $aphotobor;
$extensionbor = '.jpg';
$size3=1;
}
}
if ((($extensioneng == '.jpg')or($extensioneng == ".JPG"))and ($size4<1024000)) {
$photoeng = $code.'.jpg';
$uploaddir ='./photoeng/'.$saison . '/';
move_uploaded_file($_FILES['photoeng']['tmp_name'], $uploaddir.$photoeng);
}
else {
if (isset($_POST['aphotoeng'])) {
$photoeng = $aphotoeng;
$extensioneng = '.jpg';
$size4=1;
}
}



if (($club <> '')and($nom <> '')and($prenom <> '')and($nationalite <> '')and($jour <> '')and($mois <> '')and($sport <> '')and($sexe <> '')and($annee <> '')and($cin <> '')and($photo <> '')and($photoid <> '')and($photobor <> '')and (($extension == ".jpg") or ($extension == ".JPG"))and (($extensionid == ".jpg") or ($extensionid == ".JPG"))and (($extensionbor == ".jpg") or ($extensionbor == ".JPG")))
{
	if ($code1 == 0) {

$query ="INSERT INTO `athletess` ( `saison` ,`n_lic`, `cin`, `nom`, `prenom` , `sexe` , `date_naiss` , `club` , `ligue`, `age` , `sport`  ,  `photo`,  `photoid` , `date_saisie`, `nationalite` ) 
VALUES ('$saison','$code','$cin','$nom','$prenom', '$sexe', '$date_naissance', '$club', '$ligue', '$age', '$sport',   '$photo', '$photoid', '$dat1', '$nationalite')";
}
else {
$query ="UPDATE `athletess` SET `nom`='$nom', `prenom`='$prenom', `cin`='$cin', `sexe` ='$sexe', `date_naiss`='$date_naissance' , `club`= '$club', `ligue`='$ligue', `age`='$age' , `sport`='$sport'  ,  `photo`='$photo',  `photoid`='$photoid',  `nationalite`='$nationalite'  WHERE (`n_lic`='$code1' and `saison`='$saison')";
}

$result = mysql_query($query,$connexion);
?>
 
 <script type="text/javascript">
window.location.href="affathletes.php?club<?php echo "=$club";?>";
</script>

<?php 
}

?>

</body>
</html>