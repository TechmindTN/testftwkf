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
<style type="text/css">
.test {
	font-size: 24px;
	font-family: "Times New Roman", Times, serif;
	color: #F00;
	text-align: center;
}
.h {
	color: #0F6;
}
.j {
	color: #0F9;
}
</style>
</HEAD>
<script language="javascript" type="text/javascript">
// You can place JavaScript like this
</script>
<body>
<html>
<style>
.tit{
width:400px;
font-size:18px;
text-align:left;
font-weight:bold; 
}
table {
border: medium solid #000000;
width: 100%;
}
td, th {
border: thin solid #6495ed;
width: 10%;
}
td a {color:#ffffff;}
.cel {
background: #0FF;
color:#000;
font-weight:bold;}
td a:hover {color:#ffffff;}
</style>
<?php
	   	include('connect.php');
$query1 ="SELECT club from athletes group by club order by club";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$nom = "";
$prenom = "";
$club1 = "";
if (isset($_POST['nom'])) {
  $nom = (get_magic_quotes_gpc()) ? $_POST['nom'] : addslashes($_POST['nom']);
}
if (isset($_POST['prenom'])) {
  $prenom = (get_magic_quotes_gpc()) ? $_POST['prenom'] : addslashes($_POST['prenom']);
}
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}

?>
    <form name="stat" method="post" action="">
<table width="100%" border="0" align="center"  class="text">
      <tr>
        <td><strong>Nom</strong></td>
        <td><strong>Prénom</strong></td>
  <?PHP if (($club == "ADMIN")){ ?>
       <td><strong>Club</strong></td><?php } ?>
      </tr>
      <tr>
        <td><input name="nom" type="text" id="nom" size="40" value="<?php echo $nom;?>"></td>
        <td><input name="prenom" type="text" id="prenom" size="40" value="<?php echo $prenom;?>"></td>

 <?PHP if (($club == "ADMIN")){ ?>
        <td><select name="club" size="1" id="club" tabindex="9">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td><?php } ?>
      </tr>
      <tr>
        <td colspan="3" align="center"><input name="ok" type="submit" class="Style4" value = "Rechercher"></td>
      </tr>
</table>
    </form>
<?php

$nom1 = "%".$nom."%";
$prenom1 = "%".$prenom."%";
if (($club == "ADMIN")){$club2 = "%".$club1."%";}
else {$club2 = $club;}

 if (($nom <> '')or($prenom <> '')or($club1 <> '')){
	 
if ($nom == '')	{$query = "SELECT * FROM athletes WHERE ((nom like '$prenom1') or (prenom like '$prenom1')) AND club like '$club2' order by saison desc";}

if ($prenom == '')	{$query = "SELECT * FROM athletes WHERE ((nom like '$nom1') or (prenom like '$nom1')) AND club like '$club2' order by saison desc";}

 
if (($nom <> '')and($prenom <> '')) {$query = "SELECT * FROM athletes WHERE (nom like '$nom1' or nom like '$prenom1') AND (prenom like '$prenom1'  or prenom like '$nom1') AND club like '$club2' order by saison desc";}
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
?>
<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>Saison </strong> </div> </td>
		<td> <div align = "center"> <strong> N° Lic </strong> </div> </td>
		<td> <div align = "center"> <strong> N° CIN </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td> <div align = "center"> <strong> Prénom </strong> </div> </td>		<td> <div align = "center"> <strong> Nom du Père </strong> </div> </td>
		<td> <div align = "center"> <strong> Nationalité </strong> </div> </td>
<td> <div align = "center"> <strong> Date Naissance </strong> </div> </td>
		<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
		<td> <div align = "center"> <strong> Age </strong> </div> </td>
		<td> <div align = "center"> <strong> Club </strong> </div> </td>
		<td> <div align = "center"> <strong> Ligue </strong> </div> </td>
		<td> <div align = "center"> <strong> Grade </strong> </div> </td>
		<td> <div align = "center"> <strong> Discipline</strong> </div> </td>
		<td><div align="center"><strong>Photo</strong></div></td>
	</tr>
<?php
do {

?>

	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row['cin'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>	  <td><div align="center"><?php echo $row['pere'];?></div></td>
	  <td><div align="center"><?php echo $row['nationalite'];?></div></td>

	  <td><div align="center"><?php echo $row['date_naiss'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['age'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row['grade'];?></div></td>
	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  <td><div align="center"><img src="./photo/<?php echo $row['n_lic']. ".jpg";?>" width="33" height="50"></div></td>
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 



}
 ?>

  </body>
</html>