<?php
session_start();
$id_user = $_SESSION['id'];
include_once '../restaurant/controller/connexionBD.php';
$pdo = connect_to_database();
if (isset($_POST['submit'])) {
    // Récupération des données envoyées par le formulaire
    $form_name     = $_POST['form_name'];
    $date     = date('Y-m-d', strtotime($_POST['date']));
    $heure     = date('H:i:s', strtotime($_POST['time']));
    $email    = $_POST['email'];
    $phone   = $_POST['phone'];
    $no_of_persons   = $_POST['no_persons'];
    $emplement = $_POST['emplacement'];
    $occasion = $_POST['occasion'];

    $validation = true;
    if ($validation) {
        if ($id_user != null) {
            // Préparer la requête SQL
            $pdo->beginTransaction();
            // Insertion dans la première table
            $query1 = $pdo->prepare("INSERT INTO client (Id_user) VALUES (?)");
            $query1->execute([$id_user]);
            // Validation de la transaction
            if ($pdo->commit()) {
                echo "<br>Insertion client OK";
                $query2 = $pdo->prepare("SELECT Id_client FROM client WHERE Id_user = ?");
                $query2->execute([$id_user]);
                $resp = $query2->fetch(PDO::FETCH_ASSOC);
                echo "<br>Réccupération de l'id du client OK";

                $pdo->beginTransaction();
                // Insertion dans la deuxième table
                $query3 = $pdo->prepare("INSERT INTO table_reserver (Id_client) VALUES (?)");
                $query3->execute([$resp['Id_client']]);
                if ($pdo->commit()) {
                    echo "<br>Insertion table_reserver OK";
                    $query4 = $pdo->prepare("SELECT Id_table FROM table_reserver WHERE Id_client = ?");
                    $query4->execute([$resp['Id_client']]);
                    $resp2 = $query4->fetch(PDO::FETCH_ASSOC);
                    echo "<br>Réccupération de l'id de la table reservé OK";

                    $pdo->beginTransaction();
                    // Insertion dans la deuxième table
                    $query4 = $pdo->prepare("INSERT INTO reserver (Id_table, Id_client, Heure_resa, Date_resa, Nb_personnes, Emplacement, Occasion) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $query4->execute([$resp2['Id_table'], $resp['Id_client'], $heure, $date, intval($no_of_persons), $emplement, $occasion]);
                    if ($pdo->commit()) {
                        echo "<br>Insertion reserver OK<br>Votre table a été reservée";
                    }
                }
            } else {
                echo "Une erreur s'est produite lors de l'ajout des données.";
            }
        }
    }
}
