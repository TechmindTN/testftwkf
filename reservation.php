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
<HTML lang="en" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
</HEAD>
<BODY>
<style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</script>


<body>
<?php
	   	include('connect.php');
$cat=$_GET['cat'];
//$code=$_GET['code'];
$_SESSION['cat'] = $cat;

//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];if ($club != "ADMIN"){
$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
}

function cherche( $connexion,$id,$nom, $prenom,$nom_e,$prenom_e, $annee) 
 {
echo $id;
	 $query0 ="SELECT * FROM athlete where code = '$id' ";
	 $result0 = mysql_query($query0,$connexion);
	 $row0 = mysql_fetch_assoc($result0);
 					$nom =  $row0['nom'];
					$prenom = $row0['prenom'];
					$nom_e = $row0['nom_e'];
					$prenom_e =  $row0['prenom_e'];
                   	$annee0 = $row0['DateNaissance'];
if ($annee0 != ""){
$annee=substr("$annee0", 8, 2). "-".substr("$annee0", 5, 2)."-".substr("$annee0", 0, 4);}
else {$annee="";}

 }

function athlete($connexion,$club,$poids,$nom_1,$prenom_1,$nom_e_1,$prenom_e_1,$annee_1,$id_1) 
 { 
?>
   <tr>
       <?php
$query1 ="SELECT * FROM delegation where Délégation = '$club' And CAtPoids = '$poids' ";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
                   $nom1 = $row1['nom'];
                   $prenom1 = $row1['prenom'];
                   $nom_e1 = $row1['nom_e'];
                   $prenom_e1 = $row1['prenom_e'];
                   $annee0 = $row1['DateNaissance'];
if ($annee0 != ""){
$annee1=substr("$annee0", 8, 2). "-".substr("$annee0", 5, 2)."-".substr("$annee0", 0, 4);}
else {$annee1="";}
						 ?>
    <td  ><?php echo $poids;?> </td>
    <td ><input name="<?php echo $id_1 ;?>" type="text" id="<?php $id_1 ;?>"     onFocus="<? cherche($connexion,$id_1,$nom1,$prenom1,$nom_e1,$prenom_e1,$annee1)?>" size="5" value=""></td>
    <td><input name="<?php echo $nom_1 ;?>" type="text" id="<?php $nom_1 ;?>"  size="30" value="<?php echo $nom1; ?>"></td>
    <td><input name="<?php echo $prenom_1 ;?>" type="text" id="<?php $prenom_1 ;?>"  size="30" value="<?php echo $prenom1; ?>"></td>
    <td><input name="<?php echo $nom_e_1 ;?>" type="text" id="<?php $nom_e_1 ;?>"  size="30" value="<?php echo $nom_e1; ?>"></td>
    <td><input name="<?php echo $prenom_e_1 ;?>" type="text" id="<?php $prenom_e_1 ;?>"  size="30" value="<?php echo $prenom_e1; ?>"></td>
    <td><input name="<?php echo $annee_1;?>" type="text" id="annee_60_1" size="20" maxlength="10" value="<?php echo $annee1; ?>">
     </td>
 
   </tr>

<?php
 }
?>



<form action="adddelegation.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="1">
    <tr>
      <td colspan="7"><div align="center"><strong>ذكور</strong></div></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="2"><div align="center"><strong>الوزن</strong></div></td>
      <td  rowspan="2"><div align="center"><strong>الاسم </strong></div></td>
      <td  rowspan="2"><div align="center"><strong>اللقب </strong></div></td>
      <td  rowspan="2"><div align="center"><strong>الإسم بالانجليزي </strong></div></td>
      <td  rowspan="2"><div align="center"><strong>اللقب بالأنجليزي </strong></div></td>
      <td ><div align="center"> <strong>تاريخ الولادة</strong></div></td>
    </tr>
    <tr>
      <td border="0"><div align="center">(DD/MM/YYYY)</div></td>
    </tr>
    <?PHP 
$query5 ="SELECT * FROM param where cat = '$cat' and sexe ='ذكور' order by ordre";
$result5 = mysql_query($query5,$connexion);
$row5 = mysql_fetch_assoc($result5);

do {
                   $poids = $row5['poids'];
                   $ordre = $row5['ordre'];


athlete($connexion,$club,$poids,'nomg_'.$ordre.'_1','prenomg_'.$ordre.'_1','nomg_e_'.$ordre.'_1','prenomg_e_'.$ordre.'_1','anneeg_'.$ordre.'_1','idg_'.$ordre.'_1') ;
					}while	 ($row5=mysql_fetch_assoc($result5)); 
?>
    <tr>
      <td colspan="7"><div align="center"><strong>إناث</strong></div></td>
    </tr>
    <?PHP 
