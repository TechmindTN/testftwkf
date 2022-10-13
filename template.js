



var lang = document.getElementById('lang').innerText;




// The active locale

const locale = lang;



const translations = {

  // French translations

  "fr": {

    "Acceuil":"Acceuil",

    "Saison": "Saison",

    "Athletes": "athletes",

    "Clubs": "Clubs",

    "Arbitres": "Arbitres",

    "Entraineurs": "Entraineurs",

    "Catégories":"Catégories",

    "Photos":"Photos",

    "Paiement":"Paiement",

    "Competitions": "Competitions",

    "Statistiques":"Statistiques",

    "Déja affiliés":"Déja affiliés",

    "En attente":"En attente",

    "Refusées ":"Refusées ",

    "Entraineurs a valider":"Entraineurs a valider",

    "Paiement a valider ":"Paiement a valider ",

    "Changer mot de passe":"Changer mot de passe",

    "Club par saison": "Club par saison",

    "Poids":"Poids",

    "Age":"Age",

    "Photos Staff":"Photos Staff",



  },

  // Arabic translations

  "ar": {

    "Acceuil":"الاستقبال",

    "Saison": "الموسم",

    "Athletes":"الرياضيين",

    "Clubs": " النوادي ",

    "Arbitres": "حكم",

    "Entraineurs": "المدربين",

    "Catégories":"التصنيفات",

    "Photos":"الصور",

    "Paiement":"دفع",

    "Competitions": "المسابقات",

    "Statistiques":"الاحصاء",

    "Déja affiliés":"المقبولين",

    "En attente":"في الانتظار",

    "Refusées ":"مرفوضين ",

    "Entraineurs a valider":"مدربين في الانتظار",  

    "Paiement a valider ":" التحقق من الدفع  ",

    "Changer mot de passe":     "تغيير كلمة السر",

    "Club par saison":  "النادي حسب الموسم",

    "Poids":"الوزن",

    "Age":"العمر",

    "Photos Staff":"صور الموظفين",





  },

};

// When the page content is ready...

document.addEventListener("DOMContentLoaded", () => {

  document

    // Find all elements that have the key attribute

    .querySelectorAll("[data-i18n-key]")

    .forEach(translateElement);

});

// Replace the inner text of the given HTML element

// with the translation in the active locale,

// corresponding to the element's data-i18n-key

function translateElement(element) {

  const key = element.getAttribute("data-i18n-key");

  const translation = translations[locale][key];

  element.innerText = translation;

}

