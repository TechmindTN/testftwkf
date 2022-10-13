<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"

  "http://www.w3.org/TR/html4/strict.dtd">

<HTML lang="en" dir="ltr">

<HEAD>

 <title>FEDERATION TUNISIENNE DE WUSHU KUNG FU ET DISCIPLINES ASSOCIEES </TITLE> 

 <meta NAME="Author" CONTENT="Usager non enregistré"> 

  <meta http-equiv="Content-Type" content="text/html; charset= UTF8 "> 

  <meta NAME="Description" CONTENT=""> 

    <meta NAME="Keywords" CONTENT=""> 

     <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon" />

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

		

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<style>

	.login-container{

    margin-top: 5%;

    margin-bottom: 5%;

}

.login-form-1{

    padding: 5%;

    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);

}

.login-form-1 h3{

    text-align: center;

    color: #333;

}

.login-form-2{

    padding: 5%;

    background: #d4302a;

    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);

}

.login-form-2 h3{

    text-align: center;

    color: #fff;

}

.login-container form{

    padding: 10%;

}

.btnSubmit

{

    width: 49%;

    border-radius: 1rem;

    padding: 1.5%;

    border: none;

    cursor: pointer;

}

.login-form-1 .btnSubmit{

    font-weight: 400;

    color: #fff;

    background-color: #0062cc;

}

.login-form-2 .btnSubmit{

    font-weight: 600;

    color: #000000;

    background-color: #fff;

}

.login-form-2 .ForgetPwd{

    color: #fff;

    font-weight: 600;

    text-decoration: none;

}

.login-form-1 .ForgetPwd{

    color: #0062cc;

    font-weight: 600;

    text-decoration: none;

}

#outer

{

    width:100%;

    text-align: center;

}

img {

  display: block;

  margin-left: auto;

  margin-right: auto;

}

</style>

</HEAD>

<BODY>

	<?php

	session_start();

	$_SESSION['club']=null;

	?>

<p>

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





  



</p>

	



<div class="container login-container">

	<div class="row">

		<div class="col-md-6 login-form-1">

			<img  src="image/logo2.png" class="img-fluid" alt="Responsive image" width="400px">

		</div>

		<div class="col-md-6 login-form-2 ">

	<div class="row" style="float:right" >	<a href="index.php" style="color:#fff ;"><i class="fa fa-home fa-2xl" style="font-size:70px;float:right" aria-hidden="true"></i></a></div><br>

	

		<form  name="form1" method="post" action= "ident.php" >



				<h3>Connectez-vous </h3>

				<br>

				<div class="form-group">

					<input type="text" class="form-control" name="id" placeholder="Identifiant*" value=""  required/>

				</div>

				<div class="form-group">

					<input type="password" class="form-control" placeholder="Mot de passe *" value="" name="password" required />

				</div>

						

			<button type="submit" class="btnSubmit form-group">Identifier</button>

            <button type="button" class="btnSubmit form-group">Enregistrer</button>

	

				<div  class="form-group">



					<a href="#" class="ForgetPwd" value="Login">Mot de passe oublié?</a>

				</div>

			</form>

		</div>

	</div>

</div>

</body>