<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if(!isset($_SESSION['nom'])) {
    header("Location: index.php");
    exit();
}

// Incluez le fichier de configuration
include "config.php";

// Récupérez l'ID de l'employé connecté depuis la session
$id_employe = $_SESSION['id'];

// Sélectionnez les informations de l'employé à partir de la base de données
$sql = "SELECT * FROM admin WHERE id = $id_employe";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Récupérez les informations de l'employé
$prenom = $row['prenom'];
$nom = $row['nom'];
$email = $row['email'];
$telephone = $row['telephone'];
$password = $row['password'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include custom CSS for animation -->
    <style>
        .fade-out {
            animation: fadeOut ease 5s;
            -webkit-animation: fadeOut ease 5s;
            -moz-animation: fadeOut ease 5s;
            -o-animation: fadeOut ease 5s;
            -ms-animation: fadeOut ease 5s;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-8 text-center">Admin Profile</h1>
        <?php
        // Check if the success message should be displayed
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo '<div id="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">';
            echo '<strong class="font-bold">Success!</strong> Your profile has been updated successfully.';
            echo '</div>';
        }
        ?>
       <div class="max-w-md mx-auto">
    <form action="update_profile.php" method="POST" class="bg-white p-8 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 font-bold mb-2">First Name:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold mb-2">Last Name:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="mb-4">
            <label for="telephone" class="block text-gray-700 font-bold mb-2">Telephone:</label>
            <input type="tel" id="telephone" name="telephone" value="<?php echo $telephone; ?>" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="flex justify-between items-center mt-8">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Profile</button>
            <a href="homep.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Retour au page d'acceuil</a>
        </div>
    </form>
</div>


    <!-- Include jQuery for simplicity (you can also use vanilla JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fade out the success message after 5 seconds
        $(document).ready(function() {
            setTimeout(function() {
                $("#successMessage").addClass('fade-out');
            }, 5000);
        });
    </script>
</body>

</html>
