<?php



 define("SERVEUR","localhost");

 define("USER",'root');

 define("PASS",'');

 define("DB","ftwkfor1_basephp");

//define("SERVEUR","127.0.0.1");

//define("USER",'root');

//define("PASS",'');

//define("DB","kungfuwuyvlic");



$connexion=mysql_connect(SERVEUR, USER, PASS) or die("erreur de connexion au serveur mysql,verifiez vos param�tres club et password");

mysql_select_db(DB,$connexion) or die("erreur de la connexion a la BD");

mysql_query("SET NAMES 'UTF8' ");

?>





