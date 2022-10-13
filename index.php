<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<!-- *************************************************
        EDITEUR WEBEXPERT
        DATE DE CREATION: 21/12/2005
        DERNIERE MODIFICATION: 21/12/2005
************************************************** -->
<HTML>
<HEAD>
<TITLE>FTWKF</TITLE>
<META NAME="Author" CONTENT="Usager non enregistr�">
<META NAME="Description" CONTENT="">
<META NAME="Keywords" CONTENT="">
</HEAD>
<?php 
session_start();
if(isset($_SESSION['club'])and($_SESSION['club']!=null)){?>
      <script>  window.location.href="accueil2.php";
      </script>
<?php } ?>

<FRAMESET border =0 >
 
 <FRAME border =0 NAME="maine" SRC="accueil.html" scrolling=auto target="_self">
<NOFRAMES>

<BODY>


</BODY>
</NOFRAMES>
</FRAMESET>
</HTML>