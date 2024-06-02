<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Colis</title>
    <!-- Ajoutez Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Ajoutez Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            padding: 20px 0;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
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
            font-size: 2rem;
        }

        .logo-box .bx {
            font-size: 2.5rem;
            margin-right: 0.5rem;
        }

        .nav-link:hover {
            color: #482ff7;
        }

        .container-box {
            width: 97%;
            max-width: 1600px;
            margin: 90px auto;
            padding: 30px;
            font-size: 1.8rem;
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

        .profile-link {
            position: fixed;
            top: 80px;
            right: 30px;
        }

        .profile-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
        }

        .profile-modal {
            display: none;
            position: fixed;
            top: 150px;
            right: 25px;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            padding: 25px;
            width: 250px;
            animation: slideInRight 0.3s ease forwards;
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
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .username {
            font-weight: bold;
            font-size: 18px;
        }

        .profile-links a {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
        }

        .profile-links a i {
            margin-right: 5px;
        }

        .profile-links a:hover {
            color: #007bff;
        }

        .modal-enter {
            opacity: 0;
            transform: translateY(-10%);
        }

        .modal-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
        }

        .modal-exit {
            opacity: 1;
            transform: translateY(0);
        }

        .modal-exit-active {
            opacity: 0;
            transform: translateY(-10%);
            transition: opacity 0.3s ease-in, transform 0.3s ease-in;
        }

        .container {
            top: 50%;
        }

        .btn {
            font-size: 1.7rem;

        }

        .table-auto th,
        .table-auto td {
            font-size: 1.7rem;
            padding: 12px;
        }
        .b{
            font-size: 1.7rem;

        }
        #filterStatus {
    padding-left: 1rem; /* Ajustez le remplissage selon vos besoins */
    padding-right: 1rem; /* Ajustez le remplissage selon vos besoins */
    border-color: #3182ce; /* Couleur de la bordure */
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
            <a href="profil1.php"><i class="bx bx-user"></i> Gérer Profil</a>
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
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">LISTE DES COLIS</h2>
        <div>
        <label for="filterwilaya" class="mr-2">Filtrer par wilaya:</label>
        <select id="filterwilaya" class="px-4 py-2 border rounded-md">
                <option value="all">Toutes les wilayas</option> 
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
                <option value="Bordj Bou Arréridj">Bordj Bou Arréridj</option>
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
                <option value="El M'ghair">El M'ghair</option>
                <option value="El Menia">El Menia</option>
                <option value="Ouled Djellal">Ouled Djellal</option>
                <option value="Bordj Baji Mokhtar">Bordj Baji Mokhtar</option>
                <option value="Beni Abbès">Beni Abbès</option>
                <option value="Timimoun">Timimoun</option>
                <option value="Touggourt">Touggourt</option>
                <option value="Djanet">Djanet</option>
                <option value="In Salah">In Salah</option>
                <option value="In Guezzam">In Guezzam</option>
                <option value="Hassi Messaoud">Hassi Messaoud</option>
                <option value="El Ménéa">El Ménéa</option>
                <option value="In Aménas">In Aménas</option>
                <option value="El Goléa">El Goléa</option>
                <option value="El Guerrara">El Guerrara</option>
                <option value="In Ghar">In Ghar</option>
                <option value="Megarine">Megarine</option>
                <option value="Tindouf">Tindouf</option>
                <option value="Ain Sefra">Ain Sefra</option>
                <option value="El Marsa">El Marsa</option>
                <option value="Timokten">Timokten</option>
                <option value="Sidi Khouiled">Sidi Khouiled</option>
                <option value="Béni Saf">Béni Saf</option>
                <option value="Béni Snous">Béni Snous</option>
                <option value="Ouled Mimoun">Ouled Mimoun</option>
                <option value="El Kheither">El Kheither</option>
                <option value="Aïn Tallout">Aïn Tallout</option>
                <option value="Chetouane">Chetouane</option>
                <option value="Sidi Ali Benyoub">Sidi Ali Benyoub</option>
                <option value="Mers El Kébir">Mers El Kébir</option>
                <option value="Beni Bouateb">Beni Bouateb</option>
                <option value="Kerzaz">Kerzaz</option>
                <option value="Tamazgrout">Tamazgrout</option>
                <option value="Zag">Zag</option>
                <option value="El Ouata">El Ouata</option>
                <option value="El Emir Abdelkader">El Emir Abdelkader</option>
                <option value="Lardjem">Lardjem</option>
                <option value="Boukadir">Boukadir</option>
                <option value="Sidi Chami">Sidi Chami</option>
                <option value="Hasselboun">Hasselboun</option>
                <option value="El Marssa">El Marssa</option>
                <option value="Sidi Hamadouche">Sidi Hamadouche</option>
                <option value="Ain Tarek">Ain Tarek</option>
                <option value="Hammam Beni Salah">Hammam Beni Salah</option>
                <option value="Bou Henni">Bou Henni</option>
                <option value="El Hassi">El Hassi</option>
                <option value="El Atteuf">El Atteuf</option>
                <option value="Aïn El Hadjel">Aïn El Hadjel</option>
                <option value="Sidi Okba">Sidi Okba</option>
                <option value="El Borma">El Borma</option>
                <option value="Barika">Barika</option>
                <option value="Tolga">Tolga</option>
                <option value="Hassi Fehal">Hassi Fehal</option>
                <option value="Chehaima">Chehaima</option>
                <option value="Ksar Chellala">Ksar Chell

                </select>
        </div>
    </div>
    <div class="overflow-x-auto">
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 mb-8 text-xl">
            <!-- Boxes statut -->
            <a href="#?status=Échec" class="bg-red-500 text-white p-6 rounded-md h-full text-center text-2xl">Échec</a>
            <a href="#?status=Annulé" class="bg-yellow-500 text-white p-6 rounded-md h-full text-center text-2xl">Annulé</a>
            <a href="#?status=En traitement" class="bg-blue-500 text-white p-6 rounded-md h-full text-center text-2xl">En traitement</a>
            <a href="#?status=En préparation" class="bg-green-500 text-white p-6 rounded-md h-full text-center text-2xl">En préparation</a>
            <a href="#?status=En transit" class="bg-red-500 text-white p-6 rounded-md h-full text-center text-2xl">En transit</a>
            <a href="#?status=En cours" class="bg-yellow-500 text-white p-6 rounded-md h-full text-center text-2xl">En cours</a>
            <a href="#?status=Dispatché" class="bg-blue-500 text-white p-6 rounded-md h-full text-center text-2xl">Dispatché</a>
            <a href="#?status=Au bureau" class="bg-green-500 text-white p-6 rounded-md h-full text-center text-2xl">Au bureau</a>
            <a href="#?status=En Sortie" class="bg-red-500 text-white p-6 rounded-md h-full text-center text-2xl">En Sortie</a>
            <a href="#?status=Sortie en livraison" class="bg-yellow-500 text-white p-6 rounded-md h-full text-center text-2xl">Sortie en livraison</a>
            <a href="#?status=Livré" class="bg-blue-500 text-white p-6 rounded-md h-full text-center text-2xl">Livré</a>
            <a href="#?status=Échec 1" class="bg-green-500 text-white p-6 rounded-md h-full text-center text-2xl">Échec 1</a>
            <a href="#?status=Échec 2" class="bg-red-500 text-white p-6 rounded-md h-full text-center text-2xl">Échec 2</a>
            <a href="#?status=Échec 3" class="bg-yellow-500 text-white p-6 rounded-md h-full text-center text-2xl">Échec 3</a>
            <a href="#?status=Distinataire refusé" class="bg-blue-500 text-white p-6 rounded-md h-full text-center text-2xl">Distinataire refusé</a>
            <a href="#?status=Retour a l'expiditeur" class="bg-green-500 text-white p-6 rounded-md h-full text-center text-2xl">Retour a l'expiditeur</a>
        </div>
        
    </div>

    <!-- Ajouter une marge supérieure ici -->
    <div class="overflow-x-auto mt-8">
        <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-blue-200">
            <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nom du Produit</th>
                    <th class="px-4 py-2">Nom du Client</th>
                    <th class="px-4 py-2">Telephone</th>
                    <th class="px-4 py-2">Adresse</th>
                    <th class="px-4 py-2">Wilaya</th>
                    <th class="px-4 py-2">Prix de Livraison</th>
                    <th class="px-4 py-2">Statut</th>
                    <th class="px-4 py-2">Date de Création</th>
                    <th class="px-4 py-2">Action</th>

                  
                </tr>
            </thead>
            <tbody>
                <!-- Données des colis -->
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
                // Requête SQL pour mettre à jour tous les statuts à "Initialisation"
