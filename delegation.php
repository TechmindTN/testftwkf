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
//$ligue = $_SESSION['club'];
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
?>
<form action="adddelegation.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="1">
    <tr>
      <td  ></td>
      <td  ><div align="center"><strong>الاسم </strong></div></td>
      <td  ><div align="center"><strong>اللقب </strong></div></td>
      <td  ><div align="center"><strong>الصفة</strong></div></td>
      <td  ><div align="center"><strong>نوع الغرفة</strong></div></td>
      <td  ><div align="center"><strong>برنامج الرحلة</strong></div></td>
    </tr>
<?php
$query1 ="SELECT * FROM delegation where Délégation = '$ligue' And comp = '$comp' And lieu = '$lieu' And annee = '$dat' And type = '$type' order by code";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
do {
                   	$nom = $row1['nom'];
                   	$prenom = $row1['prenom'];
                   	$qualite = $row1['Qualité'];
                   	$code = $row1['code'];
                   	$ch1 = $row1['hotel'];
					$da = $row1['da'];
					$dd = $row1['dd'];
					$hd = $row1['hd'];
					$ha = $row1['ha'];
$query2 ="SELECT plan FROM plan where ligue = '$ligue' AND da = '$da' AND dd ='$dd' AND ha ='$ha' AND hd = '$hd' And comp = '$comp' And lieu = '$lieu' And annee = '$dat' And cat = '$cat'";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);									 
                   $v1 = $row2['plan'];
						 ?>
<tr>
    <td ><input name="<?php echo $code;?>" type="hidden" id="comp" size="0" value="<?php echo $code;?>"></td>
    <td><?php echo $nom; ?></td>
    <td><?php echo $prenom; ?></td>
    <td><?php echo $qualite; ?></td>
    <td width="106"><select name="<?php echo 'ch'.$code;?>" id="<?php echo 'ch'.$code;?>" >
     <?php if ($ch1 == "فردي") {?> <option selected="selected">فردي</option> <?php ;} 
	 else {?> <option>فردي</option> <?php ;}?>
     <?php if ($ch1 == "مزدوج") {?> <option selected="selected">مزدوج</option> <?php ;} 
	 else {?> <option>مزدوج</option> <?php ;}?>
     <?php if ($ch1 == NULL) {?> <option selected="selected"> </option> <?php ;} 
	 else {?> <option> </option> <?php ;}?>
      </select></td>
    <td width="97"><select name="<?php echo 'v'.$code;?>"  >
    			 <?php 
	$query ="SELECT plan FROM plan where ligue = '$ligue' order by plan";
 	$result = mysql_query($query,$connexion);
	while ($col_value = mysql_fetch_assoc($result)) 
	{
    if ($col_value['plan'] != $v1)
                  { ?> <option><?php echo $col_value['plan'];?></option><?php }
  }
?>
     <option selected="selected"><?php echo $v1; ?></option>
    </select></td>
   </tr>
<?php 
}while ($row1 = mysql_fetch_assoc($result1));
?>
    </table>
    <p align="center">
      <input type="submit" name="Submit" value="Valider">
    </p>
</form>
</body>
</html>