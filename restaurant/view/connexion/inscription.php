<?php
session_start();
include_once  '../../controller/connexionBD.php';
$pdo = connect_to_database();

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

            // Réccupération de l'id de l'utilisateur
            $stmt = $pdo->prepare('SELECT Id_user FROM users WHERE login = ?');
            $stmt->execute(array($email));

            // Récupération du résultat
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Une erreur s'est produite lors de l'ajout des données.";
        }

        $stmts = $pdo->prepare('INSERT INTO client(Id_user) VALUES(:id)');
        $stmts->bindParam(':id', $user['Id_user']);

        if($stmts->execute()){
            $_SESSION['name'] = $prenom . " " . $nom;
            $_SESSION['id'] = $user['Id_user'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = "";
            $_SESSION['connected'] = true;

            echo '<br>' . $_SESSION["name"];
            echo '<script>
            document.location.href="../../index.php";

        </script>';
        }
    }
}
