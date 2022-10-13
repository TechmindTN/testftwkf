<!DOCTYPE HTML>
<!--
	FEDERATION TUNISIENNE DE JUDO
	html5up.net | @ajlkn
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

<style>



#frmContact {
    border-top: #730404 2px solid;
    background: #ffffffd1;
    padding: 10px;
}

#frmContact div {
	margin-bottom: 20px;
}

#frmContact div label {
	margin: 5px 0px 0px 5px;    
	color: #49615d;
}

.demoInputBox {
	padding: 10px;
	border: solid 1px #b10d0d;
	border-radius: 4px;
	background-color: #FFF;
	width: 100%;
    margin-top:5px;
}

.error {
	background-color: #FF6600;
    padding: 8px 10px;
    color: #FFFFFF;
    border-radius: 4px;
    font-size: 0.9em;
}

.success {
	background-color: #c3c791;
	padding: 8px 10px;
	color: #FFFFFF;
	border-radius: 4px;
    font-size: 0.9em;
}

.info {
	font-size: .8em;
	color: #FF6600;
	letter-spacing: 2px;
	padding-left: 5px;
}

.btnAction {
	background-color: #82a9a2;
    padding: 10px 40px;
    color: #FFF;
    border: #739690 1px solid;
	border-radius: 4px;
}

.btnAction:focus {
	outline:none;
}
.column-right
{
    margin-right: 6px;
}
.contact-row
{
    display: inline-block;
    width: 32%;
}
@media all and (max-width: 550px) {
    .contact-row {
        display: block;
        width: 100%;
    }
}

</style>
	</head>
	<body class="homepage">
		<div id="page-wrapper">

<div class="topnav" id="myTopnav">
  <a href="ident.htm">Accueil</a>
  <a href="calendrier.php">Compétitions</a>
  <a href="licences.html">Licences</a>
  <a href="galerie.html">Galerie</a>
  <a href="contact.php" class="active">Contact</a>
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
			<!-- Promo -->
				<div id="promo-wrapper">
					<section id="hero" class="container">
						<h3>Contact</h3>
						<br/>

<form id="frmContact" action="" method="post">
    <div id="mail-status"></div>
    <div class="contact-row column-right">
        <label style="padding-top: 20px;">Nom</label> <span
            id="userName-info" class="info"></span><br /> <input
            type="text" name="nom" id="userName"
            class="demoInputBox">
    </div>
    <div class="contact-row column-right">
        <label>Email</label> <span id="userEmail-info" class="info"></span><br />
        <input type="text" name="email" id="userEmail"
            class="demoInputBox">
    </div>
    <div class="contact-row">
        <label>Téléphone</label> <span id="subject-info" class="info"></span><br />
        <input type="text" name="tel" id="subject"
            class="demoInputBox">
    </div>
    <div>
        <label>Message</label> <span id="content-info" class="info"></span><br />
        <textarea name="message" id="content" class="demoInputBox"
            rows="3"></textarea>
    </div>
    <div>
        <input type="submit" name="submit" value="Envoyer" class="btnAction" />
    </div>
</form>
<div id="loader-icon" style="display: none;">
    <img src="images/LoaderIcon.gif" />
</div>
	<?php
	if ( isset( $_POST["submit"] )) {
$cnx = mysql_connect( "tunisiejmdjudo12.mysql.db", "tunisiejmdjudo12", "Mansour05868487" ) ;
$db  = mysql_select_db( "tunisiejmdjudo12" ) ;

	//récupération des valeurs des champs:
  
  //nom:
  $nom     = $_POST["nom"] ;
  //email:
  $email = $_POST["email"] ;
  //tel:
  $tel = $_POST["tel"] ;
  //message:
  $message     = $_POST["message"] ;
  //ID:
  $id = NULL ;
  
  
    //création de la requête SQL:
$sql = "INSERT INTO contactForm
            VALUES
		  ('$id', '$nom', '$email', '$tel', '$message')";
   $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;  

$email_from = "$email";
$to = 'mahdhi_mansour@yahoo.fr';
$headers = "From: $email_from \r\n";
$email_subject = "Contact FTJudo";
$email_body = "Bonjour,
Vous avez reçu un e-mail de la part de $nom ,
E-mail: $email   Tél: $tel
Message: $message
";
mail($to,$email_subject,$email_body,$headers);

   }
	

	?>										
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