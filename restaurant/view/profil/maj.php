<?php
session_start();
$id = $_SESSION['id'];
// Connexion à la base de données
include_once  '../../controller/connexionBD.php';
$pdo = connect_to_database();

if ($_POST['exec'] == 0) {
    // Récupération des données envoyées par AJAX
    $nom = $_POST['nom'];
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];

    if (empty($mdp)) {
        $stmts = $pdo->prepare('UPDATE users SET login = :login, nom = :nom, preNom = :prenom WHERE Id_user = :id ');
        $stmts->bindParam(':nom', $nom);
        $stmts->bindParam(':prenom', $prenom);
        $stmts->bindParam(':login', $login);
        $stmts->bindParam(':id', $id);

        $stmts->execute();
    } else {


        // Modification des données dans la table "users"
        $stmts = $pdo->prepare('UPDATE users SET login = :login, nom = :nom, preNom = :prenom, mdp = :mdp WHERE Id_user = :id ');
        $stmts->bindParam(':nom', $nom);
        $stmts->bindParam(':prenom', $prenom);
        $stmts->bindParam(':login', $login);
        $stmts->bindParam(':mdp', $mdp);
        $stmts->bindParam(':id', $id);

        $stmts->execute();
    }

    // $stmts->bindParam(':motDePasse', $mdp);
    // if ($conn->query($sql) === TRUE) {
    //     echo "New user added successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $_SESSION['name'] = $prenom . " " . $nom;
} else if ($_POST['exec'] == 1) {

    $nom = $_POST['nom'];
    $desc = $_POST['desc'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];
    $menu = $_POST['menu'];
    $plat = $_POST['plat'];

    $stmts = $pdo->prepare('INSERT INTO produit(Nom_produit, Description, Prix, Img, MenuJour, Type_plat) VALUES(:nom, :desc, :prix, :image, :menu, :plat)');
    $stmts->bindParam(':nom', $nom);
    $stmts->bindParam(':desc', $desc);
    $stmts->bindParam(':prix', $prix);
    $stmts->bindParam(':image', $image);
    $stmts->bindParam(':menu', $menu);
    $stmts->bindParam(':plat', $plat);

    $stmts->execute();
} else if ($_POST['exec'] == 2) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $desc = $_POST['desc'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];
    $menu = $_POST['menu'];
    $plat = $_POST['plat'];

    $stmts = $pdo->prepare('UPDATE produit SET Nom_produit = :nom, Description = :desc, Prix = :prix, Img = :image, MenuJour = :menu, Type_plat = :plat WHERE Id_Produit = :id; ');
    $stmts->bindParam(':nom', $nom);
    $stmts->bindParam(':desc', $desc);
    $stmts->bindParam(':prix', $prix);
    $stmts->bindParam(':image', $image);
    $stmts->bindParam(':menu', $menu);
    $stmts->bindParam(':plat', $plat);
    $stmts->bindParam(':id', $id);

    $stmts->execute();
}

echo json_encode($_POST);


// Fermeture de la connexion à la base de données
$pdo = null;
