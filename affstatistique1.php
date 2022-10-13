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
	   	include('connect.php');

$query ="SELECT saison from athletes group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

?>
<?php 
$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);
$query0 ="insert into athletest select * from athletes";
$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);

?>
<div align="center" class="style2">Statistique</div>

</p>
<table border="1" width="100%" id="table1">
	<tr>
	    <td rowspan="2" ><div align="center"><strong>Club</strong></div></td>
 	    <td rowspan="2" ><div align="center"><strong>Indemnité</strong></div></td>
 
<?php do {?>
	  <td colspan="2"><div align="center"><?php echo $row['saison'];?></div></td>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 

$query ="SELECT saison from athletes group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
?>
</tr><tr>
<?php
 do {?>
	  <td ><div align="center">M</div></td>
	  <td ><div align="center">F</div></td>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 
?>
       
	</tr>

<?php 

$query0 ="select club, ligue from athletest group by club, ligue order by ligue, club";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {



?>
	<tr>
	  <td><div align="center"><?php echo $row0['club'];?></div></td>
	  <td><div align="center"><?php echo $row0['ligue'];?></div></td>
<?php
$query ="SELECT saison from athletes group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
 do {
	 
	 $club0 = $row0['club'];
$ligue0 = $row0['ligue'];
$saison = $row['saison'];


$query7 ="SELECT sum(n) from athletest where club = '$club0' and saison = '$saison' and sexe = 'ذكر'";
$result7 = mysql_query($query7,$connexion);
$row7 = mysql_fetch_row($result7);

$query14 ="SELECT sum(n) from athletest where club = '$club0' and saison = '$saison' and sexe = 'أنثى'";
$result14 = mysql_query($query14,$connexion);
$row14 = mysql_fetch_row($result14);

	 ?>
	  <td ><div align="center"><?php echo $row7[0];?></div></td>
	  <td ><div align="center"><?php echo $row14[0];?></div></td>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 
?>
      
      
  </tr>
<?php					}while	 ($row0=mysql_fetch_assoc($result0)); 

?>

</table>
<p align="center">&nbsp;</p>

</body>

</html>