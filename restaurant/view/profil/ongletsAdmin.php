<!-- ********************* PRODUITS ******************** -->

<div id="tab4" class="tab">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default ">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Liste produits
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body table-scroll">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Prix</th>
                                            <th>Image</th>
                                            <th>Menu du jour</th>
                                            <th>Type plat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $m = "";
                                        $statement = $pdo->query('SELECT * FROM produit');
                                        while ($item = $statement->fetch()) {
                                            echo '<tr>';
                                            echo '<td>' . $item['Nom_produit'] . '</td>';
                                            echo '<td>' . $item['Description'] . '</td>';
                                            echo '<td>' . $item['Prix'] . '</td>';
                                            echo '<td class="reduce" title="' . $item["Img"] . '">' . $item['Img'] . '</td>';

                                            if ($item['MenuJour'] == 1) $m = "oui";
                                            else $m = "non";

                                            echo '<td>' . $m . '</td>';
                                            echo '<td>' . $item['Type_plat'] . '</td>';
                                            echo '<td width=300>';
                                            echo '<div class="btn-group">
                            <a class="btn-default" data-toggle="tooltip" data-placement="top" title="Voir">
                              <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a class="btn-primary" data-toggle="tooltip" data-placement="top" title="Modifier">
                              <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a class="btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
                              <span class="glyphicon glyphicon-remove"></span>
                            </a>
                          </div>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Ajouter produit
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <form class="formAjout">
                                    <div class="form-group">
                                        <label for="nomProduit">Nom du produit :</label>
                                        <input type="text" id="nomProduit" name="nomProduit" required><br><br>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description :</label>
                                        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="prix">Prix :</label>
                                        <input type="number" id="prix" name="prix" required><br><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="imageUrl">Image URL :</label>
                                        <input type="text" id="imageUrl" name="imageUrl" required><br><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="menuJour">Menu du jour :</label>
                                        <input type="checkbox" id="menuJour" name="menuJour"><br><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="typePlat">Type de plat :</label>
                                        <select id="typePlat" name="typePlat" required>
                                            <option value="">--Choisissez une option--</option>
                                            <option value="entree">Entrée</option>
                                            <option value="plat">Plat principal</option>
                                            <option value="dessert">Dessert</option>
                                        </select>
                                    </div>

                                    <input type="submit" value="Soumettre" name="enrg" id="enrg">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ********************* STATS ******************** -->

<div id="tab5" class="tab">
    <div class="bodyDash">
        <h1>Dashboard</h1>
        <div class="containerDash">
            <div class="cardDash">
                <div class="card-header">
                    <h2>Card 1</h2>
                </div>
                <div class="card-body">Stock</div>
            </div>
            <div class="cardDash">
                <div class="card-header">
                    <h2>Card 2</h2>
                </div>
                <div class="card-body">456</div>
            </div>
            <div class="graphDash chart-container">
                <h2>Graphique 1</h2>
                <?php

                $count = $pdo->query('SELECT COUNT(*) as nbre FROM produit; ');
                $count = $count->fetch();

                $aperitif = $pdo->query('SELECT COUNT(*) as aperitif FROM produit WHERE Type_plat = "aperitif"; ');
                $aperitif = $aperitif->fetch();

                $entree = $pdo->query('SELECT COUNT(*) as entree FROM produit WHERE Type_plat = "entree"; ');
                $entree = $entree->fetch();

                $plat = $pdo->query('SELECT COUNT(*) as plat FROM produit WHERE Type_plat = "plat"; ');
                $plat = $plat->fetch();

                $dessert = $pdo->query('SELECT COUNT(*) as dessert FROM produit WHERE Type_plat = "dessert"; ');
                $dessert = $dessert->fetch();

                $boisson = $pdo->query('SELECT COUNT(*) as boisson FROM produit WHERE Type_plat = "boisson"; ');
                $boisson = $boisson->fetch();

                $dataPie = array($entree['entree'], $dessert['dessert'], $aperitif['aperitif'], $plat['plat'], $boisson['boisson']);
                ?>
                <section class="chart-container">
                    <canvas id="pie-chart"></canvas>
                </section>
                <!-- Ajoutez ici le code pour le premier graphique -->
            </div>
            <div class="graphDash">
                <h2>Graphique 2</h2>
                <!-- Ajoutez ici le code pour le deuxième graphique -->
            </div>
        </div>
    </div>
</div>
</div>
<script>
     enrg.addEventListener("click", () => {
        var nomP = $('#nomP').val();
        alert(nomP);
        var desc = $('#desc').val();
        var prix = $('#prix').val();
        var image = $('#image').val();
        var menu = $('#menu').val();
        var plat = $('#plat').val();

        // Envoi des données via AJAX
        $.ajax({
          url: 'https://localhost/restaurant/view/profil/maj.php',
          type: 'POST',
          data: {
            nom: nomP,
            desc: desc,
            prix: prix,
            image: image,
            menu: menu,
            plat: plat,
            exec: 1
          },
          success: function(response) {
            alert("Produit enregistré");
            alert(response);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log('Erreur : ' + textStatus + ' - ' + errorThrown);
          }
        });
      });
</script>