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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>

<body>
<?php
	include('connect.php');
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];$id=$_SESSION['id'] ;
 $comp=$_SESSION['comp'] ;
 $dat1=$_SESSION['dat'] ;
 $lieu=$_SESSION['lieu'] ;
 $cat=$_SESSION['cat'] ;
 $type=$_SESSION['type'] ;
 
$dat=substr("$dat1", 6, 4);

$query0 ="SELECT club FROM club where club = '$club'";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);
$ligue=$row0['club'];

$query1 ="SELECT * FROM delegation where Délégation = '$ligue' and comp = '$comp' and lieu = '$lieu' and annee = '$dat' and cat = '$cat' and type = '$type' order by code";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

do {
$code=$row1['code'];
$v1 = 'v'.$code;
$ch1 = 'ch'.$code;

$vol=$_POST[$v1];
$ch=$_POST[$ch1];

$query2 ="SELECT * FROM plan where ligue = '$ligue' And comp = '$comp' And lieu = '$lieu' And annee = '$dat' and cat = '$cat' And plan = '$vol' and type = '$type' ";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$da=$row2['da'];
$dd=$row2['dd'];
$ha=$row2['ha'];
$hd=$row2['hd'];
$va=$row2['va'];
$vd=$row2['vd'];
$j=$row2['jours'];
$p=$row2['p'];
$d=$row2['d'];

$query2 ="UPDATE  `delegation` SET  `da` =  '$da',`dd` =  '$dd', `ha` =  '$ha', `hd` =  '$hd', `va` =  '$va', `vd` =  '$vd', `jours` =  '$j', `hotel` =  '$ch', `d` =  '$d', `p` =  '$p' WHERE  `delegation`.`code` = '$code';";
$result2 = mysql_query($query2,$connexion);
}while ($row1 = mysql_fetch_assoc($result1));
	
?>

</body>

</html>
