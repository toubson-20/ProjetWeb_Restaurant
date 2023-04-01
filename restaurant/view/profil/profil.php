<?php
session_start();
$connected = $_SESSION["connected"];
if (!$connected) {
    // L'utilisateur n'est pas connecté, on le redirige vers la page de connexion
    header('Location: ../../view/connexion/connexion.html');
    exit;
}
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
    <link rel="stylesheet" href="../css/productPage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-WWn1vE5ulX9mZnKfso8oxqWjQv6ZMz9ZJx6U8zz6jtYv6yBhSywOmd6LHTbFwkfS+5Z5G5so0z8j0WY4v4ROlQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/newStyle.css">
    <link rel="stylesheet" href="style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="../css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="../js/modernizer.js"></script>

    <!-- Script -->
    <script src="../js/commander.js"></script>
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
                                    <li sytle="cursor:pointer !important;">
                                        <a id="userName" sytle="cursor:pointer !important;">
                                            <form method="post" action="profil.php">
                                                <input type="text" style="display: none;" name="connected" value=false>
                                                <button name="submit" type="submit" sytle="cursor:pointer !important;">Déconnexion</button>
                                            </form>
                                        </a>

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
        <div class="tabs" style="width:950px !important;">
            <ul class="tab-links">
                <li class="active"><a href="#tab1">PROFIL</a></li>
                <li><a href="#tab2">RESERVATIONS</a></li>
                <li><a href="#tab3">PANIER</a></li>
                <li><a href="#tab7">COMMANDES</a></li>
                <li class="ifAdmin"><a href="#tab4">PRODUIT</a></li>
                <li class="ifAdmin"><a href="#tab5">STATISTIQUES</a></li>
                <li class="ifAdmin"><a href="#tab6">EMPLOYE</a></li>
            </ul>

            <div class="tab-content">

                <!-- ********************* PROFIL ******************** -->

                <div id="tab1" class="tab active">
                    <p>VOS INFORMATIONS</p>
                    <div class="contain-info">
                        <?php
                        echo '<form id="profil-form">';
                        echo '<p>Login : <input type="text" id="login" name="login" class="profil" value=' . $user['login'] . ' disabled style="width: 300px; margin-left:20px;"></p>';
                        echo '<p for="prenom">Prenom : <input type="text" id="prenom" name="prenom" class="profil" value=' . $user['preNom'] . ' disabled></p>';
                        echo '<p for="nom">Nom : <input type="text" id="nom" name="nom" class="profil" value=' . $user['nom'] . ' disabled style="margin-left:21px;></p>';
                        echo '<p for="mdp">Mot de passe : <input type="password" name="mdp" id="mdp" class="profil" value=' . $user['mdp'] . ' disabled><button id="bt-modif" style="display:none" class="pencil-btn"><span class="glyphicon glyphicon-pencil"></span></button></p>';
                        echo '<p id="p1" style="display:none">Ancien mot de passe : <input type="password" name="mdp1" id="mdp1" class="profil" ></p>';
                        echo '<p id="p2" style="display:none">Nouveau mot de passe : <input type="password" name="mdp2" id="mdp2" class="profil"></p>';
                        echo '</form>';
                        ?>

                        <span>
                            <button class="primary bt" id="annuler" style="background-color: blue;">Annuler</button>
                            <button class="primary bt" id="modifier" style="background-color: orangered;">Modifier</button>
                            <button class="primary bt enrg" id="save" name="submit" style="background-color: green;">Enregistrer</button>
                        </span>


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
                                echo ("Une erreur est survenue<br>");
                            } else {
                                $id_user = $statement->fetch(PDO::FETCH_ASSOC);
                            }
                            if (!$id_user) {
                                echo ("Vous n'êtes pas client<br>");
                            } else {
                                // Récupérer les réservations du client en question
                                $statement = $pdo->query('SELECT * FROM reserver WHERE Id_client = ' . $id_user['Id_client']);
                            }

                            if (!$statement) {
                                echo ("La recupération des données a échoué<br>");
                            } else {
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

                    <?php


                    // Vérifier si le panier existe dans la session
                    if (isset($_SESSION['panier'])) {
                        $panier = $_SESSION['panier'];
                    } else {
                        $panier = array();
                    }



                    // Afficher les données du panier dans un tableau

                    echo '<table id="tablePanier">';
                    echo '<tr><th>Produit</th><th>Prix</th><th>Quantité</th></tr>';
                    $tab = [];
                    $somme = 0;
                    $numProduit = 0;
                    foreach ($panier as $produit) {
                        if (in_array($produit['id'], $tab))
                            continue;
                        // Préparation de la requête
                        $stmt = $pdo->prepare('SELECT * FROM produit WHERE Id_Produit = ?');
                        $stmt->execute(array($produit['id']));

                        // Récupération du résultat
                        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
                        $produitsCommandes = [];
                        $co = 0;
                        foreach ($panier as $p)
                            if ($resultat["Id_Produit"] == $p['id'])
                                $co += 1;

                        $tab[] = $resultat["Id_Produit"];

                        $prix = $resultat['Prix'] * $co;
                        echo '<tr>';
                        echo '<td>' . $resultat['Nom_produit'] . '</td>';
                        echo '<td>' . $prix . ' €</td>';
                        echo '<td>' . $co . '</td>';
                        echo '</tr>';
                        $somme += $prix;


                        if ($_SESSION['panier'][$numProduit]['nouveauProduitAjoute']) {
                            echo $numProduit;
                            $_SESSION['panierAcceuil']['produits'][] = array('id' => $produit['id'], 'img' => $resultat["Img"], 'nom' => $resultat['Nom_produit'], 'prix' => $resultat['Prix'], 'quantite' => $co);
                            $_SESSION['panier'][$numProduit]['nouveauProduitAjoute'] = false;
                        }
                        $_SESSION['panierAcceuil']['produits'][$numProduit]['quantite'] = $co;
                        $numProduit += 1;
                    }
                    if ($somme > 0)
                        $_SESSION['panierAcceuil']['somme'] = $somme;

                    echo '<tr><td>Total</td><td>' . $somme . ' €</td></table>';
                    ?>
                    <form class="formAjout" id='address'><br><br>
                        <div class="form-group">
                            <label for="address">Adresse de livraison :</label>
                            <input type="text" id="addressIn" name="address" required><br><br>
                        </div>
                    </form><br><br>
                    <button type="button" class="btn btn-danger" onclick="viderPanier()">Vider</button>
                    <button type="button" class="btn btn-success" id="commander" onclick="commanderP()">Commander</button>


                </div>

                <div id="tab7" class="tab">
                    <?php
                    echo '<table id="tableCommande">';
                    echo '<tr><th>Identifiant Commande</th><th>Date/heure commande</th><th>Date/heure Livrais</th><th>Produit</th><th>Quantité</th><th>Prix</th><th>Somme</th></tr>';
                    $query2 = $pdo->prepare("SELECT Id_client FROM client WHERE Id_user = ?");
                    $query2->execute([$id]);
                    $id_client = $query2->fetch(PDO::FETCH_ASSOC);
                    // Préparation de la requête
                    $stmt = $pdo->prepare('SELECT * FROM commandes_produits, commande, produit WHERE commandes_produits.Id_commande = commande.Id_commande and commandes_produits.Id_produit = produit.Id_Produit and commande.Id_client = :id');
                    $stmt->bindParam(':id', $id_client['Id_client']);
                    $stmt->execute();

                    // Récupération du résultat
                    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultat as $commande){
                    
                    echo '<tr>';
                    echo '<td>' . $commande['Id_commande'] . '</td>';
                    echo '<td>' . $commande['date_commande']. ' '.$commande['heure_commande']. '</td>';
                    echo '<td>' . $commande['date_livraison']. ' '.$commande['heure_livraison']. '</td>';
                    echo '<td>' . $commande['Nom_produit'] . '</td>';
                    echo '<td>' . $commande['quantite'] . '</td>';
                    echo '<td>' . $commande['prixUnitaire'] . '</td>';
                    echo '<td>' . $commande['prixUnitaire'] * $commande['quantite'] . '</td>';
                    echo '</tr>';
                    }
                    echo '</table>';
                    ?>
                </div>

                <?php
                $isAdmin = false;
                if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
                    include_once 'ongletsAdmin.php';
                    $isAdmin = true;
                }
                ?>

            </div>


        </div>
        </div>


        <script>
            const nomUser = "<?= $user['nom'] ?>";
            const prenomUser = "<?= $user['preNom'] ?>";
            const loginUser = "<?= $user['login'] ?>";
            const mdpUser = "<?= $user['mdp'] ?>";


            function viderPanier() {
                // Supprimer les données du tableau HTML
                if (window.confirm("Vous allez vider le panier")) {
                    let table = document.getElementById("tablePanier");
                    let rowCount = table.rows.length;
                    for (let i = 1; i < rowCount; i++) {
                        table.deleteRow(1);
                    }

                    // Supprimer les données du tableau en PHP (session)
                    fetch('viderSessionPanier.php', {
                            method: 'POST'
                        })
                        .then(response => response.text())
                        .then(data => console.log(data))
                        .catch(error => console.error(error));
                }
            }

            function commanderP() {
                produits = <?php echo json_encode($tab) ?>;
                let addr = document.getElementById("addressIn").value;
                let addrT = addr.split(" ");
                let empty = true;
                addrT.forEach(element => {
                    if (element.length == 0) {
                        empty = false;
                        return;
                    }
                });

                if (addrT.length < 3 || !empty)
                    alert("Adresse invalide");
                else {
                    commander(produits, addr);
                }
            }




            // ********* Evènement sur le bouton modifier *********************

            let verify = false;

            const login = document.getElementById("login");
            const nom = document.getElementById("nom");
            const prenom = document.getElementById("prenom");
            const modifier = document.getElementById("modifier");
            const save = document.getElementById("save");
            const enrg = document.getElementById("enrg");
            const btModif = document.getElementById("bt-modif");
            const annuler = document.getElementById("annuler");

            modifier.addEventListener("click", () => {
                $('#nom').prop('disabled', false);
                $('#login').prop('disabled', false);
                $('#prenom').prop('disabled', false);
                $("#bt-modif").show();

                // mdp1.style.border = "1px solid orangered";
                // mdp2.style.border = "1px solid orangered";

                login.style.border = "1px solid orangered";
                nom.style.border = "1px solid orangered";
                prenom.style.border = "1px solid orangered";

                save.style.display = "inline-block";

                btModif.addEventListener("click", () => {
                    verify = true;
                    $("#p1").show();
                    $("#p2").show();
                    $("#mdp1").show();
                    $("#mdp2").show();
                    $("#mdp1").css("border", "1px solid orangered");
                    $("#mdp2").css("border", "1px solid orangered");
                });

                annuler.addEventListener("click", () => {
                    $('#nom').val(nomUser);
                    $('#login').val(loginUser);
                    $('#prenom').val(prenomUser);
                    $('#mdp').val(mdpUser);
                    $('#mdp1').val("");
                    $('#mdp2').val("");


                    $('#nom').prop('disabled', true);
                    $('#login').prop('disabled', true);
                    $('#prenom').prop('disabled', true);

                    $("#nom").css("border", "none");
                    $("#login").css("border", "none");
                    $("#prenom").css("border", "none");
                    $("#bt-modif").hide();
                    $("#p1").hide();
                    $("#p2").hide();
                    $('#mdp1').hide();
                    $('#mdp2').hide();
                    $("#save").hide();
                });
            });



            save.addEventListener("click", () => {

                //   $('#profil-form').submit(function(event) {
                //     event.preventDefault(); // Empêcher la soumission par défaut du formulaire

                // Récupération des données du formulaire
                var nom = $('#nom').val();
                var login = $('#login').val();
                var prenom = $('#prenom').val();
                var mdp = $('#mdp').val();
                var mdp1 = $('#mdp1').val();
                var mdp2 = $('#mdp2').val();
                $("#bt-modif").hide();

                if (verify) {
                    if (mdp1.length == 0 || mdp2.length == 0) {
                        alert("champ(s) vide(s)");
                        die();
                    } else if (password_verify(mdp1, mdp)) {
                        var mdp2 = $('#mdp2').val();
                    } else {
                        alert("incorrects");
                        die();
                    }
                }

                $("#p1").hide();
                $("#p2").hide();

                $('#nom').prop('disabled', true);
                $('#login').prop('disabled', true);
                $('#prenom').prop('disabled', true);

                $("#nom").css("border", "none");
                $("#login").css("border", "none");
                $("#prenom").css("border", "none");

                // Envoi des données via AJAX
                $.ajax({
                    url: './maj.php',
                    type: 'POST',
                    data: {
                        nom: nom,
                        login: login,
                        prenom: prenom,
                        mdp: mdp2,
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
            if (isAdmin) {
                var elements = document.querySelectorAll('.ifAdmin');
                elements.forEach(elt => {
                    elt.style.display = "block";
                });
            }
        </script>


        <!-- ********************************************************** FIN **************************************************** -->



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../js/productPage.js"></script>

        <script>
            function menu(elt) {
                if (elt.checked) {
                    elt.value = 1;
                } else {
                    elt.value = 0;
                }
            }

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