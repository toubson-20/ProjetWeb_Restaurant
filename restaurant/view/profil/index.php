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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="loader">
        <div id="status"></div>
    </div>
    <div id="site-header">
        <header id="header" class="header-block-top">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <!-- navbar -->
                        <nav class="navbar navbar-default" id="mainNav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">basculer dans la navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a class="navbar-brand js-scroll-trigger logo-header" href="#">
                                        <img src="../images/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="connexion" id="connected"><a href="./view/connexion/connexion.html">Connexion</a></li>
                                    <li><a href="#footer">Contact</a></li>
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
            echo '<p for="prenom">Prenom : <input type="text" id="prenom" name="prenom" class="profil" value=' . $user['preNom'] . ' disabled></p>';
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
                                     SET login=:login, nom=:nom, preNom=:prenom
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
                                <?php   
                    // Afficher le contenu du panier
                    if (count($_SESSION['panier']) > 0) {
                    foreach ($_SESSION['panier'] as $produit) {
                        echo '<div class="produit">';
                        echo '<img src="' . $produit['img'] . '" alt="' . $produit['nom'] . '">';
                        echo '<h3>' . $produit['nom'] . '</h3>';
                        echo '<p>' . $produit['description'] . '</p>';
                        echo '<p>Prix : ' . $produit['prix'] . ' €</p>';
                        echo '</div>';
                    }
                    } else {
                    echo '<p>Votre panier est vide.</p>';
                    }
                    ?>
                    


        </div>
      </div>
    </div>
    <br/><br/>

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
    <div id="footer" class="footer-main">
        <div class="footer-box pad-top-70">
            <div class="container">
                <div class="row">
                    <div class="footer-in-main">
                        <div class="footer-logo">
                            <div class="text-center">
                                <img src="./view/images/logo.png" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-a">
                                <h3>Apropos de nous</h3>
                                <p>Suivez notre quatidien</p>
                                <ul class="socials-box footer-socials pull-left">
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa  fa-facebook"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-twitter"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-google-plus"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-pinterest"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="social-circle-border"><i class="fa fa-linkedin"></i></div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                            <!-- end footer-box-a -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-b">
                                <h3>New Menu</h3>
                                <ul>
                                    <li><a href="#">OKOK</a></li>
                                    <li><a href="#">Kondrè</a></li>
                                    <li><a href="#">Deux oeuf spaguettis</a></li>
                                    <li><a href="#">Kouakoukou</a></li>
                                </ul>
                            </div>
                            <!-- end footer-box-b -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-c">
                                <h3>Contact</h3>
                                <p>
                                    <i class="fa fa-map-signs" aria-hidden="true"></i>
                                    <span>6 Esplanade, St Benoit, Dubaï</span>
                                </p>
                                <p>
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <span>
                                        +91 80005 89080
                                    </span>
                                </p>
                                <p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span><a href="#">support@mboafoodies.com</a></span>
                                </p>
                            </div>
                            <!-- end footer-box-c -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box-d">
                                <h3>Heures d'ouvertures</h3>

                                <ul>
                                    <li>
                                        <p>Lundi - Jeudi </p>
                                        <span> 11H00 - 21H00</span>
                                    </li>
                                    <li>
                                        <p>Vendredi - Samedi </p>
                                        <span> 11H00 - 23H00</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- end footer-box-d -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end footer-in-main -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
            <div id="copyright" class="copyright-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h6 class="copy-title"> Copyright &copy; 2023 MboaFoodies is powered by <a href="#" target="_blank"></a> </h6>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end copyright-main -->
        </div>
        <!-- end footer-box -->
    </div>
    <!-- end footer-main -->

    <a href="#" class="scrollup" style="display: none;">Scroll</a>

    <section id="color-panel" class="close-color-panel">
        <a class="panel-button gray2"><i class="fa fa-cog fa-spin fa-2x"></i></a>
        <!-- Colors -->
        <div class="segment">
            <h4 class="gray2 normal no-padding">Color Scheme</h4>
            <a title="orange" class="switcher orange-bg"></a>
            <a title="strong-blue" class="switcher strong-blue-bg"></a>
            <a title="moderate-green" class="switcher moderate-green-bg"></a>
            <a title="vivid-yellow" class="switcher vivid-yellow-bg"></a>
        </div>
    </section>

    <!-- SCRIPT -->

    <script>
        var isconnected = <?php echo json_encode($connected); ?>;
        var name = <?php echo json_encode($nom); ?>;
        console.log(name);

        if (isconnected) {
            if (document.getElementById('connected').classList.contains('connexion')) {
                document.getElementById('connected').classList.replace('connexion', 'profil');
                document.getElementById('connected').getElementsByTagName('a')[0].innerText = name;
                document.getElementById('connected').getElementsByTagName('a')[0].href = "./view/profil/profil.php";

            }
        }
    </script>
    <?php
    // session_unset();
    ?>
    <!-- ALL JS FILES -->
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/custom.js"></script>
</body>

</html>