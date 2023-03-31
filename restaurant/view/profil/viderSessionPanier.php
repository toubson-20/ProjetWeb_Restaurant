<?php
session_start();
$_SESSION['panierAcceuil']['somme'] = 0;
array_splice($_SESSION['panierAcceuil']['produits'], 0); // Vider le tableau en session
array_splice($_SESSION['panier'], 0);
echo "Session vidée !";
