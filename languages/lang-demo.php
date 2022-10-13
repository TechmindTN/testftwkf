<?php
// (C) SET LANGUAGE INTO SESSION
session_start();
if (!isset($_SESSION["lang"])) { $_SESSION["lang"] = "en"; }
if (isset($_POST["lang"])) { $_SESSION["lang"] = $_POST["lang"]; }

// (D) LOAD LANGUAGE FILE
require "lang-" . $_SESSION["lang"] . ".php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?=$_TXT[0]?></title>
  </head>
  <body lang="<?=$_SESSION["lang"]?>">
    <!-- (B) SET LANGUAGE -->
    <form method="post">
      <input type="submit" name="lang" value="en"/>
      <input type="submit" name="lang" value="zh"/>
    </form>

    <!-- (A) SITE CONTENTS -->
    <header><?=$_TXT[1]?></header>
    <main><?=$_TXT[2]?></main>
    <footer><?=$_TXT[3]?></footer>
  </body>
</html>
