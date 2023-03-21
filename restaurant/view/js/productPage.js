
function increaseQuantity() {
  let quantity = document.getElementById('quantity');
  quantity.value = parseInt(quantity.value) + 1;
}

function decreaseQuantity() {
  let quantity = document.getElementById('quantity');
  if (parseInt(quantity.value) > 1) {
    quantity.value = parseInt(quantity.value) - 1;
  }
}

function modifier_Produit(){
  var nom = $('#nomProduit').val();
  var desc = $('#description').val();
  var prix = $('#prix').val();
  var image = $('#imageUrl').val();
  var menu = $('#menu_Jour').val();
  var plat = $('#typePlat').val();
  var id = $('#id').val();

  // Envoi des données via AJAX
  var that = document;
  $.ajax({
      url: 'https://localhost/restaurant/view/profil/maj.php',
      type: 'POST',
      data: {
          id: id,
          nom: nom,
          desc: desc,
          prix: prix,
          image: image,
          menu: menu,
          plat: plat,
          exec: 2
      },
      success: function(response) {
          alert("Produit modifié");
          document.getElementById('nomP'+id).innerText = nom;
          document.getElementById('descP'+id).innerText = desc;
          document.getElementById('prixP'+id).innerText = prix;
          document.getElementById('imgP'+id).innerText = image;
          document.getElementById('tpP'+id).innerText = plat;
          document.getElementById('mjP'+id).innerText = menu;
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log('Erreur : ' + textStatus + ' - ' + errorThrown);
      }
  });
}
