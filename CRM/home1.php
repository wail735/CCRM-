<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/kxp_fav.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Styles for centering the message */
        .center-message {
    position: fixed;
    top: 50%;
    left: 55%;
    transform: translate(-50%, -50%);
    background-color: #f3f4f6; /* Couleur de fond légèrement grise */
    color: #333333; /* Texte noir */
    padding: 20px;
    border-radius: 12px; /* Coins arrondis plus prononcés */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
    z-index: 9999;
    width: 75%; /* Largeur ajustée */
}

        .logo-name{
            font-size: 15px;
            font-weight: 600;
        }
        /* Styles for the circular profile image */
        .profile-link {
            position: fixed;
            top: 20px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
        }

        .profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

      /* Styles for the profile modal */
.profile-modal {
    display: none;
    position: fixed;
    top: 80px;
    right: 17px;
    background-color: #ffffff;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    padding: 20px;
    width: 200px; /* Ajustez la largeur selon vos besoins */
    animation: slideInRight 0.3s ease forwards; /* Animation d'apparition */
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.profile-info {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.profile-info img {
    width: 50px; /* Ajustez la taille de l'image de profil */
    height: 50px;
    border-radius: 50%; /* Pour un aspect arrondi */
    object-fit: cover; /* Pour couvrir la zone avec l'image */
    margin-right: 10px;
}

.username {
    font-weight: bold;
    font-size: 16px; /* Ajustez la taille de la police */
}

.profile-links a {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    text-decoration: none;
    color: #333;
}

.profile-links a i {
    margin-right: 5px; /* Espace entre l'icône et le texte */
}

.profile-links a:hover {
    color: #007bff; /* Couleur au survol */
}

    </style>
    <!-- Ajoutez ce script dans la section head de votre fichier home1.php -->


</head>

<body>

    <div class="sidebar close">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bxl-xing'></i>
            <div class="logo-name">Welcome, <?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : 'User'; ?></div>
        </a>
        <a href="#" class="profile-link">
            <img src="assets/img/img.png" alt="Profile Image" class="profile-image">
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                <a href="#" class="link dashboard-link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Gestion Utilisateurs</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Gestion Utilisateurs</a>
                    <a href="#" class="link gestion-admins" >Gestion Admins</a>
                    <a href="#" class="link gestion-clients">Gestion Clients</a>
                    <a href="#" class="link gestion-comptables">Gestion Comptables</a>
                    <a href="#" class="link gestion-vendeur">Gestion Vendeurs</a>
                    <a href="#" class="link gestion-livreur">Gestion Livreurs</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link gestion-colis">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Gestion des colis</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link gestion-paie">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="name">Gestion des paiements</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-compass'></i>
                        <span class="name">Explore</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-history'></i>
                        <span class="name">History</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-cog'></i>
                        <span class="name">parametres</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <!-- Boîte modale pour afficher les informations de l'utilisateur -->
    <div class="profile-modal" style="display: none;">
        <div class="profile-info">
        <img src="assets/img/img.png" alt="Profile Image" class="profile-image" id="profileImage">
            <span class="username"><?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : 'User'; ?></span>
        </div>
        <div class="profile-links">
            <!-- Ajoutez des icônes à gauche des liens -->
            <a href="profil.php"><i class="bx bx-user"></i> Gérer Profil</a>
            <a href="logout.php"><i class="bx bx-log-out"></i> Déconnexion</a>
        </div>
    </div>
    <div id="chart-container"></div>

    <!-- ============= Home Section =============== -->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">CRM</div>
        </div>
    </section>
    <script>
        // Fonction pour afficher la boîte de confirmation
        function showConfirmationBox(clientId) {
            // Affichez une boîte de confirmation avec deux boutons "Ok" et "Annuler"
            const confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce client ?");
            if (confirmation) {
                // Si l'utilisateur clique sur "Ok", redirigez-le vers la page de suppression du client avec l'identifiant
                window.location.href = '/CRM/delete.php?id=' + clientId;
            }
        }

        // Sélectionnez tous les liens "Supprimer"
        const deleteClientLinks = document.querySelectorAll('.delete-client');

        // Ajoutez un gestionnaire d'événements à chaque lien "Supprimer"
        deleteClientLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                // Empêchez le comportement par défaut du lien
                event.preventDefault();
                // Obtenez l'identifiant du client à supprimer à partir de l'attribut data-id
                const clientId = this.getAttribute('data-id');
                // Appelez la fonction pour afficher la boîte de confirmation
                showConfirmationBox(clientId);
            });
        });
    </script>
