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
$saison=$_GET['sais'];
$lic = $_GET['code'];
$type = $_GET['type'];


$query ="select max(n_lic) from `entraineur` where type = '$type'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code1 = $row[0]+1;

$query1 ="select * FROM `entraineurs` where `n_lic` = '$lic' and saison = '$saison' and type = '$type'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$obs = $row1["obs"];
$saison = $row1['saison'];
if ($obs == 0){
$nouv = $code1 . ".jpg";
$anc = $row1["photo"];
$extension = strrchr($anc, ".") ;
if (($extension == '.jpg')or($extension == ".JPG")) {

if ($type == "ممرن"){ $uploaddir ='./diplomeentr' ; }
if ($type == "مسير"){ $uploaddir ='./diplomedir' ; }
if ($type == "حكم"){ $uploaddir ='./diplomearb' ; }
if ($type == "منشط"){ $uploaddir ='./diplomeanim' ; }
if ($type == "مرافق"){ $uploaddir ='./diplomeacc' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='./diplomeentrf' ; }

rename($uploaddir."t/".$anc, $uploaddir."/".$nouv);}

//move_uploaded_file("./photot/".$nouv, "./photo/".$nouv);

$anc = $row1["photo"];
$extension1 = strrchr($anc, ".") ;
if (($extension1 == '.jpg')or($extension1 == ".JPG")) {
if ($type == "ممرن"){ $uploaddir ='./photoentr' ; }
if ($type == "مسير"){ $uploaddir ='./photodir' ; }
if ($type == "حكم"){ $uploaddir ='./photoarb' ; }
if ($type == "منشط"){ $uploaddir ='./photoanim' ; }
if ($type == "مرافق"){ $uploaddir ='./photoacc' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='./photoentrf' ; }

rename($uploaddir."t/".$anc, $uploaddir."/".$nouv);}

} else { 
$code1 = $obs; 
$nouv = $row1["photo"];
}

$cin = $row1['cin'];
$nom = $row1['nom'];
$prenom = $row1['prenom'];

$sexe = $row1['sexe'];
$naiss = $row1['naiss'];
$ligue=$row1['ligue'];
$club1 = $row1['club'];
$age = $row1['age'];
$sport = $row1['sport'];
$grade = $row1['grade'];
$gar = $row1['arbitrage'];
$photo = $row1['photo'];
$nationalite = $row1['nationalite'];

$dat1 = date("Y/m/d H:i:s") ;

//$date_saisie = $row1['date_saisie'];
$date_saisie = $dat1;



$query ="INSERT INTO `entraineur` ( `saison` ,`n_lic`,`degre` , `sport`, `nom`, `prenom` , `sexe`  , `club` , `ligue`, `grade` ,  `photo`, `date_saisie`, `type`, `naiss`, `arbitrage`, `cin`, `etat`) 
VALUES ('$saison','$code1','$degre','$sport','$nom','$prenom', '$sexe', '$club1', '$ligue', '$grade', '$nouv', '$dat1' , '$type', '$naiss', '$gar', '$cin', '1')";

$result = mysql_query($query,$connexion);

$query1 ="delete FROM entraineurs where n_lic = $code";
$result1 = mysql_query($query1,$connexion);



?>
<script type="text/javascript">
window.location.href="affentraineur.php?club<?php echo "=$club";?>";
</script>
</body>
</html>