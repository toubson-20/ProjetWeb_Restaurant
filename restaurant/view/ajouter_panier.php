
<?php

session_start();
if (isset($_GET['produit_id'])) {
  $produit_id = $_GET['produit_id'];

  if(!isset($_SESSION["panier"]))
    $_SESSION['panier'] = array();
  
  $_SESSION['panier'][] = array( 'id' => $produit_id, 'nouveauProduitAjoute' => true);

  // Afficher un message de confirmation
  echo "Le produit a été ajouté au panier.";
}

?>
