<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
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
-->
</style></HEAD>

<body>
<?php

include('connect.php');



$query ="select max(n_lic) from `athletess`";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code = $row[0]+1;



$saison = $_POST['saison'];
$lic = $_POST['lic'];
$query1 = "SELECT * FROM athletes WHERE n_lic = '$lic' AND saison = '$saison'";
$result1 = mysql_query($query1,$connexion);
$totalRows = mysql_num_rows($result1);

$ligue = $_POST['ligue'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$date_naissance = $_POST['annee']. "-".$_POST['mois']. "-".$_POST['jour'];
$sport = $_POST['sport'];
$nationalite = $_POST['nationalite'];
$lic = $_POST['lic'];

$cin = $_POST['cin'];

$age = $_POST['age'];
$date_saisie = $_POST['date_saisie'];

$aphoto = $_POST['aphoto'];
$aphotoid = $_POST['aphotoid'];
$aphotobor = $_POST['aphotobor'];
$aphotoeng = $_POST['aphotoeng'];




if (isset($_POST['aphoto'])) {
  $aphoto = (get_magic_quotes_gpc()) ? $_POST['aphoto'] : addslashes($_POST['aphoto']);
}
if (isset($_POST['aphotoid'])) {
  $aphotoid = (get_magic_quotes_gpc()) ? $_POST['aphotoid'] : addslashes($_POST['aphotoid']);
}
if (isset($_POST['aphotobor'])) {
  $aphotobor = (get_magic_quotes_gpc()) ? $_POST['aphotobor'] : addslashes($_POST['aphotobor']);
}
if (isset($_POST['aphotoeng'])) {
  $aphotoeng = (get_magic_quotes_gpc()) ? $_POST['aphotoeng'] : addslashes($_POST['aphotoeng']);
}

$photo = $aphoto;
//$photo ='';
$photoid ='';
$photobor ='';
$photoeng ='';
$extension = strrchr($_FILES['photo']['name'], ".") ;
$extensionid = strrchr($_FILES['photoid']['name'], ".") ;
$extensionbor = strrchr($_FILES['photobor']['name'], ".") ;
$extensioneng = strrchr($_FILES['photoeng']['name'], ".") ;

$size1 = $_FILES['photo']['size'];
$size2 = $_FILES['photoid']['size'];
$size3 = $_FILES['photobor']['size'];
$size4 = $_FILES['photoeng']['size'];

$nphot = strstr($photo, ".",true) ;
$filename = './photo/'.$nphot.'.jpg';
$filename1 = './photo/'.$nphot.'.JPG';
$prephoto = 0; 
if ((file_exists($filename))or (file_exists($filename1))) {$prephoto = '1';} 


if ((($extension == '.jpg')or($extension == ".JPG"))and ($size1<524288)) {
$photo = $aphoto;
$uploaddir ='./photo/';
move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = $aphoto;
$extension = '.jpg';
$size1=1;
}}
if ((($extensionid == '.jpg')or($extensionid == ".JPG"))and ($size2<1024000)) {
$photoid = $lic.$extensionid;
$uploaddir ='./photoid/';
move_uploaded_file($_FILES['photoid']['tmp_name'], $uploaddir.$photoid);
}
else {
if (isset($_POST['aphotoid'])) {
$photoid = $aphotoid;
$extensionid = '.jpg';
$size2=1;
}}

if ((($extensionbor == '.jpg')or($extensionbor == ".JPG"))and ($size3<1024000)) {
$photobor = $lic.'.jpg';
$uploaddir ='./photobor/'.$saison . '/';
move_uploaded_file($_FILES['photobor']['tmp_name'], $uploaddir.$photobor);
}
else {
if (isset($_POST['aphotobor'])) {
$photobor = $aphotobor;
$extensionbor = '.jpg';
$size3=1;
}}

if ((($extensioneng == '.jpg')or($extensionbor == ".JPG"))and ($size3<1024000)) {
$photoeng = $lic.'.jpg';
$uploaddir ='./photoeng/'.$saison . '/';
move_uploaded_file($_FILES['photoeng']['tmp_name'], $uploaddir.$photoeng);
}
else {
if (isset($_POST['aphotoeng'])) {
$photoeng = $aphotoeng;
$extensioneng = '.jpg';
$size4=1;
}}


