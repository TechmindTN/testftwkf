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
//$file_type = "msword";
//$file_ending = "doc";
//header("Content-Type: application/$file_type");
//header("Content-Disposition: attachment; filename=liste.$file_ending");
//header("Pragma: no-cache");
//header("Expires: 0");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
//header("Content-type: application/vnd.ms-excel; lang=ar charset=utf8_unicode_ci");
//header("Content-disposition: attachment; filename=\"liste.html\"");
//header ("Content-type: image/jpeg");
	   	include('connect.php');
$comp = $_GET ['comp'];
$dat = $_GET ['dat'];
$lieu = $_GET ['lieu'];
$cat = $_GET ['cat'];
$type = $_GET ['type'];
 
//echo  utf8_decode('"champ1";"Champ2";"Champ3";"champ4"'."\n");
  ?> <table border=0 width=100%>
<!-- impression des titres de colonnes -->
<TR><TD width=45%><strong>Qatar Taekwondo, Judo &amp; Karate Federation </strong></TD><TD width=10% align="center"><img src="./image/logo.jpg" width="70" height="70"></TD><TD width=45% align="right">الإتحاد القطري للتايكوندو و الجودو و الكاراتيه</TD></TR>
</Table>
<div align="center"><strong ><br><?php echo $comp; ?><br>
  <?php echo $cat; ?><br>
  <?php echo $type; ?><br>
  <?php echo $dat; ?><br>
<?php echo $lieu; ?><br>
  <br> 
  </strong>
  </p>
</div>
<p align="center"><strong>ATHLETES LIST</strong></p>
 
<table border=1 width=100%>
<TR><TD>N° Lic</TD><TD>Nama</TD><TD>Prénom</TD><TD>Sexe</TD><TD>Club</TD><TD>Ligue</TD><TD>Weight</TD><TD>Photo</TD></TR>
 <?php 
$query ="SELECT * FROM delegation where Délégation = '$club' And cat = '$cat' And comp = '$comp' And annee = '$dat' And lieu = '$lieu' And type = '$type'";
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

//$fp = fopen("./passport/".$id.".jpg","r");
//$image = imagecreatefromjpeg("www.arab-judo-federation.com/inscription/passport/".$id.".jpg");
//move_uploaded_file("http://www.arab-judo-federation.com/inscription/passport/".$id.".jpg", "./passport/".$id.".jpg");
?>


<TR>
<TD><?php echo $row['id']; ?></TD>
<TD><?php echo $row['nom']; ?></TD>
<TD><?php echo $row['prenom']; ?></TD>
<TD><?php echo $row['Sexe']; ?></TD>
<TD><?php echo $club; ?></TD>
<TD><?php echo $row1['ligue']; ?></TD>
<TD><?php echo $row['CAtPoids']; ?></TD>
<TD><img src="./photo/<?php echo $id;?>.jpg" width="33" height="50"></TD>
</TR>
<?php 
                       } while ($row = mysql_fetch_assoc($result)); 
 // $row->closeCursor(); // Termine le traitement de la requête
?>
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>
