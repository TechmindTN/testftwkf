<?php
session_start();
	   	include('connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><head>
<HTML lang="en" dir="rtl">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<style type="text/css">
.taille {
	font-size: 12px;
}
</style>
</head>

<style type="text/css">
.test {
	color: #F00;
}
.taille {
	font-size: 20px;
}
</style>

<?php
$annee = $_POST ['annee'];
$comp = $_POST ['comp'];

$query ="delete from delegationt";
$result = mysql_query($query,$connexion);
$query ="SELECT id,nom,prenom,Délégation FROM delegation  where comp = '$comp' and annee = '$annee' and CAtPoids ='Entraineur' order by Délégation ";
//$query ="SELECT id,nom,prenom,Délégation FROM delegation  where (comp = 'Championnat de Tunisie Open  Cadets et Cadettes' or comp = 'Championnat de Tunisie Open  Seniors G et F') and annee = '$annee' and CAtPoids ='Entraineur' group by id,nom,prenom,Délégation";

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
                       do { 
$id = $row['id'];
$nom = $row['nom'];
$prenom = $row['prenom'];
$delegation = $row['Délégation'];

$query1 ="INSERT INTO delegationt (`id`,  `nom`, `prenom`, `Délégation`) values ('$id','$nom','$prenom','$delegation')";
$result1 = mysql_query($query1,$connexion);
                       } while ($row = mysql_fetch_assoc($result)); 



//$query ="SELECT id,nom,prenom,Délégation,Qualité,cat FROM delegation  where Délégation = '$club' and annee = '$annee' and lieu ='$lieu' group by id,nom,prenom,Délégation,cat order by Délégation,id ";
$query ="SELECT id,nom,prenom,Délégation FROM delegationt order by id ";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
 
                       do { 
?>
<body>
<table width="880" height="1275" border="0">
  <tr height="49%">
    <td width="49%" height="554" background="badge/recto.jpg?<?php echo time(); ?>" border="0">
  <p>
    <?php 
$id = $row['id'];

?>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
  <table width="85%" border="0" align="center"> 
    <td width="71%" class="taille"><strong><?php echo $row['nom'];?> </strong></td>
  <td width="29%" rowspan="5" align="center" valign="middle">
 <?php 
  if(fopen("http://www.tunisie-judo.org/photoentr/".$id .".jpg", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".jpg";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } 
 else {if(fopen("http://www.tunisie-judo.org/photoentr/".$id.".JPG", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".JPG";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } }
 
?>  
  
  </td>
</tr>
<tr class="taille"><td><strong class="taille"><?php echo $row['prenom'];?></strong></td></tr>
<tr class="taille"><td><strong><?php echo $row['Délégation'];?></strong></td></tr>
<tr><td><strong><?php echo $comp;?> </strong></td></tr>
<tr><td><strong></strong></td></tr>
<tr><td width="2%" >&nbsp;</td><td align="center" valign="middle"><h1 class="test"><strong>
</strong></h1></td></tr>
</table>
   </td>
    <td width="2%" >&nbsp;</td>
    <td width="49%" height="554" background="badge/recto.jpg?<?php echo time(); ?>" border="0">

  <p>
    <?php 
$row = mysql_fetch_assoc($result);
$id = $row['id'];
?>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
  <table width="85%" border="0" align="center"> 
    <td width="71%" class="taille"><strong><?php echo $row['nom'];?></strong></td>
  <td width="29%" rowspan="5" align="center" valign="middle">
 <?php 
  if(fopen("http://www.tunisie-judo.org/photoentr/".$id .".jpg", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".jpg";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } 
 else {if(fopen("http://www.tunisie-judo.org/photoentr/".$id.".JPG", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".JPG";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } }
 
?>  
  
  </td>
</tr>
<tr class="taille"><td><strong><?php echo $row['prenom'];?></strong></td></tr>
<tr class="taille"><td><strong><?php echo $row['Délégation'];?></strong></td></tr>
<tr><td><strong><?php echo $comp;?></strong></td></tr>
<tr><td><strong></strong></td></tr>
<tr><td width="2%" >&nbsp;</td><td align="center" valign="middle"><h1 class="test"><strong></strong></h1></td></tr>
</table>


</td>
  </tr>
  <tr height="2%">
     <td width="49%" height="26" >&nbsp;</td>
    <td width="2%" >&nbsp;</td>
    <td width="49%" >&nbsp;</td>
 
  </tr>
  <tr height="49%">
    <td width="49%" height="554" background="badge/recto.jpg?<?php echo time(); ?>" border="0">
  <p>
    <?php 
$row = mysql_fetch_assoc($result);
$id = $row['id'];
?>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
  <table width="85%" border="0" align="center"> 
    <td width="71%" class="taille"><strong><?php echo $row['nom'];?></strong></td>
  <td width="29%" rowspan="5" align="center" valign="middle">
 <?php 
  if(fopen("http://www.tunisie-judo.org/photoentr/".$id .".jpg", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".jpg";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } 
 else {if(fopen("http://www.tunisie-judo.org/photoentr/".$id.".JPG", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".JPG";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } }
 
?>  
  
  </td>
</tr>
<tr class="taille"><td><strong><?php echo $row['prenom'];?></strong></td></tr>
<tr class="taille"><td><strong><?php echo $row['Délégation'];?></strong></td></tr>
<tr><td><strong> <?php echo $comp;?></strong></td></tr>
<tr><td><strong></strong></td></tr>
<tr><td width="2%" >&nbsp;</td><td align="center" valign="middle"><h1 class="test"><strong></strong></h1></td></tr>
</table>
</td>
    <td width="2%" >&nbsp;</td>
    <td width="49%" height="554" background="badge/recto.jpg?<?php echo time(); ?>" border="0">
  <p>
    <?php 
$row = mysql_fetch_assoc($result);
$id = $row['id'];
?>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
  <table width="85%" border="0" align="center"> 
    <td width="71%" class="taille"><strong><?php echo $row['nom'];?></strong></td>
  <td width="29%" rowspan="5" align="center" valign="middle">
 <?php 
  if(fopen("http://www.tunisie-judo.org/photoentr/".$id .".jpg", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".jpg";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } 
 else {if(fopen("http://www.tunisie-judo.org/photoentr/".$id.".JPG", 'r' )) 
 { 
 ?>
      <img src="./photoentr/<?php echo $id.".JPG";?>?<?php echo time(); ?>" width="127" height="154"></div>
<?php } }
 
?>  
  
  </td>
</tr>
<tr class="taille"><td><strong><?php echo $row['prenom'];?></strong></td></tr>
<tr class="taille"><td><strong><?php echo $row['Délégation'];?></strong></td></tr>
<tr><td><strong><?php echo $comp;?> </strong></td></tr>
<tr><td><strong></strong></td></tr>
<tr><td width="2%" >&nbsp;</td><td align="center" valign="middle"><h1 class="test"><strong></strong></h1></td></tr>
</table>
</td>
  </tr>
</table>
<p style="page-break-before:always">

<?php 
                       } while ($row = mysql_fetch_assoc($result)); 
?>
</body>
</html>