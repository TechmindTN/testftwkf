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
<?php 
$jour = "";
if (isset($_POST['jour'])) { $jour = (get_magic_quotes_gpc()) ? $_POST['jour'] : addslashes($_POST['jour']);}
$mois = "";
if (isset($_POST['mois'])) { $mois = (get_magic_quotes_gpc()) ? $_POST['mois'] : addslashes($_POST['mois']);}
$annee = "";
if (isset($_POST['annee'])) { $annee = (get_magic_quotes_gpc()) ? $_POST['annee'] : addslashes($_POST['annee']);}
?>
    <form name="stat" method="post" action="">
<table width="50%" border="0" align="center"  class="text">
<tr>
<td width="50%"><div align="right">Jours</div></td>
<td width="50%"><input name="jour" id="jour" type="number" class="Style4" value="<?php echo $jour; ?>" size="4" maxlength="2"></td>
<td width="50%"><div align="right">Mois</div></td>
<td width="50%"><input name="mois" id="mois" type="number" class="Style4" id="mois" value="<?php echo $mois; ?>" size="4" maxlength="2"></td>
<td width="50%"><div align="right">Annee</div></td>
<td width="50%"><input name="annee" id="annee" type="number" class="Style4" id="annee" value="<?php echo $annee; ?>" size="8" maxlength="4"></td>
<td colspan="2" align="center"><input name="ok" type="submit" class="Style4" value="Afficher"></td>
</tr>
</table>
    </form>


<div align="center" class="style2">Liste Athletes</div>
<p align="center">&nbsp;</p>

<table border="1" width="100%" id="table1">
	<tr>
	    <td rowspan="2"><div align="center"><strong>Saison</strong></div></td>
	    <td rowspan="2"><div align="center"><strong>N Lic</strong></div></td>
		<td rowspan="2"><div align="center"><strong>CIN</strong></div></td>
	    <td rowspan="2"><div align="center"><strong>Nom</strong></div></td>
		<td rowspan="2"><div align="center"><strong>Prenom </strong></div></td>
	    <td rowspan="2"><div align="center"><strong>Date Naissance</strong></div></td>
	    <td rowspan="2"><div align="center"><strong>Sexe</strong></div></td>
	    <td rowspan="2"><div align="center"><strong>Age</strong></div></td>
	    <td rowspan="2"><div align="center"><strong>Club</strong></div></td>
	    <td rowspan="2"><div align="center"><strong>Ligue</strong></div></td>
		<td rowspan="2"><div align="center"><strong>Grade</strong></div></td>
		<td colspan="4"><div align="center"><strong>Discpline</strong></div></td>
		<td rowspan="2"><div align="center"><strong>Photo</strong></div></td>
		<td rowspan="2"><div align="center"><strong>Siganture</strong></div></td>
	</tr>
	<tr>
	  <td align="center">Judo</td>
	  <td align="center">Aikido</td>
	  <td align="center">Kendo</td>
	  <td align="center">Ju Jitsu</td>
  </tr>
<?php


	   	include('connect.php');
$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];

$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$dat = $annee. "-".$mois. "-".$jour;

 if (($club == "ADMIN")){ $query ="SELECT * FROM athletes where saison = '$saison'";}
else {$query ="SELECT * FROM athletes where club = '$club' and saison = '$saison'";}
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$query2 ="SELECT * FROM athletess where club = '$club' and saison = '$saison'";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);

do {
$dat3 = $row['date_saisie'];
$dat2 = substr("$dat3", 0, 10);

if ($dat == $dat2){ ?>
	<tr>
	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row['cin'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>
	  <td><div align="center"><?php echo $row['date_naiss'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['age'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row['grade'];?></div></td>
	  <td><div align="center"><?php echo $row['judo'];?></div></td>
	  <td><div align="center"><?php echo $row['aikido'];?></div></td>
	  <td><div align="center"><?php echo $row['kendo'];?></div></td>
	  <td><div align="center"><?php echo $row['jujitsu'];?></div></td>
	  <td><div align="center"><img src="./photo/<?php echo $row['photo'];?>" width="33" height="50"></div></td>
	  <td><div align="center"></div></td>
  
  </tr>
<?php	}				}while	 ($row=mysql_fetch_assoc($result)); 

do {
$dat3 = $row2['date_saisie'];
$dat2 = substr("$dat3", 0, 10);
if ($dat == $dat2){ 

?>
	<tr>
	  <td><div align="center"><?php echo $row2['saison'];?></div></td>
	  <td><div align="center"><?php echo $row2['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row2['cin'];?></div></td>
	  <td><div align="center"><?php echo $row2['nom'];?></div></td>
	  <td><div align="center"><?php echo $row2['prenom'];?></div></td>
	  <td><div align="center"><?php echo $row2['date_naiss'];?></div></td>
	  <td><div align="center"><?php echo $row2['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row2['age'];?></div></td>
	  <td><div align="center"><?php echo $row2['club'];?></div></td>
	  <td><div align="center"><?php echo $row2['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row2['grade'];?></div></td>
	  <td><div align="center"><?php echo $row2['judo'];?></div></td>
	  <td><div align="center"><?php echo $row2['aikido'];?></div></td>
	  <td><div align="center"><?php echo $row2['kendo'];?></div></td>
	  <td><div align="center"><img src="./photo/<?php echo $row2['photo'];?>" width="33" height="50"></div></td>
	  <td><div align="center"></div></td>  
  </tr>
<?php	}				}while	 ($row2=mysql_fetch_assoc($result2)); 


?> 
</table>
<p>&nbsp;</p>

<p align="center">&nbsp;</p>
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>

</body>

</html>