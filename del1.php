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
.bleu {
	color: #00F;
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
$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];

$id = "1";
if (isset($_POST['id'])) {$id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);}
if (isset($_POST['comp'])) {  $comp = (get_magic_quotes_gpc()) ? $_POST['comp'] : addslashes($_POST['comp']);}
if (isset($_POST['annee'])) { $annee = (get_magic_quotes_gpc()) ? $_POST['annee'] : addslashes($_POST['annee']);}
if (isset($_POST['lieu'])) {  $lieu = (get_magic_quotes_gpc()) ? $_POST['lieu'] : addslashes($_POST['lieu']);}
if (isset($_POST['equip'])) {  $equip = (get_magic_quotes_gpc()) ? $_POST['equip'] : addslashes($_POST['equip']);}
else {$equip ="_";}
if (isset($_POST['poids'])) {  $poids = (get_magic_quotes_gpc()) ? $_POST['poids'] : addslashes($_POST['poids']);}
else {$poids =0;}
if (isset($_POST['qualif'])) {  $qualif = (get_magic_quotes_gpc()) ? $_POST['qualif'] : addslashes($_POST['qualif']);}
else {$qualif =0;}

if (isset($_GET['cat'])) {  $cat = (get_magic_quotes_gpc()) ? $_GET['cat'] : addslashes($_GET['cat']);}

if (isset($_GET['type'])) {  $type = (get_magic_quotes_gpc()) ? $_GET['type'] : addslashes($_GET['type']);}
else {$type =$_SESSION['type'];}

if (isset($_GET['qualif'])) {  $qualif = (get_magic_quotes_gpc()) ? $_GET['qualif'] : addslashes($_GET['qualif']);}
else {$qualif =$_SESSION['qualif'];}

if (isset($_GET['comp'])) {  $comp = (get_magic_quotes_gpc()) ? $_GET['comp'] : addslashes($_GET['comp']);}
else {$comp =$_SESSION['comp'];}

if (isset($_GET['dat'])) {  $dat1 = (get_magic_quotes_gpc()) ? $_GET['dat'] : addslashes($_GET['dat']);}
else {$dat1 =$_SESSION['dat'];}

if (isset($_GET['lieu'])) { $lieu = (get_magic_quotes_gpc()) ? $_GET['lieu'] : addslashes($_GET['lieu']);}
else {$lieu =$_SESSION['lieu'];}

if (isset($_GET['max'])) { $max = (get_magic_quotes_gpc()) ? $_GET['max'] : addslashes($_GET['max']);}
else {$max =$_SESSION['max'];}

if (isset($_GET['min'])) { $min = (get_magic_quotes_gpc()) ? $_GET['min'] : addslashes($_GET['min']);}
else {$min =$_SESSION['min'];}

if (isset($_GET['cat'])) { $dat = (get_magic_quotes_gpc()) ? $_GET['cat'] : addslashes($_GET['cat']);}
else {$cat =$_SESSION['cat'];}
if (isset($_GET['sais'])) { $sais = (get_magic_quotes_gpc()) ? $_GET['sais'] : addslashes($_GET['sais']);}
else {$sais =$_SESSION['sais'];}
$i=1;
do {
if (isset($_POST['ppp'.$i])) {  $ppp = (get_magic_quotes_gpc()) ? $_POST['ppp'.$i] : addslashes($_POST['ppp'.$i]);}
else {$ppp ="_";}
if (isset($_POST['codd'.$i])) {  $codd = (get_magic_quotes_gpc()) ? $_POST['codd'.$i] : addslashes($_POST['codd'.$i]);}
else {$codd ="_";}

			if (($ppp <> "_")){
				$query_resultat1 = "UPDATE delegation SET CAtPoids = '$ppp' where code = '$codd'";
				$resultat1 = mysql_query($query_resultat1, $connexion) or die(mysql_error());
			}
			$i = $i+1;
}while ($i<1000);

$_SESSION['comp'] = $comp;
$_SESSION['dat'] = $dat1;
$_SESSION['lieu'] = $lieu;
$_SESSION['cat'] = $cat;
$_SESSION['type'] = $type;
$_SESSION['max'] = $max;
$_SESSION['min'] = $min;
$_SESSION['qualif'] = $qualif;
$_SESSION['sais'] = $sais;


$query01 ="SELECT saison FROM saison where actif = 1";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);
$saison = $row01[0];