if ($totalRows == 0){

if (($club <> '')and($nom <> '')and($prenom <> '')and($jour <> '')and($mois <> '')and($sexe <> '')and($annee <> '') and($cin <> '')and($lic <> '')and($photobor <> '')and($prephoto == '1')and (($extensionbor == ".jpg") or ($extensionbor == ".JPG"))  )
{


$query5 ="SELECT * FROM athletes where date_naiss = '$date_naissance' and club <> '$club' order by saison desc";
$result5 = mysql_query($query5,$connexion);
$row5 = mysql_fetch_assoc($result5);
$test = 0;
do {

similar_text(strtolower($nom), strtolower($row5['nom']), $percentn); 
similar_text(strtolower($prenom), strtolower($row5['prenom']), $percentpn); 
similar_text(strtolower($nom), strtolower($row5['prenom']), $percentn1); 
similar_text(strtolower($prenom), strtolower($row5['nom']), $percentpn1); 

if (($percentn >50) or ($percentpn >50)or($percentn1 >50) or ($percentpn1 >50)) {
$test = 1;
}
}while	 ($row=mysql_fetch_assoc($result5));

$query ="INSERT INTO `athletess` ( `saison` ,`n_lic`, `cin`, `nom`, `prenom` , `sexe` , `date_naiss` , `club` , `ligue`, `age` , `sport`  ,  `photo`,  `photoid` , `date_saisie`, `obs`, `nationalite` ) 
VALUES ('$saison','$code','$cin','$nom','$prenom', '$sexe', '$date_naissance', '$club', '$ligue', '$age', '$sport',  '$photo', '$photoid',  '$date_saisie', '$lic', '$nationalite' )";
	
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
 <div align="center" class="style2">Add Athletes </div>
<form action="addrenouv.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td width="" rowspan="2" align="left">Nom</td>
      <td width="" rowspan="2" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $nom;?>"></td>
      <td width="" rowspan="2" align="left">Prénom </td>
      <td width="" rowspan="2" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $prenom;?>"></td>
      <td width="12%" rowspan="2" align="left">Date de Naissance</td>
      <td width="4%" align="center">Jours</td>
      <td width="4%" align="center">Mois</td>
      <td width="6%" align="center">Années</td>
      <td width="8%" rowspan="2" align="left">Discipline</td>
      <td width="4%" rowspan="2" align="center"><select name="sport" size="1" id="sport" tabindex="6">
        <option><?php echo $sport;?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
    </tr>

    <tr>
      <td align="center"><input name="jour" type="number" id="jour" tabindex="3" size="4" maxlength="2" value ="<?php echo $jour;?>"></td>
      <td align="center"><input name="mois" type="number" id="mois" tabindex="4" size="4" maxlength="2" value ="<?php echo $mois;?>"></td>
      <td align="left"><input name="annee" type="number" id="annee" tabindex="5" size="8" maxlength="4" value ="<?php echo $annee;?>"></td>
    </tr>
       </table>
<table width="100%" border="0">
    <tr>
      <td width="" align="left">N° CIN </td>
      <td width="" align="left"><input name="cin" type="number" id="cin" tabindex="7" size="25" value ="<?php echo $cin;?>"></td>
      <td width="" align="left">Sexe</td>
      <td width="" align="left"><select name="sexe" size="1" id="sexe" tabindex="9">
        <option><?php echo $sexe;?></option>
        <option>ذكر</option>
        <option>أنثى</option>
      </select></td>
      <td width="" align="left">Nationalité</td>
      <td align="left"><input name="nationalite" type="text" id="nationalite" tabindex="10" size="25" value ="<?php echo $nationalite;?>"></td>
      <td width="" colspan="3" align="center">&nbsp;</td>
    </tr>
       </table>
<table width="100%" border="0">
    <tr>
      <td align="left">Photo</td>
      <td align="left"><input name="photo" type="file" id="photo" size="1" tabindex="10"></td>
      <td align="left">Identité</td>
      <td align="left"><input name="photoid" type="file" id="photoid" size="1" tabindex="11"></td>
	  <td>Bordereau</td>
      <td align="left"><input name="photobor" type="file" id="photobor" size="1" tabindex="11"></td>
	  <td>Eng Parentale</td>
      <td align="left"><input name="photoeng" type="file" id="photobor" size="1" tabindex="11"></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photo/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photoid/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
      <td>&nbsp;</td>
      <td align="left"><img src="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
      <td>&nbsp;</td>
      <td align="left"><img src="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
    </tr>
  </table>
      <input name="aphoto" type="hidden" id="aphoto" size="1" value ="<?php echo $photo;?>">
      <input name="aphotoid" type="hidden" id="aphotoid" size="1" value ="<?php echo $photoid;?>">
      <input name="aphotobor" type="hidden" id="aphotoid" size="1" value ="<?php echo $code. ".jpg";?>">
      <input name="aphotoeng" type="hidden" id="aphotoid" size="1" value ="<?php echo $code. ".jpg";?>">
      <input name="ligue" type="hidden" id="ligue" size="1" value ="<?php echo $ligue;?>">
      <input name="date_saisie" type="hidden" id="date_saisie" size="1" value ="<?php echo $dat1;?>">
       <input name="age" type="hidden" id="age" size="1" value ="<?php echo $age;?>">
       <input name="saison" type="hidden" id="age" size="1" value ="<?php echo $saison;?>">
       <input name="lic" type="hidden" id="age" size="1" value ="<?php echo $lic;?>">

     
      
      


  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
<div align="center" class="style2">SVP remplir tous les Champs </div>
	<?php 
	
	if (($extension <> ".jpg") and ($extension <> ".JPG")){echo "Format Image Non Valide";?> <br> <?php }
	if (($extensionid <> ".jpg") and ($extensionid <> ".JPG")){echo "Format Pièce d'Identité Non Valide";?> <br> <?php }
	if ($size1 >= '524288') {echo "Taille Image Non Valide";?> <br> <?php }
	if ($size2 >= '1024000') {echo "Taille Pièce d'Identité Non Valide";?> <br> <?php }
	if ($photoid == ''){echo "Pièce d'Identité Inexistante";?> <br> <?php }
	if ($prephoto == '0'){echo "Photo Inexistante";?> <br> <?php }
	 }}
	
	else {?>
<div align="center" class="style2">l'Athlete est Dejàs Existant </div>
		
<?php		}
?>

</body>
</html>