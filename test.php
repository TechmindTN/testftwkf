<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
if ($club == null) {
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
</HEAD>
<style>
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
</style><BODY>
<div align="center" class="style2">Liste Athletes</div>
<p align="center"><a href="athletes.php">Ajout</a>-----------<a href="rechathlete.php">Renouvellement</a></p>

<?php
//$federation = $_SESSION['federation'];
//$pers = $_SESSION['pers'];
//$tache = $_SESSION['tache'];
//$sexe = $_SESSION['sexe'];
//$age = $_SESSION['age'];
//$saison = $_SESSION['saison'];


	   	include('connect.php');



$query ="SELECT * FROM athletes where sexe = 'ذكر'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$i=0;
do {
$nb = $row['judo']+$row['jujitsu']+$row['aikido']+$row['yoseikan']+$row['kendo']; 

if (($row['age'] == 'Poussin')or($row['age'] == 'Benjamin')) {$tot = 2 * $nb;}
if (($row['age'] == 'Minime')or($row['age'] == 'cadet')) {$tot = 5 * $nb;}
if (($row['age'] == 'junior')or($row['age'] == 'senior')) {$tot = 15 * $nb;}
$lic = $row['n_lic']; 
$saison = $row['saison']; 

$query1 = "UPDATE `athletes` SET `prix` = '$tot' WHERE ( (`n_lic` = '$lic')and(`saison` = '$saison'))";
$result1 = mysql_query($query1,$connexion);

	}while	 ($row=mysql_fetch_assoc($result)); 

?>
</body>

</html>