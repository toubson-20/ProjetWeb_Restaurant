<?php
session_start();
$connected = $_SESSION["connected"];
$name = $_SESSION['name'];
$id = $_SESSION['id'];

require_once '../../controller/connexionBD.php';

// Préparation de la requête
$stmt = $pdo->prepare('SELECT * FROM users WHERE id_user = ?');
$stmt->execute(array($id));

// Récupération du résultat
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Profile</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
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
    <header>
      <div class="header-wrap">
        <div class="profile-pic">
          <img src="/images/profile-logo.jpg" alt="profile-logo" />
        </div>
        <div class="profile-info">
          <div class="desktop-only">
            <div class="descriptions row last">
              <h1><label for="name" id="name" style="text-transform: uppercase;"></label></h1>
              <span>
                Everyone has a story to tell.
                <br />
                Tag <a>#ShotoniPhone</a> to take part.
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="profile-info mobile-only">
        <div class="descriptions row">
          <h1>apple</h1>
          <span>
            Everyone has a story to tell.
            <br />
            Tag <a>#ShotoniPhone</a> to take part.
          </span>
        </div>
      </div>
    </header>


    <!-- ************************************* TEST PARTIES ********************************* -->


    <div class="tabs">
      <ul class="tab-links">
        <li class="active"><a href="#tab1">PROFIL</a></li>
        <li><a href="#tab2">RESERVATIONS</a></li>
        <li><a href="#tab3">PANIER</a></li>
      </ul>

      <div class="tab-content">
        <div id="tab1" class="tab active">
          <p>VOS INFORMATIONS</p>
          <div class="contain-info">
            <?php
            echo '<form method="post" action="profil.php">';
            echo '<p>Login : <input type="text" id="login" name="login" class="profil" value=' . $user['login'] . ' disabled></p>';
            echo '<p for="nom">Nom : <input type="text" id="nom" name="nom" class="profil" value=' . $user['nom'] . ' disabled></p>';
            echo '<p for="prenom">Prenom : <input type="text" id="prenom" name="prenom" class="profil" value=' . $user['prenom'] . ' disabled></p>';
            echo '<p for="mdp">Mot de passe : <input type="password" ame="mdp" id="mdp" class="profil" value=' . $user['mdp'] . ' disabled></p>';
            echo '</form>';
            ?>
            <button class="primary bt" id="modifier" style="background-color: orangered;">Modifier</button>
            <button class="primary bt enrg" id="save" type="submit" name="submit" style="background-color: green;">Enregistrer</button>

            <?php
            if (isset($_POST['submit'])) {
              $login = $_POST['login'];
              $nom = $_POST['nom'];
              $prenom = $_POST['prenom'];

              // Préparation de la requête
              $stmt = $pdo->prepare('UPDATE users
                                     SET login=:login, nom=:nom, prenom=:prenom
                                     WHERE id=:id');

              // on donne les paramètres
              $stmt->bindParam(':login', $login);
              $stmt->bindParam(':nom', $nom);
              $stmt->bindParam(':prenom', $prenom);
              $stmt->bindParam(':id', $id);

              $stmt->execute();
            }
            ?>

          </div>
        </div>

        <div id="tab2" class="tab">
          Contenu de l'onglet 2
        </div>

        <div id="tab3" class="tab">
          Contenu de l'onglet 3
        </div>
      </div>
    </div>


    <script>
      // ********* Evènement sur le bouton modifier

      const login = document.getElementById("login");
      const nom = document.getElementById("nom");
      const prenom = document.getElementById("prenom");
      const modifier = document.getElementById("modifier");
      const save = document.getElementById("save");

      modifier.addEventListener("click", () => {
        login.disabled = false;
        login.style.border = "1px solid orangered";

        nom.disabled = false;
        nom.style.border = "1px solid orangered";

        prenom.disabled = false;
        prenom.style.border = "1px solid orangered";

        save.style.display = "inline-block";
      });

      save.addEventListener("click", () => {
        login.disabled = true;
        login.style.border = "0";

        nom.disabled = true;
        nom.style.border = "0";

        prenom.disabled = true;
        prenom.style.border = "0";

        save.style.display = "none";
      });

      // récupération des données envoyées en ajax

      // ********** Evènement sur la table

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
      var name = <?php echo json_encode($name); ?>;
      document.getElementById('name').innerText = name;
    </script>

    <!-- ********************* PROFIL ******************** -->



    <!-- ********************* RESERVATION ******************** -->

    <!-- ********************* PANIER ******************** -->

  </main>
</body>

</html>