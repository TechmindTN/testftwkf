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
//$file_type = "msword";
//$file_ending = "doc";
//header("Content-Type: application/$file_type");
//header("Content-Disposition: attachment; filename=liste.$file_ending");
//header("Pragma: no-cache");
//header("Expires: 0");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
	   	include('connect.php');
$saison = $_POST ['saison'];
$datdu = $_POST ['datdu'];
$datau = $_POST ['datau'];

//$filename = "liste.xls";
//header("Content-type: application/vnd.ms-word; lang=ar charset=utf8_unicode_ci");
//header("Content-disposition: attachment; filename='$filename'");
//header("Content-disposition: attachment; filename='liste.doc'");
//header ("Content-type: image/jpeg");
//echo  utf8_decode('"champ1";"Champ2";"Champ3";"champ4"'."\n");
 
$query ="SELECT * FROM athletes where saison = '$saison' and date_saisie > '$datdu' and date_saisie < '$datau' order by n_lic";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
 
                       do { 
$filename = './photo/'.$row['photo'];

if (file_exists($filename)) {

// if(fopen("http://kungfuwushutunisie.com/photo/".$row['photo'], 'r' )) 
 //{ 
 ?>
      <img src="./photo/<?php echo $row['photo'];?>?<?php echo time(); ?>" width="66" height="100"></div>
<?php  } 



                       } while ($row = mysql_fetch_assoc($result)); 
 // $row->closeCursor(); // Termine le traitement de la requête
?>