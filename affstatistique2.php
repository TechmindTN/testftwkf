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

$query ="SELECT saison from athletest group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

?>
<?php 
$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);
$query0 ="insert into athletest select * from athletes where sexe = 'ذكر' and saison <> '2008-2009' and saison <> '2009-2010' and saison <> '2010-2011' and saison <> '2011-2012'";
$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);

?>
<div align="center" class="style2">Statistique</div>

</p>
<table border="1" width="100%" id="table1">
	<tr>
	    <td rowspan="2" ><div align="center"><strong>Club</strong></div></td>
 	    <td rowspan="2" ><div align="center"><strong></strong></div></td>
 
<?php do {?>
	  <td colspan="3"><div align="center"><?php echo $row['saison'];?></div></td>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 

$query ="SELECT saison from athletest group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
?>
	  <td colspan="3"><div align="center">Total</div></td>
</tr><tr>
<?php
 do {?>
	  <td ><div align="center">Montant</div></td>
	  <td ><div align="center">Payé</div></td>
	  <td ><div align="center">Reste</div></td>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 
?>
       
	  <td ><div align="center">Montant</div></td>
	  <td ><div align="center">Payé</div></td>
	  <td ><div align="center">Reste</div></td>
	</tr>

<?php 

$query0 ="select club, ligue from athletest group by club, ligue order by ligue, club";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {

$club0 = $row0['club'];
$ligue0 = $row0['ligue'];


?>
	<tr>
	  <td><div align="center"><?php echo $club0;?></div></td>
	  <td><div align="center"><?php echo $ligue0;?></div></td>
<?php
$query ="SELECT saison from athletest group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
 do {
	 
$saison = $row['saison'];


$query1 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo) from athletest where club = '$club0' and saison = '$saison' and age = 'Poussin' and sexe = 'ذكر'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$prix1= $row1[0]+$row1[1]+$row1[2]+$row1[3];

$query1 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo) from athletest where club = '$club0' and saison = '$saison' and age = 'Benjamin' and sexe = 'ذكر'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$prix1= $row1[0]+$row1[1]+$row1[2]+$row1[3] + $prix1;

$query2 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison = '$saison' and age = 'Minime' and sexe = 'ذكر'";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$prix2= $row2[0]+$row2[1]+$row2[2]+$row2[3];

$query2 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison = '$saison' and age = 'Cadet' and sexe = 'ذكر'";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$prix2= $row2[0]+$row2[1]+$row2[2]+$row2[3] + $prix2;

$query3 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison = '$saison' and age = 'Junior' and sexe = 'ذكر'";
$result3 = mysql_query($query3,$connexion);
$row3 = mysql_fetch_row($result3);
$prix3= $row3[0]+$row3[1]+$row3[2]+$row3[3];

$query3 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison = '$saison' and age = 'Senior' and sexe = 'ذكر'";
$result3 = mysql_query($query3,$connexion);
$row3 = mysql_fetch_row($result3);
$prix3= $row3[0]+$row3[1]+$row3[2]+$row3[3]+$prix3;

$query4 ="SELECT sum(montant) from paiement where club = '$club0' and saison = '$saison'";
$result4 = mysql_query($query4,$connexion);
$row4 = mysql_fetch_row($result4);
$prix4= $row4[0];


$totalp = (2*($prix1))+(5*($prix2))+(15*($prix3));

	 ?>
	  <td ><div align="center"><?php echo $totalp;?></div></td>
	  <td ><div align="center"><?php echo $prix4;?></div></td>
	  <td ><div align="center"><?php echo $totalp - $prix4;?></div></td>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 
      
$query1 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo) from athletest where club = '$club0' and age = 'Poussin' and sexe = 'ذكر'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$prix1= $row1[0]+$row1[1]+$row1[2]+$row1[3];

$query1 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo) from athletest where club = '$club0' and age = 'Benjamin' and sexe = 'ذكر'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$prix1= $row1[0]+$row1[1]+$row1[2]+$row1[3] + $prix1;

$query2 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and age = 'Minime' and sexe = 'ذكر'";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$prix2= $row2[0]+$row2[1]+$row2[2]+$row2[3];

$query2 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and age = 'Cadet' and sexe = 'ذكر'";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$prix2= $row2[0]+$row2[1]+$row2[2]+$row2[3] + $prix2;

$query3 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and age = 'Junior' and sexe = 'ذكر'";
$result3 = mysql_query($query3,$connexion);
$row3 = mysql_fetch_row($result3);
$prix3= $row3[0]+$row3[1]+$row3[2]+$row3[3];

$query3 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and age = 'Senior' and sexe = 'ذكر'";
$result3 = mysql_query($query3,$connexion);
$row3 = mysql_fetch_row($result3);
$prix3= $row3[0]+$row3[1]+$row3[2]+$row3[3]+$prix3;

$query4 ="SELECT sum(montant) from paiement where club = '$club0'";
$result4 = mysql_query($query4,$connexion);
$row4 = mysql_fetch_row($result4);
$prix4= $row4[0];


$totalp = (2*($prix1))+(5*($prix2))+(15*($prix3));

	 ?>
	  <td ><div align="center"><?php echo $totalp;?></div></td>
	  <td ><div align="center"><?php echo $prix4;?></div></td>
	  <td ><div align="center"><?php echo $totalp - $prix4;?></div></td>
     
  </tr>
<?php					}while	 ($row0=mysql_fetch_assoc($result0)); 

?>

</table>
<p align="center">&nbsp;</p>

</body>

</html>