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


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-WWn1vE5ulX9mZnKfso8oxqWjQv6ZMz9ZJx6U8zz6jtYv6yBhSywOmd6LHTbFwkfS+5Z5G5so0z8j0WY4v4ROlQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
  <main>


    <!-- ************************************* TEST PARTIES ********************************* -->

    <br /><br /><br /><br /><br /><br />
    <div class="tabs">
      <ul class="tab-links">
        <li class="active"><a href="#tab1">PROFIL</a></li>
        <li><a href="#tab2">RESERVATIONS</a></li>
        <li><a href="#tab3">PANIER</a></li>
        <li class = "ifAdmin"><a href="#tab4">PRODUIT</a></li>
        <li class = "ifAdmin"><a href="#tab5">STATISTIQUES</a></li>
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
              // Récupérer l'ID du client en fonction de l'ID utilisateur
              $statement = $pdo->query('SELECT Id_client FROM client WHERE Id_user = ' . $id);
              $statement->execute();
              if (!$statement) {
                echo("Une erreur est survenue<br>");
              }else{
                $id_user = $statement->fetch(PDO::FETCH_ASSOC);
              }
              if (!$id_user) {
                echo("Vous n'êtes pas client<br>");
              }else{
                // Récupérer les réservations du client en question
                $statement = $pdo->query('SELECT * FROM reserver WHERE Id_client = ' . $id_user['Id_client']);
              }
              
              if (!$statement) {
                echo("La recupération des données a échoué<br>");
              }else{
                  while ($val = $statement->fetch()) {
                    echo '<tr>';
                    echo '<td>' . $val['Date_resa'] . '</td>';
                    echo '<td>' . $val['Heure_resa'] . '</td>';
                    echo '<td>' . $val['Nb_personnes'] . '</td>';
                    echo '<td>' . $val['Emplacement'] . '</td>';
                    echo '<td>' . $val['Occasion'] . '</td>';
                    echo '</tr>';
                  }
              }

              ?>
            </tbody>
          </table>
        </div>


        <!-- ********************* PANIER ******************** -->

        <div id="tab3" class="tab">
          Contenu de l'onglet 3
        </div>

        <?php
          $isAdmin = false;
          if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
            include_once 'ongletsAdmin.php';
            $isAdmin = true;
          }
        ?>

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

    <!-- IF ADMIN -->
    <script>
      var isAdmin = "<?php echo $isAdmin ?>";
      if(isAdmin){
        var elements = document.querySelectorAll('.ifAdmin');
        elements.forEach(elt => {
          elt.style.display = "block";
        });
      }
    </script>


    <!-- ********************************************************** FIN **************************************************** -->



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      // var name = <?php //echo json_encode($name); 
                    ?>;
      // document.getElementById('name').innerText = name;
      // Données pour le graphique en camembert
      var dataPie = {
        labels: ["Entrées", "Desserts", "Apréritifs", "Plats", "Boissons"],
        datasets: [{
          data: [<?php echo join(', ', $dataPie); ?>],
          backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
        }]
      };

      // Options pour le graphique en camembert
      var optionsPie = {
        responsive: true,
        title: {
          display: true,
          text: 'Couleurs préférées'
        }
      };
      var ctxPie = document.getElementById("pie-chart").getContext("2d");
      var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: dataPie,
        options: optionsPie
      });
    </script>


  </main>


</body>

</html>