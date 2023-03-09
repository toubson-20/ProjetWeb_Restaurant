<?php

include_once '/restaurant/controller/connexionBD.php';

if (isset($_POST['submit'])) {
    // Récupération des données envoyées par le formulaire
    $mdp = $_POST['password'];
    $mdpVerif = $_POST['passwordConfirm'];
    $email = $_POST['email'];
    $nom = $_POST['name'];
    $prenom = $_POST['firstName'];

    $validation = false;

    if ($mdp != $mdpVerif) {
        echo "mots de passe différents!!!";
    } else {

        $tableau = explode(" ", $mdp);
        if (strlen($mdp) < 8) {
            echo "Le mot de passe doit avoir au moins 8 caractères.";
        } elseif (!preg_match("#[0-9]+#", $mdp)) {
            echo "Le mot de passe doit contenir au moins 1 chiffre.";
        } elseif (!preg_match("#[A-Z]+#", $mdp)) {
            echo "Le mot de passe doit contenir au moins 1 lettre majuscule.";
        } elseif (!preg_match("#[a-z]+#", $mdp)) {
            echo "Le mot de passe doit contenir au moins 1 lettre minuscule.";
        } elseif (!preg_match("#[\W]+#", $mdp)) {
            echo "Le mot de passe doit contenir au moins 1 caractère spécial.";
        } else {
            echo "Le mot de passe est valide.";
            $validation = true;
        }
    }

    if ($validation) {

        // !!!!!!!!!!!!!!! ON DOIT CRYPTER LE MDP !!!!!!!!!!!!!!!!!!!
        // réfléchir sur id_user de la table user ?????

        // Préparer la requête SQL
        $sql = "INSERT INTO users (nom, prenom, login, mdp) VALUES (:nom, :prenom, :email, :motDePasse)";
        $stmt = $pdo->prepare($sql);

        // Binder les paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':motDePasse', $mdp);

        // Exécuter la requête SQL
        if ($stmt->execute()) {
            echo "Les données ont été ajoutées avec succès !";
        } else {
            echo "Une erreur s'est produite lors de l'ajout des données.";
        }
    }
}
