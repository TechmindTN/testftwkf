<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];include('connect.php');
 if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="login.php";
</script>

<?php	 }
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

<?php 
$query01 ="SELECT epreuve FROM candidat group by epreuve order by epreuve";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_assoc($result01);

 $epreuve1 = "";
if (isset($_POST['epreuve'])) {
  $epreuve1 = (get_magic_quotes_gpc()) ? $_POST['epreuve'] : addslashes($_POST['epreuve']);
}
?>

<table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">

              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>

                   <td align="right" width="25%"> Epreuve </td>
   <td align="left" width="25%"><select name="epreuve" size="1" id="sais" tabindex="9" onChange="document.stat.submit();">
        <option><?php echo $epreuve1;?> </option>
                      <?php
					   do { 
                                     $res=$row01['epreuve'];
                                      echo "<option >$res</option>";
                       } while ($row01 = mysql_fetch_assoc($result01));
?>
      </select></td>


                </tr>


              </table>

          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>



<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>Nom</strong></div></td>
		<td ><div align="center"><strong>Prenom </strong></div></td>
	    <td ><div align="center"><strong>Sexe</strong></div></td>
	    <td ><div align="center"><strong>Date Naissance</strong></div></td>
	    <td ><div align="center"><strong>Tel</strong></div></td>
	    <td ><div align="center"><strong>Mail</strong></div></td>
		<td ><div align="center"><strong>Degre</strong></div></td>
		<td ><div align="center"><strong>Grade</strong></div></td>
		<td ><div align="center"><strong>Grade Arbitrage</strong></div></td>
		<td ><div align="center"><strong>Discpline</strong></div></td>
		<td ><div align="center"><strong>Epreuve</strong></div></td>
	</tr>
<?php

$query ="SELECT * FROM candidat where epreuve = '$epreuve1'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {
?>
	<tr>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['date_naiss'];?></div></td>
	  <td><div align="center"><?php echo $row['tel'];?></div></td>
	  <td><div align="center"><?php echo $row['email'];?></div></td>
	  <td><div align="center"><?php echo $row['degre'];?></div></td>
	  <td><div align="center"><?php echo $row['grade'];?></div></td>
	  <td><div align="center"><?php echo $row['grade_arb'];?></div></td>
	  <td><div align="center"><?php echo $row['discipline'];?></div></td>
	  <td><div align="center"><?php echo $row['epreuve'];?></div></td>
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>


</body>

</html>