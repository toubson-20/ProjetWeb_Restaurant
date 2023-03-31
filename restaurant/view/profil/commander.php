<?php
session_start();
require_once '../../controller/connexionBD.php';
$pdo = connect_to_database();

if (empty($_POST['data'])) {
    echo "Panier vide";
} else {
    echo count($_SESSION['panierAcceuil']['produits']) . "  ";
    foreach ($_SESSION['panierAcceuil']['produits'] as $produit) {
        $image = $produit['img'];
        $qte = $produit['quantite'];
        echo $qte . "  ";
        //     // $stmt = $pdo->prepare('SELECT Id_Produit FROM produit WHERE Img = ?');
        //     // $stmt->execute(array($image));
        //     // $idP = $stmt->fetchColumn(); //pour récupérer la première valeur de la 1ère colonne

        //     // $sql = "INSERT INTO commandes_produits (Id_commande, Id_produit , quantité, prixUnitaire,) VALUES (:idC, :idP, :qte, :prix)";
        //     // $stmt = $pdo->prepare($sql);

        //     // // Binder les paramètres
        //     // $stmt->bindParam(':heure', $heure);
        //     // $stmt->bindParam(':dat', $date);
        //     // $stmt->bindParam(':addr', $adresse);
        //     // $stmt->bindParam(':idE', $resp2['Id_employe']);
        //     // $stmt->bindParam(':idC', $resp['Id_client']);
        //     // $stmt->execute();
    }
}

    // global $lastIdCommande;

    // $idsProduit = $_POST['data'];
    // $date =  gmdate('Y-m-d');
    // $heure = gmdate('H:i:s', strtotime('+15 minutes'));

    // $adresse = $_POST['address'];
    // $id_user = $_SESSION['id'];
    // include_once '../../controller/connexionBD.php';
    // $pdo = connect_to_database();

    // $pdo->beginTransaction();

    // $query = $pdo->prepare("SELECT Id_client FROM client WHERE Id_user = :idUsr");
    // $query->bindValue(':idUsr', $id_user);
    // $query->execute();

    // $resp = $query->fetch(PDO::FETCH_ASSOC);

    // $query2 = $pdo->prepare("SELECT employe.Id_employe FROM employe WHERE employe.Id_employe NOT IN (SELECT Id_employe FROM commande WHERE heure_livraison = :heure AND date_livraison = :dat)");
    // $query2->bindValue(':heure', $heure);
    // $query2->bindValue(':dat', $date);
    // $query2->execute();

    // $resp2 = $query2->fetch(PDO::FETCH_ASSOC);

    // for ($i = 0; $i < count($idsProduit); $i++) {
    //     // Préparer la requête SQL
    //     $sql = "INSERT INTO commande (heure_livraison, date_livraison , Adresse_livraison, Id_employe, Id_client) VALUES (:heure, :dat, :addr, :idE, :idC)";
    //     $stmt = $pdo->prepare($sql);

    //     // Binder les paramètres
    //     $stmt->bindParam(':heure', $heure);
    //     $stmt->bindParam(':dat', $date);
    //     $stmt->bindParam(':addr', $adresse);
    //     $stmt->bindParam(':idE', $resp2['Id_employe']);
    //     $stmt->bindParam(':idC', $resp['Id_client']);
    //     $stmt->execute();

    //     $lastIdCommande = $pdo->lastInsertId();
    // }


    // if ($pdo->commit()) {
    //     echo "Merci pour votre commande !";
    // } else {
    //     echo "Une erreur s'est produite lors de l'ajout des données.";
    // }
// }
