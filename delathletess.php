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

</head>

<body>
<?php
	include('connect.php');

$code=$_GET['code'];
$raison=$_GET['raison'];


$query ="insert into  `athletedel` (`saison`, `n_lic`, `cin`, `nom`, `prenom`, `sexe`, `date_naiss`, `age` , `club`, `ligue`, `n`, `photo`, `photoid`, `sport`, `date_saisie`, `obs`, `nationalite`) select * from athletess where `n_lic` = '$code'";

$result = mysql_query($query,$connexion)or die( mysql_error() );
$query2 ="update  `athletedel` set `raison`='".$_GET['raison']."'  where `n_lic` = '$code'";
$result = mysql_query($query2,$connexion)or die( mysql_error() );

$query ="delete from athletess where `n_lic` = '$code'";
$result = mysql_query($query,$connexion)or die( mysql_error() );

?>
<script type="text/javascript">
window.location.href="affathletedel.php";

/* window.location.href="affathletedel.php?club<?php echo "=$club";?>"; */
</script>

</body>
</html>