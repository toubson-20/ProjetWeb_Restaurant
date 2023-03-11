<!-- HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Afficher la valeur par défaut dans un input disabled -->
<p for="prenom">Prenom : <input type="text" id="prenom" class="profil" value="John Doe" disabled></p>

<!-- Bouton pour envoyer la valeur à PHP via AJAX -->
<button class="primary bt" id="envoyer" style="background-color: orangered;">Envoyer</button>

<!-- Div pour afficher le résultat -->
<div id="resultat"></div>

<script>
    // Fonction pour envoyer la valeur du champ de texte via AJAX
    function envoyer_valeur() {
        // Obtenir la valeur du champ de texte
        const valeur = $('#prenom').val();

        // Envoyer la valeur à PHP via AJAX
        $.ajax({
            url: 'test.php',
            method: 'POST',
            data: {
                parametre: valeur
            },
            success: function(resultat) {
                // Afficher le résultat dans la div prévue à cet effet
                $('#resultat').html(resultat);
            },
            error: function() {
                // En cas d'erreur, afficher un message
                $('#resultat').html('Erreur lors de l\'envoi de la requête AJAX.');
            }
        });
    }

    // Attacher la fonction envoyer_valeur à l'événement "click" du bouton "Envoyer"
    $('#envoyer').click(envoyer_valeur);
</script>

<?php
// Récupérer la valeur envoyée par AJAX et l'afficher
if (isset($_POST['parametre'])) {
    $x = $_POST['parametre'];
    echo "La valeur envoyée est : " . $x;
}
?>



save.addEventListener("click", () => {
<?php
// // Préparation de la requête
// $stmt = $pdo->prepare('SELECT * FROM users WHERE id_user = ?');
// $stmt->execute(array($id));

// // Récupération du résultat
// $user = $stmt->fetch(PDO::FETCH_ASSOC);
echo "oiui";

?>