let side=`



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>SB Admin 2 - Dashboard</title>



    <!-- Custom fonts for this template-->

    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

        rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">





<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion "  id="accordionSidebar" style="position:fixed; z-index:1">

<li  class="nav-item center-text" style="padding-top:15px " ><a href="accueil2.php"><img src="image/logo.png"  class="rounded mx-auto d-block" width="100">

</a></li>

<li id="adminhisto" class="nav-item">

<a class="nav-link" href="accueil2.php">

<i class="fa fa-home"></i>

<span data-i18n-key="Acceuil">Acceuil</span></a>

</li>

<li id="pw" class="nav-item">

<a class="nav-link" href="changepw.php">

<i class="fas fa-fw fa-wrench"></i>

<span data-i18n-key="Changer mot de passe">Modifier mot de passe</span></a>

</li>

<li id="adminsaison" class="nav-item">

<a class="nav-link" href="affsaison.php">

<i class="fas fa-fw fa-table"></i>

<span data-i18n-key="Saison">Saison</span></a>

</li>
<li class="nav-item">

<a class="nav-link" href="affprogramme.php">

<i class="fas fa-fw fa-table"></i>

<span data-i18n-key="Competitions">Competitions</span></a>

</li>


<li class="nav-item">

<a class="nav-link collapsed" href="affathlete.php" data-bs-toggle="collapse" data-bs-target="#collapseTwo"

aria-expanded="true" aria-controls="collapseTwo">

<i class="fas fa-fw fa-user"></i>

<span  data-i18n-key="Athletes">athletes</span>

</a>

<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

<div class="bg-white py-2 collapse-inner rounded">

<a class="collapse-item" href="affathlete.php" data-i18n-key="Déja affiliés">Déja affiliés</a>  

 <a class="collapse-item" href="affathletes.php" data-i18n-key="En attente">En attente</a>

<a class="collapse-item" href="affathletedel.php" data-i18n-key="Refusées ">Refusées</a>

</div>

</div>

</li>

<li id="adminclub" class="nav-item">

<a class="nav-link collapsed"  href="affclub.php" data-bs-toggle="collapse" data-bs-target="#collapseUtilities"

aria-expanded="true" aria-controls="collapseUtilities">

<i class="fas fa-fw fa-user"></i>

<span  data-i18n-key="Clubs">Clubs</span>

</a>

<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">

<div class="bg-white py-2 collapse-inner rounded">

<a class="collapse-item" href="affclub.php" data-i18n-key="Clubs">Club</a>

<a class="collapse-item" href="affclubs.php" data-i18n-key="Club par saison">Club par saison</a>

</div>

</div>

</li>



<li class="nav-item">

<a class="nav-link collapsed" href="affarbitre.php" data-bs-toggle="collapse" data-bs-target="#collapseUtilitiess"

aria-expanded="true" aria-controls="collapseUtilitiess">

<i class="fas fa-fw fa-user"></i>

<span data-i18n-key="Arbitres">Arbitres</span>

</a>

<div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilitiess" data-parent="#accordionSidebar">

<div class="bg-white py-2 collapse-inner rounded">

<a class="collapse-item" href="affarbitre.php" >liste des arbitres</a>

<a class="collapse-item" href="#">Demandes</a>

<a class="collapse-item" href="#">Refusées</a>

</div>

</div>

</li>



<li class="nav-item">

<a class="nav-link collapsed" href="affentraineur.php" data-bs-toggle="collapse" data-bs-target="#collapsePages"

aria-expanded="true" aria-controls="collapsePages">

<i class="fas fa-fw fa-user"></i>

<span data-i18n-key="Entraineurs"> Entraineurs</span>

</a>

<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

<div class="bg-white py-2 collapse-inner rounded">

<a class="collapse-item" href="affentraineur.php"  data-i18n-key="Entraineurs">Entraineurs</a>

<a class="collapse-item" href="affentraineurs.php"  data-i18n-key="Entraineurs a valider">Entraineurs a valider</a>



<div class="collapse-divider"></div>

</div>

</div>

</li>





<li id="admincat" class="nav-item">

<a class="nav-link collapsed" href="affparam.php" data-bs-toggle="collapse" data-bs-target="#collapseOnes"

aria-expanded="true" aria-controls="collapseTwo">

<i class="fas fa-fw fa-user"></i>

<span data-i18n-key="Catégories">Catégories</span>

</a>

<div id="collapseOnes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

<div class="bg-white py-2 collapse-inner rounded">

<a class="collapse-item" href="affparam.php" data-i18n-key="Poids">Poids</a>  

 <a class="collapse-item" href="affage.php" data-i18n-key="Age">Age</a>

</div>

</div>

</li>

<li id="adminph" class="nav-item">

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne"

aria-expanded="true" aria-controls="collapseTwo">

<i class="fas fa-fw fa-user"></i>

<span data-i18n-key="Photos">Photos</span>

</a>

<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

<div class="bg-white py-2 collapse-inner rounded">

<a class="collapse-item" href="listeph.php" data-i18n-key="Photos">Photos</a>  

 <a class="collapse-item" href="listephs.php" data-i18n-key="Photos Staff">Photos Staff</a>

</div>

</div>

</li>





<li class="nav-item">

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseThree"

aria-expanded="true" aria-controls="collapseTwo">

<i class="fas fa-fw fa-user"></i>

<span data-i18n-key="Paiement">Paiement</span>

</a>

<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

<div class="bg-white py-2 collapse-inner rounded">

<a class="collapse-item" href="affpaiement.php" data-i18n-key="Paiement">Paiement</a>  

 <a class="collapse-item" href="affpaiementt.php" data-i18n-key="Paiement a valider ">Paiement a valider    </a>

</div>

</div>

</li>
















<li class="nav-item">

<a class="nav-link" href="affstatistique.php">

<i class="fas fa-fw fa-chart-area"></i>

<span data-i18n-key="Statistiques">Statistiques</span></a>

</li>







</ul>







 <script src="assets/vendor/jquery/jquery.min.js"></script>

 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



 <!-- Core plugin JavaScript-->

 <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>



 <!-- Custom scripts for all pages-->

 <script src="assets/js/sb-admin-2.min.js"></script>



 <!-- Page level plugins -->

 <script src="assets/vendor/chart.js/Chart.min.js"></script>



 <!-- Page level custom scripts -->

 <script src="assets/js/demo/chart-area-demo.js"></script>

 <script src="assets/js/demo/chart-pie-demo.js"></script>`;











 document.getElementById('side').innerHTML=side;

//  alert("current");

 currentClub=document.getElementById('currentClub').innerText;

 if((currentClub != "ADMIN")&&(currentClub != "Admin")&&(currentClub != "admin")){

    document.getElementById('adminclub').style.display="none";

    document.getElementById('adminhisto').style.display="none";

    document.getElementById('adminsaison').style.display="none";

    document.getElementById('admincat').style.display="none";

    document.getElementById('adminph').style.display="none";

    // document.getElementById('filler').style.display="block";

    // document.getElementById('filler2').style.display="block";

    document.getElementById('pw').style.display="block";





 }

 else{

    document.getElementById('adminclub').style.display="block";

    document.getElementById('adminhisto').style.display="block";

    document.getElementById('adminsaison').style.display="block";

    document.getElementById('admincat').style.display="block";

    document.getElementById('adminph').style.display="block";

    // document.getElementById('filler').style.display="none";

    // document.getElementById('filler2').style.display="none";

    document.getElementById('pw').style.display="none";





 }





//  var sw = document.getElementById('sw').value;

