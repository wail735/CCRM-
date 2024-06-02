<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .menu {
            background-color: #333;
            width: 220px;
            position: fixed;
            height: 100%;
            overflow: auto;
            padding-top: 20px;
        }

        .menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .menu ul li {
            text-align: center;
            margin-bottom: 10px;
        }

        .menu ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .menu ul li a:hover {
            background-color: #555;
        }

        .submenu {
            background-color: #555;
            padding-left: 20px;
            display: none;
        }

        .submenu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .submenu ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 8px;
            transition: background-color 0.3s;
        }

        .submenu ul li a:hover {
            background-color: #777;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #555;
        }

        .logout-btn {
            background: #555;
            color: #fff;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            display: block;
            margin: 20px auto;
            width: 80%;
            text-align: center;
            padding: 10px 0;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #777;
        }

        .hello-user {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .hello-user:after {
            content: '';
            display: block;
            width: 80%;
            height: 1px;
            background-color: #fff;
            position: absolute;
            bottom: -10px;
            left: 10%;
        }
    </style>
</head>
<body>

    <div class="menu">
        <div class="hello-user">Welcome, <?php echo $_SESSION['nom']; ?></div>
        <ul>
            <li><a href="#" onclick="toggleClients()"><i class="fas fa-users"></i> User Management</a></li>
            <li class="submenu" id="client1" style="display: none;">
                <ul>
                    <li><a href="#"><i class="fas fa-user"></i> Client Management</a></li>
                    <li><a href="#"><i class="fas fa-plus"></i> Add Client</a></li>
                    <li><a href="#"><i class="fas fa-minus"></i> Remove Client</a></li>
                </ul>
            </li>
            <li class="submenu" id="client2" style="display: none;">
                <ul>
                    <li><a href="#"><i class="fas fa-user-tie"></i> Seller Management</a></li>
                    <li><a href="#"><i class="fas fa-plus"></i> Add Seller</a></li>
                    <li><a href="#"><i class="fas fa-minus"></i> Remove Seller</a></li>
                </ul>
            </li>
            <li class="submenu" id="client3" style="display: none;">
                <ul>
                    <li><a href="#"><i class="fas fa-truck"></i> Delivery Management</a></li>
                    <li><a href="#"><i class="fas fa-plus"></i> Add Delivery Personnel</a></li>
                    <li><a href="#"><i class="fas fa-minus"></i> Remove Delivery Personnel</a></li>
                </ul>
            </li>
            <li class="submenu" id="client4" style="display: none;">
                <ul>
                    <li><a href="#"><i class="fas fa-calculator"></i> Accounting Management</a></li>
                    <li><a href="#"><i class="fas fa-plus"></i> Add Accountant</a></li>
                    <li><a href="#"><i class="fas fa-minus"></i> Remove Accountant</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
            <li><a href="#"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Welcome</h1>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        function toggleClients() {
            var clients = document.querySelectorAll('.submenu');
            clients.forEach(function(client) {
                if (client.style.display === "none") {
                    client.style.display = "block";
                } else {
                    client.style.display = "none";
                }
            });
        }
    </script>

</body>
</html>