$query5 ="SELECT * FROM param where cat = '$cat' and sexe ='إناث' order by ordre";
$result5 = mysql_query($query5,$connexion);
$row5 = mysql_fetch_assoc($result5);

do {
                   $poids = $row5['poids'];
                   $ordre = $row5['ordre'];
athlete($connexion,$club,$poids,'nomf_'.$ordre.'_1','prenomf_'.$ordre.'_1','nomf_e_'.$ordre.'_1','prenomf_e_'.$ordre.'_1','anneef_'.$ordre.'_1','idf_'.$ordre.'_1') ;
					}while	 ($row5=mysql_fetch_assoc($result5)); 
?>
  </table>
  <p align="center"><strong>OFFICIAL</strong></p>
  <table width="100%" border="1">
   <tr>
      <td  ><div align="center"><strong>الاسم </strong></div></td>
      <td  ><div align="center"><strong>اللقب </strong></div></td>
      <td  ><div align="center"><strong>الإسم بالانجليزي </strong></div></td>
      <td  ><div align="center"><strong>اللقب بالأنجليزي </strong></div></td>
    <td width="119"><div align="center"><strong>الصفة</strong></div></td>
    <td width="119"><div align="center"><strong>الجنس</strong></div></td>
   </tr>
<?php

function officiel($connexion,$club,$nom,$prenom,$nom_e,$prenom_e,$sexe,$row1) 
 { 
                   $nom1 = $row1['nom'];
                   $prenom1 = $row1['prenom'];
                   $nom_e1 = $row1['nom_e'];
                   $prenom_e1 = $row1['prenom_e'];
                   $qualite1 = $row1['Qualité'];
                   $sexe1 = $row1['Sexe'];?>

   <tr>
    <td><input name="<?php echo $nom ;?>" type="text" id="nom_off1" size="30" value="<?php echo $nom1; ?>"></td>
    <td><input name="<?php echo $prenom ;?>" type="text" id="prenom_off1" size="30" value="<?php echo $prenom1; ?>"></td>
    <td><input name="<?php echo $nom_e ;?>" type="text" id="nom_e_off1" size="30" value="<?php echo $nom_e1; ?>"></td>
    <td><input name="<?php echo $prenom_e ;?>" type="text" id="prenom_e_off1" size="30" value="<?php echo $prenom_e1; ?>"></td>
    <td><select name="<?php echo $qualite;?>" size="1" id="qualite_off1">
     <?php if ($qualite1 == "رئيس") {?> <option selected="selected">رئيس</option> <?php ;} 
	 else {?> <option>رئيس</option> <?php ;}?>
     <?php if ($qualite1 == "ممرن") {?> <option selected="selected">ممرن</option> <?php ;} 
	 else {?> <option>ممرن</option> <?php ;}?>
     <?php if ($qualite1 == "حكم") {?> <option selected="selected">حكم</option> <?php ;} 
	 else {?> <option>حكم</option> <?php ;}?>
     <?php if ($qualite1 == "طبيب") {?> <option selected="selected">طبيب</option> <?php ;} 
	 else {?> <option>طبيب</option> <?php ;}?>
     <?php if ($qualite1 == "رسمي") {?> <option selected="selected">رسمي</option> <?php ;} 
	 else {?> <option>رسمي</option> <?php ;}?>
     <?php if ($qualite1 == NULL) {?> <option selected="selected"> </option> <?php ;} 
	 else {?> <option> </option> <?php ;}?>
    </select>    </td>
    <td><select name="<?php echo $sexe;?>" size="1" id="sexe1">
     <?php if ($sexe1 == "ذكر") {?> <option selected="selected">ذكر</option> <?php ;} 
	 else {?> <option>ذكر</option> <?php ;}?>
     <?php if ($sexe1 == "أنثى") {?> <option selected="selected">أنثى</option> <?php ;} 
	 else {?> <option>أنثى</option> <?php ;}?>
     <?php if ($sexe1 == NULL) {?> <option selected="selected"> </option> <?php ;} 
	 else {?> <option> </option> <?php ;}?>
    </select>    </td>
    
   </tr>

<?php
 }

$query1 ="SELECT * FROM delegation where Délégation = '$club' And Qualité <> 'لاعب' ORDER BY nom";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

officiel($connexion,$club,'nom_off_1','prenom_off_1','nom_off_e_1','prenom_off_e_1','qualite_off_1','sexe_off_1',$row1);
$row1=mysql_fetch_assoc($result1);
officiel($connexion,$club,'nom_off_2','prenom_off_2','nom_off_e_2','prenom_off_e_2','qualite_off_2','sexe_off_2',$row1);
$row1=mysql_fetch_assoc($result1);
?>

    </table>
    <p align="right">&nbsp;</p>
    <p align="right">
      <input type="submit" name="Submit" value="Save">
    </p>
</form>
<script type="text/javascript">
<!--
//-->
</script>
</body>
</html>