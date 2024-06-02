<?php 
session_start();
include "config.php";

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if(empty($uname)){
        header("Location: index.php?error=L'email est requis");
        exit();
    } elseif(empty($password)){
        header("Location: index.php?error=Le mot de passe est requis");
        exit();
    } else {

        // Vérification dans la table client
        $sql_vendeur = "SELECT * FROM vendeur WHERE nom='$uname' AND password='$password'";
        $result_vendeur = mysqli_query($conn, $sql_vendeur);

        if(mysqli_num_rows($result_vendeur) === 1){
            $row = mysqli_fetch_assoc($result_vendeur);
            if($row['nom'] === $uname && $row['password'] === $password){
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['id_vendeur'] = $row['id'];
                
                header("Location: indesxcolisvendeur.php"); // Redirection vers home.php après une connexion réussie
                exit();
            } else {
                header("Location: index.php?error=Informations incorrectes");
                exit();
            }
        } else {
            // Vérification dans la table employe pour les admins
            $sql_admin = "SELECT * FROM admin WHERE nom='$uname' AND password='$password'";
            $result_admin = mysqli_query($conn, $sql_admin);

            if(mysqli_num_rows($result_admin) === 1){
                $row = mysqli_fetch_assoc($result_admin);
                if($row['nom'] === $uname && $row['password'] === $password){
                    $_SESSION['nom'] = $row['nom'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['is_admin'] = true; // Marquer l'utilisateur comme admin
                    header("Location: homep.php"); // Redirection vers home.php après une connexion réussie
                    exit();
                } else {
                    header("Location: index.php?error=Informations incorrectes");
                    exit();
                }
            } else {
                header("Location: index.php?error=Informations incorrectes");
                exit();
            }
        }
    }

} else {
    header("Location: index.php?error");
    exit();
}
?>
