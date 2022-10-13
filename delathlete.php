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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-image:  url(../sigle1.gif);
}
-->
</style></head>

<body>
<?php
	include('connect.php');

$code=$_GET['code'];
$saison=$_GET['saison'];


$query ="DELETE FROM `athletes` where `n_lic` = '$code' and saison = '$saison' ";

$result = mysql_query($query,$connexion)or die( mysql_error() );
?>
<script type="text/javascript">
window.location.href="affathlete.php";
</script>

</body>
</html>