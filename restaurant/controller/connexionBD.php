<?php

// connexionBD.php
$pdo = null; // initialiser la variable globale
// $connect = false;

function connect_to_database()
{
    global $pdo; // accéder à la variable globale dans la fonction
    // Définir les informations de connexion à la base de données
    $serveur = "localhost"; // ou "127.0.0.1"
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "mboa_foodies";

    // Se connecter à la base de données MySQL en utilisant PDO
    try {
        $dsn = "mysql:host=$serveur;dbname=$baseDeDonnees;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $utilisateur, $motDePasse, $options);
        return $pdo;
    } catch (PDOException $e) {
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    }
}

connect_to_database(); // appeler la fonction pour initialiser la variable globale