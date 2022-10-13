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


<body>
<?php
include('connect.php');

if (isset($_POST['id'])) { $id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);}
else {$id = 0;}


$type = $_POST['type'];
$sexe = $_POST['sexe'];
$age = $_POST['cat'];
$poids = $_POST['poids'];
$ordre = $_POST['ord'];


if ($id ==0) {


$query ="INSERT INTO `param` (`cat`, `type`, `sexe`, `ordre`, `poids`) VALUES ('$age', '$type', '$sexe', '$ordre', '$poids')";}
else {
	$query = "update `param` set `cat`='$age', `sexe`='$sexe', `ordre`='$ordre', `poids`='$poids', `type`='$type' WHERE id = '$id'";}



$result = mysql_query($query,$connexion);




?>
<script type="text/javascript">
window.location.href="affparam.php";
</script>

</body>
</html>