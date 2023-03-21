<?php
session_start();

$idsProduit = $_POST['data'];
$date =  gmdate('Y-m-d');
$heure = gmdate('H:i:s', strtotime('+15 minutes'));

$adresse = $_POST['address'];
$id_user = $_SESSION['id'];
include_once '../../controller/connexionBD.php';
$pdo = connect_to_database();

$pdo->beginTransaction();

$query = $pdo->prepare("SELECT Id_client FROM client WHERE Id_user = :idUsr");
$query->bindValue(':idUsr', $id_user);
$query->execute();

$resp = $query->fetch(PDO::FETCH_ASSOC);

$query2 = $pdo->prepare("SELECT employe.Id_employe FROM employe WHERE employe.Id_employe NOT IN (SELECT Id_employe FROM commande WHERE heure_livraison = :heure AND date_livraison = :dat)");
$query2->bindValue(':heure', $heure);
$query2->bindValue(':dat', $date);
$query2->execute();

$resp2 = $query2->fetch(PDO::FETCH_ASSOC);

for ($i=0; $i < count($idsProduit); $i++) { 
    // Préparer la requête SQL
    $sql = "INSERT INTO commande (heure_livraison, date_livraison , Adresse_livraison, Id_employe, Id_client) VALUES (:heure, :dat, :addr, :idE, :idC)";
    $stmt = $pdo->prepare($sql);

    // Binder les paramètres
    $stmt->bindParam(':heure', $heure);
    $stmt->bindParam(':dat', $date);
    $stmt->bindParam(':addr', $adresse);
    $stmt->bindParam(':idE', $resp2['Id_employe']);
    $stmt->bindParam(':idC', $resp['Id_client']);
    $stmt->execute();
}


if ($pdo->commit()) {
    echo "Merci pour votre commande !";
} else {
    echo "Une erreur s'est produite lors de l'ajout des données.";
}
?>
