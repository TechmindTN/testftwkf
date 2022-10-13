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
<HTML lang="en" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<style type="text/css">
<!--
body {
	margin-left: 0%;
	margin-top: 0%;
	margin-right: 0%;
	margin-bottom: 0%;
	background-image: url(image/mascotte.JPG);
}
-->
</style></head>
<body>


<?php 

$id = $_GET ['code'];
$comp = $_GET ['comp'];
$dat = $_GET ['dat'];
$lieu = $_GET ['lieu'];
$cat = $_GET ['cat'];
$type = $_GET ['type'];
$max = $_GET ['max'];
$min = $_GET ['min'];




$_SESSION['id'] = $id;
$_SESSION['comp'] = $comp;
$_SESSION['dat'] = $dat;
$_SESSION['lieu'] = $lieu;
$_SESSION['cat'] = $cat;
$_SESSION['type'] = $type;
$_SESSION['max'] = $max;
$_SESSION['min'] = $min;



		?> 

<script type="text/javascript">
window.location.href="action.php";
</script>
 
</body>