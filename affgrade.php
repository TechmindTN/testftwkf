<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];//$_SESSION['club'] = $club2;

 if ($club == null) {$club = $club2;}
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
<div align="center" class="style2">Grades List</div>

 <?PHP 
	   	include('connect.php');
 $club1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}


    if (($club=="admin")or($club=="ADMIN")or($club=="Admin") or ($club == "CENTRE")or($club == "Centre")or($club == "centre") or ($club == "NORD")or($club == "Nord")or($club == "nord") or ($club == "SUD")or($club == "Sud")or($club == "sud")) {
	?>
    
    <?php
	
	}

	  ?>
     
 

 
 
      <?PHP // } 
$query ="SELECT * FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$actif=$row['actif'];


$query ="SELECT * FROM grade where club = '$club'";

if (($club == "ADMIN")or($club == "DTN")){$query ="SELECT * FROM grade";}
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);

?>       
<br>
<?PHP
if (($actif == "1") and ($club <> "CENTRE")and($club <> "Centre")and($club <> "centre") and ($club <> "NORD")and($club <> "Nord")and($club <> "nord") and ($club <> "SUD")and($club <> "Sud")and($club <> "sud")) {?>
<p align="center"><a href="grade.php">Ajout</a></p>
<?PHP
}?>

<table border="1" width="100%" id="table1">
	<tr>
		<td> <div align = "center"> <strong> N° Lic </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td> <div align = "center"> <strong> Prénom </strong> </div> </td>
		<td> <div align = "center"> <strong> Club </strong> </div> </td>
		<td> <div align = "center"> <strong> Discipline</strong> </div> </td>
		<td> <div align = "center"> <strong> Grade </strong> </div> </td>
	    <td> <div align = "center"> <strong> Date</strong></div></td>



		<td></td>
	</tr>
<?php
do {?>
	<tr>
	  <td><div align="center"><?php echo $row['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  <td><div align="center"><?php echo $row['grade'];?></div></td>
	  <td><div align="center"><?php echo $row['date'];?></div></td>
	  <td><div align="center"><a href ='delgrade.php?lic<?php echo "=$row[n_lic]";?>&grade<?php echo "=$row[grade]";?>'><img src="sup.png" width="16" height="16"></a></div></td>
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 
?> 
</table>
<p>&nbsp;</p>
</body>

</html>