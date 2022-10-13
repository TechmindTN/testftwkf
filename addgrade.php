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
	function diff_date($day , $month , $year , $day2 , $month2 , $year2){
  $timestamp = mktime(0, 0, 0, $month, $day, $year);
  $timestamp2 = mktime(0, 0, 0, $month2, $day2, $year2);
  $diff_date = floor(($timestamp - $timestamp2) / (3600 * 24));
  return $diff_date; 
}

include('connect.php');
$dat1 = $_POST['annee']."/".$_POST['mois']."/".$_POST['jours'] ;
$nlic = $_POST['lic'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$grade = $_POST['grade'];
$club1 = $_POST['club'];
$sport = $_POST['sport'];

$query2 ="select * from `grade` where n_lic = '$nlic'";
$result2 = mysql_query($query2,$connexion);
$totalRows1 = mysql_num_rows($result2);

if (($grade <> "White") and ($totalRows1 > 0)){
$query1 ="select id from `ceinture` where couleur = '$grade'";
$result1 = mysql_query($query1,$connexion);
$row1=mysql_fetch_assoc($result1);
$id = $row1['id']-1;
$query1 ="select * from `ceinture` where id = '$id'";
$result1 = mysql_query($query1,$connexion);
$row1=mysql_fetch_assoc($result1);
$ceinture = $row1['couleur'];
$delais = $row1['delais'];
$query1 ="select * from `grade` where n_lic = '$nlic' and grade = '$ceinture'";
$result1 = mysql_query($query1,$connexion);
$totalRows = mysql_num_rows($result1);
$row1=mysql_fetch_assoc($result1);


if (($totalRows>0) ){
$dat2 = $row1['date'];
$dat3 = date("Y/m/d") ;

$d2=diff_date(substr("$dat3", 8, 2) , substr("$dat3", 5, 2) , substr("$dat3", 0, 4) , substr("$dat1", 8, 2) , substr("$dat1", 5, 2) , substr("$dat1", 0, 4));
if ($d2 >= 0) {
$d1=diff_date(substr("$dat1", 8, 2) , substr("$dat1", 5, 2) , substr("$dat1", 0, 4) , substr("$dat2", 8, 2) , substr("$dat2", 5, 2) , substr("$dat2", 0, 4));

if ($d1 >= $delais) {
$query ="INSERT INTO `grade` ( `n_lic`, `nom`, `prenom` , `club` , `sport`, `date`, `grade` ) 
VALUES ('$nlic','$nom','$prenom', '$club1', '$sport', '$dat1',  '$grade' )";
$result = mysql_query($query,$connexion);

?>
<script type="text/javascript">
window.location.href="affgrade.php";
</script>

<?php

}
else{ ?> <div align="center"><strong class="test">Problème de Delais</strong></div><?php };}
else{ ?> <div align="center"><strong class="test">Date Incorrecte</strong></div><?php };}
else{ ?> <div align="center"><strong class="test">Problème de Grade</strong></div><?php };}

else{
$query ="INSERT INTO `grade` ( `n_lic`, `nom`, `prenom` , `club` , `sport`, `date`, `grade` ) 
VALUES ('$nlic','$nom','$prenom', '$club1', '$sport', '$dat1',  '$grade' )";
$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affgrade.php";
</script>

<?php
}
?>

</body>
</html>