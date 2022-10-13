<?php
$action_file="Sanstitre.php";
//début du programme
if (!isset($_POST['uname']) )
{
    myFormRequest();
}
    else
{
    $uname = $_POST['uname'];
    $first_name = $_POST['first_name'];
    $e_mail = $_POST['e_mail'];
    $comments = $_POST['comments'];
    if (empty($_POST['uname']) 
        or empty($_POST['e_mail']) or empty($_POST['first_name']))
    {
    if (empty($_POST['uname']))
    {
        echo "<font color=red>Il manque le patronyme!<br/></font>";
    }
    if (empty($_POST['first_name']))
    {
        echo "<font color=red>Il manque votre prénom!<br/></font>";
    }
    if (empty($_POST['e_mail']))
    {
        echo "<font color=red>Il manque l'email!<br/></font>";
    }
    myFormRequest($uname,$first_name,$e_mail,$comments);
    }
else
    {
        $mailTo = 'jpoulhes@hotmail.com' ;
        $mailSubject = "Demande d'abonnement" ;
        $mailBody = " Nom: ".$uname."\n Prènom: ".$first_name
            ."\n E mail: ".$e_mail."\n Commentaires: ".$comments ;
        $mailHeaders = "From : Site php_train\n" ;
        if (mail($mailTo, $mailSubject, $mailBody, $mailHeaders))
        {
        echo "Votre demande a bien été prise en compte : <p>" ;
        echo "<table>" ;
        echo "<tr><td>Nom (patronyme) :</td><td>".$uname."</td></tr>"; 
        echo "<tr><td>Prénom :</td><td>".$first_name."</td></tr>";
        echo "<tr><td>e mail :</td><td>".$e_mail."</td></tr>";
        echo "<tr><td>Commentaires :</td><td>".$comments."</td>
            </tr></table>";
        }
        else
        {
            echo "Désolé, il y a eu une erreur, le courrier 
            n'a pas pu être envoyé, 
            merci d'écrire à <b>jean-marie@poulhes.net" ;
        }
    }
}
//----------------------------------------
function myFormRequest($uname="",
$first_name="",$e_mail="",$comments="")
{
$action_file="show_exercises.php?exercise=lesson_07_application.php";
    echo "<table CELLSPACING=0 CELLPADDING=0>";
    echo "<TR><TD COLSPAN=2 CLASS=header>Saisissez les informations
       <br/> ci-après, puis cliquez sur 'ENVOYER'.<br/>&nbsp;</td></TR>";
    //nom
    echo "<TR CLASS=Alt1>";
    echo "<td>";
    echo "<form action=$action_file method=post>";
    echo "<b>&nbsp;&nbsp;&nbsp;Vos nom : <font color='red'>
        <big>*</big></font></td>"; 
    echo "<td><b><input type=text NAME=uname value=$uname >
        &nbsp;&nbsp;&nbsp;</td>";
    echo "</TR><TR CLASS=Alt1>";
    echo "</TR>" ;
    //prenom
    echo "<TR CLASS=Alt1>";
    echo "<td>";
    echo "<b>&nbsp;&nbsp;&nbsp;Prénom : <font color='red'><big>*
        </big></font></td></td>"; 
    echo "<td><b><input type=text NAME=first_name 
        value=$first_name>&nbsp;&nbsp;&nbsp;</td>";
    echo "</TR><TR CLASS=Alt1>";
    echo "</TR>" ;
    //
    echo "<TR CLASS=Alt1>";
    echo "<td><b>&nbsp;&nbsp;&nbsp;Mel : 
        <font color=red><big> * </big></font></td>"; 
    echo "<td><b><input type=text NAME=e_mail></td>";
    echo "</TR><TR CLASS=Alt1>";
    echo "</TR>";
    //
    echo "<TR CLASS=Alt1>";
    echo "<td>";
    echo "Commentaires:</td>"; 
    echo "<td><textarea name='comments' cols=20 rows=4>$comments
    </textarea> "; 
    echo "</TR>" ;
    echo "<tr CLASS=Alt1><TD COLSPAN=2><DIV align=RIGHT>
        <input type=submit NAME=club value=ENVOYER >
            &nbsp;&nbsp;&nbsp;</DIV></td></tr>";
    echo "";
    echo "<tr class=alt1><td colspan=2><font color='red'>*</font>: 
    Données nécessaires</td></tr></table><p>&nbsp;</p>";
}
?>