<script>
// Variables pour suivre si le contenu de chaque page a déjà été chargé
let index1Loaded = false;
let index2Loaded = false;
let index3Loaded = false;
let index4Loaded = false;
let index5Loaded = false;
let index6Loaded = false;
let chartLoaded = false; // Variable pour suivre si le contenu de chart.php a déjà été chargé

// Fonction AJAX pour charger le contenu de index1.php
function loadIndex1Content() {
    // Réinitialiser l'indicateur de chargement pour le contenu de index1.php
    index1Loaded = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de index1.php
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-1'); // Ajouter une classe spécifique pour identifier le contenu de index1.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            index1Loaded = true; // Mettre à jour l'indicateur de chargement
            updateActiveLink('.gestion-clients'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "index1.php", true);
    xhttp.send();
}

// Fonction AJAX pour charger le contenu de index2.php
function loadIndex2Content() {
    // Réinitialiser l'indicateur de chargement pour le contenu de index2.php
    index2Loaded = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de index2.php
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-2'); // Ajouter une classe spécifique pour identifier le contenu de index2.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            index2Loaded = true; // Mettre à jour l'indicateur de chargement
            updateActiveLink('.gestion-admins'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "index2.php", true);
    xhttp.send();
}

// Fonction AJAX pour charger le contenu de index3.php
function loadIndex3Content() {
    // Réinitialiser l'indicateur de chargement pour le contenu de index3.php
    index3Loaded = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de index3.php
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-3'); // Ajouter une classe spécifique pour identifier le contenu de index3.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            index3Loaded = true; // Mettre à jour l'indicateur de chargement
            updateActiveLink('.gestion-comptables'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "indexcomp.php", true);
    xhttp.send();
}

// Fonction AJAX pour charger le contenu de index4.php
function loadIndex4Content() {
    // Réinitialiser l'indicateur de chargement pour le contenu de index4.php
    index4Loaded = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de index4.php
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-4'); // Ajouter une classe spécifique pour identifier le contenu de index4.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            index4Loaded = true; // Mettre à jour l'indicateur de chargement
            updateActiveLink('.gestion-vendeur'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "indexvend.php", true);
    xhttp.send();
}

// Fonction AJAX pour charger le contenu de index5.php
function loadIndex5Content() {
    // Réinitialiser l'indicateur de chargement pour le contenu de index5.php
    index5Loaded = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de index5.php
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-5'); // Ajouter une classe spécifique pour identifier le contenu de index5.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            index5Loaded = true; // Mettre à jour l'indicateur de chargement
            updateActiveLink('.gestion-livreur'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "indexlivr.php", true);
    xhttp.send();
}


function loadIndex6Content() {
    // Réinitialiser l'indicateur de chargement pour le contenu de index6.php
    index6Loaded = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de index6.php (indexcolis.php)
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-6'); // Ajouter une classe spécifique pour identifier le contenu de index6.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            index6Loaded = true; // Mettre à jour l'indicateur de chargement
            
            // Afficher le modal après avoir chargé le contenu
            showStatusModal(); // Fonction pour afficher le modal (voir ci-dessous)
            
            updateActiveLink('.gestion-colis'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "indexcolis.php", true);
    xhttp.send();
}


// Fonction AJAX pour charger le contenu de index4.php
function loadIndex7Content() {
    // Réinitialiser l'indicateur de chargement pour le contenu de index4.php
    index7Loaded = false;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de index4.php
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-7'); // Ajouter une classe spécifique pour identifier le contenu de index4.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            index4Loaded = true; // Mettre à jour l'indicateur de chargement
            updateActiveLink('.gestion-paie'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "indexpai.php", true);
    xhttp.send();
}

// Fonction AJAX pour charger le contenu de chart.php
function loadChartContent() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Supprimer le contenu des autres pages s'il existe
            removeOtherContents();
            // Créer et ajouter le contenu de chart.php
            var centerMessage = document.createElement('div');
            centerMessage.classList.add('center-message', 'center-message-chart'); // Ajouter une classe spécifique pour identifier le contenu de chart.php
            centerMessage.innerHTML = this.responseText;
            document.body.appendChild(centerMessage);
            chartLoaded = true; // Mettre à jour l'indicateur de chargement
            updateActiveLink('.dashboard-link'); // Mettre à jour le lien actif dans la barre latérale
        }
    };
    xhttp.open("GET", "chart.php", true);
    xhttp.send();
}

