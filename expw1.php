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
<?php
//header("Content-type: application/vnd.ms-excel; lang=ar charset=utf8_unicode_ci");
header("Content-disposition: attachment; filename=\"liste.doc\"");
	   	include('connect.php');
$comp = $_GET ['comp'];
$dat = $_GET ['dat'];
$lieu = $_GET ['lieu'];
$cat = $_GET ['cat'];
$type = $_GET ['type'];
 
//echo  utf8_decode('"champ1";"Champ2";"Champ3";"champ4"'."\n");
echo '<table border=1>
<!-- impression des titres de colonnes -->
<TR><TD>الإسم</TD><TD>اللقب</TD><TD>الأسم بالأنجليزي</TD><TD>اللقب بالأنجليزي</TD><TD>الصفة</TD><TD>الجنس</TD><TD>البلد</TD><TD>النادي</TD><TD>الجنسية</TD><TD>الصورة</TD><TD>صورة الجواز</TD></TR>';
  //... ci dessus j'ai la connexion a ma base, et la requête.

$query ="SELECT * FROM delegation where cat = '$cat' And comp = '$comp' And annee = '$dat' And lieu = '$lieu' And type = '$type'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

                       do { 
// $insertion =utf8_encode($row['nom'].';'.$row['prenom'].';'.$row['nom_e'].';'.$row['prenom_e'].'');
//$insertion = $insertion."\n"; //très important les " car si ce ne sont que des ', le \n ne marchera pas
//echo $insertion;
 $club = $row['Délégation'];
 $id = $row['id'];
 $query1 ="SELECT ligue FROM club where club = '$club'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
 $query2 ="SELECT nat FROM athletes where code = '$id'";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$photo = "./passport/".$id.".jpg";
?>

  


<?php 
echo '
<TR><TD>'.$row['nom'].'</TD><TD>'.$row['prenom'].'</TD><TD>'.$row['nom_e'].'</TD><TD>'.$row['prenom_e'].'</TD><TD>'.$row['Qualité'].'</TD><TD>'.$row['Sexe'].'</TD><TD>'.$row1['ligue'].'</TD><TD>'.$club.'</TD><TD>'.$row2['nat'].'</TD><TD><v:shape id="_x0000_i1025" type="#_x0000_t75" style="width:33pt;height:50pt"><v:imagedata src="./photo/'.$id.'.jpg" o:title="leNomDeMonFichierImage.png"/></v:shape></TD><TD><v:shape id="_x0000_i1025" type="#_x0000_t75" style="width:33pt;height:50pt"><v:imagedata src="./passport/'.$id.'.jpg" o:title="leNomDeMonFichierImage.png"/></v:shape></TD></TR>';
  
  
                       } while ($row = mysql_fetch_assoc($result)); 
 // $row->closeCursor(); // Termine le traitement de la requête
?>