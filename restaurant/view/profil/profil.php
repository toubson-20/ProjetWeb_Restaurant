<?php
session_start();
$connected = $_SESSION["connected"];
$name = $_SESSION['name'];
$id = $_SESSION['id'];


require_once '../../controller/connexionBD.php';
$pdo = connect_to_database();
// Préparation de la requête
$stmt = $pdo->prepare('SELECT * FROM users WHERE id_user = ?');
$stmt->execute(array($id));

// Récupération du résultat
$user = $stmt->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

  <!-- Site Metas -->
  <title>MboaFoodies</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Site CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="style.css" />
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="../css/responsive.css">
  <!-- color -->
  <link id="changeable-colors" rel="stylesheet" href="../css/colors/orange.css" />

  <!-- Modernizer -->
  <script src="../js/modernizer.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <div id="site-header">
    <header id="header" class="header-block-top">
      <div class="container">
        <div class="row">
          <div class="main-menu">
            <!-- navbar -->
            <nav class="navbar navbar-default" id="mainNav">
              <div class="navbar-header">
                <div class="logo">
                  <a class="navbar-brand js-scroll-trigger logo-header" href="../../index.php">
                    <img src="../images/logo.png" alt="">
                  </a>
                </div>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="connexion" id="connected"><a id="userName"><?php echo $name ?></a></li>
                  <li>
                    <form method="post" action="profil.php">
                      <input type="text" style="display: none;" name="connected" value=false>
                      <button class="primary" style="background-color: orangered;" name="submit" type="submit">Déconnexion</button>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                      $connect = $_POST['connected'];

                      if ($connect) {
                        $_SESSION['connected'] = $connect;
                        session_unset();
                        echo '<script>
                                                    document.location.href="../../index.php";

                                                </script>';
                      }
                    }
                    ?>
                  </li>
                </ul>
              </div>
              <!-- end nav-collapse -->
            </nav>
            <!-- end navbar -->
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container-fluid -->
    </header>
    <!-- end header -->
  </div>
  <!-- end site-header -->
  <nav>
    <div class="mock"></div>
    <div class="fixed">
      <div class="nav-content">
        <img class="logo" alt="logo" src="/images/logo.png" />
        <div class="desktop-only">
        </div>
        <div>
          <form method="post" action="profil.php">
            <input type="text" style="display: none;" name="connected" value=false>
            <button class="primary" style="background-color: orangered;" name="submit" type="submit">Déconnexion</button>
          </form>

          <?php
          if (isset($_POST['submit'])) {
            $connect = $_POST['connected'];

            if ($connect) {
              $_SESSION['connected'] = $connect;
              session_unset();
              echo '<script>
                        document.location.href="../../index.php";

                    </script>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </nav>
  <main>


    <!-- ************************************* TEST PARTIES ********************************* -->

    <br /><br /><br /><br /><br /><br />
    <div class="tabs">
      <ul class="tab-links">
        <li class="active"><a href="#tab1">PROFIL</a></li>
        <li><a href="#tab2">RESERVATIONS</a></li>
        <li><a href="#tab3">PANIER</a></li>
        <li><a href="#tab4">PRODUIT</a></li>
        <li><a href="#tab5">STATISTIQUES</a></li>
      </ul>

      <div class="tab-content">

        <!-- ********************* PROFIL ******************** -->

        <div id="tab1" class="tab active">
          <p>VOS INFORMATIONS</p>
          <div class="contain-info">
            <?php
            echo '<form id="profil-form">';
            echo '<p>Login : <input type="text" id="login" name="login" class="profil" value=' . $user['login'] . ' disabled></p>';
            echo '<p for="nom">Nom : <input type="text" id="nom" name="nom" class="profil" value=' . $user['nom'] . ' disabled></p>';
            echo '<p for="prenom">Prenom : <input type="text" id="prenom" name="prenom" class="profil" value=' . $user['preNom'] . ' disabled></p>';
            echo '<p for="mdp">Mot de passe : <input type="password" name="mdp" id="mdp" class="profil" value=' . $user['mdp'] . ' disabled></p>';
            echo '</form>';
            ?>
            <button class="primary bt" id="modifier" style="background-color: orangered;">Modifier</button>
            <button class="primary bt enrg" id="save" type="submit" name="submit" style="background-color: green;">Enregistrer</button>


          </div>
        </div>

        <!-- ********************* RESERVATION ******************** -->

        <div id="tab2" class="tab">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Nombre de Personne</th>
                <th>Emplacement</th>
                <th>Occasion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $statement = $pdo->query('SELECT Id_client FROM client WHERE Id_user = ' . $id);
              $statement->execute();
              //récupération résultat
              $id_user = $statement->fetch(PDO::FETCH_ASSOC);
              // echo "<td>" . $id_user['Id_client'] . "</td>";

              $statement = $pdo->query('SELECT * FROM reserver WHERE Id_client = ' . $id_user['Id_client']);
              while ($item = $statement->fetch()) {
                echo '<tr>';
                echo '<td>' . $item['Date_resa'] . '</td>';
                echo '<td>' . $item['Heure_resa'] . '</td>';
                echo '<td>' . $item['Nb_personnes'] . '</td>';
                echo '<td>' . $item['Emplacement'] . '</td>';
                echo '<td>' . $item['Occasion'] . '</td>';
                echo '</tr>';
              }

              ?>
            </tbody>
          </table>
        </div>

        <!-- ********************* PANIER ******************** -->

        <div id="tab3" class="tab">
          Contenu de l'onglet 3
        </div>

        <!-- ********************* PRODUITS ******************** -->

        <div id="tab4" class="tab">

          <!-- Premier accordeon -->
          <button class="accordion">Liste Produit / Modification / Suppression</button>
          <div class="panel">
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
                  echo '<td>' . $item['Img'] . '</td>';

                  if ($item['MenuJour'] == 1) $m = "oui";
                  else $m = "non";

                  echo '<td>' . $m . '</td>';
                  echo '<td>' . $item['Type_plat'] . '</td>';
                  echo '<td width=300>';
                  echo '<a class="btn-default"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                  echo ' ';
                  echo '<a class="btn-primary"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                  echo ' ';
                  echo '<a class="btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                  echo '</td>';
                  echo '</tr>';
                }

                ?>
              </tbody>
            </table>
          </div>

          <!-- Deuxième accordeon -->
          <button class="accordion">Ajouter Produit</button>
          <div class="panel">
            <p>Nom du produit : <input type="text" name="nomP" required></p>
            <p>Description :<textarea name="desc" id="desc" rows="5" cols="50" required></textarea></p>
            <p>Prix : <input type="text" name="prix" required></p>
            <p>Image : <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" title="Choisir une image" required></p>
            <p>Menu du jour : <select id="menu" name="Menu">
                <option value="1">Oui</option>
                <option value="0">Non</option>
              </select></p>
            <p>Type de plat : <select id="plat" name="plat">
                <option value="aperitif">Apéritf</option>
                <option value="entree">Entrée</option>
                <option value="plat">Plat</option>
                <option value="dessert">Dessert</option>
                <option value="boisson">Boisson</option>
              </select></p>
            <button type="submit" name="enrg" id="enrg" class="btn-primary" style="background-color: orangered; color:white">Enregistrer</button>
          </div>

          <!-- Troisième accordeon -->
          <button class="accordion">Stock</button>
          <div class="panel">
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
            echo "
            <p>Nombre de produits : " . $count['nbre'] . " </p>
            <p>Nombre d'entrées : " . $entree['entree'] . "</p>
            <p>Nombre de dessert : " . $dessert['dessert'] . " </p>
            <p>Nombre d'apéritif :  " . $aperitif['aperitif'] . " </p>
            <p>Nombre de plat : " . $plat['plat'] . " </p>
            <p>Nombre de boissons : </p> " . $boisson['boisson'] . "</p>";
            ?>
          </div>
        </div>

        <!-- ********************* STATS ******************** -->

        <div id="tab5" class="tab">
          Stats
        </div>
      </div>


    </div>
    </div>


    <script>
      // ********* Evènement sur le bouton modifier *********************

      const login = document.getElementById("login");
      const nom = document.getElementById("nom");
      const prenom = document.getElementById("prenom");
      const modifier = document.getElementById("modifier");
      const save = document.getElementById("save");
      const enrg = document.getElementById("enrg");

      modifier.addEventListener("click", () => {
        $('#nom').prop('disabled', false);
        $('#login').prop('disabled', false);
        $('#prenom').prop('disabled', false);

        login.style.border = "1px solid orangered";
        nom.style.border = "1px solid orangered";
        prenom.style.border = "1px solid orangered";

        save.style.display = "inline-block";
      });

      save.addEventListener("click", () => {

        //   $('#profil-form').submit(function(event) {
        //     event.preventDefault(); // Empêcher la soumission par défaut du formulaire

        // Récupération des données du formulaire
        var nom = $('#nom').val();
        var login = $('#login').val();
        var prenom = $('#prenom').val();

        $('#nom').prop('disabled', true);
        $('#login').prop('disabled', true);
        $('#prenom').prop('disabled', true);

        $("#nom").css("border", "none");
        $("#login").css("border", "none");
        $("#prenom").css("border", "none");

        // Envoi des données via AJAX
        $.ajax({
          url: 'https://localhost/restaurant/view/profil/maj.php',
          type: 'POST',
          data: {
            nom: nom,
            login: login,
            prenom: prenom,
            exec: 0
          },
          success: function(response) {
            $("#save").css("display", "none");
            alert("Données enregistrées");
            document.getElementById("userName").innerText = JSON.parse(response)['prenom'] + " " + JSON.parse(response)['nom'];

          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log('Erreur : ' + textStatus + ' - ' + errorThrown);
          }
        });

        // login.disabled = true;
        // login.style.border = "0";

        // nom.disabled = true;
        // nom.style.border = "0";

        // prenom.disabled = true;
        // prenom.style.border = "0";

        // save.style.display = "none";

        // });


      });

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

      // Fonction pour activer/désactiver les accordeons
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("accordion-active");
          var panel = this.nextElementSibling;
          if (panel.style.display === "block") {
            panel.style.display = "none";
          } else {
            panel.style.display = "block";
          }
        });
      }


      const tabLinks = document.querySelectorAll(".tab-links li");
      const tabContent = document.querySelectorAll(".tab-content .tab");

      tabLinks.forEach(function(el) {
        el.addEventListener("click", function() {
          const id = this.querySelector("a").getAttribute("href");

          tabLinks.forEach(function(el) {
            el.classList.remove("active");
          });

          tabContent.forEach(function(el) {
            el.classList.remove("active");
          });

          this.classList.add("active");
          document.querySelector(id).classList.add("active");
        });
      });
    </script>




    <!-- ********************************************************** FIN **************************************************** -->





    <script>
      // var name = <?php //echo json_encode($name); 
                    ?>;
      // document.getElementById('name').innerText = name;
    </script>


  </main>


</body>

</html>