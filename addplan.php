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

 $comp=$_SESSION['comp'] ;
 $dat1=$_SESSION['dat'] ;
 $lieu=$_SESSION['lieu'] ;
 $cat=$_SESSION['cat'] ;
 $type=$_SESSION['type'] ;
$dat=substr("$dat1", 6, 4);
?>
<HTML lang="en" dir="rtl">
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
<!--
-->
</style></head>

<body>
<?php
	include('connect.php');
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];$query1 ="SELECT club FROM club where club = '$club'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$ligue=$row1['club'];

$query ="delete from plan where ligue = '$ligue' And comp = '$comp' And annee = '$dat' And cat = '$cat' And type = '$type' And lieu = '$lieu'";//
$result = mysql_query($query,$connexion);
function diff_date($day , $month , $year , $day2 , $month2 , $year2){
  $timestamp = mktime(0, 0, 0, $month, $day, $year);
  $timestamp2 = mktime(0, 0, 0, $month2, $day2, $year2);
  $diff_date = floor(($timestamp - $timestamp2) / (3600 * 24));
  return $diff_date; 
}


//plan1
$dat1 = $_POST['da1'];
$da1=substr("$dat1", 6, 4). "-".substr("$dat1", 3, 2)."-".substr("$dat1", 0, 2);
$ddt1 = $_POST['dd1'];
$dd1=substr("$ddt1", 6, 4). "-".substr("$ddt1", 3, 2)."-".substr("$ddt1", 0, 2);

$jours1=diff_date(substr("$ddt1", 0, 2) , substr("$ddt1", 3, 2) , substr("$ddt1", 6, 4) , substr("$dat1", 0, 2) , substr("$dat1", 3, 2) , substr("$dat1", 6, 4));

$ha1 = $_POST['ha1'];
$hd1 = $_POST['hd1'];
$va1 = $_POST['va1'];
$vd1 = $_POST['vd1'];
$n1 = $_POST['n1'];
$p1 = $_POST['p1'];
$d1 = $_POST['d1'];
$query ="insert into plan values ('$comp','$dat','$lieu','$cat','$type','$ligue','برنامج 1','$da1','$dd1','$ha1','$hd1','$va1','$vd1','$n1','$jours1','$p1','$d1')";
$result = mysql_query($query,$connexion);
//plan2
$dat2 = $_POST['da2'];
$da2=substr("$dat2", 6, 4). "-".substr("$dat2", 3, 2)."-".substr("$dat2", 0, 2);
$ddt2 = $_POST['dd2'];
$dd2=substr("$ddt2", 6, 4). "-".substr("$ddt2", 3, 2)."-".substr("$ddt2", 0, 2);
$jours2=diff_date(substr("$ddt2", 0, 2) , substr("$ddt2", 3, 2) , substr("$ddt2", 6, 4) , substr("$dat2", 0, 2) , substr("$dat2", 3, 2) , substr("$dat2", 6, 4));
$ha2 = $_POST['ha2'];
$hd2 = $_POST['hd2'];
$va2 = $_POST['va2'];
$vd2 = $_POST['vd2'];
$n2 = $_POST['n2'];
$p2 = $_POST['p2'];
$d2 = $_POST['d2'];
$query ="insert into plan values ('$comp','$dat','$lieu','$cat','$type','$ligue','برنامج 2','$da2','$dd2','$ha2','$hd2','$va2','$vd2','$n2','$jours2','$p2','$d2')";
$result = mysql_query($query,$connexion);
//plan3
$dat3 = $_POST['da3'];
$da3=substr("$dat3", 6, 4). "-".substr("$dat3", 3, 2)."-".substr("$dat3", 0, 2);
$ddt3 = $_POST['dd3'];
$dd3=substr("$ddt3", 6, 4). "-".substr("$ddt3", 3, 2)."-".substr("$ddt3", 0, 2);
$jours3=diff_date(substr("$ddt3", 0, 2) , substr("$ddt3", 3, 2) , substr("$ddt3", 6, 4) , substr("$dat3", 0, 2) , substr("$dat3", 3, 2) , substr("$dat3", 6, 4));

$ha3 = $_POST['ha3'];
$hd3 = $_POST['hd3'];
$va3 = $_POST['va3'];
$vd3 = $_POST['vd3'];
$n3 = $_POST['n3'];
$p3 = $_POST['p3'];
$d3 = $_POST['d3'];
$query ="insert into plan values ('$comp','$dat','$lieu','$cat','$type','$ligue','برنامج 3','$da3','$dd3','$ha3','$hd3','$va3','$vd3','$n3','$jours3','$p3','$d3')";
$result = mysql_query($query,$connexion);
//plan4
$dat4 = $_POST['da4'];
$da4=substr("$dat4", 6, 4). "-".substr("$dat4", 3, 2)."-".substr("$dat4", 0, 2);
$ddt4 = $_POST['dd4'];
$dd4=substr("$ddt4", 6, 4). "-".substr("$ddt4", 3, 2)."-".substr("$ddt4", 0, 2);
$jours4=diff_date(substr("$ddt4", 0, 2) , substr("$ddt4", 3, 2) , substr("$ddt4", 6, 4) , substr("$dat4", 0, 2) , substr("$dat4", 3, 2) , substr("$dat4", 6, 4));
$ha4 = $_POST['ha4'];
$hd4 = $_POST['hd4'];
$va4 = $_POST['va4'];
$vd4 = $_POST['vd4'];
$n4 = $_POST['n4'];
$p4 = $_POST['p4'];
$d4 = $_POST['d4'];
$query ="insert into plan values ('$comp','$dat','$lieu','$cat','$type','$ligue','برنامج 4','$da4','$dd4','$ha4','$hd4','$va4','$vd4','$n4','$jours4','$p4','$d4')";
$result = mysql_query($query,$connexion);
//plan5
$dat5 = $_POST['da5'];
$da5=substr("$dat5", 6, 4). "-".substr("$dat5", 3, 2)."-".substr("$dat5", 0, 2);
$ddt5 = $_POST['dd5'];
$dd5=substr("$ddt5", 6, 4). "-".substr("$ddt5", 3, 2)."-".substr("$ddt5", 0, 2);
$jours5=diff_date(substr("$ddt5", 0, 2) , substr("$ddt5", 3, 2) , substr("$ddt5", 6, 4) , substr("$dat5", 0, 2) , substr("$dat5", 3, 2) , substr("$dat5", 6, 4));
$ha5 = $_POST['ha5'];
$hd5 = $_POST['hd5'];
$va5 = $_POST['va5'];
$vd5 = $_POST['vd5'];
$n5 = $_POST['n5'];
$p5 = $_POST['p5'];
$d5 = $_POST['d5'];
$query ="insert into plan values ('$comp','$dat','$lieu','$cat','$type','$ligue','برنامج 5','$da5','$dd5','$ha5','$hd5','$va5','$vd5','$n5','$jours5','$p5','$d5')";
$result = mysql_query($query,$connexion);

$query ="delete from plan where da = '0000/00/00'";//
$result = mysql_query($query,$connexion);

?>
</body>
</html>