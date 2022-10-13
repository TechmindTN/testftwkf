function verif () 
{ 
if (document.forms['MForm'].nom.value == "") 
{ 
alert('Veuillez saisir votre nom') 
document.forms['MForm'].nom.focus(); 
return false; 
} 
if (document.forms['MForm'].prenom.value == "") 
{ 
alert('Veuillez saisir votre prénom') 
document.forms['MForm'].prenom.focus(); 
return false; 
} 
if (document.forms['MForm'].nom_e.value == "") 
{ 
alert('Veuillez saisir votre email') 
document.forms['MForm'].nom_e.focus(); 
return false; 
} 
else return true; 
} // JavaScript Document