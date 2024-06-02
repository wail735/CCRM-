
<?php
// Database credentials
$db_host = 'localhost'; // ou l'hôte de votre base de données
$db_user = 'root'; // votre nom d'utilisateur de base de données
$db_password = ''; // votre mot de passe de base de données
$db_name = 'fichier'; // le nom de votre base de données

// Initialize variables for form data
$nom_produit = $nom_client = $telephone  = $adresse = $wilaya = $type_livraison = $prix_vente = '';
$quantite = $poids = $prix_livraison = '';

$errorMessage = $successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nom_produit = $_POST['nom_produit'];

    $nom_client = $_POST['nom_client'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $wilaya = $_POST['wilaya'];
    $type_livraison = $_POST['type_livraison'];
    $prix_vente = $_POST['prix_vente'];
    $quantite = $_POST['quantite'];
    $poids = $_POST['poids'];
    $prix_livraison = $_POST['prix_livraison'];
    $type_vente = $_POST['type_vente'];
    // Validate form data (you can add more validation if needed)

    // Check if required fields are empty
    if (empty($nom_produit) || empty($nom_client) || empty($telephone) || empty($adresse) || empty($wilaya) || empty($type_livraison) || empty($prix_vente) || empty($quantite) || empty($poids) || empty($prix_livraison) || empty($type_vente) ) {
        $errorMessage = "Veuillez remplir tous les champs.";
    } else {
      // Après la validation des données du formulaire et avant l'insertion dans la table colis

try {
    // Connectez-vous à la base de données
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    // Définir le mode d'erreur PDO sur exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'ID du vendeur en fonction de certaines conditions (par exemple, nom d'utilisateur)
    $vendeur_username = "vendeur"; // Nom d'utilisateur du vendeur (ou toute autre condition pour identifier le vendeur)
    $stmt_vendeur = $pdo->prepare("SELECT id FROM vendeur WHERE nom = :nom LIMIT 1");
    $stmt_vendeur->bindParam(':nom', $vendeur_username);
    $stmt_vendeur->execute();
    $result = $stmt_vendeur->fetch(PDO::FETCH_ASSOC);
    
    $id_vendeur = $result['id'];
    $date_creation = date("Y-m-d H:i:s");

    // Continuer avec l'insertion dans la table colis avec l'ID du vendeur récupéré
    // Préparer la requête avec l'ID du vendeur récupéré
    $stmt = $pdo->prepare("INSERT INTO colis (nom_produit, nom_client, telephone, adresse, wilaya, type_livraison, prix_vente, quantite, poids, prix_livraison, type_vente, date_creation, id_vendeur) VALUES (:nom_produit, :nom_client, :telephone, :adresse, :wilaya, :type_livraison, :prix_vente, :quantite, :poids, :prix_livraison, :type_vente, :date_creation, :id_vendeur)");

    // Bind parameters
    $stmt->bindParam(':nom_produit', $nom_produit);
    $stmt->bindParam(':nom_client', $nom_client);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':wilaya', $wilaya);
    $stmt->bindParam(':type_livraison', $type_livraison);
    $stmt->bindParam(':prix_vente', $prix_vente);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->bindParam(':poids', $poids);
    $stmt->bindParam(':prix_livraison', $prix_livraison);
    $stmt->bindParam(':type_vente', $type_vente);
    $stmt->bindParam(':date_creation', $date_creation);
    $stmt->bindParam(':id_vendeur', $id_vendeur);

    // Exécuter la requête
    $stmt->execute();

    // Définir le message de succès
    $successMessage = "Enregistrement réussi !";
} catch(PDOException $e) {
    $errorMessage = "Erreur lors de l'enregistrement : " . $e->getMessage();
}

// Fermer la connexion à la base de données
unset($pdo);

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Coli</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .flex-container {
            display: flex;
            justify-content: space-between;
        }
        .shadow {
            box-shadow: 0px 0px 10px rgba(5, 5, 5, 0.1); /* Réglage de l'ombre */
        }
        .w-1/2 {
            flex: 0 0 48%;
        }
    </style>
</head>
<body>
<h2 class="text-3xl font-bold mb-8 text-center mr-3 py-4">Nouveau colis</h2>

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
<div class="max-w-md mx-auto bg-white shadow-md rounded-md p-6 mt-10 shadow">
    <form action="" method="POST">
        <div class="mb-4">
            <label class="block text-gray-700">Produit pas en stock</label>
            <input type="text" name="nom_produit" placeholder="Nom du produit" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">telephone</label>
            <input type="text" name="telephone" placeholder="Ajouter un telephone" class="w-full border border-gray-300 p-2 rounded">
        </div>
        
        <div class="mb-4 flex-container">
            <div class="w-1/2 mr-2">
                <label class="block text-gray-700">Nom du client</label>
                <input type="text" name="nom_client" placeholder="Nom du destinataire" class="w-full border border-gray-300 p-2 rounded">
            </div>
            <div class="w-1/2 ml-2">
                <label class="block text-gray-700">Adresse de livraison</label>
                <input type="text" name="adresse" placeholder="Adresse de livraison" class="w-full border border-gray-300 p-2 rounded">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Wilaya de livraison</label>
            <select name="wilaya" class="w-full border border-gray-300 p-2 rounded">
                <option value="">Sélectionner une wilaya</option>
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
                <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
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
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Type de livraison</label>
            <select name="type_livraison" class="w-full border border-gray-300 p-2 rounded">
                <option value="StopDesk">StopDesk</option>
                <option value="A Domicile">A Domicile</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Prix de vente unitaire</label>
            <input type="text" name="prix_vente" placeholder="Prix de vente total" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4 flex-container">
            <div class="w-1/2 mr-2">
                <label class="block text-gray-700">Quantité</label>
                <input type="number" name="quantite" value="1" class="w-full border border-gray-300 p-2 rounded">
            </div>
            <div class="w-1/2 ml-2">
                <label class="block text-gray-700">Poids</label>
                <input type="number" name="poids" value="1" class="w-full border border-gray-300 p-2 rounded">
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Prix de livraison</label>
            <input type="text" name="prix_livraison" placeholder="Prix de livraison" class="w-full border border-gray-300 p-2 rounded">
            
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700">Type de vente</label>
            <select name="type_vente" class="w-full border border-gray-300 p-2 rounded">
                <option value="Commerce électronique">Commerce électronique</option>
                <option value="Simple">Simple</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Envoyer</button>
        <a href="indesxcolisvendeur.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Retour au page d'acceuil</a>
    </form>
</div>
</body>
</html>
