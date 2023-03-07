<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/restaurant/controller/connexionBD.php';

if (isset($_POST['submit'])) {
    // Récupération des données envoyées par le formulaire
    $mdp = $_POST['password'];
    $email = $_POST['email'];

    echo $mdp;
    echo $email;

    // Préparation de la requête
    $stmt = $pdo->prepare('SELECT * FROM users WHERE login = ?');
    $stmt->execute(array($email));

    // Récupération du résultat
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    // if ($user && password_verify($mdp, $user['mdp'])) { on va l'utiliser quand on va crypter le code
    if ($user && ($mdp == $user['mdp'])) {
        // Connexion réussie
        echo 'Connexion réussie !';
    } else {
        // Erreur d'identification
        echo 'Identifiants incorrects.';
    }
}
