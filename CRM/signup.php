<?php 
session_start();
include "config.php";

if(isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['ré-password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $prenom = validate($_POST['prenom']);
    $telephone = validate($_POST['telephone']);
    $wilaya = validate($_POST['wilaya']);
    $bureau = validate($_POST['bureau']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $ré_password = validate($_POST['ré-password']);
    
    // For retaining user data in case of error
    $user_data = 'name='. $name. '&prenom='. $prenom. '&email='. $email. '&telephone='. $telephone. '&wilaya='. $wilaya. '&bureau='. $bureau;

    if(empty($name)){
        header("Location: index.php?error1=Nom is required&$user_data");
        exit();
    } elseif(empty($prenom)){
        header("Location: index.php?error1=Prenom is required&$user_data");
        exit();
    } elseif(empty($telephone)){
        header("Location: index.php?error1=Telephone is required&$user_data");
        exit();
    } elseif(empty($wilaya)){
        header("Location: index.php?error1=Wilaya is required&$user_data");
        exit();
    } elseif(empty($bureau)){
        header("Location: index.php?error1=Bureau is required&$user_data");
        exit();
    } elseif(empty($email)){
        header("Location: index.php?error1=Email is required&$user_data");
        exit();
    } elseif(empty($password)){
        header("Location: index.php?error1=Password is required&$user_data");
        exit();
    } elseif(empty($ré_password)){
        header("Location: index.php?error1=Confirmation password is required&$user_data");
        exit();
    } elseif($password !== $ré_password){
        header("Location: index.php?error1=Passwords do not match&$user_data");
        exit();
    } else {
        $sql = "SELECT * FROM vendeur WHERE nom='$name'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            header("Location: index.php?error1=The username is already taken, try another&$user_data");
            exit();
        } else {
            // Ajouter la date de création
            $date_creation = date("Y-m-d H:i:s"); // Récupère la date et l'heure actuelles au format MySQL

            $sql2 = "INSERT INTO vendeur (nom, prenom, email, telephone, wilaya, bureau, password, date_creation) VALUES ('$name', '$prenom', '$email', '$telephone', '$wilaya', '$bureau', '$password', '$date_creation')";
        }
        $result2 = mysqli_query($conn, $sql2);
        if($result2){
            header("Location: index.php?succes=Your account has been created successfully");
            exit();
        } else {
            header("Location: index.php?error1=Unknown error occurred&$user_data");
            exit();
        }
    }
}
?>
