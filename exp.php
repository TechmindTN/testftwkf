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
<?php
//header("Content-type: application/vnd.ms-excel; lang=ar charset=utf8_unicode_ci");
	   	include('connect.php');
$comp = $_GET ['comp'];
header("Content-Disposition: attachment; filename=$comp.xls");

//header("Content-disposition: attachment; filename=\"liste.xls\"");
$dat = $_GET ['dat'];
$lieu = $_GET ['lieu'];
$cat = $_GET ['cat'];
$type = $_GET ['type'];
 
?>
<table border=1>
<TR>
<TD>Num Licence</TD>
<TD>poids</TD>
<TD>club</TD>
<TD>nom</TD>
<TD>prenom</TD>
<TD>cat</TD>
<TD>abv</TD>
<TD>pay</TD>
<TD>type</TD>
<TD>qualite</TD>
<TD>nationalite</TD>
<TD>sexe</TD>
</TR>

<?PHP

$query ="SELECT * FROM delegation where cat = '$cat' And comp = '$comp' And annee = '$dat' And lieu = '$lieu' And type = '$type'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
if ($type == "Individual" ){$typ = "فردي";};
if ($type == "Open" ){$typ = "فردي";};
if ($type == "Team" ){$typ = "فرق";};
                       do { 
$club = $row['Délégation'] ;
$id = $row['id'];
$sexe = $row['Sexe'];
$query1 ="SELECT ligue FROM club where club = '$club'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$club = $row['Délégation'] . " " . $row['groupe'];

$query5 ="SELECT age FROM param where cat = '$cat' and sexe ='$sexe'";
$result5 = mysql_query($query5,$connexion);
$row5 = mysql_fetch_assoc($result5);

$query6 ="SELECT age FROM athletes where n_lic = '$id' order by saison DESC";
$result6 = mysql_query($query6,$connexion);
$row6 = mysql_fetch_assoc($result6);

  
  
?>
<TR>
<TD><?PHP echo $row['id'];?></TD>
<TD><?PHP echo $row['CAtPoids'];?></TD>
<TD><?PHP echo $club;?></TD>
<TD><?PHP echo $row['nom'];?></TD>
<TD><?PHP echo $row['prenom'];?></TD>
<TD><?PHP echo $row5['age'];?></TD>
<TD><?PHP echo $row6['age'];?></TD>
<TD><?PHP echo $row1['ligue'];?></TD>
<TD><?PHP echo $typ;?></TD>
<TD>لاعب</TD>
<TD>_</TD>
<TD>_</TD>

</TR>
<?PHP
  
  
                       } while ($row = mysql_fetch_assoc($result)); 
 // $row->closeCursor(); // Termine le traitement de la requête
?>