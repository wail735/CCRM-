<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Our Products</title>
    <style>
        .box {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        .box img {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .box input[type="file"] {
            display: none;
        }

        .box label {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .box label:hover {
            background-color: #0056b3;
        }

        .heading {
            background-color: #333;
            padding: 55px 0;
            margin-bottom: 10px;
            text-align: center;
            color: white;
            position: relative;
        }

        .heading a {
            color: white;
            text-decoration: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            font-size: 30px; /* Larger font size */

        }

        .heading a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
    <div class="heading">
        <a href="../indesxcolisvendeur.php"><i class="fas fa-arrow-left"></i> Retour</a>
        <h1>Our Products</h1>
    </div>
    <div class="container">

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

    // Query to fetch product data
    $sql = "SELECT nom_produit, prix_vente FROM colis";
    $result = $conn->query($sql);

    // Counter for generating unique IDs
    $counter = 1;

    // Display product data dynamically
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<form class="box" action="upload.php" method="post" enctype="multipart/form-data">';
            echo '<label for="file-' . $counter . '">Choose Image</label>';
            echo '<input type="file" id="file-' . $counter . '" name="product_image" accept="image/*" onchange="previewImage(event, ' . $counter . ')">';
            echo '<img id="preview-' . $counter . '" src="imgs/default.jpg" alt="Product Image">';
            echo '<h2>' . htmlspecialchars($row["nom_produit"]) . '</h2>';
            echo '<span>' . htmlspecialchars($row["prix_vente"]) . ' DA</span>';
            echo '<div class="rate">';
            echo '</div>';
            echo '<div class="options">';
            echo '</div>';
            echo '</form>';
            $counter++;
        }
    } else {
        echo '<p>No products found</p>';
    }

    // Close connection
    $conn->close();
    ?>

    </div>

    <script>
        function previewImage(event, id) {
            var reader = new FileReader();
            reader.onload = function(){
                var previewId = 'preview-' + id;
                var output = document.getElementById(previewId);
                output.src = reader.result;
                
                // Save the image data to localStorage
                localStorage.setItem('image-' + id, reader.result);
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Load the image data from localStorage on page load
        window.onload = function() {
            <?php
            if ($result->num_rows > 0) {
                $result->data_seek(0); // Reset result pointer to the start
                $counter = 1;
                while ($row = $result->fetch_assoc()) {
                    echo 'loadImage(' . $counter . ');';
                    $counter++;
                }
            }
            ?>

            function loadImage(id) {
                var imageData = localStorage.getItem('image-' + id);
                if (imageData) {
                    var output = document.getElementById('preview-' + id);
                    output.src = imageData;
                }
            }
        }
    </script>
</body>
</html>
