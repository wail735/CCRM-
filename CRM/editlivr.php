<?php

$nom = "";
$prenom = "";
$telephone = "";
$email = "";
$errorMessage = "";
$successMessage = "";
$id = "";

// Votre connexion à la base de données
$connection = new mysqli("localhost", "root", "", "fichier");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["id"])) {
        
        $id = $_GET["id"];
        $sql = "SELECT * FROM livreur WHERE id='$id'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            // Si aucun employe n'est trouvé pour l'ID donné, redirigez vers une page d'erreur ou une autre page appropriée
            header("location:/CRM/indexlivr.php");
            exit;
        } else {
            // Remplissez les champs du formulaire avec les données du employe
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $telephone = $row["telephone"];
            $email = $row["email"];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire lorsqu'il est soumis
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    if (empty($nom) || empty($prenom) || empty($telephone) || empty($email)) {
        $errorMessage = "Veuillez remplir tous les champs.";
    } else {
        // Mettre à jour les informations du client dans la base de données
        $sql = "UPDATE livreur SET nom='$nom', prenom='$prenom', telephone='$telephone', email='$email' WHERE id=$id";
        if ($connection->query($sql) === TRUE) {
            $successMessage = "Client mis à jour avec succès.";
        } else {
            $errorMessage = "Erreur lors de la mise à jour du client: " . $connection->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier admin</title>
    <!-- Liens vers Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Ajoutez votre propre CSS personnalisé ici si nécessaire */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto my-5">
        <h2 class="text-3xl font-bold mb-8 text-center">Modifier livreur</h2>

        <?php if (!empty($errorMessage)) : ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4 fade-in">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)) : ?>
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4 fade-in">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <form method="post" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" id="nom" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre nom" value="<?php echo isset($nom) ? $nom : ''; ?>">
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre prénom" value="<?php echo isset($prenom) ? $prenom : ''; ?>">
            </div>
            <div class="mb-4">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre téléphone" value="<?php echo isset($telephone) ? $telephone : ''; ?>">
            </div>
            <div class="mb-6">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre email" value="<?php echo isset($email) ? $email : ''; ?>">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Envoyer</button>
                <a href="indexlivr.php"  class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Retour à la page d'accueil</a>
            </div>
        </form>
    </div>
</body>

</html>
