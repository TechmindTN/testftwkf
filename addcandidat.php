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


$dat1 = date("Y/m/d H:i:s") ;
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$annee = $_POST['annee'];
$mois = $_POST['mois'];
$jour = $_POST['jour'];

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$epreuve = $_POST['epreuve'];
$discipline = $_POST['discipline'];
$degre = $_POST['degre'];
$grade = $_POST['grade'];
$grade_arb = $_POST['grade_arb'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$date_naissance = $_POST['annee']. "-".$_POST['mois']. "-".$_POST['jour'];





if (($nom <> '')and($prenom <> '')and($discipline <> '')and($degre <> '')and($sexe <> '')and($tel <> '')and($mail <> '')and($date_naissance <> '--'))
{

$query ="INSERT INTO `candidat` (`nom`, `prenom`, `sexe`, `date_naiss`, `email`, `tel`, `degre`, `grade`, `grade_arb`, `discipline`, `epreuve`, `date_saisie`) VALUES ('$nom', '$prenom', '$sexe', '$date_naissance', '$mail', '$tel', '$degre', '$grade', '$grade_arb', '$discipline', '$epreuve', '$dat1');";

$result = mysql_query($query,$connexion);
$msg = "Felicitation\r\n";
$headers = 'From: webmaster@tunisie-judo.org' . "\r\n" .
     'Reply-To: webmaster@tunisie-judo.org' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

mail('$mail', 'confirmation d inscription', $msg,$headers)

?>
<script type="text/javascript">
window.location.href="confirmation.html";
</script>

<?php 
}
else 
{
?>
 <div align="center" class="style2"></div>
<form action="addcandidat.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td width="16%" align="left">Nom</td>
      <td width="19%" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $nom;?>"></td>
    </tr>
    <tr>
      <td align="left">Prénom</td>
      <td align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $prenom;?>"></td>
    </tr>
    <tr>
      <td align="left">Sexe</td>
      <td align="left"><select name="sexe" size="1" id="sexe" tabindex="3">
        <option><?php echo $sexe;?> </option>        <option>ذكر</option>
        <option>أنثى</option>
</select></td>
    </tr>
    <tr>
      <td align="left">Date de Naissance</td>
      <td align="left"><input name="jour" type="number" id="jour" tabindex="4" size="4" maxlength="2" value ="<?php echo $jour;?>">
        /
        <input name="mois" type="number" id="mois" tabindex="5" size="4" maxlength="2" value ="<?php echo $mois;?>">
        /
        <input name="annee" type="number" id="annee" tabindex="6" size="8" maxlength="4" value ="<?php echo $annee;?>"></td>
    </tr>
    <tr>
      <td align="left">N° Tel</td>
      <td align="left"><input name="tel" type="text" id="tel" tabindex="7" size="25" value ="<?php echo $tel;?>"></td>
    </tr>
    <tr>
      <td align="left">Mail</td>
      <td align="left"><input name="mail" type="text" id="mail" tabindex="8" size="60" value ="<?php echo $mail;?>"></td>
    </tr>
    <tr>
      <td align="left">Degré (Entrainement)</td>
      <td align="left"><select name="degre" size="1" id="degre" tabindex="9">
        <option><?php echo $degre;?> </option>
        <option>Animateur</option>
        <option>1er Degre</option>
        <option>2eme Degre</option>
        <option>3eme Degre</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Grade en Judo</td>
      <td align="left"><select name="grade" size="1" id="grade" tabindex="10">
        <option><?php echo $grade;?> </option>
        <option>DAN1</option>
        <option>DAN2</option>
        <option>DAN3</option>
        <option>DAN4</option>
        <option>DAN5</option>
        <option>DAN6</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Degré (Arbitrage)</td>
      <td align="left"><select name="grade_arb" size="1" id="grade2" tabindex="11">
        <option> <?php echo $grade_arb;?></option>
        <option>1er Degré</option>
        <option>2eme Degré</option>
        <option>3eme Degré</option>
        <option>UAJ C</option>
        <option>UAJ B</option>
        <option>IJF B</option>
        <option>IJF A</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Discipline</td>
      <td align="left"><select name="discipline" size="1" id="discipline" tabindex="12">
        <option><?php echo $discipline;?> </option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option>
        <option>Kendo</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Epreuve</td>
      <td align="left"><select name="epreuve" size="1" id="epreuve" tabindex="13">
        <option><?php echo $epreuve;?> </option>
        <option>Stage Entraineur</option>
        <option>Stage Arbitrage</option>
      </select></td>
    </tr>
       </table>
<table width="100%" border="0">
    </table>


  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
<div align="center" class="style2">SVP remplir tous les Champs </div>
	
	<?php }
?>

</body>
</html>