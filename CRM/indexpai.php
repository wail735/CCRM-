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
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">LISTE DES PAIEMENTS</h2>
        <div>
            <label for="filterStatus" class="mr-2">Filtrer par statut:</label>
            <select id="filterStatus" class="px-4 py-2 border rounded-md">
                <option value="En attente">En attente</option>
                <option value="En attente de retrait">En attente de retrait</option>
                <option value="Recu">Recu</option>
            </select>
        </div>
    </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-blue-200">
                    <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Wilaya</th>
                            <th class="px-4 py-2">Prix</th>
                            <th class="px-4 py-2">Prix de livraison</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date De Creation</th>
                            <th class="px-4 py-2">Action</th>
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
                    $sql = "SELECT * FROM paiement";
                    $result = $conn->query($sql);

                    // Display admin data
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='px-4  py-2 text-center'>" . $row["id"] . "</td>";
                                echo "<td class='px-4 py-2 text-center'>" . $row["wilaya"] . "</td>";
                                echo "<td class='px-4 py-2 text-center'>" . $row["Prix"] . "</td>"; // Display the seller's name
                                echo "<td class='px-4 py-2 text-center'>" . $row["Prix_livraison"] . "</td>";
                                echo "<td class='optionColumn px-4 py-2 text-center'>" . $row["status"] . "</td>"; // Placeholder for option column
                                echo "<td class='px-4 py-2 text-center'>" . $row["date_creation"] . "</td>";
                                echo "<td class='px-4 py-2 text-center'>";
                                echo '<div class="flex justify-center">'; // Center the buttons
                                echo '<button class="text-center btn btn-parameter py-1 px-2 rounded-md bg-gray-500 text-white hover:bg-gray-600 parameter-btn" data-id="' . $row["id"] . '"><i class="fas fa-cog"></i></button>'; // Parameter button with icon
                                echo '</div>';
                                echo "</td>";
                                echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Aucun paiement trouvé</td></tr>";
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
           
            <h2 class="text-xl font-bold mb-4">Changer le statut du paiement</h2>
            <form id="statusForm" method="POST">
                <input type="hidden" name="paie_id" id="paieId">
                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Nouveau statut:</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md">
                        <option value="initialisation">initialisation</option>
                        <option value="En attente">En attente</option>
                        <option value="confirmé">confirmé</option>
                        <option value="En attente de retrait">En attente de retrait</option>
                        <option value="Recu">Recu</option>
                    </select>
                </div>
       
                
            </form>
        </div>
    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
  
            // Modal functionality
            $('.parameter-btn').on('click', function () {
                var id = $(this).data('id');
                $('#paieId').val(id);
                $('#statusModal').removeClass('hidden').addClass('flex');
                $('#modalContent').removeClass('modal-exit modal-exit-active').addClass('modal-enter-active');
            });

            $('#closeModal').on('click', function () {
                close_modal();
            });

            function close_modal() {
                $('#modalContent').removeClass('modal-enter-active').addClass('modal-exit-active');
                setTimeout(function () {
                    $('#statusModal').removeClass('flex').addClass('hidden');
                }, 300);
            }

            // Submit form data via AJAX
            $('#statusForm').submit(function (e) {
                e.preventDefault(); // Prevent form submission
                var formData = $(this).serialize(); // Serialize form data
                $.ajax({
                    type: 'POST',
                    url: 'update_status1.php', // URL to send the data
                    data: formData,
                    success: function (response) {
                        // Update status in the table
                        var newStatus = $('#status').val();
                        var paieId = $('#paieId').val();
                        $('#statusModal').removeClass('flex').addClass('hidden');
                        $('.optionColumn[data-id="' + paieId + '"]').text(newStatus);
                        // Optionally, you can display a message or perform other actions upon success
                        console.log(response);
                        // You may want to reload the page or update the status column in the table here
                    },
                    error: function (xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
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
</body>
</html>

