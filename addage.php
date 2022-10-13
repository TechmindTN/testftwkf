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
$id = 0;


$id = $_POST['cod'];

$sexe = $_POST['sexe'];
$age = $_POST['age'];

$min = $_POST['min'];
$sup = $_POST['sup'];
$prix = $_POST['prix'];
$nom = $_POST['nom'];


if ($id == 0) {
$query ="INSERT INTO `age` (`cat`, `sexe`, `min`, `sup`, `prix`, `nom`) VALUES ( '$age', '$sexe', '$min', '$sup', '$prix', '$nom')";}

else 
{
$query = "update `age` set `cat`='$age', `sexe`='$sexe', `min`='$min', `sup`='$sup' , `prix`='$prix' , `nom`='$nom'  WHERE code = '$id'";}





$result = mysql_query($query,$connexion);


?>
<script type="text/javascript">
window.location.href="affage.php";
</script>

<?php 
?>
</body>
</html>