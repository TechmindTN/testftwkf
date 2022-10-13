<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
 if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="index.html";
</script>

<?php	 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
</HEAD>
<BODY>

<body>
<?php
	include('connect.php');
$saison = $_POST['saison'];
$datedebut = $_POST['datedebut'];
$datefin = $_POST['datefin'];


$id = $_POST['cod'];




if ($id == 0) {
$query = "INSERT INTO `saison` (`saison`,`datedebut`, `datefin`) VALUES ('$saison', '$datedebut','$datefin')";

$nom = "./photoeng/".$saison; // Le nom du répertoire à créer
    // if (is_dir($nom)) {}
    // else { mkdir($nom);}
$nom = "./photobor/".$saison; // Le nom du répertoire à créer
    // if (is_dir($nom)) {}
    // else { mkdir($nom);}
	
	}


else 
{
$query = "update `saison` set `saison`='$saison',`datedebut`='$datedebut', `datefin`='$datefin' WHERE code = '$id'";
}


$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affsaison.php";
</script>


</body>
</html>