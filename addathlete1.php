<?php
session_start();
//$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
<style type="text/css">
.style2 {	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
.style2 {	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
</style>
</HEAD>
<BODY>
<style type="text/css">
<!--
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
</style></HEAD>

<body>
<?php

include('connect.php');
$query1 ="SELECT club from clubb group by club order by club";	 
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$queryl ="SELECT ligue from clubb group by ligue order by ligue";	 
$resultl = mysql_query($queryl,$connexion);
$rowl = mysql_fetch_assoc($resultl);
$querys ="SELECT saison from clubb group by saison order by saison";	 
$results = mysql_query($querys,$connexion);
$rows = mysql_fetch_assoc($results);


$dat1 = date("Y/m/d H:i:s") ;

 $saison = $_POST['saison'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$date_naissance = $_POST['annee']. "-".$_POST['mois']. "-".$_POST['jour'];
$sport = $_POST['sport'];
$cin = $_POST['cin'];
$nationalite = $_POST['nationalite'];
$club = $_POST['club'];
$ligue = $_POST['club'];
$lic = $_POST['lic'];

$query1 ="SELECT * FROM age";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$age = "_";

$jours1= substr("$saison", 5, 4) - $annee;
$prix = 0;

do {
	$dsup = $row1['sup'];
	$dinf = $row1['min'];

if (($jours1>=$dinf) and ($jours1<=$dsup)) {
	$age=$row1['cat'];
	
	}
	
	}while	 ($row1=mysql_fetch_assoc($result1)); 





if (($club <> '')and($nom <> '')and($prenom <> '')and($nationalite <> '')and($jour <> '')and($mois <> '')and($sport <> '')and($sexe <> '')and($annee <> '')and($cin <> ''))
{

$query ="INSERT INTO `athletes` ( `saison` ,`n_lic`, `cin`, `nom`, `prenom` , `sexe` , `date_naiss` , `club` , `ligue`, `age` , `sport`   , `date_saisie`, `nationalite` ) 
VALUES ('$saison','$lic','$cin','$nom','$prenom', '$sexe', '$date_naissance', '$club', '$ligue', '$age', '$sport', '$dat1', '$nationalite')";

$result = mysql_query($query,$connexion);
?>
 
<script type="text/javascript">
window.location.href="affathlete.php";
</script>

<?php 
}
else 
{
?>
 <div align="center" class="style2">إضافة رياضيين</div>
<form action="addathlete.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td width="" rowspan="2" align="left">الاسم</td>
      <td width="" rowspan="2" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $nom;?>"></td>
      <td width="" rowspan="2" align="left">اللقب </td>
      <td width="" rowspan="2" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $prenom;?>"></td>
      <td width="12%" rowspan="2" align="left">تاريخ الولادة</td>
      <td width="4%" align="center">يوم</td>
      <td width="4%" align="center">شهر</td>
      <td width="6%" align="center">سنة</td>
      <td width="8%" rowspan="2" align="left">الرياضة</td>
      <td width="4%" rowspan="2" align="center"><select name="sport" size="1" id="sport" tabindex="6">
        <option><?php echo $sport;?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option> <option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
    </tr>

    <tr>
      <td align="center"><input name="jour" type="text" id="jour" tabindex="3" size="4" maxlength="2" value ="<?php echo $jour;?>"></td>
      <td align="center"><input name="mois" type="text" id="mois" tabindex="4" size="4" maxlength="2" value ="<?php echo $mois;?>"></td>
      <td align="left"><input name="annee" type="text" id="annee" tabindex="5" size="8" maxlength="4" value ="<?php echo $annee;?>"></td>
    </tr>
       </table>
<table width="100%" border="0">
    <tr>
      <td width="" align="left">رقم ب ت و</td>
      <td width="" align="left"><input name="cin" type="number" id="cin" tabindex="7" size="25" value ="<?php echo $cin;?>"></td>
      <td width="" align="left">الجنس</td>
      <td width="" align="left"><select name="sexe" size="1" id="sexe" tabindex="9">
        <option><?php echo $sexe;?></option>
        <option>ذكر</option>
        <option>أنثى</option>
      </select></td>
      <td width="" align="left">الجنسية</td>
      <td align="left"><input name="nationalite" type="text" id="nationalite" tabindex="10" size="25" value ="<?php echo $nationalite;?>"></td>
      
    </tr>
     </table>




  <table width="100%" border="0">
    <tr>
      <td align="left">النادي</td>
      <td align="left"><select name="club2" size="1" id="club" tabindex="9">
        <option><?php echo $club1;?></option>
        <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>
      <td align="left">الرابطة</td>
      <td align="left"><select name="ligue" size="1" id="ligue" tabindex="9" >
        <option><?php echo $ligue;?></option>
        <option> </option>
        <?php
					   do { 
                                     $res=$rowl['ligue'];
                                      echo "<option >$res</option>";
                       } while ($rowl = mysql_fetch_assoc($resultl));
?>
      </select></td>
	  <td>الموسم</td>
      <td align="left"><select name="sais" size="1" id="sais" tabindex="9" onChange="document.stat.submit();">
        <option><?php echo $saison1;?></option>
        <?php
					   do { 
                                     $res=$rows['saison'];
                                      echo "<option >$res</option>";
                       } while ($rows = mysql_fetch_assoc($results));
?>
      </select></td>
	  <td>رقم الإجازة</td>
      <td align="left"><input name="lic" type="text" id="prenom2" tabindex="2" size="25" value =""></td>
    </tr>
  </table>

  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
<div align="center" class="style2">الرجاء ملئ جمعية البيانات</div>
<!-- 	
	<?php 
	
	if (($extension <> ".jpg") and ($extension <> ".JPG")){echo "Format d'Image Invalide";?> <br> <?php }
	if (($extensionid <> ".jpg") and ($extensionid <> ".JPG")){echo "Format d'Identité Invalide";?> <br> <?php }
	if (($extensionbor <> ".jpg") and ($extensionbor <> ".JPG")){echo "Format de bordereau Invalide";?> <br> <?php }
	if ($size1 >= '524288') {echo "Taille d'Image Invalide";?> <br> <?php }
	if ($size2 >= '1024000') {echo "Taille d'Identité Invalide";?> <br> <?php }
	if ($size3 >= '1024000') {echo "Taille de Bordereau Invalide";?> <br> <?php }
	if ($sport == ''){echo "Please choose a Sport";?> <br> <?php }

	}
?> -->

</body>
</html>