if ($qualif == 2){
$query = "SELECT * FROM qualif WHERE id = '$id' AND Délégation = '$club' and annee = '$sais' and cat= '$cat'";
}else{$query = "SELECT * FROM athletes WHERE n_lic = '$id' AND club = '$club' and saison = '$saison'";
}
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$nom=$row['nom'];
$prenom=$row['prenom'];
if ($qualif == 2){
$annee=$row['DateNaissance'];
$sexe=$row['Sexe'];
$poids=$row['CAtPoids'];
$hq=$row['qualif'];
}else{
$annee=$row['date_naiss'];
$sexe=$row['sexe'];
$hq=0;	}

$dat=$sais;
$dat2=substr("$annee", 0, 4);
$diff = $dat - $dat2;


$query0 = "SELECT sexe FROM param WHERE cat = '$cat' AND poids = '$poids' AND type = '$type'";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);
$sex =$row0['sexe'];

$query5 ="SELECT * FROM param where cat = '$cat' and sexe ='$sexe' AND type = '$type' order by ordre";
$result5 = mysql_query($query5,$connexion);
$row5 = mysql_fetch_assoc($result5);
$totalRows = mysql_num_rows($result5);

$query7 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And annee = '$dat' And cat = '$cat' And type = '$type' And lieu = '$lieu' and Sexe ='$sexe' ";
$result7 = mysql_query($query7,$connexion);
$row7 = mysql_fetch_assoc($result7);
$totalRows_poidst = mysql_num_rows($result7);

$totalRows_doublon8 = 0;

if ($totalRows_poidst > 0) {
$query8 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And cat = '$cat' And annee = '$dat' And lieu = '$lieu' And type = '$type' And id = '$id' ";
$result8 = mysql_query($query8,$connexion)or die(mysql_error());
$row8 = mysql_fetch_assoc($result8);
$totalRows_doublon8 = mysql_num_rows($result8);
}
$totalRows_doublon9 = 0;
if ($totalRows_poidst > 0) {
$query9 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And cat = '$cat' And annee = '$dat' And lieu = '$lieu' And type = '$type'  And CAtPoids = '$poids' And groupe = '$equip'";
$result9 = mysql_query($query9,$connexion)or die(mysql_error());
$row9 = mysql_fetch_assoc($result9);
$totalRows_doublon9 = mysql_num_rows($result9);
}


$query08 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And cat = '$cat' And annee = '$dat' And lieu = '$lieu' And type = '$type' And qualif = 0 And Sexe = '$sexe'";
$result08 = mysql_query($query08,$connexion)or die(mysql_error());
$row08 = mysql_fetch_assoc($result08);
$totalRows_doublon08 = mysql_num_rows($result08);




$query_poids = "SELECT * FROM param where cat = '$cat' AND type = '$type' order by sexe, ordre";
$resultat_poids = mysql_query($query_poids, $connexion) or die(mysql_error());
$row_poids = mysql_fetch_assoc($resultat_poids);


//if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){ 


?>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="7" class="text">

        <tr>
          <td><form name="stat" method="post" action="">
              <table border="0" width="44%"  cellspacing="1" cellpadding="4" class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
    <tr>
      <td  ><div align="center"><strong>Competition</strong></div></td>
      <td  ><div align="center"><strong>Age </strong></div></td>
      <td  ><div align="center"><strong>Type </strong></div></td>
      <td  ><div align="center"><strong>Année </strong></div></td>
      <td  ><div align="center"><strong>Lieu </strong></div></td>
      <td ><div align="center"> <strong>N Licence</strong></div></td>
<?php if ($type == "Equipe"){ ?>
     <td ><div align="center"><strong>Equipe</strong></div></td>
<?php } ?>
<?php if ($qualif <> 2){ ?>
     <td ><div align="center"><strong>Poids</strong></div></td>
<?php } ?>
    </tr>
                <tr>
    <td ><input name="comp" type="hidden" id="comp" size="30" value="<?php echo $comp;?>"><?php echo $comp;?></td>
    <td ><input name="cat" type="hidden" id="cat" size="5" value="<?php echo $cat;?>"><?php echo $cat;?></td>
    <td ><input name="type" type="hidden" id="type" size="5" value="<?php echo $type;?>"><?php echo $type;?></td>
    <td ><input name="annee" type="hidden" id="annee" size="5" value="<?php echo $dat;?>"><?php echo $dat;?></td>
    <td ><input name="lieu" type="hidden" id="lieu" size="5" value="<?php echo $lieu;?>"><?php echo $lieu;?></td>
    <td ><input name="id" type="text" id="id" size="5" value=""></td>
