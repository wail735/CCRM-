<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fichier";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparation de la requête
$stmt = $conn->prepare("INSERT INTO colis (nom_produit, nom_client, telephone, adresse, wilaya, type_livraison, prix_vente, quantite, poids, prix_livraison, type_vente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Vérification de la requête préparée
if (!$stmt) {
    echo "Erreur de préparation de la requête: " . $conn->error;
    exit();
}

// Définition des paramètres à lier
$nom_produit = $_POST['nom_produit'];
$nom_client = $_POST['nom_client'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$wilaya = $_POST['wilaya'];
$type_livraison = $_POST['type_livraison'];
$prix_vente = (float)$_POST['prix_vente'];
$quantite = (int)$_POST['quantite'];
$poids = (float)$_POST['poids'];
$prix_livraison = (float)$_POST['prix_livraison'];
$type_vente = $_POST['type_vente'];

// Liaison des paramètres
$stmt->bind_param("ssssssdiidd", $nom_produit, $nom_client, $telephone, $adresse, $wilaya, $type_livraison, $prix_vente, $quantite, $poids, $prix_livraison, $type_vente);

// Exécution de la requête
if (!$stmt->execute()) {
    echo "Erreur lors de l'exécution de la requête: " . $stmt->error;
    exit();
}

echo "Nouvel enregistrement créé avec succès";

$stmt->close();
$conn->close();
?>
