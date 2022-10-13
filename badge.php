<?php
	   	include('connect.php');
session_start();

 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="en" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
.test {
	font-size: 24px;
	font-family: "Times New Roman", Times, serif;
	color: #F00;
	text-align: center;
}
.h {
	color: #0F6;
}
.j {
	color: #0F9;
}
.bleu {
	color: #0000A0;
}
</style>
</HEAD>
<script language="javascript" type="text/javascript">
// You can place JavaScript like this
</script>
<body>
<html>
<style>
.tit{
width:400px;
font-size:18px;
text-align:left;
font-weight:bold; 
}
table {
border: medium solid #000000;
width: 100%;
}
td, th {
border: thin solid #6495ed;
width: 10%;
}
td a {color:#ffffff;}
.cel {
background: #0FF;
color:#000;
font-weight:bold;}
td a:hover {color:#ffffff;}
</style>
<?php

if (isset($_POST['annee1'])) {  $annee = (get_magic_quotes_gpc()) ? $_POST['annee1'] : addslashes($_POST['annee1']);}
else {$annee ="_";}


$query ="SELECT comp FROM delegation where annee = '$annee' Group By comp order by comp";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);


$query2 ="SELECT annee FROM delegation  Group By annee order by annee";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);


?>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="7" class="text">

        <tr>
          <td>
                    <form name="refr" method="post" action="" >
              <table border="0" width="44%"  cellspacing="1" cellpadding="4" class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
    <tr>
      <td  ><div align="center"><strong>Annee </strong></div></td>
      <td  ><div align="center"><strong>Championnat </strong></div></td>
    </tr>
                <tr>
    <td >
                    <select name="annee1" class="head"onChange="document.refr.submit();">
                      <option><?php echo $annee; ?></option>
                      <?php
					   do { 
                                     $res=$row2['annee'];
                                      echo "<option >$res</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>    
    </td>
    <td >
    </form>
    <form name="stat" method="post" action="recto.php" target="_blank">
 <input name="annee" type="hidden" id="annee" value = "<?php echo $annee; ?>">

                    <select name="comp" class="head">
                      <option>-</option>
                      <?php
					   do { 
                                     $res=$row['comp'];
                                      echo "<option >$res</option>";
                       } while ($row = mysql_fetch_assoc($result));
?>    
    </td>
                <tr>
                  <td colspan="4" valign="center"><div align="center">
<input name="ok" type="submit" class="Style4" value="مشاهدة">
                  </td>
                </tr>
              </table>
          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>


  </body>
</html>