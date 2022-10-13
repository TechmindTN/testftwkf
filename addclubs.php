<?php
session_start();
$club1 = $_SESSION['club'];
 if ($club1 <> 'ADMIN') {
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
<BODY>
<style type="text/css">
<!--
body {
	background-image:  url(../sigle1.gif);
}
-->
</style></head>

<body>
<?php
$id = 0;
	include('connect.php');
$club = $_POST['club'];
$ligue = $_POST['ligue'];
$saison = $_POST['saison'];

if ($id == 0) {
$query = "INSERT INTO `clubb` (`club`,`ligue`, `saison`) VALUES ('$club', '$ligue','$saison')";}
else 
{
$query = "update `clubb` set `club`='$club',`ligue`='$ligue', `saison`='$saison' WHERE id = '$id'";

}


$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affclubs.php";
</script>


</body>
</html>