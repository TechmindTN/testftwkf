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
<HTML lang="en" dir="rtl">
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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


$query1 ="SELECT club FROM club where club = '$club'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$ligue=$row1['club'];

//$query ="SELECT * FROM plan where ligue = '$ligue' order by plan";
//$result = mysql_query($query,$connexion);
//$totalrow= mysql_num_rows($result);

?>

<form action="addplan.php" method="post" enctype="multipart/form-data">
    <p>النادي : <?php echo $ligue;?></p>
    <table width="100%" border="1">
      <tr>
        <td>&nbsp;</td>
        <td colspan="4"><div align="center"><strong>الوصول</strong></div></td>
        <td colspan="4"><div align="center"><strong>لمغادرة</strong></div></td>
        <td rowspan="2"><div align="center"><strong>عدد الاشخاص</strong></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center"><strong>التاريخ</strong></div></td>
        <td><div align="center"><strong>الوقت</strong></div></td>
        <td><div align="center"><strong>رقم الرحلة</strong></div></td>
        <td><div align="center"><strong>من</strong></div></td>
        <td><div align="center"><strong>التاريخ</strong></div></td>
        <td><div align="center"><strong>الوقت</strong></div></td>
        <td><div align="center"><strong>رقم الرحلة</strong></div></td>
        <td><div align="center"><strong>إلى</strong></div></td>
      </tr>
      <tr>
        <td>1
          <?php 
		  	$query ="SELECT * FROM plan where ligue = '$ligue' And plan = 'برنامج 1' and comp = '$comp' and annee = '$dat' and lieu = '$lieu' and cat = '$cat' and type = '$type'";
				$result = mysql_query($query,$connexion);
				$totalrow= mysql_num_rows($result);
       			$row1 = mysql_fetch_assoc($result);
                 do { 
                                     $da1 = $row1['da'];
if ($da1 != ""){
$da=substr("$da1", 8, 2). "-".substr("$da1", 5, 2)."-".substr("$da1", 0, 4);}
else {$da="";}
                                     $dd1 = $row1['dd'];
if ($dd1 != ""){
$dd=substr("$dd1", 8, 2). "-".substr("$dd1", 5, 2)."-".substr("$dd1", 0, 4);}
else {$dd="";}


                                     $ha = $row1['ha'];
                                     $hd = $row1['hd'];
                                     $va = $row1['va'];
                                     $vd = $row1['vd'];
                                     $n = $row1['n'];
                                     $p = $row1['p'];
                                     $d = $row1['d'];
                                      
 						  } while ($row1=mysql_fetch_row($result)); ?>
          <input name="plan1" type="HIDDEN" value="plan1" size="10"></td>
        <td><input size="10" name="da1" type="text" value="<?php echo $da; ?>"></td>
        <td><input size="10" name="ha1" type="text" value="<?php echo $ha; ?>"></td>
        <td><input size="10" name="va1" type="text" value="<?php echo $va; ?>"></td>
        <td><input size="10" name="p1" type="text" value="<?php echo $p; ?>"></td>
        <td><input size="10" name="dd1" type="text" value="<?php echo $dd; ?>"></td>
        <td><input size="10" name="hd1" type="text" value="<?php echo $hd; ?>"></td>
        <td><input size="10" name="vd1" type="text" value="<?php echo $vd; ?>"></td>
        <td><input size="10" name="d1" type="text" value="<?php echo $d; ?>"></td>
        <td><input width="80" name="n1" type="text" value="<?php echo $n; ?>"></td>
      </tr>
      <tr>
        <td>2
          <?php 
		  	$query ="SELECT * FROM plan where ligue = '$ligue' And plan = 'برنامج 2' and comp = '$comp' and annee = '$dat' and lieu = '$lieu' and cat = '$cat' and type = '$type'";
				$result = mysql_query($query,$connexion);
				$totalrow= mysql_num_rows($result);
       			$row1 = mysql_fetch_assoc($result);
                 do { 
                                     $da1 = $row1['da'];
if ($da1 != ""){
$da=substr("$da1", 8, 2). "-".substr("$da1", 5, 2)."-".substr("$da1", 0, 4);}
else {$da="";}
                                     $dd1 = $row1['dd'];
if ($dd1 != ""){
$dd=substr("$dd1", 8, 2). "-".substr("$dd1", 5, 2)."-".substr("$dd1", 0, 4);}
else {$dd="";}
                                     $ha = $row1['ha'];
                                     $hd = $row1['hd'];
                                     $va = $row1['va'];
                                     $vd = $row1['vd'];
                                     $n = $row1['n'];
                                     $p = $row1['p'];
                                     $d = $row1['d'];
                                      
 						  } while ($row1=mysql_fetch_row($result)); ?>
          <input name="plan2" type="HIDDEN" id="plan" value="plan2" size="10"></td>
        <td><input size="10" name="da2" type="text" value="<?php echo $da; ?>"></td>
        <td><input size="10" name="ha2" type="text" value="<?php echo $ha; ?>"></td>
        <td><input size="10" name="va2" type="text" value="<?php echo $va; ?>"></td>
        <td><input size="10" name="p2" type="text" value="<?php echo $p; ?>"></td>
        <td><input size="10" name="dd2" type="text" value="<?php echo $dd; ?>"></td>
        <td><input size="10" name="hd2" type="text" value="<?php echo $hd; ?>"></td>
        <td><input size="10" name="vd2" type="text" value="<?php echo $vd; ?>"></td>
        <td><input size="10" name="d2" type="text" value="<?php echo $d; ?>"></td>
        <td><input width="80" name="n2" type="text" value="<?php echo $n; ?>"></td>
      </tr>
      <tr>
        <td>3
          <?php
		   	$query ="SELECT * FROM plan where ligue = '$ligue' And plan = 'برنامج 3' and comp = '$comp' and annee = '$dat' and lieu = '$lieu' and cat = '$cat' and type = '$type'";
				$result = mysql_query($query,$connexion);
				$totalrow= mysql_num_rows($result);
       			$row1 = mysql_fetch_assoc($result);
                 do { 
                                     $da1 = $row1['da'];
if ($da1 != ""){
$da=substr("$da1", 8, 2). "-".substr("$da1", 5, 2)."-".substr("$da1", 0, 4);}
else {$da="";}
                                     $dd1 = $row1['dd'];
if ($dd1 != ""){
$dd=substr("$dd1", 8, 2). "-".substr("$dd1", 5, 2)."-".substr("$dd1", 0, 4);}
else {$dd="";}
                                     $ha = $row1['ha'];
                                     $hd = $row1['hd'];
                                     $va = $row1['va'];
                                     $vd = $row1['vd'];
                                     $n = $row1['n'];
                                     $p = $row1['p'];
                                     $d = $row1['d'];
                                      
 						  } while ($row1=mysql_fetch_row($result)); ?>
          <input name="plan3" type="HIDDEN" id="plan3" value="plan3" size="10"></td>
        <td><input size="10" name="da3" type="text" value="<?php echo $da; ?>"></td>
        <td><input size="10" name="ha3" type="text" value="<?php echo $ha; ?>"></td>
        <td><input size="10" name="va3" type="text" value="<?php echo $va; ?>"></td>
        <td><input size="10" name="p3" type="text" value="<?php echo $p; ?>"></td>
        <td><input size="10" name="dd3" type="text" value="<?php echo $dd; ?>"></td>
        <td><input size="10" name="hd3" type="text" value="<?php echo $hd; ?>"></td>
        <td><input size="10" name="vd3" type="text" value="<?php echo $vd; ?>"></td>
        <td><input size="10" name="d3" type="text" value="<?php echo $d; ?>"></td>
        <td><input width="80" name="n3" type="text" value="<?php echo $n; ?>"></td>
      </tr>
      <tr>
        <td>4
          <?php 	
		  $query ="SELECT * FROM plan where ligue = '$ligue' And plan = 'برنامج 4' and comp = '$comp' and annee = '$dat' and lieu = '$lieu' and cat = '$cat' and type = '$type'";
				$result = mysql_query($query,$connexion);
				$totalrow= mysql_num_rows($result);
       			$row1 = mysql_fetch_assoc($result);
                 do {  
                                     $da1 = $row1['da'];
if ($da1 != ""){
$da=substr("$da1", 8, 2). "-".substr("$da1", 5, 2)."-".substr("$da1", 0, 4);}
else {$da="";}
                                     $dd1 = $row1['dd'];
if ($dd1 != ""){
$dd=substr("$dd1", 8, 2). "-".substr("$dd1", 5, 2)."-".substr("$dd1", 0, 4);}
else {$dd="";}
                                     $ha = $row1['ha'];
                                     $hd = $row1['hd'];
                                     $va = $row1['va'];
                                     $vd = $row1['vd'];
                                     $n = $row1['n'];
                                     $p = $row1['p'];
                                     $d = $row1['d'];
                                      
 						  } while ($row1=mysql_fetch_row($result)); ?>
          <input name="plan4" type="HIDDEN" id="plan4" value="plan4" size="10"></td>
        <td><input size="10" name="da4" type="text" value="<?php echo $da; ?>"></td>
        <td><input size="10" name="ha4" type="text" value="<?php echo $ha; ?>"></td>
        <td><input size="10" name="va4" type="text" value="<?php echo $va; ?>"></td>
        <td><input size="10" name="p4" type="text" value="<?php echo $p; ?>"></td>
        <td><input size="10" name="dd4" type="text" value="<?php echo $dd; ?>"></td>
        <td><input size="10" name="hd4" type="text" value="<?php echo $hd; ?>"></td>
        <td><input size="10" name="vd4" type="text" value="<?php echo $vd; ?>"></td>
        <td><input size="10" name="d4" type="text" value="<?php echo $d; ?>"></td>
        <td><input width="80" name="n4" type="text" value="<?php echo $n; ?>"></td>
      </tr>
      <tr>
        <td>5
          <?php 
		  	$query ="SELECT * FROM plan where ligue = '$ligue' And plan = 'برنامج 5' and comp = '$comp' and annee = '$dat' and lieu = '$lieu' and cat = '$cat' and type = '$type'";
				$result = mysql_query($query,$connexion);
				$totalrow= mysql_num_rows($result);
       			$row1 = mysql_fetch_assoc($result);
                 do { 
                                     $da1 = $row1['da'];
                                     $da1 = $row1['da'];
if ($da1 != ""){
$da=substr("$da1", 8, 2). "-".substr("$da1", 5, 2)."-".substr("$da1", 0, 4);}
else {$da="";}
                                     $dd1 = $row1['dd'];
if ($dd1 != ""){
$dd=substr("$dd1", 8, 2). "-".substr("$dd1", 5, 2)."-".substr("$dd1", 0, 4);}
else {$dd="";}
                                     $ha = $row1['ha'];
                                     $hd = $row1['hd'];
                                     $va = $row1['va'];
                                     $vd = $row1['vd'];
                                     $n = $row1['n'];
                                     $p = $row1['p'];
                                     $d = $row1['d'];
                                      
 						  } while ($row1=mysql_fetch_row($result)); ?>
          <input name="plan5" type="HIDDEN" id="plan2" value="plan5" size="10"></td>
        <td><input size="10" name="da5" type="text" value="<?php echo $da; ?>"></td>
        <td><input size="10" name="ha5" type="text" value="<?php echo $ha; ?>"></td>
        <td><input size="10" name="va5" type="text" value="<?php echo $va; ?>"></td>
        <td><input size="10" name="p5" type="text" value="<?php echo $p; ?>"></td>
        <td><input size="10" name="dd5" type="text" value="<?php echo $dd; ?>"></td>
        <td><input size="10" name="hd5" type="text" value="<?php echo $hd; ?>"></td>
        <td><input size="10" name="vd5" type="text" value="<?php echo $vd; ?>"></td>
        <td><input size="10" name="d5" type="text" value="<?php echo $d; ?>"></td>
        <td><input width="80" name="n5" type="text" value="<?php echo $n; ?>"></td>
      </tr>
    </table>
    <p>&nbsp;</p>
<p align="center">
      <input type="submit" name="Submit" value="Valider">
    </p>
</form>
</body>
</html>