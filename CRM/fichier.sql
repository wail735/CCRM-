-- Création de la table client
CREATE TABLE client (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    wilaya VARCHAR(20),
    email VARCHAR(100),
    telephone VARCHAR(20),
    password VARCHAR(20),
    date_creation DATE
);

-- Insertion de données dans la table client
INSERT INTO `client` (`nom`, `prenom`, `wilaya`, `email`, `telephone`, `password`, `date_creation`) VALUES
('client', 'client','Tipaza',  'chennoufwail@gmail.com', '0754591689', 'wail', CURDATE());

-- Création de la table vendeur
CREATE TABLE vendeur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(100),
    telephone VARCHAR(20),
    wilaya VARCHAR(20),
    bureau VARCHAR(20),
    password VARCHAR(20),
    date_creation DATE
);

-- Insertion de données dans la table vendeur
INSERT INTO vendeur (nom, prenom, email, telephone, wilaya, bureau, password, date_creation) VALUES 
('vendeur', 'vendeur', 'yahiabdelhak7@gmail.com', '0754506598', 'fouka', 'dilvrili chlef', 'wail', CURDATE());


-- Création de la table de liaison pour stocker les relations entre les vendeurs et les clients
CREATE TABLE Vendeur_Client (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_vendeur INT,
    id_client INT,
    FOREIGN KEY (id_vendeur) REFERENCES vendeur(id),
    FOREIGN KEY (id_client) REFERENCES client(id)
);

-- Insertion de données dans la table de liaison pour établir des relations entre les vendeurs et les clients
INSERT INTO Vendeur_Client (id_vendeur, id_client) VALUES 
(1, 1); -- Cela signifie que le client avec l'ID 1 est lié au vendeur avec l'ID 1



-- Création de la table chef de bureau 
CREATE TABLE chef_de_bureau ( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    nom VARCHAR(100), 
    prenom VARCHAR(100), 
    email VARCHAR(100), 
    telephone VARCHAR(20), 
    bureau VARCHAR(100), 
    password VARCHAR(20) 
);


INSERT INTO `chef_de_bureau` (`id`, `nom`, `prenom`, `email`, `telephone`, `bureau`, `password`) VALUES 
(1, 'chef', 'chef', 'iyedbelm@gmail.com', '0531587541', 'alger', 'wail');

CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(100),
    telephone VARCHAR(20),
    password VARCHAR(20),
    id_client INT,
    id_vendeur INT,
    FOREIGN KEY (id_client) REFERENCES client(id),
    FOREIGN KEY (id_vendeur) REFERENCES vendeur(id)
);

-- Insertion de données dans la table admin avec les relations client et vendeur
INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `telephone`, `password`, `id_client`, `id_vendeur`) VALUES 
(1, 'admin', 'admin', 'akramaymen7@gmail.com', '0754591689', 'wail', 1, 1);


-- Création de la table comptable
CREATE TABLE comptable (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    wilaya VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telephone VARCHAR(20),
    bureau VARCHAR(100),
    password VARCHAR(20)
);

-- Insertion de données dans la table comptable
INSERT INTO `comptable` (`nom`, `prenom`,`wilaya`, `email`, `telephone`, `bureau`, `password`) VALUES 
('compt', 'compt','Tipaza', 'chennoufwail01@gmail.com', '075786564', 'alger', 'wail');

-- Création de la table Paiement avec la clé étrangère correctement formée
CREATE TABLE Paiement (
    id INT PRIMARY KEY AUTO_INCREMENT,
    wilaya VARCHAR(100),
    Bureau VARCHAR(100),
    Prix DECIMAL(10, 2),
    Prix_livraison DECIMAL(10, 2),
    status VARCHAR(100),
    date_creation DATE,
    id_comptable INT,
    FOREIGN KEY (id_comptable) REFERENCES comptable(id)
);

-- Insertion de données dans la table Paiement
INSERT INTO `Paiement` (`wilaya`, `Bureau`, `Prix`, `Prix_livraison`, `status`, `date_creation`, `id_comptable`) VALUES 
('alger', 'Delivrili Alger', '2000.00', '850.00', 'initialisation', CURDATE(), 1);

-- Création de la table livreur
CREATE TABLE livreur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    wilaya VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telephone VARCHAR(100),
    bureau VARCHAR(100),
    date_creation DATE,
    password VARCHAR(20)
);

-- Insertion de données dans la table livreur
INSERT INTO livreur (`nom`, `prenom`,`wilaya`, `email`, `telephone`, `bureau`, `date_creation`, `password`) 
VALUES ('livreur', 'livreur','Tipaza',  'chennoufwail03@gmail.com', '0554552767', 'delivri_chlef', CURDATE(), 'wail');

-- Création de la table produit
CREATE TABLE produit (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prix DECIMAL(10, 2),
    id_vendeur INT,
    image_path VARCHAR(255) NULL,
    FOREIGN KEY (id_vendeur) REFERENCES vendeur(id)
);

-- Insertion de données dans la table produit
INSERT INTO produit (nom, prix, id_vendeur) 
VALUES ('prod', '2000.00', 1);

-- Créer la table avec la colonne statut au lieu des colonnes séparées
CREATE TABLE colis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_produit VARCHAR(255) NOT NULL,
    nom_client VARCHAR(255) NOT NULL,
    telephone VARCHAR(100),
    adresse VARCHAR(255) NOT NULL,
    wilaya VARCHAR(100) NOT NULL,
    type_livraison VARCHAR(50) NOT NULL,
    prix_vente DECIMAL(10, 2) NOT NULL,
    quantite INT NOT NULL DEFAULT 1,
    poids DECIMAL(10, 2) NOT NULL DEFAULT 1,
    prix_livraison DECIMAL(10, 2) NOT NULL,
    statut ENUM('En attente', 'Échec', 'Annulé', 'En traitement', 'En préparation', 'En transit', 'En cours', 'Dispatché', 'Au bureau', 'En Sortie', 'Sortie en livraison', 'Livré', 'Échec 1', 'Échec 2', 'Échec 3', 'Distinataire refusé', 'Retour à expéditeur') DEFAULT 'En attente',
    type_vente VARCHAR(50) NOT NULL,
    date_creation DATE,
    id_vendeur INT,


     FOREIGN KEY (id_vendeur) REFERENCES vendeur(id)
);

INSERT INTO colis (
    nom_produit, nom_client, telephone, adresse, wilaya, type_livraison, prix_vente,
    quantite, poids, prix_livraison, statut, type_vente, date_creation, id_vendeur
) VALUES 
(
    'Produit A', 'Client A', '067777754345', '123 Rue Exemple', 'Wilaya A', 'A Domicile', 99.99,
    2, 1.5, 10.00, 'En attente', 'Commerce électronique', CURDATE(), 1 
);
SELECT * FROM colis WHERE id_vendeur = 1;
