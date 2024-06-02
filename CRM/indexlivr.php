<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home page/style.css">

    <style>
 
        body {
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #333;
            width: 100%;
            padding: 15px 0px;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }

        .logo-box {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #fff;
        }

        .logo-box:hover {
            color: #482ff7;
        }

        .logo-name {
            margin-left: 1rem;
            font-size: 1.7rem;
        }

        .logo-box .bx {
            font-size: 2rem;
            margin-right: 0.5rem;
        }

        

        .nav-link:hover {
            color: #482ff7;
        }

        .container-box {
            width: 100%;
            max-width: 1400px;
            margin: 130px auto;
            padding: 20px;
            font-size:1.7rem;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #FFF;
            transition: box-shadow 0.3s ease;
        }

        .container-box:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .submenu {
    display: none;
    position: absolute;
    background-color: #333;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.submenu a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: 5px 0;
    transition: background-color 0.3s;
}

.submenu a:hover {
    background-color: #555;
}

.show-submenu {
    display: block;
}
 /* Styles for the circular profile image */
 .profile-link {
            position: fixed;
            top: 70px; /* Adjust as needed */
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
    top: 130px;
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
</head>

<body class="bg-gray-50">
    <header class="header">
        <nav class="navbar">
            <a href="#" class="logo-box">
                <i class='bx bxl-xing'></i>
                <div class="logo-name">Welcome, <?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : 'User'; ?></div>
            </a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="home page/indexhome.php" class="nav-link">Acceuil</a>
                </li>
                <li class="nav-item">
                    <a href="homep.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link submenu-title">Gestion Utilisateurs</a>
                    <div class="submenu">
                        <a href="index2.php" class="link gestion-admins">Gestion Admins</a>
                        <a href="index1.php" class="link gestion-clients">Gestion Clients</a>
                        <a href="indexcomp.php" class="link gestion-comptables">Gestion Comptables</a>
                        <a href="indexvend.php" class="link gestion-vendeur">Gestion Vendeurs</a>
                        <a href="indexlivr.php" class="link gestion-livreur">Gestion Livreurs</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="indexcolisadmine.php" class="nav-link">Gestion des colis</a>
                </li>
                <li class="nav-item">
                    <a href="indexpai.php" class="nav-link">Gestion des paiements</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <div class="profile-link">
                <img src="assets/img/img.png" alt="Profile Image" class="profile-image" id="profileImage">
            </div>
             <div class="profile-modal" id="profileModal">
        <div class="profile-info">
        <img src="assets/img/img.png" alt="Profile Image" class="profile-image">
            <span class="username"><?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : 'User'; ?></span>
        </div>
        <div class="profile-links">
            <!-- Ajoutez des icônes à gauche des liens -->
            <a href="profil.php"><i class="bx bx-user"></i> Gérer Profil</a>
            <a href="logout.php"><i class="bx bx-log-out"></i> Déconnexion</a>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const profileImage = document.getElementById("profileImage");
            const profileModal = document.getElementById("profileModal");

            // Function to toggle the profile modal visibility
            function toggleProfileModal() {
                if (profileModal.style.display === "block") {
                    profileModal.style.display = "none";
                } else {
                    profileModal.style.display = "block";
                }
            }

            // Show/Hide profile modal on profile image click
            profileImage.addEventListener("click", toggleProfileModal);

            // Hide profile modal when clicking outside of it
            window.addEventListener("click", function(event) {
                if (event.target !== profileImage && !profileModal.contains(event.target)) {
                    profileModal.style.display = "none";
                }
            });
        });
    </script>

    <div class="container-box mx-auto py-8">
        <h2 class="text-3xl font-bold mb-6 text-center">LISTE DES LIVREURS</h2>
        <a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block" href="/CRM/creatlivr.php" role="button">Ajouter un livreur</a>
        <div>
                <label for="filterWilaya">Filtrer par wilaya:</label>
                <select id="filterWilaya" class="px-4 py-2 border rounded-md">
                    <option value="">Toutes les wilayas</option>
                    <option value="Adrar">Adrar</option>
                    <option value="Chlef">Chlef</option>
                    <option value="Laghouat">Laghouat</option>
                    <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                    <option value="Batna">Batna</option>
                    <option value="Béjaïa">Béjaïa</option>
                    <option value="Biskra">Biskra</option>
                    <option value="Béchar">Béchar</option>
                    <option value="Blida">Blida</option>
                    <option value="Bouira">Bouira</option>
                    <option value="Tamanrasset">Tamanrasset</option>
                    <option value="Tébessa">Tébessa</option>
                    <option value="Tlemcen">Tlemcen</option>
                    <option value="Tiaret">Tiaret</option>
                    <option value="Tizi Ouzou">Tizi Ouzou</option>
                    <option value="Alger">Alger</option>
                    <option value="Djelfa">Djelfa</option>
                    <option value="Jijel">Jijel</option>
                    <option value="Sétif">Sétif</option>
                    <option value="Saïda">Saïda</option>
                    <option value="Skikda">Skikda</option>
                    <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                    <option value="Annaba">Annaba</option>
                    <option value="Guelma">Guelma</option>
                    <option value="Constantine">Constantine</option>
                    <option value="Médéa">Médéa</option>
                    <option value="Mostaganem">Mostaganem</option>
                    <option value="M'Sila">M'Sila</option>
                    <option value="Mascara">Mascara</option>
                    <option value="Ouargla">Ouargla</option>
                    <option value="Oran">Oran</option>
                    <option value="El Bayadh">El Bayadh</option>
                    <option value="Illizi">Illizi</option>
                    <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                    <option value="Boumerdès">Boumerdès</option>
                    <option value="El Tarf">El Tarf</option>
                    <option value="Tindouf">Tindouf</option>
                    <option value="Tissemsilt">Tissemsilt</option>
                    <option value="El Oued">El Oued</option>
                    <option value="Khenchela">Khenchela</option>
                    <option value="Souk Ahras">Souk Ahras</option>
                    <option value="Tipaza">Tipaza</option>
                    <option value="Mila">Mila</option>
                    <option value="Aïn Defla">Aïn Defla</option>
                    <option value="Naâma">Naâma</option>
                    <option value="Aïn Témouchent">Aïn Témouchent</option>
                    <option value="Ghardaïa">Ghardaïa</option>
                    <option value="Relizane">Relizane</option>
                    <option value="Timimoun">Timimoun</option>
                    <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar</option>
                    <option value="Ouled Djellal">Ouled Djellal</option>
                    <option value="Béni Abbès">Béni Abbès</option>
                    <option value="In Salah">In Salah</option>
                    <option value="In Guezzam">In Guezzam</option>
                    <option value="Touggourt">Touggourt</option>
                    <option value="Djanet">Djanet</option>
                    <option value="El M'Ghair">El M'Ghair</option>
                    <option value="El Menia">El Menia</option>
                </select>
            </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Wilaya</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Téléphone</th>
                        <th class="px-4 py-2">Bureau</th>
                        <th class="px-4 py-2">date_creation</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- PHP logic for fetching admin data -->
                    <?php
                    // Database credentials
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fichier";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query to fetch admin data
                    $sql = "SELECT * FROM livreur";
                    $result = $conn->query($sql);

                    // Display admin data
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2 text-center'>" . $row["id"] . "</td>";
                            echo "<td class='px-4 py-2 text-center'>" . $row["nom"] . "</td>";
                            echo "<td class='px-4 py-2 text-center'>" . $row["prenom"] . "</td>";
                            echo "<td class='px-4 py-2 text-center wilaya-column'>" . $row["wilaya"] . "</td>";
                            echo "<td class='px-4 py-2 text-center'>" . $row["email"] . "</td>";
                            echo "<td class='px-4 py-2 text-center'>" . $row["telephone"] . "</td>";
                            echo "<td class='px-4 py-2 text-center'>" . $row["bureau"] . "</td>";
                            echo "<td class='px-4 py-2 text-center'>" . $row["date_creation"] . "</td>";
                            echo "<td class='px-4 py-2 text-center'>";
                            echo '<div class="flex justify-center">'; // Centrer les boutons
                            echo '<a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600" href="/CRM/editlivr.php?id=' . $row["id"] . '">Modifier</a>';
                            echo '<a class="btn btn-danger py-1 px-2 rounded-md bg-red-500 text-white hover:bg-red-600" href="/CRM/deletelivr.php?id=' . $row["id"] . '">Supprimer</a>';
                            echo '</div>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Aucun livreur trouvé</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="home page/script.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const submenuTitle = document.querySelector(".submenu-title");
        const submenu = document.querySelector(".submenu");

        submenuTitle.addEventListener("click", toggleSubmenu);

        function toggleSubmenu() {
            submenu.classList.toggle("show-submenu");
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterWilaya = document.getElementById("filterWilaya");

        function applyFilters() {
            const selectedWilaya = filterWilaya.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const wilaya = row.querySelector(".wilaya-column").textContent.trim().toLowerCase();
                const wilayaMatch = !selectedWilaya || wilaya === selectedWilaya;

                if (wilayaMatch) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        filterWilaya.addEventListener("change", applyFilters);
    });
</script>

</html>

