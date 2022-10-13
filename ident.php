<html>
<!-- Date de création: 26/05/02 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<meta name="Description" content="">
<meta name="Keywords" content="">
<meta name="Author" content="Usager non enregistré">
<meta name="Generator" content="WebExpert 2000">
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
session_start(); 
session_unset ();
$club = $_POST ['id'];
$passe = $_POST ['password'];

include('connect.php');

$query="select pw, club from club where pw = '$passe' AND club ='$club'" ;
$result=mysql_query($query,$connexion);
$row=mysql_fetch_row($result);
 
if($row[0]!=null)
		{
			$club = $row[1];
$_SESSION['club'] = $club;
$dat1 = date("Y/m/d H:i:s") ;
$query1 ="INSERT INTO `archive` ( `nom`, `date`)VALUES ('$row[1]','$dat1')";
$result1=mysql_query($query1,$connexion);


		?> 
<script type="text/javascript">
window.location.href="accueil2.php";
</script>
<?php 
  }
else {

if($club == "حكم")
{
$_SESSION['club'] = $club;
$_SESSION['cin'] = $passe;

		?> 
<script type="text/javascript">
window.location.href="affarbitre.php";
</script>
<?php 
	
	
	}
else{

	require('ident.htm');
	}}
	
?>
</body>