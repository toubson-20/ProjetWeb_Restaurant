<?php
session_start();
$id = $_SESSION['id'];
// Connexion à la base de données
include_once  '../../controller/connexionBD.php';
$pdo = connect_to_database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmts = $pdo->prepare('DELETE FROM Produit WHERE Id_Produit = :id ');
    $stmts->bindParam(":id", $id);

    $stmts->execute();
}