$sql_update = "UPDATE colis SET statut='Initialisation'";

             // Query to fetch colis data
$sql = "SELECT * FROM colis";
$result = $conn->query($sql);

                // Display colis data including the seller's name
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='px-4 py-2 text-center'>" . $row["id"] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row["nom_produit"] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row["nom_client"] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row["telephone"] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row["adresse"] . "</td>";
                        echo "<td class='px-4 py-2 text-center wilaya-column'>" . $row["wilaya"] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>" . $row["prix_livraison"] . "</td>";
                        echo "<td class='optionColumn px-4 py-2 text-center'>" . $row["statut"] . "</td>"; // Placeholder for option column
                        echo "<td class='px-4 py-2 text-center'>" . $row["date_creation"] . "</td>";
                        echo "<td class='px-4 py-2 text-center'>";
                        echo '<a class="text-center btn btn-danger mr-2 py-1 px-2 rounded-md bg-red-500 text-white hover:bg-red-600" href="/CRM/deletecolis.php?id=' . $row["id"] . '">Supprimer</a>';
                        echo '<button class="text-center btn btn-parameter py-1 px-2 rounded-md bg-gray-500 text-white hover:bg-gray-600 parameter-btn" data-id="' . $row["id"] . '"><i class="fas fa-cog"></i></button>'; // Parameter button with icon
                        echo '<div class="flex justify-center">'; // Center the buttons
                        echo '</div>';
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Aucun coli trouvé</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

    
    <!-- Modal -->
    <div id="statusModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
        <div id="modalContent" class="bg-white p-8 rounded-lg shadow-lg w-1/3 modal-enter">
        <span class="absolute top-0 right-0 p-2 cursor-pointer" id="closeModal">
          <i class="fas fa-times text-gray-600"></i> <!-- Vous pouvez remplacer "fas fa-times" par l'icône de votre choix -->
        </span>
            <h2 class="text-xl font-bold mb-4">Changer le statut du colis</h2>
            <form id="statusForm" method="POST">
                <input type="hidden" name="colis_id" id="colisId">
                <div class="mb-4">
                    <label for="statut" class="block text-gray-700">Nouveau statut:</label>
                 <select name="statut" id="statut" class="w-full px-4 py-2 border border-gray-300 rounded-md">
                    <option value="Échec">Échec</option>
                    <option value="Annulé">Annulé</option>
                    <option value="En traitement">En traitement</option>
                    <option value="En préparation">En préparation</option>
                    <option value="En transit">En transit</option>
                    <option value="En cours">En cours</option>
                    <option value="Dispatché">Dispatché</option>
                    <option value="Au bureau">Au bureau</option>
                    <option value="En Sortie">En Sortie</option>
                    <option value="Sortie en livraison">Sortie en livraison</option>
                    <option value="Livré">Livré</option>
                    <option value="Échec 1">Échec 1</option>
                    <option value="Échec 2">Échec 2</option>
                    <option value="Échec 3">Échec 3</option>
                    <option value="Distinataire refusé">Destinataire refusé</option>
                    <option value="Retour à l'expéditeur">Retour à l'expéditeur</option>
                </select>

            </div>

                <div class="flex justify-end">
                    <button type="button" class="mr-4 py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-600" id="cancelButton">Annuler</button>
                    <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    // Open modal when clicking the parameter button
    $('.parameter-btn').on('click', function() {
        var id = $(this).data('id');
        $('#colisId').val(id);
        $('#statusModal').removeClass('hidden').addClass('flex');
        $('#modalContent').removeClass('modal-exit modal-exit-active').addClass('modal-enter-active');
    });

    // Close modal when clicking the close button or anywhere outside the modal
    $('#closeModal').on('click', function() {
        close_modal();
    });

    // Function to close modal
    function close_modal() {
        $('#modalContent').removeClass('modal-enter-active').addClass('modal-exit-active');
        setTimeout(function() {
            $('#statusModal').removeClass('flex').addClass('hidden');
        }, 300); // Match this duration to the exit transition duration
    }
