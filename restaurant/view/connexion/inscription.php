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

    $stmt = $pdo->prepare('SELECT * FROM users WHERE login = ?');
    $stmt->execute(array($email));

    // Récupération du résultat
    $login = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($login !== false && count($login) > 0) {
        echo "<script>alert('Login déjà existant')</script>";
        echo '<script>
            document.location.href="./connexion.html";

        </script>';
    } else {

        if ($mdp != $mdpVerif) {
            echo "<script>alert('Mots de passe différents!!!')</script>";
            echo '<script> document.location.href="./connexion.html";</script>';
        } else {

            $tableau = explode(" ", $mdp);
            if (strlen($mdp) < 8) {
                echo "<script>alert('Le mot de passe doit avoir au moins 8 caractères')</script>";
                echo '<script> document.location.href="./connexion.html";</script>';
            } elseif (!preg_match("#[0-9]+#", $mdp)) {
                echo "<script>alert('Le mot de passe doit contenir au moins 1 chiffre')</script>";
                echo '<script>
                     document.location.href="./connexion.html";

                     </script>';
            } elseif (!preg_match("#[A-Z]+#", $mdp)) {
                echo "<script>alert('Le mot de passe doit contenir au moins 1 lettre majuscule')</script>";
                echo '<script>
                     document.location.href="./connexion.html";

                     </script>';
            } elseif (!preg_match("#[a-z]+#", $mdp)) {
                echo "<script>alert('Le mot de passe doit contenir au moins 1 lettre minuscule')</script>";
                echo '<script>
            document.location.href="./connexion.html";

        </script>';
            } elseif (!preg_match("#[\W]+#", $mdp)) {
                echo  "<script>alert('Le mot de passe doit contenir au moins 1 caractère spécial')</script>";
                echo '<script>
                     document.location.href="./connexion.html";

                      </script>';
            } else {
                $validation = true;
                $mdp = password_hash($mdp, PASSWORD_DEFAULT);
            }
        }

        if ($validation) {
            $role = "client";

            // !!!!!!!!!!!!!!! ON DOIT CRYPTER LE MDP !!!!!!!!!!!!!!!!!!!

            // Préparer la requête SQL
            $sql = "INSERT INTO users (nom, prenom, login, mdp, role) VALUES (:nom, :prenom, :email, :motDePasse, :role)";
            $stmt = $pdo->prepare($sql);

            // Binder les paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':motDePasse', $mdp);
            $stmt->bindParam(':role', $role);

            // Exécuter la requête SQL
            if ($stmt->execute()) {
                echo "Les données ont été ajoutées avec succès !";

                // Réccupération de l'id de l'utilisateur
                $stmt = $pdo->prepare('SELECT Id_user FROM users WHERE login = ?');
                $stmt->execute(array($email));

                // Récupération du résultat
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "<script>alert('Une erreur s'est produite lors de l'ajout des données')</script>";
            }

            $stmts = $pdo->prepare('INSERT INTO client(Id_user) VALUES(:id)');
            $stmts->bindParam(':id', $user['Id_user']);

            if ($stmts->execute()) {
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
}
