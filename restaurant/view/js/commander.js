function commander(produitsCommande, address){
    $.ajax({
        url: '../profil/commander.php',
        type: 'POST',
        data: { data : produitsCommande, address: address},
        success: function(response) {
          alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log('Erreur : ' + textStatus + ' - ' + errorThrown);
        }
    });
}
