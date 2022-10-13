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
<TITLE>Un document bilingue</TITLE>
</HEAD>


<body>
<?php
include('connect.php');
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];if (isset($_POST['id'])) { $id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);}
if (isset($_POST['id'])) { $id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);}
else {$id = 0;}


$action = $_POST['action'];
$sport = $_POST['sport'];
$date = $_POST['date'];
$annee = $_POST['annee'];
$delais = $_POST['delais'];
$cat = $_POST['cat'];
$lieu = $_POST['lieu'];
$type = $_POST['type'];
$niv = $_POST['niveau'];
$min = $_POST['min'];
$max = $_POST['max'];

if ($niv == "Final Directe") { $niveau =0;}
if ($niv == "Eliminatoire") { $niveau =1;}
if ($niv == "Final Après Eliminatoire") { $niveau =2;}


if ($id == '0') {

$query ="INSERT INTO `programme` ( `action` ,`sport` ,`age`,`type`,`lieu` , `date_debut`, `saison`, `delais`, `qualif`, `min`, `max` ) VALUES ('$action','$sport','$cat','$type','$lieu','$date','$annee','$delais','$niveau','$min','$max' )";}
else {
$query ="update `programme`  set `action` ='$action' ,`sport` ='$sport' ,`age`='$cat',`type`='$type',`lieu`='$lieu' , `date_debut`='$date', `saison`='$annee', `delais`='$delais', `qualif`='$niveau', `min`='$min', `max`='$max'  where id = '$id'";}
	

$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affprogramme.php";
</script>


</body>
</html>