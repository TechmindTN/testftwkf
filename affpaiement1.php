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
	   	include('connect.php');

$query1 ="SELECT saison from paiement group by saison order by saison";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$query2 ="SELECT club from athletes group by club order by club";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$saison = "";
$club1 = "";
$test = "";
if (isset($_POST['saison'])) {
  $saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);
}
if (isset($_POST['club1'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club1'] : addslashes($_POST['club1']);
}
if (isset($_POST['test'])) {
  $test = (get_magic_quotes_gpc()) ? $_POST['test'] : addslashes($_POST['test']);
}

?>
    <form name="stat" method="post" action="">
<table width="100%" border="0" align="center"  class="text">
      <tr><input name="test" type="hidden" id="montant" tabindex="10" size="25" value="1">
        <td width="50%"><div align="right">Saison</div></td>
        <td width="50%"><select name="saison" size="1" id="saison" tabindex="9">
        <option><?php echo $saison;?> </option>
                      <?php
					   do { 
                                     $res=$row1['saison'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>

 <?PHP     if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>

        <td width="50%"><div align="right">Club</div></td>
        <td width="50%"><select name="club1" size="1" id="saison" tabindex="9">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res1=$row2['club'];
                                      echo "<option >$res1</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>
      </select></td>
<?php } ?>


      </tr>
 
 
      <tr>
        <td colspan="2" align="center"><input name="ok" type="submit" class="Style4" value = "Rechercher"></td>
      </tr>
</table>
    </form>

<div align="center" class="style2">Liste des Paiements</div>

<?php 
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){
?>
<p align="center"><a href="paiement.php">Ajout</a></p>
<p align="center"><a target="new" href="affstatistique2.php">Détail</a></p>
<?php }
if ($test == "1"){

if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){
$query ="SELECT * FROM paiement where club = '$club' and saison = '$saison'";
$query2 ="SELECT SUM(montant) from paiement where club = '$club' and saison = '$saison'";
$query3 ="SELECT SUM(prix) from athletes where club = '$club' and saison = '$saison'";
}else{
$query ="SELECT * FROM paiement where saison = '$saison'";
if ($club1 <> "") {$query ="SELECT * FROM paiement where saison like '%$saison%' and club = '$club1'";}
$query2 ="SELECT SUM(montant) from paiement where saison = '$saison'";
$query3 ="SELECT SUM(prix) from athletes where saison = '$saison'";
}

$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$montantpaye = $row2[0];

$result3 = mysql_query($query3,$connexion);
$row3 = mysql_fetch_row($result3);
$montanttotal = $row3[0];

$reste = $montanttotal - $montantpaye;
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);


$query0 ="insert into athletest select * from athletes where saison like '%$saison%' and club = '$club' and saison <> '2008-2009' and saison <> '2009-2010' and saison <> '2010-2011' and saison <> '2011-2012'";

if (($club == "ADMIN")or($club == "admin")or($club == "Admin")){

$query0 ="insert into athletest select * from athletes where saison = '$saison'";

if ($saison == "") {$query0 ="insert into athletest select * from athletes where saison <> '2008-2009' and saison <> '2009-2010' and saison <> '2010-2011' and saison <> '2011-2012' ";}
if ($club1 <> "") {$query0 ="insert into athletest select * from athletes where saison like '%$saison%' and club = '$club1' and saison <> '2008-2009' and saison <> '2009-2010' and saison <> '2010-2011' and saison <> '2011-2012' ";}

}
if (($club == "CENTRE")or($club == "Centre")or($club == "centre")){
$query0 ="insert into athletest select * from athletes where ligue = 'Centre' and saison = '$saison'";
}
if (($club == "NORD")or($club == "Nord")or($club == "nord")){
$query0 ="insert into athletest select * from athletes where ligue = 'Nord' and saison = '$saison'";
}
if (($club == "SUD")or($club == "Sud")or($club == "sud")){
$query0 ="insert into athletest select * from athletes where ligue = 'Sud' and saison = '$saison'";
}



$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);




 ?>

<table border="1" width="100%" id="table1">
	<tr>
	    <td rowspan="2" ><div align="center"><strong>Saison</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Club</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Ligue</strong></div></td>
	    <td colspan="7" align="center" ><strong>Garcons</strong></td>
	    <td rowspan="2" ><div align="center"><strong>Montant</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Montant Payé</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Reste à Payé</strong></div></td>
	</tr>

	<tr>
	  <td align="center"><strong>Pou</strong></td>
	  <td align="center"><strong>Ben</strong></td>
	  <td align="center"><strong>Min</strong></td>
	  <td align="center"><strong>Cad</strong></td>
	  <td align="center"><strong>Jun</strong></td>
	  <td align="center"><strong>Sen</strong></td>
	  <td align="center"><strong>Tot</strong></td>
