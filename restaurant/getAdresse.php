<!DOCTYPE html>
<html>

<head>
    <title>Géolocalisation en PHP</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API"></script>
</head>

<body>
    <script>
        function getCurrentAddress() {
            // Vérifie si la géolocalisation est prise en charge par le navigateur
            if (navigator.geolocation) {
                // Demande la position de l'utilisateur
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Obtient les coordonnées de latitude et longitude
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    // Envoie une requête à l'API de géocodage de Google Maps pour obtenir l'adresse
                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        location: {
                            lat: lat,
                            lng: lng
                        }
                    }, function(results, status) {
                        if (status === "OK") {
                            // Récupère l'adresse postale à partir des résultats de géocodage
                            const address = results[0].formatted_address;
                            console.log(address); // Affiche l'adresse postale dans la console
                        } else {
                            console.log("Erreur de géocodage : " + status);
                        }
                    });
                }, function(error) {
                    console.log("Erreur de géolocalisation : " + error.message);
                });
            } else {
                console.log("La géolocalisation n'est pas prise en charge par votre navigateur.");
            }
        }
        getCurrentAddress();
    </script>
</body>

</html>