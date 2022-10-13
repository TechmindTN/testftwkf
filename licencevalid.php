<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];?>
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

 if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";
</script>

<?php	 }

$code=$_GET['code'];


$query ="select max(n_lic) from `athletes`";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code1 = $row[0]+1;

$query1 ="SELECT * FROM athletess where n_lic = $code";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$obs = $row1["obs"];
$saison = $row1['saison'];
if ($obs == ""){
$nouv = $code1 . ".jpg";

$anc = $row1["photo"];
$extension = strrchr($anc, ".") ;
if (($extension == '.jpg')or($extension == ".JPG")) {

rename("./photot/".$anc, "./photo/".$nouv);}

//move_uploaded_file("./photot/".$nouv, "./photo/".$nouv);

$anc = $row1["photoid"];
$extension1 = strrchr($anc, ".") ;
if (($extension1 == '.jpg')or($extension1 == ".JPG")) {
rename("./photoidt/".$anc, "./photoid/".$nouv);}

$anc = $row1["photo"];
$extension2 = strrchr($anc, ".") ;
if (($extension2 == '.jpg')or($extension2 == ".JPG")) {
rename("./photobor/".$saison."/".$anc, "./photobor/".$saison."/".$nouv);}

$anc = $row1["photo"];
$extension3 = strrchr($anc, ".") ;
if (($extension3 == '.jpg')or($extension3 == ".JPG")) {
rename("./photoeng/".$saison."/".$anc, "./photoeng/".$saison."/".$nouv);}


//move_uploaded_file("./photoidt/".$nouv, "./photoid/".$nouv);


} else { 
$code1 = $obs; 
$nouv = $row1["photo"];
}

$cin = $row1['cin'];
$nom = $row1['nom'];
$prenom = $row1['prenom'];

$sexe = $row1['sexe'];
$date_naiss = $row1['date_naiss'];
$ligue=$row1['ligue'];
$club1 = $row1['club'];
$age = $row1['age'];
$sport = $row1['sport'];
$nationalite = $row1['nationalite'];

$dat1 = date("Y/m/d H:i:s") ;

//$date_saisie = $row1['date_saisie'];
$date_saisie = $dat1;



$query ="INSERT INTO `athletes` ( `saison` ,`n_lic` , `cin`,  `nom`, `prenom`  , `sexe` , `date_naiss` , `club` , `ligue`, `age` , `sport`   ,  `photo`,  `photoid` , `date_saisie`, `nationalite`, `obs` ) 
VALUES ('$saison','$code1','$cin','$nom','$prenom', '$sexe', '$date_naiss','$club1','$ligue', '$age', '$sport', '$nouv', '$nouv',  '$date_saisie',  '$nationalite',  '$obs')";

$result = mysql_query($query,$connexion);

$query1 ="delete FROM athletess where n_lic = $code";
$result1 = mysql_query($query1,$connexion);



?>
<script type="text/javascript">
window.location.href="affathletes.php?club<?php echo "=$club";?>";
</script>
</body>
</html>