<?php if ($type == "Equipe"){ ?>
                 <td valign="top">
                    <select name="equip" class="head">
        <option>A</option>
        <option>B</option>

                  </select></td>
<?php } ?>

 <?php if ($qualif <> 2){ ?>
                 <td valign="top">
                    <select name="poids" class="head">
                      <option>-</option>
                      <?php
					  if ($type <> 'Kata'){
					   do { 
                                     $res=$row_poids['poids'];
                                      echo "<option >$res</option>";
                       } while ($row_poids = mysql_fetch_assoc($resultat_poids));
					  }else {?>
        <option>Nage No Kata (Tori)</option>
        <option>Nage No Kata (Uke)</option>
        <option>Katame No Kata (Tori)</option>
        <option>Katame No Kata (Uke)</option>
        <option>Kime No Kata (Tori)</option>
        <option>Kime No Kata (Uke)</option>

                       <?php 
						   
						   }
					   
					    ?>
                  </select></td>
<?php } ?>


                </tr>
                <tr>
                  <td colspan="8" valign="center"><div align="center">
<input name="ok" type="submit" class="Style4" value="Add">
                  </td>
                </tr>
              </table>
          </form></td>
        </tr>
</table>
</td></tr>
</table>

<?php
 if (($poids <> '0')AND($poids <> null)){
 if (($totalRows_doublon8 <1)or($type == "Kata")){
 if (($totalRows_doublon08 ==0) or ($hq == 1)or ($qualif <> 2)){
 //if (($totalRows_doublon08 ==0) ){
 if (($nom <> null)){
 if (($sexe == $sex)or($type == "Kata")){
 if (($diff>=$min)and($diff <= $max)){
 if (($totalRows_doublon9 <2)or($type <> "Equipe")){
$query_resultat1 = "insert into delegation  (`id` ,`comp` ,`lieu` ,`annee`,`cat` ,`type` ,`nom` , `prenom`  , `CAtPoids` , `Délégation` , `DateNaissance`, `Sexe`, `qualif`, `groupe`) values  ('$id','$comp','$lieu','$dat','$cat','$type','$nom', '$prenom', '$poids', '$club', '$annee', '$sexe', '$hq', '$equip')";
$resultat1 = mysql_query($query_resultat1, $connexion) or die(mysql_error());
}else { ?> <div align="center"><strong class="test">Vous ne pouvez pas entrer Trois Athletes dans la Même Catégorie de Poids</strong></div><?php };
}else { ?> <div align="center"><strong class="test">L'âge du joueur n'a pas le droit de participer</strong></div><?php };
}else { ?><div align="center"><strong class="test">Le sexe du joueur et le poids ne coïncide pas</strong></div><?php };
}else { ?><div align="center"><strong class="test">l'Athlete n'existe pas</strong></div><?php };
}else { ?> <div align="center"><strong class="test">Vous ne pouvez pas entrer qu'un seul athlete Hors Quota</strong></div><?php };
}else { ?> <div align="center"><strong class="test">Vous ne pouvez pas entrer la même personne deux fois</strong></div><?php };
}
//}
//$totalRows_resultat = mysql_num_rows($resultat);
?>


<p align="center"><strong>Athletes</strong></p>

  <table width="100%" border="1">
    <tr>
     <td width="81"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong>Poids</strong></div></td>
      <td width="159"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong>N Licence </strong></div></td>
      <td width="159"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong>Nom </strong></div></td>
      <td width="159"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong>Prenom </strong></div></td>
<td width="257"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong>Club</strong></div></td>
 <?php if ($type == "Equipe"){ ?>
     <td rowspan="2" bgcolor="#0000FF"><div align="center"><strong>Equipe</strong></div></td>
<?php } ?>
     <td width="257"  rowspan="2" bgcolor="#0000FF"><div align="center"><strong>Ligue </strong></div></td>      
      
      <td width="135" bgcolor="#0000FF" ><div align="center"><strong>Date Naissance</strong></div></td>
      <td width="23" rowspan="2" bgcolor="#0000FF"></td>
    </tr>
    <tr>
      <td bgcolor="#0000FF" border="0"><div align="center">(DD/MM/YYYY)</div></td>
    </tr>
                      <?php
					  if ($type <> 'كاتا'){
?>    <tr>
      <td colspan="9" bgcolor="#00FF66"><div align="center"><strong>Garcons</strong></div></td>
    </tr>



    <?PHP }
//$query5 ="SELECT * FROM param where cat = '$cat' and sexe ='ذكور' order by ordre";
//$result5 = mysql_query($query5,$connexion);
//$row5 = mysql_fetch_assoc($result5);
//                    $poids = $row5['poids'];
//$totalRows_resultat = mysql_num_rows($resultat);

if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){ 

$query11 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And annee = '$dat' And lieu = '$lieu' And cat = '$cat' And type = '$type'and Sexe ='Masculin' order by CAtPoids";}
else 
{
$query11 ="SELECT * FROM delegation where comp = '$comp' And annee = '$dat' And lieu = '$lieu' And cat = '$cat' And type = '$type' and Sexe ='Masculin' order by CAtPoids";}
$i = 0;	
$result11 = mysql_query($query11,$connexion);
$row11 = mysql_fetch_assoc($result11);
do {
$i = $i+1;
                   $poids = $row11['CAtPoids'];
                   $nom1 = $row11['nom'];
                   $prenom1 = $row11['prenom'];
                   $annee0 = $row11['DateNaissance'];
                   $cod = $row11['id'];
                 $club1= $row11['Délégation'];
                 $equipe1= $row11['groupe'];
$query12 ="SELECT ligue FROM club where club = '$club1'";
$result12 = mysql_query($query12,$connexion);
$row12 = mysql_fetch_assoc($result12);
                   $ligue1= $row12['ligue'];
				   
if ($annee0 != ""){
$annee1=substr("$annee0", 8, 2). "-".substr("$annee0", 5, 2)."-".substr("$annee0", 0, 4);}
else {$annee1="";}

$query_poids1 = "SELECT * FROM param where cat = '$cat' AND type = '$type' AND sexe = 'ذكر' order by sexe, ordre";
$resultat_poids1 = mysql_query($query_poids1, $connexion) or die(mysql_error());
$row_poids1 = mysql_fetch_assoc($resultat_poids1);

?>
   <tr>
<?PHP     if ((($club == "ADMIN")OR($club == "Admin")OR($club == "admin"))){?>   
                  <td valign="top">
                    		<form name="refr" method="post" action="" >
 							<input name="<?php echo "codd".$i; ?>" type="hidden" id="<?php echo "codd".$i; ?>" value = "<?php echo $row11['code']; ?>">
                   			<select name="<?php echo "ppp".$i; ?>" class="head" onChange="document.refr.submit();">
                      		<option><?php echo $poids;?></option>
                      		<?php
					   		do { 
                                     $res=$row_poids1['poids'];
                                      echo "<option >$res</option>";
                       		} while ($row_poids1 = mysql_fetch_assoc($resultat_poids1));
?>
                  	</form>
                  </td>
                         <?php 
						   
						   } else {?>
							   
    <td><?php echo $poids;?> </td>
						 <?php  }
					   
					    ?>
                
                  
    <td><?php echo $cod;?> </td>
    <td><?php echo $nom1;?></td>
    <td><?php echo $prenom1;?></td>
     <td><?php echo $club1;?></td>   

 <?php if ($type == "Equipe"){ ?>
     <td><?php echo $equipe1;?></td>   
<?php } ?>

   <td><?php echo $ligue1;?></td>    
   
    <td><?php echo $annee1;?></td>
<?PHP     if ((($club == "ADMIN")OR($club == "Admin")OR($club == "admin"))and (($qualif == 1))){?>   

    <td width="23"><a href ='qualif.php?code<?php echo "=$row11[code]"; ?>&poid<?php echo "=$code";?>' ><div class="bleu"> Qualifier</div></a></td>
    <td width="23"><a href ='nqualif.php?code<?php echo "=$row11[code]"; ?>&poid<?php echo "=$code";?>'><div class="bleu"> N Qualifier</div></a></td>
 
 <?PHP } ?>
    <td width="23"><a href ='deldel.php?code<?php echo "=$row11[code]"; ?>' ><img src="sup.png" width="16" height="16"></a></td>
   </tr>
<?php
					}while	 ($row11=mysql_fetch_assoc($result11)); 

					  if ($type <> 'كاتا'){
?>
    <tr>
      <td colspan="9" bgcolor="#FF0099"><div align="center"><strong>Filles</strong></div></td>
    </tr>
    <?PHP }

if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){ 

$query11 ="SELECT * FROM delegation where Délégation = '$club' And comp = '$comp' And annee = '$dat' And lieu = '$lieu' And cat = '$cat'  And type = '$type' and Sexe ='Féminin' order by CAtPoids";}
else 
{
$query11 ="SELECT * FROM delegation where comp = '$comp' And annee = '$dat' And lieu = '$lieu' And cat = '$cat'  And type = '$type' and Sexe ='Féminin' order by CAtPoids";}


