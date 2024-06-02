<?php
// Database credentials
$db_host = 'localhost'; // or your database host
$db_user = 'root'; // your database username
$db_password = ''; // your database password
$db_name = 'fichier'; // your database name

// Initialize variables for form data
$nom = $prenom = $telephone = $email =$password = '';
$errorMessage = $successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (you can add more validation if needed)

    // Check if required fields are empty
    if (empty($nom) || empty($prenom) || empty($telephone) || empty($email)|| empty($password)) {
        $errorMessage = "Veuillez remplir tous les champs.";
    } else {
        try {
            // Connect to MySQL database using PDO
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL statement for insertion
            $stmt = $pdo->prepare("INSERT INTO admin (nom, prenom, telephone, email,password) VALUES (:nom, :prenom, :telephone, :email, :password)");

            // Bind parameters
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            // Execute the prepared statement
            $stmt->execute();

            // Set success message
            $successMessage = "Inscription réussie !";

        } catch(PDOException $e) {
            $errorMessage = "Erreur lors de l'inscription : " . $e->getMessage();
        }

        // Close database connection
        unset($pdo);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau admin</title>
    <!-- Liens vers Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-5">
        <h2 class="text-3xl font-bold mb-8 text-center">Nouveau admin</h2>

        <?php if (!empty($errorMessage)) : ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md mb-4">
                <strong><?php echo $errorMessage; ?></strong>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)) : ?>
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
                <strong><?php echo $successMessage; ?></strong>
            </div>
        <?php endif; ?>

        <form method="post" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" id="nom" name="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre nom" value="<?php echo $nom; ?>">
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre prénom" value="<?php echo $prenom; ?>">
            </div>
            <div class="mb-4">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
                <input type="text" id="telephone" name="telephone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre numéro de téléphone" value="<?php echo $telephone; ?>">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre adresse email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre mot de passe" value="<?php echo $password; ?>">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Envoyer</button>
                <a href="index2.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Retour au page d'acceuil</a>
            </div>
        </form>
    </div>
</body>
</html>
