<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];?>
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
$club5=$row['club'];
$id = "";
if (isset($_GET['id'])) {
  $id = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);//
}
if (isset($_POST['id'])) {
  $id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
}

?>
<table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">
              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>
   <td align="right"><input name="id" type="text" id="id" size="15" value="<?php echo $id;?>"></td>
                   <td align="left">
<input name="ok" type="submit" class="Style4" value = "Rechercher">
                  </td>

                </tr>
              </table>
          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>

<?php


 if (($id <> '')){
if (($club5 == "ADMIN")or($club5 == "DTN")){ 
$query1 = "SELECT * FROM athletes WHERE n_lic = '$id' order by saison desc";}
else { 
$query1 = "SELECT * FROM athletes WHERE n_lic = '$id' AND club = '$club' order by saison desc";}

$result1 = mysql_query($query1,$connexion);
$totalRows = mysql_num_rows($result1);
$row1 = mysql_fetch_assoc($result1);



$nom = $row1['nom'];
$prenom = $row1['prenom'];
$club = $row1['club'];
$sport = $row1['sport'];
if (($club5 == "ADMIN")or($club5 == "DTN")){ 

$query1 = "SELECT * FROM ceinture WHERE sport = '$sport' order by ordre";}
else
{
$query1 = "SELECT * FROM ceinture WHERE sport = '$sport' and niveau = 'Club' order by ordre";}

$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);


	

if (($totalRows > 0)){
?>
<form action="addgrade.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td rowspan="2" align="left"> N° Lic </td>
      <td rowspan="2" align="left"><?php echo $id;?><input name="lic" type="hidden" id="lic" tabindex="300" size="20" maxlength="20" value ="<?php echo $id;?>"></td>
      <td rowspan="2" align="left">Nom</td>
      <td rowspan="2" align="left"><?php echo $nom;?><input name="nom" type="hidden" id="nom" tabindex="1" size="25" value ="<?php echo $nom;?>"></td>
      <td rowspan="2" align="left">Prénom</td>
      <td rowspan="2" align="left"><?php echo $prenom;?><input name="prenom" type="hidden" id="prenom" tabindex="2" size="25" value ="<?php echo $prenom;?>"></td>
      <td rowspan="2" align="left">Club </td>
      <td rowspan="2" align="left"><?php echo $club;?><input name="club" type="hidden" id="club" tabindex="2" size="25" value ="<?php echo $club;?>"></td>
      <td rowspan="2" align="left">Discipline</td>
      <td rowspan="2" align="center"><select name="sport" size="1" id="discipline" tabindex="12">
        <option><?php echo $sport;?> </option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
      <td width="8%" rowspan="2"  align="left">Grade</td>
      <td rowspan="2" align="center"><select name="grade" size="1" id="grade" tabindex="12">
                        <option>-</option>
                      <?php
					   do { 
                                     $res=$row1['couleur'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
					  ?>
                  </select></td>
      <td rowspan="2" align="left">Date</td>
      <td align="left">Jours</td>
      <td align="left">Mois</td>
      <td align="left">Années</td>
    </tr>
    <tr>
      <td align="left"><input name="jours" type="text" id="jours" tabindex="2" value ="" size="5" maxlength="2"></td>
      <td align="left"><input name="mois" type="text" id="mois" tabindex="2" value ="" size="5" maxlength="2"></td>
      <td align="left"><input name="annee" type="text" id="annee" tabindex="2" value ="" size="10" maxlength="4"></td>
    </tr>
       </table>



  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>

<?php
}else 
{echo "verifier le numero de licence";
	}}

 ?>

  </body>
</html>