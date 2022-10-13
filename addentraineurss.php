<?php
session_start();
?>
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
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";
</script>

<?php	 }
$query ="SELECT club,ligue FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$ligue=$row['ligue'];
$club = $row['club'];
$type = $_POST['type'];

$code1 = 0;

if (isset($_POST['cod'])) {
  $code1 = (get_magic_quotes_gpc()) ? $_POST['cod'] : addslashes($_POST['cod']);
}
if ($code1 == 0) {
$query ="select max(n_lic) from `entraineurs` where type = '$type'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code = $row[0]+1;
}
else {
$code = $code1;
}
$dat1 = date("Y/m/d H:i:s") ;
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$sport = $_POST['sport'];
$degre = $_POST['degre'];
$gar = $_POST['gradear'];
$cin = $_POST['cin'];

$grade = $_POST['grade'];
$naiss = $_POST['naiss'];
$clubb = $_POST['clubb'];
$liguee = $_POST['liguee'];




$aphoto ='';
if (isset($_POST['aphoto'])) {
  $aphoto = (get_magic_quotes_gpc()) ? $_POST['aphoto'] : addslashes($_POST['aphoto']);
}
$photo ='';
$extension = strrchr($_FILES['photo']['name'], ".") ;
if (($extension == '.jpg')or($extension == ".JPG")) {
$photo = $code.".jpg";

if ($type == "ممرن"){ $uploaddir ='./photoentr/' ; }
if ($type == "مسير"){ $uploaddir ='./photodir/' ; }
if ($type == "حكم"){ $uploaddir ='./photoarb/' ; }
if ($type == "منشط"){ $uploaddir ='./photoanim/' ; }
if ($type == "مرافق"){ $uploaddir ='./photoacc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='./photoentrf/' ; }



//$uploaddir ='./photoentr/';

move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = $aphoto;}
}

$adiplome ='';
if (isset($_POST['adiplome'])) {
  $adiplome = (get_magic_quotes_gpc()) ? $_POST['adiplome'] : addslashes($_POST['adiplome']);
}
$diplome ='';
$extension1 = strrchr($_FILES['diplome']['name'], ".") ;
if (($extension1 == '.jpg')or($extension1 == ".JPG")) {
$diplome = $code.".jpg";
if ($type == "ممرن"){ $uploaddir ='./diplomeentr/' ; }
if ($type == "مسير"){ $uploaddir ='./diplomedir/' ; }
if ($type == "حكم"){ $uploaddir ='./diplomearb/' ; }
if ($type == "منشط"){ $uploaddir ='./diplomeanim/' ; }
if ($type == "مرافق"){ $uploaddir ='./diplomeacc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='./photoentrf/' ; }
move_uploaded_file($_FILES['diplome']['tmp_name'], $uploaddir.$diplome);
}
else {
if (isset($_POST['adiplome'])) {
$diplome = $adiplome;}
}

if (($type == "مرافق") or ($type == "مسير"))
{ $etat = 1 ;}else {$etat = 0;}
if (($nom <> '')and($prenom <> '')and($sport <> '')and($degre <> '')and($sexe <> '')and($photo <> '')and(($diplome <> '')or ($type == "مسير") or ($type == "مرافق")))
{
$query ="UPDATE `entraineurs` SET `nom`='$nom', `prenom`='$prenom', `degre`='$degre', `sport`='$sport' , `sexe` ='$sexe',  `club`= '$clubb', `ligue`='$liguee', `grade`='$grade' ,  `photo`='$photo',  `type`='$type',  `naiss`='$naiss',  `arbitrage`='$gar' ,  `cin`='$cin' WHERE (`n_lic`='$code1' and `saison`='$saison' and type = '$type')";

$result = mysql_query($query,$connexion);
?>
 
<script type="text/javascript">
window.location.href="affentraineur.php";
</script>

<?php 
}
else 
{
?>
 <div align="center" class="style2">Add Staff </div>
<form action="addentraineur.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td width="11%" align="left">Nom</td>
      <td width="14%" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $nom;?>"></td>
      <td width="7%" align="left">Prénom </td>
      <td width="19%" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $prenom;?>"></td>
      <td width="4%" align="left">Sexe</td>
      <td width="4%" align="left"><select name="sexe" size="1" id="sexe" tabindex="13">
        <option><?php echo $sexe;?></option>        <option>ذكر</option>
        <option>أنثى</option>
</select></td>
    </tr>
    <tr>
      <td align="left">Discipline</td>
      <td align="left"><select name="sport" size="1" id="discipline" tabindex="9">
        <option><?php echo $sport;?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
      <td align="left">Grade</td>
      <td align="left"><select name="grade" size="1" id="grade" tabindex="12">
        <option> <?php echo $grade;?></option>        
       <option>أسود درجة أولى</option>
       <option>أسود درجة ثانية</option>
       <option>أسود درجة ثالثة</option>
       <option>أسود درجة رابعة</option>
       <option>أسود درجة خامسة</option>
       <option>أسود درجة سادسة</option>
       <option>أسود درجة سابعة</option>
      </select></td>
      <td align="left">Degre</td>
      <td align="left"><select name="degre" size="1" id="degre" tabindex="9">
        <option><?php echo $degre;?> </option>
        <option>مدرب فدرالي</option>
        <option>درجة اولى</option>
        <option>درجة ثانية</option>
        <option>درجة ثالثه</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Grade Arbitrage</td>
      <td align="left"><select name="gradear" size="1" id="degre2" tabindex="9">
        <option><?php echo $arbitrage;?> </option>
        <option>درجة اولى</option>
        <option>درجة ثانية</option>
        <option>درجة ثالثه</option>
        <option>مغاربي</option>
        <option>قاري</option>
        <option>دولي</option>
      </select></td>
      <td align="left">Type</td>
      <td align="left"><select name="type" size="1" id="discipline2" tabindex="9">
        <option><?php echo $type;?></option>
        <option>مسير</option>
        <option>ممرن</option>
        <option>مدرب فدرالي</option>
        <option>مرافق</option>
      </select></td>
      <td align="left">Date Naissance</td>
      <td align="left"><input name="naiss" type="date" id="naiss" tabindex="1" size="15" value="<?php echo $naiss;?>"></td>
    </tr>
    <tr>
      <td align="left">CIN</td>
      <td align="left"><input name="cin" type="number" id="cin" tabindex="1" size="25" value ="<?php echo $cin;?>"></td>
      <td align="left">Photo</td>
      <td align="left"><input name="photo" type="file" id="photo" size="1" tabindex="15"></td>
      <td align="left">Diplome</td>
      <td align="left"><input name="diplome" type="file" id="diplome" size="1" tabindex="15"></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photoentr/<?php echo $photo;?>" width="33" height="50"></td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./diplome/<?php echo $photo;?>" width="33" height="50"></td>
    </tr>
    <input name="aphoto" type="hidden" id="aphoto" tabindex="100" size="0" value ="<?php echo $photo;?>">
    <input name="adiplome" type="hidden" id="adiplome" tabindex="100" size="0" value ="<?php echo $photo;?>">
       </table>
  <table width="100%" border="0">
  </table>


  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
<div align="center" class="style2">SVP Remplir tous les Champs </div>
	
	<?php }
?>

</body>
</html>