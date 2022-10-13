<?php
session_start();
////$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];

////$_SESSION['club'] = $club2;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
</HEAD>
<style>
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
-->
</style><BODY>
<div align="center" class="style2"> BELTS</div>

 <?PHP 
	   	include('connect.php');
 $sport1 = "";
if (isset($_POST['sport'])) {
  $sport1 = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);
}

$query01 ="SELECT sport FROM ceinture group by sport order by sport";
$result01 = mysql_query($query01,$connexion);
//$row01 = mysql_fetch_row($result01);


	

	  ?>
     
 
 <table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">

              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>

                   <td align="right" width="25%"> Sport </td>
   <td align="left" width="25%"><select name="sport" size="1" id="sais" tabindex="9" onChange="document.stat.submit();">
        <option><?php echo $sport1;?> </option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>


                </tr>


              </table>

          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>

 
 
      <?PHP // } 

$query ="SELECT * FROM ceinture where sport = '$sport1'";
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
?>       
<br>

<table border="1" width="100%" id="table1">
	<tr>
	  <td ><div align = "center"> <strong> Discipline</strong> </div> </td>
	  <td> <div align = "center"> <strong> Ceinture </strong> </div> </td>
	  <td> <div align = "center"> <strong> Ordre </strong> </div> </td>
	  <td> <div align = "center"> <strong> Niveau </strong> </div> </td>
	  <td> <div align = "center"> <strong> Time </strong> </div> </td>
		<td ><?php echo $totalRows; ?></td>
	</tr>
<?php


do {?>

	<tr>
	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  <td><div align="center"><?php echo $row['couleur'];?></div></td>
	  <td><div align="center"><?php echo $row['ordre'];?></div></td>
	  <td><div align="center"><?php echo $row['niveau'];?></div></td>
	  <td><div align="center"><?php echo $row['delais'];?></div></td>
      <td><div align="center"><a href ='updceinture.php?code<?php echo "=$row[id]";?>'><b>Modifier</b></a></td>
      <td><div align="center"><a href ='delceinture.php?code<?php echo "=$row[id]";?>'><b>Supprimer</b></a></td>
	</tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<div align="center"><a href="ceinture.php">Ajout</a></div>


</body>

</html>