</tr>
<?php 
$query0 ="select club, ligue from athletest group by club, ligue order by ligue, club";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {

$club0 = $row0['club'];
$ligue0 = $row0['ligue'];

$query00 ="select saison from athletest where club = '$club0' group by saison order by saison";
$result00 = mysql_query($query00,$connexion);
$row00 = mysql_fetch_assoc($result00);
do {
$saison0 = $row00['saison'];

$query1 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo) from athletest where club = '$club0' and saison like '%$saison0%' and age = 'Poussin' and sexe = 'ذكر'";
$query2 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison like '%$saison0%' and age = 'Benjamin' and sexe = 'ذكر'";
$query3 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison like '%$saison0%' and age = 'Minime' and sexe = 'ذكر'";
$query4 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison like '%$saison0%' and age = 'Cadet' and sexe = 'ذكر'";
$query5 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison like '%$saison0%' and age = 'Junior' and sexe = 'ذكر'";
$query6 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison like '%$saison0%' and age = 'Senior' and sexe = 'ذكر'";
$query7 ="SELECT sum(judo),sum(aikido),sum(jujitsu),sum(kendo)  from athletest where club = '$club0' and saison like '%$saison0%' and sexe = 'ذكر'";
$query8 ="SELECT sum(prix)from athletest where club = '$club0' and saison = '$saison' and sexe = 'ذكر'";
$query9 ="SELECT SUM(montant) from paiement where club = '$club0' and saison like '%$saison0%'";


$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$poussin= $row1[0]+$row1[1]+$row1[2]+$row1[3];
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$benjamin= $row2[0]+$row2[1]+$row2[2]+$row2[3];
$result3 = mysql_query($query3,$connexion);
$row3 = mysql_fetch_row($result3);
$minime= $row3[0]+$row3[1]+$row3[2]+$row3[3];
$result4 = mysql_query($query4,$connexion);
$row4 = mysql_fetch_row($result4);
$cadet= $row4[0]+$row4[1]+$row4[2]+$row4[3];
$result5 = mysql_query($query5,$connexion);
$row5 = mysql_fetch_row($result5);
$junior= $row5[0]+$row5[1]+$row5[2]+$row5[3];
$result6 = mysql_query($query6,$connexion);
$row6 = mysql_fetch_row($result6);
$senior= $row6[0]+$row6[1]+$row6[2]+$row6[3];
$result7 = mysql_query($query7,$connexion);
$row7 = mysql_fetch_row($result7);
$total= $row7[0]+$row7[1]+$row7[2]+$row7[3];
$result8 = mysql_query($query8,$connexion);
$row8 = mysql_fetch_row($result8);
$result9 = mysql_query($query9,$connexion);
$row9 = mysql_fetch_row($result9);
$totalp = (2*($poussin + $benjamin))+(5*($minime + $cadet))+(15*($junior + $senior));
?>
	<tr>
	  <td><div align="center"><?php echo $saison0;?></div></td>
	  <td><div align="center"><?php echo $row0['club'];?></div></td>
	  <td><div align="center"><?php echo $row0['ligue'];?></div></td>
	  <td><div align="center"><?php echo $poussin;?></div></td>
	  <td><div align="center"><?php echo $benjamin;?></div></td>
	  <td><div align="center"><?php echo $minime;?></div></td>
	  <td><div align="center"><?php echo $cadet;?></div></td>
	  <td><div align="center"><?php echo $junior;?></div></td>
	  <td><div align="center"><?php echo $senior;?></div></td>
	  <td><div align="center"><?php echo $total;?></div></td>
	  <td><div align="center"><?php echo $totalp;?></div></td>
	  <td><div align="center"><?php echo $row9[0];?></div></td>
	  <td><div align="center"><?php echo $totalp-$row9[0];?></div></td>
  </tr>
<?php					}while	 ($row00=mysql_fetch_assoc($result00)); 
					}while	 ($row0=mysql_fetch_assoc($result0)); 

?>+
</table>
<table border="1" width="100%">
	<tr>
	    <td ><div align="center"><strong>Montant Total </strong></div></td>
	    <td ><div align="center"><strong><?php echo $montanttotal ;?> </strong></div></td>
	    <td ><div align="center"><strong>Montant Payer</strong></div></td>
	    <td ><div align="center"><strong><?php echo $montantpaye ;?>  </strong></div></td>
	    <td ><div align="center"><strong>Reste a Payé</strong></div></td>
	    <td ><div align="center"><strong><?php echo $reste ;?> </strong></div></td>
	</tr>

</table>
<div align="center">::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: </div>
<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>Saison</strong></div></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
	    <td ><div align="center"><strong>Montant</strong></div></td>
	    <td ><div align="center"><strong>Date</strong></div></td>
	</tr>
<?php






do {

?>

	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['montant'];?></div></td>
	  <td><div align="center"><?php echo $row['date'];?></div></td>
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<?php 
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){
?>
<p align="center"><a href="paiement.php">Ajout</a></p>
<?php } 
}?>
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>

</body>

</html>