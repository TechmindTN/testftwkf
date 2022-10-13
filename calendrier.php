<!DOCTYPE HTML>
<!--
	FEDERATION TUNISIENNE DE JUDO
	RAMY BEN MAAOUIA
-->
<html>
	<head>
		<title>FEDERATION TUNISIENNE DE JUDO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" type="image/png" href="images/ftj.png" width="16px"/>		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<SCRIPT LANGUAGE="JavaScript">
<!-- debut du script
function CreerArray() {
    this.length = CreerArray.arguments.length;
    for (var i = 0; i < this.length; i++)
      this[i+1] = CreerArray.arguments[i];
}
 var pubT, pub = 0;
 function AfficherPub(pubs,pubDelai1) {
   pubDelai = pubDelai1;

   if (pub == pubs.length)
     pub = 0;
   document.pubImg.src = pubs[++pub];
   pubT = setTimeout("AfficherPub(pubs,pubDelai)", pubDelai1);
}
// fin du script -->
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
<!-- debut du script
function VersionNavigateur(Netscape, Explorer) {
  if ((navigator.appVersion.substring(0,3) >= Netscape && navigator.appName == 'Netscape') ||      
      (navigator.appVersion.substring(0,3) >= Explorer && navigator.appName.substring(0,9) == 'Microsoft'))
    return true;
else return false;
}
//  fin du script -->
</SCRIPT>
  <script language="JavaScript1.2" >
function Verification(theForm)
{
	if((document.forms[0].club.value == null) || (document.forms[0].club.value == ''))
	{
		alert("Veuillez remplir votre club S.V.P.");
		document.forms[0].club.focus();
		return false;
	}
	else
	{
		if((document.forms[0].Password.value == null) || (document.forms[0].Password.value == ''))
		{
			alert("Veuillez remplir votre Password S.V.P.");
			document.forms[0].Password.focus();
			return false;
		}
	}
	return true;
}

</script>
		</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="login.php"><img src="images/ftj.png" width="75px"/></a></h1>

					</div>
			<!-- Hero -->
						<section id="hero" class="container">
							<header>
								<h2>Fédération Tunisienne
								<br />
								de Judo</h2>
							</header>
							<p>
							<br />

<div class="topnav" id="myTopnav">
  <a href="http://tunisie-judo.org">Accueil</a>
  <a href="http://tunisie-judo.org/calendrier.php" class="active">Calendrier</a>
  <a href="http://tunisie-judo.org/ident.html">Licences</a>
  <a href="http://tunisie-judo.org/galerie.html">Galerie</a>
  <a href="http://tunisie-judo.org/contact.php">Contact</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.classNom === "topnav") {
        x.classNom += " responsive";
    } else {
        x.classNom = "topnav";
    }
}
</script>

<div id="promo-wrapper">
					<section id="hero" class="container">
						<h3>Tableau des résultats</h3>
						<br/>
<form method="post" action="">
<table class="responsive-table">
<tr>
<?php
include('connect.php');

if (isset($_POST['annee'])) {  $annee = (get_magic_quotes_gpc()) ? $_POST['annee'] : addslashes($_POST['annee']);}
else {$annee ="_";}
if (isset($_POST['compet'])) {  $compet = (get_magic_quotes_gpc()) ? $_POST['comet'] : addslashes($_POST['compet']);}
else {$compet ="_";}

$annees = "SELECT DISTINCT `annee` FROM `competitions_calendar`";
$result = mysql_query($annees,$connexion);
$row = mysql_fetch_assoc($result);
$comp = "SELECT DISTINCT `nom_competition` FROM `competitions_calendar`";
$result2 = mysql_query($comp,$connexion);
$row2 = mysql_fetch_assoc($result2);
?>

<td><select name="annee" required>
            <option value="" >--Année--</option>
<?php

?>
                      <option><?php echo $annee; ?></option>
                      <?php
					   do { 
                                     $res=$row['annee'];
                                      echo "<option >$res</option>";
                       } while ($row = mysql_fetch_assoc($result));
?>    


</select></td>
<td><select name="compet" required>
            <option value="" >--Compétition--</option>
<?php

?>
                      <option><?php echo $compet; ?></option>
                      <?php
					   do { 
                                     $res=$row2['nom_competition'];
                                      echo "<option >$res</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>    


</select></td>
<td><button type="submit" name="submit" class="bouton-contact">Afficher</button></td>
</tr>
</table>
</form>						
</section>						
</div>						

					
			<!-- Footer -->
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Fédération Tunisienne de Judo 2018. Tous droits réservés.</li>
						</ul>
					</div>

		</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>