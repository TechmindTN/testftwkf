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
$saison = $_POST ['saison'];

$filename = "staff.xls";
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
<TD>nom</TD>
<TD>prenom</TD>
<TD>club</TD>
<TD>ligue</TD>
<TD>n</TD>
<TD>photo</TD>
<TD>type</TD>
<TD>discipline</TD>
<TD>grade</TD>
<TD>degre</TD>
<TD>lic</TD>
<TD>sexe</TD>
<TD>date_naissance</TD>
<TD>grade_arbitrage</TD>
<TD>date_saisie</TD>
<TD>cin</TD>

</TR></strong>
 <?php 
 
$query ="SELECT * FROM entraineur where saison = '$saison' and etat ='1' and type <> 'منشط'"  ;
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$dat1 = date("Y/m/d H:i:s") ;
 
                       do { 
$date_naiss =$row['naiss'];
$jour = substr("$date_naiss", 8, 2);
$mois = substr("$date_naiss", 5, 2);
$annee = substr("$date_naiss", 0, 4);
if ($jour < 12 ){ $naiss = $mois . "/" . $jour . "/" . $annee;}
else {$naiss = $date_naiss;}

$typ = $row['type'];
if ($typ <> ""){ ?>  
<TR>
<TD><?php echo $row['saison']; ?></TD>
<TD><?php echo $row['nom'] ; ?></TD>
<TD><?php echo $row['prenom']; ?></TD>
<TD><?php echo $row['club']; ?></TD>
<TD><?php echo $row['ligue']; ?></TD>
<TD>0</TD>
<?php
if ($typ == "ممرن"){?><TD>c:\licence\staff\entraineur\<?php echo $row['photo']; ?></TD><?php  }
if ($typ == "مدرب فدرالي"){?><TD>c:\licence\staff\entraineurf\<?php echo $row['photo']; ?></TD><?php  }
if ($typ == "مسير"){ ?><TD>c:\licence\staff\dirigeant\<?php echo $row['photo']; ?></TD><?php  }
if ($typ == "حكم"){ ?><TD>c:\licence\staff\arbitre\<?php echo $row['photo']; ?></TD><?php  }
if ($typ == "منشط"){?><TD>c:\licence\staff\animateur\<?php echo $row['photo']; ?></TD><?php  }
if ($typ == "مرافق"){ ?><TD>c:\licence\staff\accompagnateur\<?php echo $row['photo']; ?></TD><?php  }
 ?>

<TD><?php echo $row['type']; ?></TD>
<TD><?php echo $row['sport']; ?></TD>
<TD><?php 
if ($row['grade'] <> ""){
echo $row['grade'];}
else 
{echo "_";} ?>
<TD><?php 
if ($row['degre'] <> ""){
echo $row['degre'];}
else 
{echo "_";} ?>
</TD>

<TD><?php echo $row['n_lic']; ?></TD>
<TD><?php echo $row['sexe']; ?></TD>
<TD><?php echo $naiss; ?></TD>


<TD><?php 
if ($row['arbitrage'] <> ""){
echo $row['arbitrage'];}
else 
{echo "_";} ?>
</TD>



<TD><?php echo $row['date_saisie']; ?></TD>
<TD>.<?php echo $row['cin']; ?>.</TD>


</TR>
<?php 
}} while ($row = mysql_fetch_assoc($result)); 
 // $row->closeCursor(); // Termine le traitement de la requête
?>