// Submit form data via AJAX
$('#statusForm').submit(function(e) {
    e.preventDefault(); // Prevent form submission
    var formData = $(this).serialize(); // Serialize form data
    $.ajax({
        type: 'POST',
        url: 'update_status.php', // URL to send the data
        data: formData,
        success: function(response) {
            // Update status in the table
            var newStatus = $('#status option:selected').text(); // Get the text of the selected option
            var colisId = $('#colisId').val();
            $('#statusModal').removeClass('flex').addClass('hidden');
            // Update status column in the table
            $('td.optionColumn[data-id="' + colisId + '"]').text(newStatus);
            // Optionally, you can display a message or perform other actions upon success
            console.log(response);
            // You may want to reload the page or update the status column in the table here
            window.location.reload();
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });
});

});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const filterStatus = document.getElementById("filterStatus");
    filterStatus.addEventListener("change", function () {
        const selectedStatus = this.value;
        const rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const status = row.querySelector(".optionColumn").textContent.trim();
            if (selectedStatus === "all" || status === selectedStatus) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});
</script>
<script src="home page/script.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const filterwilaya = document.getElementById("filterwilaya");
    filterwilaya.addEventListener("change", function () {
        const selectedwilaya = this.value;
        const rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const wilaya = row.querySelector(".wilaya-column").textContent.trim(); // Utilize the correct class
            if (selectedwilaya === "all" || wilaya === selectedwilaya) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});
</script>

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
</body>
</html>

