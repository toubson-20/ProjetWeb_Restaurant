<?php
session_start();

// Vérifier si l'utilisateur a les droits nécessaires pour accéder à la page
if (!$_SESSION["connected"]) {
  // Rediriger l'utilisateur vers une autre page
  header('Location: ../../index.php');
  exit;
}

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

                echo "<br>Insertion client OK";
                $query2 = $pdo->prepare("SELECT Id_client FROM client WHERE Id_user = ?");
                $query2->execute([$id_user]);
            if ($pdo->commit()) {
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
                    $resp2 = $query4->fetchAll(PDO::FETCH_ASSOC);
                    var_dump($resp2);
                    echo "<br>Réccupération de l'id de la table reservé OK";

                    $pdo->beginTransaction();
                    // Insertion dans la deuxième table
                    $query4 = $pdo->prepare("INSERT INTO reserver (Id_table, Id_client, Heure_resa, Date_resa, Nb_personnes, Emplacement, Occasion) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $query4->execute([$resp2[end(array_keys($resp2))]['Id_table'], $resp['Id_client'], $heure, $date, intval($no_of_persons), $emplement, $occasion]);
                    if ($pdo->commit()) {
                        echo "<br>Insertion reserver OK<br>Votre table a été reservée";
                    }
                }
            }
        }
    }
}
