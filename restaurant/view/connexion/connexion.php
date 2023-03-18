<?php

session_start();

$_SESSION["connected"] = false;

if (!$_SESSION["connected"]) {
    // Rediriger l'utilisateur vers une autre page
    header('Location: ../../index.php');
    exit;
}
include_once  '../../controller/connexionBD.php';
$pdo = connect_to_database();
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
        $_SESSION['name'] = $user['preNom'] . " " . $user['nom'];
        $_SESSION['id'] = $user['Id_user'];
        $_SESSION['email'] = $user['login'];

        // Connexion réussie
        echo 'Connexion réussie !';
        $_SESSION['connected'] = true;
        echo '<script>
                document.location.href="../../index.php";

            </script>';
    } else {
        // Erreur d'identification
        echo 'Identifiants incorrects.';
    }
}
