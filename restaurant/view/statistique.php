<?php

include_once '../controller/connexionBD.php';
$pdo=connect_to_database();


    // Préparation de la requête
    $stmt = $pdo->prepare('SELECT Nombre_tables_resa,Nombre_commandes FROM statistiques');
    $stmt->execute();

    // Récupération du résultat
    $resultats = $stmt->fetch(PDO::FETCH_ASSOC);

    
// Affichage des statistiques de vente
echo "<p>Total des resa: " . $resultats['Nombre_tables_resa'] . "</p>";
echo "<p>Total des commandes: " . $resultats['Nombre_commandes'] . "€</p>";


