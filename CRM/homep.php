<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="home page/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.header {
    background-color: #333;
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

.nav-menu {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.nav-item {
    margin-right: 20px;
}

.nav-link {
    color: #fff;
    text-decoration: none;
    font-size: 1.7rem;
    transition: color 0.3s;
}

.nav-link:hover {
    color: #482ff7;
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
.container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            top:0;
        }

        .box {
            width: 150px;
            height: 100px;
            background-color: #ffffff;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .box:hover {
            transform: translateY(-5px);
        }

        .box h2 {
            margin-top: 0;
            font-size: 18px;
            color: #333333;
        }

        .box p {
            margin: 5px 0 0;
            font-size: 24px;
            color: #555555;
            font-weight: bold;
        }

        canvas {
            width: 40px;
            height: 40px;
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .chart-container {
            width: 500px;
            height: 300px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
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
html {
    font-size: 74.5%;
    font-family: 'Roboto', sans-serif;
}

</style>
<body>

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



    <?php
    // Establish a connection to your MySQL database
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

    // Function to get the historical data of number of sellers per day
    function getHistoricalSellerData($conn) {
        $historicalData = array();

        // Select the date and count of sellers for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM vendeur GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to get the historical data of number of clients per day
    function getHistoricalClientData($conn) {
        $historicalData = array();

        // Select the date and count of clients for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM client GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to get the historical data of number of colis per day
    function getHistoricalColisData($conn) {
        $historicalData = array();

        // Select the date and count of colis for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM colis GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to get the historical data of number of livreurs per day
    function getHistoricalLivreurData($conn) {
        $historicalData = array();

        // Select the date and count of livreurs for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM livreur GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to calculate the total count from historical data
    function getTotalCount($data) {
        $totalCount = 0;
        foreach ($data as $item) {
            $totalCount += $item['count'];
        }
        return $totalCount;
    }

    // Call the functions to get the historical data for each dataset
    $historicalSellerData = getHistoricalSellerData($conn);
    $historicalClientData = getHistoricalClientData($conn);
    $historicalColisData = getHistoricalColisData($conn);
    $historicalLivreurData = getHistoricalLivreurData($conn);

    // Calculate total counts
    $totalSellers = getTotalCount($historicalSellerData);
    $totalClients = getTotalCount($historicalClientData);
    $totalColis = getTotalCount($historicalColisData);
    $totalLivreurs = getTotalCount($historicalLivreurData);

    // Close the database connection
    $conn->close();
    ?>
<script>
        const profileLink = document.querySelector('.profile-link');
        const profileModal = document.querySelector('.profile-modal');

        profileLink.addEventListener('click', (event) => {
            event.preventDefault();
            profileModal.style.display = 'block';
        });
    </script>
    <div class="container">
        <div class="box" id="box1">
            <h2>Total Sellers</h2>
            <p><?php echo $totalSellers; ?></p>
        </div>
        <div class="box" id="box2">
            <h2>Total Clients</h2>
            <p><?php echo $totalClients; ?></p>
        </div>
        <div class="box" id="box3">
            <h2>Total Colis</h2>
            <p><?php echo $totalColis; ?></p>
        </div>
        <div class="box" id="box4">
            <h2>Total Livreurs</h2>
            <p><?php echo $totalLivreurs; ?></p>
        </div>
    </div>

    <div style="display: flex; justify-content: center;">
        <div class="chart-container">
            <canvas id="seller-chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="client-chart"></canvas>
        </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <div class="chart-container">
            <canvas id="colis-chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="livreur-chart"></canvas>
        </div>
    </div>
    <script>
        var historicalSellerData = <?php echo json_encode($historicalSellerData); ?>;
        var historicalClientData = <?php echo json_encode($historicalClientData); ?>;
        var historicalColisData = <?php echo json_encode($historicalColisData); ?>;
        var historicalLivreurData = <?php echo json_encode($historicalLivreurData); ?>;

        var sellerDates = historicalSellerData.map(data => data.date);
        var sellerCounts = historicalSellerData.map(data => data.count);

        var clientDates = historicalClientData.map(data => data.date);
        var clientCounts = historicalClientData.map(data => data.count);

        var colisDates = historicalColisData.map(data => data.date);
        var colisCounts = historicalColisData.map(data => data.count);

        var livreurDates = historicalLivreurData.map(data => data.date);
        var livreurCounts = historicalLivreurData.map(data => data.count);

        var currentDate = new Date();
        var startDate = new Date(currentDate);
        startDate.setDate(startDate.getDate() - 7);

        var additionalDates = [];

        for (var i = 1; i <= 7; i++) {
            var nextDate = new Date(currentDate);
            nextDate.setDate(nextDate.getDate() + i);
            var formattedDate = nextDate.toISOString().split('T')[0];
            additionalDates.push(formattedDate);
        }

        sellerDates = sellerDates.concat(additionalDates);
        clientDates = clientDates.concat(additionalDates);
        colisDates = colisDates.concat(additionalDates);
        livreurDates = livreurDates.concat(additionalDates);

        var commonOptions = {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'YYYY-MM-DD'
                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            },
            barPercentage: 0.8
        };

        var sellerCtx = document.getElementById('seller-chart').getContext('2d');
        var clientCtx = document.getElementById('client-chart').getContext('2d');
        var colisCtx = document.getElementById('colis-chart').getContext('2d');
        var livreurCtx = document.getElementById('livreur-chart').getContext('2d');

        var sellerChart = new Chart(sellerCtx, {
            type: 'bar',
            data: {
                labels: sellerDates,
                datasets: [{
                    label: 'Number of Sellers',
                    data: sellerCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        var clientChart = new Chart(clientCtx, {
            type: 'bar',
            data: {
                labels: clientDates,
                datasets: [{
                    label: 'Number of Clients',
                    data: clientCounts,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        var colisChart = new Chart(colisCtx, {
            type: 'bar',
            data: {
                labels: colisDates,
                datasets: [{
                    label: 'Number of Colis',
                    data: colisCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        var livreurChart = new Chart(livreurCtx, {
            type: 'bar',
            data: {
                labels: livreurDates,
                datasets: [{
                    label: 'Number of Livreurs',
                    data: livreurCounts,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
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