// Fonction pour supprimer le contenu des autres pages
function removeOtherContents() {
    var centerMessage1 = document.querySelector('.center-message-1');
    var centerMessage2 = document.querySelector('.center-message-2');
    var centerMessage3 = document.querySelector('.center-message-3');
    var centerMessage4 = document.querySelector('.center-message-4');
    var centerMessage5 = document.querySelector('.center-message-5');
    var centerMessage6 = document.querySelector('.center-message-6');
    var centerMessage7 = document.querySelector('.center-message-7');
    var centerMessageChart = document.querySelector('.center-message-chart'); 
    if (centerMessage1) {
        centerMessage1.remove();
    }
    if (centerMessage2) {
        centerMessage2.remove();
    }
    if (centerMessage3) {
        centerMessage3.remove();
    }
    if (centerMessage4) {
        centerMessage4.remove();
    }
    if (centerMessage5) {
        centerMessage5.remove();
    }
    if (centerMessage6) {
        centerMessage6.remove();
    }
    if (centerMessageChart) { 
        centerMessageChart.remove();
    }
    if (centerMessage7) {
        centerMessage7.remove();
    }
}

// Fonction pour mettre à jour le lien actif dans la barre latérale
function updateActiveLink(selector) {
    var links = document.querySelectorAll('.sidebar-list li');
    links.forEach(link => {
        link.classList.remove('active');
    });
    document.querySelector(selector).classList.add('active');
}

// Sélectionnez les liens pour charger le contenu des différentes pages
var gestionClientsLink = document.querySelector('.gestion-clients');
var gestionAdminsLink = document.querySelector('.gestion-admins');
var gestioncomptsLink = document.querySelector('.gestion-comptables');
var gestionvendeursLink = document.querySelector('.gestion-vendeur');
var gestioncolisLink = document.querySelector('.gestion-colis');
var gestionlivreursLink = document.querySelector('.gestion-livreur');
var dashboardLink = document.querySelector('.dashboard-link'); 
var gestionPaieslink = document.querySelector('.gestion-paie'); 

// Ajoutez des gestionnaires d'événements pour détecter les clics sur les liens correspondants
gestionClientsLink.addEventListener('click', function(event) {
    event.preventDefault();
    loadIndex1Content();
});

gestionAdminsLink.addEventListener('click', function(event) {
    event.preventDefault();
    loadIndex2Content();
});

gestioncomptsLink.addEventListener('click', function(event) {
    event.preventDefault();
    loadIndex3Content();
});

gestionvendeursLink.addEventListener('click', function(event) {
    event.preventDefault();
    loadIndex4Content();
});

gestioncolisLink.addEventListener('click', function(event) {
    event.preventDefault();
    loadIndex6Content();
});
gestionPaieslink.addEventListener('click', function(event) {
    event.preventDefault();
    loadIndex7Content();
});
gestionlivreursLink.addEventListener('click', function(event) {
    event.preventDefault();
    loadIndex5Content();
});

dashboardLink.addEventListener('click', function(event) { // Ajouter un gestionnaire d'événements pour le lien du Dashboard
    event.preventDefault();
    loadChartContent();
});

</script>

 <!-- JavaScript pour afficher la boîte modale -->
 <script>
        const profileLink = document.querySelector('.profile-link');
        const profileModal = document.querySelector('.profile-modal');

        profileLink.addEventListener('click', (event) => {
            event.preventDefault();
            profileModal.style.display = 'block';
        });
    </script>
<script>
        const listItems = document.querySelectorAll(".sidebar-list li");

        listItems.forEach((item) => {
            item.addEventListener("click", () => {
                let isActive = item.classList.contains("active");

                listItems.forEach((el) => {
                    el.classList.remove("active");
                });

                if (!isActive) item.classList.add("active");
            });
        });

        const toggleSidebar = document.querySelector(".toggle-sidebar");
        const logo = document.querySelector(".logo-box");
        const sidebar = document.querySelector(".sidebar");

        toggleSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        logo.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
 


</body>

</html>