$result11 = mysql_query($query11,$connexion);
$row11 = mysql_fetch_assoc($result11);
do {
$i = $i+1;
                   $poids = $row11['CAtPoids'];
                   $nom1 = $row11['nom'];
                   $prenom1 = $row11['prenom'];
                   $annee0 = $row11['DateNaissance'];
                 $club1= $row11['Délégation'];
                 $equipe1= $row11['groupe'];
                   $cod = $row11['id'];
$query12 ="SELECT ligue FROM club where club = '$club1'";
$result12 = mysql_query($query12,$connexion);
$row12 = mysql_fetch_assoc($result12);
                   $ligue1= $row12['ligue'];
if ($annee0 != ""){
$annee1=substr("$annee0", 8, 2). "-".substr("$annee0", 5, 2)."-".substr("$annee0", 0, 4);}
else {$annee1="";}
$query_poids1 = "SELECT * FROM param where cat = '$cat' AND type = '$type' AND sexe = 'أنثى' order by sexe, ordre";
$resultat_poids1 = mysql_query($query_poids1, $connexion) or die(mysql_error());
$row_poids1 = mysql_fetch_assoc($resultat_poids1);

?>
   <tr>
<?PHP     if ((($club == "ADMIN")OR($club == "Admin")OR($club == "admin"))){?>   
                  <td valign="top">
                    		<form name="refr" method="post" action="" >
 							<input name="<?php echo "codd".$i; ?>" type="hidden" id="<?php echo "codd".$i; ?>" value = "<?php echo $row11['code']; ?>">
                   			<select name="<?php echo "ppp".$i; ?>" class="head" onChange="document.refr.submit();">
                      		<option><?php echo $poids;?></option>
                      		<?php
					   		do { 
                                     $res=$row_poids1['poids'];
                                      echo "<option >$res</option>";
                       		} while ($row_poids1 = mysql_fetch_assoc($resultat_poids1));
?>
                  	</form>
                  </td>
                         <?php 
						   
						   } else {?>
							   
    <td><?php echo $poids;?> </td>
						 <?php  }
					   
					    ?>
    <td><?php echo $cod;?></td>
    <td><?php echo $nom1;?></td>
    <td><?php echo $prenom1;?></td>
        <td><?php echo $club1;?></td>   
  <?php if ($type == "Equipe"){ ?>
     <td><?php echo $equipe1;?></td>   
<?php } ?>
  <td><?php echo $ligue1;?></td>    

    <td><?php echo $annee1;?></td>
<?PHP     if ((($club == "ADMIN")OR($club == "Admin")OR($club == "admin"))and (($qualif == 1))){?>   

    <td width="23"><a href ='qualif.php?code<?php echo "=$row11[code]"; ?>' ><div class="bleu"> Qualifier</div></a></td>
    <td width="23"><a href ='nqualif.php?code<?php echo "=$row11[code]"; ?>' ><div class="bleu"> N Qualifier</div></a></td>
  
 <?PHP } ?>
    <td width="23"><a href ='deldel.php?code<?php echo "=$row11[code]"; ?>' ><img src="sup.png" width="16" height="16"></a></td>
 <?PHP // } ?>
   </tr>
<?php
					}while	 ($row11=mysql_fetch_assoc($result11)); 



?>
<p>&nbsp;</p>
  <table border="0"><tr>
  <?php 
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>     
</p>
      <td><div align="center"><a href ='exp.php?cat<?php echo "=$cat";?>&comp<?php echo "=$comp";?>&dat<?php echo "=$dat";?>&lieu<?php echo "=$lieu";?>&type<?php echo "=$type";?>' ><img src="./image/ex.jpg" width="33" height="40"></a></td>
      
  <?php 
}else{
?>     
      
      <td><div align="center"><a href ='expw.php?cat<?php echo "=$cat";?>&comp<?php echo "=$comp";?>&dat<?php echo "=$dat";?>&lieu<?php echo "=$lieu";?>&type<?php echo "=$type";?>' target="new" class="bleu" ><strong>Imprimer</strong></a></td>

<?php
}
 ?>
</tr>
</table>

  </body>
</html>