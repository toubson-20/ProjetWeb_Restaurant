<?php
session_start();
// Récupérez les coordonnées de latitude et longitude de l'utilisateur

if (isset($_GET)) {
    $latitude = $_GET['lat'];
    $longitude = $_GET['long'];

    // Utilisez un service de géocodage pour traduire les coordonnées en adresse
    $url = "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=$latitude&lon=$longitude";
    $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:77.0) Gecko/20190101 Firefox/77.0')));
    $response = @file_get_contents($url, false, $context);
    if ($response === false) {
        // Gérer l'erreur si la requête échoue
        echo "Erreur : Impossible de se connecter au service de géocodage.";
    } else {
        // Traduire la réponse JSON en tableau associatif
        $adresse = json_decode($response, true);

        if (isset($adresse['display_name'])) {
            // Afficher l'adresse de l'utilisateur
            echo $adresse['display_name'];
            $_SESSION['localisationFound'] = true;
        } else {
            // Gérer l'erreur si l'adresse n'est pas disponible dans la réponse
            echo "Erreur : Impossible de récupérer votre adresse actuelle.";
            $_SESSION['localisationFound'] = false;
        }
    }
}




// function getAddress() {
//     let address_, produits;
//     if (document.getElementById('addressIn').value == "") {
//       if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(
//           function(position) {
//             var latitude = position.coords.latitude;
//             var longitude = position.coords.longitude;
//             $.ajax({
//               url: "../../test.php",
//               type: "GET",
//               data: {
//                 lat: latitude,
//                 long: longitude
//               },
//               success: function(address) {
//                 produits = <?php echo json_encode($tab) 
?>;
// address_ = address;
// commander(produits, address_);
// },
// error: function(jqXHR, textStatus, errorThrown) {
// console.log('Erreur : ' + textStatus + ' - ' + errorThrown);
// }
// });
// },
// function(error) {
// console.log(error);
// alert("La géolocalisation n'est pas autorisée par votre navigateur.");
// document.getElementById('address').style.display = "block";
// }
// );
// }
// } else {
// address_ = document.getElementById('addressIn').value;
// produits = <?php echo json_encode($tab) ?>;
// commander(produits, address_);
// }
// }