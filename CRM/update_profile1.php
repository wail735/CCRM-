<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if(!isset($_SESSION['nom'])) {
    header("Location: index.php");
    exit();
}

// Incluez le fichier de configuration
include "config.php";

// Vérifiez si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données soumises
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];

    // Récupérez l'ID de l'employé connecté depuis la session
    $id_employe = $_SESSION['id'];

    // Préparez et exécutez la requête de mise à jour du profil
    $sql = "UPDATE vendeur SET prenom='$prenom', nom='$nom', email='$email', telephone='$telephone', password='$password' WHERE id=$id_employe";
    $result = mysqli_query($conn, $sql);

    // Vérifiez si la mise à jour a réussi
    if ($result) {
        // Redirigez l'utilisateur vers la page de profil avec un message de succès
        $_SESSION['nom'] = $nom;

        header("Location: profil1.php?success=true");
        exit();
    } else {
        // En cas d'erreur, redirigez avec un message d'erreur
        header("Location: profil1.php?error=true");
        exit();
    }
} else {
    // Si la méthode de requête n'est pas POST, redirigez l'utilisateur
    header("Location: profil1.php");
    exit();
}
?>
