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

<?php
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";
</script>

<?php	 }




include('connect.php');
$adecharge ='';
if (isset($_POST['adecharge'])) {
  $adecharge = (get_magic_quotes_gpc()) ? $_POST['adecharge'] : addslashes($_POST['adecharge']);
}

$query ="select max(id) from `paiement`";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code = $row[0]+1;

$query1 ="SELECT club from athletes group by club order by club";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$query2 ="SELECT saison from saison order by saison";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);

//$club = $_POST['club'];
$date = $_POST['date'];
$montant = $_POST['montant'];
$saison = $_POST['saison'];
$decharge ='';

$extension = strrchr($_FILES['decharge']['name'], ".") ;

if ((($extension == '.jpg')or($extension == ".JPG"))) {
$extension = '.jpg';
$decharge = $code.'.jpg';
$uploaddir ='./decharge/';
move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = 'aphoto';
$extension = '.jpg';
$size1=1;
}}


if (($club <> '')and($date <> '')and($montant <> '')and($saison <> '')and($extension == '.jpg'))
{
$query ="INSERT INTO `paiement` (`club` ,`saison`,`montant` , `date`, `etat`) VALUES ('$club','$saison','$montant','$date',0 )";
$result = mysql_query($query,$connexion);
?>

<?php 
}

?>
<script type="text/javascript">
window.location.href="affpaiement.php";
</script>
</body>
</html>