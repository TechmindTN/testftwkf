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
//$file_type = "msword";
//$file_ending = "doc";
//header("Content-Type: application/$file_type");
header("Content-Disposition: attachment; filename=liste.$file_ending");
//header("Pragma: no-cache");
//header("Expires: 0");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
	   	include('connect.php');
$saison =$_POST['saison'];

$filename = "liste.xls";
header("Content-type: application/vnd.ms-word; lang=ar charset=utf8_unicode_ci");
header("Content-disposition: attachment; filename=$filename");
//header("Content-disposition: attachment; filename='liste.doc'");
header ("Content-type: image/jpeg");
//echo  utf8_decode('"champ1";"Champ2";"Champ3";"champ4"'."\n");
?> 
<table width=100% border=1  dir="rtl">
<!-- impression des titres de colonnes -->
<strong><TR align="center">
<TD>saison</TD>
<TD>n_lic</TD>
<TD>cin</TD>
<TD>nom</TD>
<TD>prenom</TD>
<TD>sexe</TD>
<TD>naissance</TD>
<TD>age</TD>
<TD>club</TD>
<TD>ligue</TD>
<TD>n</TD>
<TD>photo</TD>
<TD>photoid</TD>
<TD>sport</TD>
<TD>nationalite</TD>
<TD>date_sais</TD>

</TR></strong>
 <?php 
 
$query ="SELECT * FROM athletes where saison = '$saison'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$dat1 = date("Y/m/d H:i:s") ;
 
                       do { 
$date_naiss =$row['date_naiss'];
$jour = substr("$date_naiss", 8, 2);
$mois = substr("$date_naiss", 5, 2);
$annee = substr("$date_naiss", 0, 4);
if ($jour < 12 ){ $naiss = $mois . "/" . $jour . "/" . $annee;}
else {$naiss = $date_naiss;}
?>
<TR>
<TD><?php echo $row['saison']; ?></TD>
<TD><?php echo $row['n_lic'] ; ?></TD>
<TD>.<?php echo $row['cin']; ?>.</TD>
<TD><?php echo $row['nom'] ; ?></TD>
<TD><?php echo $row['prenom']; ?></TD>
<TD><?php echo $row['sexe']; ?></TD>
<TD><?php echo $naiss; ?></TD>
<TD><?php echo $row['age']; ?></TD>
<TD><?php echo $row['club']; ?></TD>
<TD><?php echo $row['ligue']; ?></TD>
<TD>0</TD>
<TD>c:\licence\image\<?php echo $row['photo']; ?></TD>
<TD><?php echo $row['photoid']; ?></TD>
<TD><?php echo $row['sport']; ?></TD>
<TD>.<?php 
if ($row['nationalite'] <> "0"){
echo $row['nationalite'];}
else 
{echo "_";} ?>

.</TD>
<TD><?php 

if ($row['date_saisie'] <> "0000-00-00 00:00:00"){
echo $row['date_saisie'];}
else 
{echo $dat1;} ?>
</TD>

</TR>
<?php 
                       } while ($row = mysql_fetch_assoc($result)); 
 // $row->closeCursor(); // Termine le traitement de la requête
?>