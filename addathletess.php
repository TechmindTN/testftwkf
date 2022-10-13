<?php
session_start();
$club1 = $_SESSION['club'];
 if ($_SESSION['club']==null) {
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
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
</HEAD>
<BODY>



<?php	 
include('connect.php');
$club = $_POST['clubb'];

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
$query ="select max(n_lic) from `athletes`";
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
$obs = $_POST['lic'];

$sexe = $_POST['sexe'];
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$date_naissance = $_POST['annee']. "-".$_POST['mois']. "-".$_POST['jour'];
$sport = $_POST['sport'];
$nationalite = $_POST['nationalite'];
$cin = $_POST['cin'];

$query1 ="SELECT * FROM age";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$age = "_";
$prix=0;

$jours1= substr("$saison", 5, 4) - $annee;


do {
	$dsup = $row1['sup'];
	$dinf = $row1['min'];

if (($jours1>=$dinf) and ($jours1<=$dsup)) {
	$age=$row1['cat'];
	if ($sexe == "Male") { $prix=$row1['prix'];}
	
	}
	
	}while	 ($row1=mysql_fetch_assoc($result1)); 


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

if (($extension == '.jpg')or($extension == ".JPG")) {
$photo = $code.$extension;
if ($obs == "") {$uploaddir ='./photot/';}
if ($obs <> "") {$uploaddir ='./photo/';}
move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = $aphoto;}
}

if (($extensionid == '.jpg')or($extensionid == ".JPG")) {
$photoid = $code.$extensionid;
if ($obs == "") {$uploaddir ='./photoidt/';}
if ($obs <> "") {$uploaddir ='./photoid/';}
move_uploaded_file($_FILES['photoid']['tmp_name'], $uploaddir.$photoid);
}
else {
if (isset($_POST['aphotoid'])) {
$photoid = $aphotoid;}
}
if (($extensionbor == '.jpg')or($extensionbor == ".JPG")) {
$photobor = $code.'.jpg';
$uploaddir ='./photobor/'. $saison . '/';
move_uploaded_file($_FILES['photobor']['tmp_name'], $uploaddir.$photobor);
}
else {
if (isset($_POST['aphotoid'])) {
$photoid = $aphotoid;}
}
if (($extensioneng == '.jpg')or($extensioneng == ".JPG")) {
$photoeng = $code.'.jpg';
$uploaddir ='./photoeng/'. $saison . '/';
move_uploaded_file($_FILES['photoeng']['tmp_name'], $uploaddir.$photoeng);
}
else {
if (isset($_POST['aphotoeng'])) {
$photoeng = $aphotoeng;}
}




$query ="UPDATE `athletess` SET `nom`='$nom', `prenom`='$prenom',  `cin`='$cin',  `sexe` ='$sexe', `date_naiss`='$date_naissance' , `club`= '$club', `ligue`='$ligue', `age`='$age' , `sport`='$sport'  ,  `photo`='$photo',  `photoid`='$photoid',  `nationalite`='$nationalite'  WHERE (`n_lic`='$code1' and `saison`='$saison')";

$result = mysql_query($query,$connexion);
?>
 
 <script type="text/javascript">
window.location.href='licenceverif.php?naiss<?php echo "=$date_naissance";?>&club<?php echo "=$club1";?>&club1<?php echo "=$club";?>&nom<?php echo "=$nom";?>&prenom<?php echo "=$prenom";?>&code<?php echo "=$code";?>&cin<?php echo "=$cin";?>';
</script>

</body>
</html>