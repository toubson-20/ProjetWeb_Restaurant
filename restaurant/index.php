<?php
session_start();
$connected = $_SESSION["connected"];
$nom = $_SESSION['name'];
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
    <link rel="shortcut icon" href="./view/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="./view/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./view/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="./view/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="./view/css/responsive.css">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="./view/css/colors/orange.css" />

    <!-- Modernizer -->
    <script src="./view/js/modernizer.js"></script>

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
                                        <img src="./view/images/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="#banner">Accueil</a></li>
                                    <li><a href="#about">A propos</a></li>
                                    <li><a href="#menu">Menu</a></li>
                                    <li><a href="#our_team">Equipe</a></li>
                                    <li><a href="#gallery">Gallerie</a></li>
                                    <li><a href="#blog">Blog</a></li>
                                    <li><a href="#pricing">Prix</a></li>
                                    <li><a href="#reservation">Reservation</a></li>
                                    <li><a href="#footer">Contact</a></li>
                                    <li class="connexion" id="connected"><a href="./view/connexion/connexion.html">Connexion</a></li>
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

    <div id="banner" class="banner full-screen-mode parallax">
        <div class="container pr">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="banner-static">
                    <div class="banner-text">
                        <div class="banner-cell">
                            <h1>Dinner avec <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="vos amis:votre famille:vos collègues" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>
                            <h2>Apparitions accidentelles </h2>
                            <p>Découvrez une symphonie de saveurs camerounaises dans notre restaurant gastronomique</p>
                            <div class="book-btn">
                                <a href="#reservation" class="table-btn hvr-underline-from-center">Reserver une table</a>
                            </div>
                            <a href="#about">
                                <div class="mouse"></div>
                            </a>
                        </div>
                        <!-- end banner-cell -->
                    </div>
                    <!-- end banner-text -->
                </div>
                <!-- end banner-static -->
            </div>
            <!-- end col -->
        </div>
        <!-- end container -->
    </div>
    <!-- end banner -->

    <div id="about" class="about-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title"> À propos de nous</h2>
                        <h3>CELA A COMMENCÉ, TOUT SIMPLEMENT, COMME CECI...</h3>
                        <p> Chez MboaFoodies, nous sommes fiers de vous offrir une expérience culinaire authentique et raffinée, inspirée par la richesse et la diversité de la cuisine camerounaise. Nous mettons un point d'honneur à sélectionner les meilleurs ingrédients locaux, à les travailler avec soin et à les mettre en valeur dans nos plats, afin de vous offrir une expérience gustative exceptionnelle. </p>

                        <p> Notre équipe de chefs passionnés et talentueux a à cœur de vous faire voyager à travers les différentes régions du Cameroun en revisitant les plats traditionnels avec une touche moderne et créative. Nous sommes également soucieux de vous offrir un service de qualité et une ambiance conviviale et chaleureuse, où vous pourrez profiter de notre cuisine exceptionnelle en toute sérénité. </p>

                        <p> Que ce soit pour un dîner romantique, une soirée entre amis ou un événement spécial, nous avons à cœur de vous offrir une expérience culinaire mémorable dans un cadre élégant et confortable. Nous sommes impatients de vous accueillir chez MboaFoodies pour partager avec vous notre passion pour la gastronomie camerounaise et vous faire découvrir de nouvelles saveurs inoubliables. </p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="about-images">
                            <img class="about-main" src="./view/images/images/08242b_49a1d8cd7346474e8a370a56f2d340cf~mv2.jpg" alt="About Main Image" style="height: 400px !important; width: 400px !important">
                            <img class="about-inset" src="./view/images/images/cuba-saute-de-porc-a-la-papaye-57.640x480.jpg" alt="About Inset Image" style="height: 200px !important; width: 200px !important">
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <div class="special-menu pad-top-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title color-white text-center"> Spécialités du jour </h2>
                        <h5 class="title-caption text-center"> Découvrez nos spécialités du jour chez MboaFoodies : Ndolé, Poulet DG et Eru. Des plats traditionnels de la cuisine camerounaise préparés avec soin par notre équipe de chefs passionnés pour vous offrir une expérience culinaire unique et mémorable. Venez déguster ces délicieuses saveurs dans un cadre élégant et convivial. </h5>
                    </div>
                    <div class="special-box">
                        <div id="owl-demo">
                            <?php
                            function createElements($query, $changes, $structure)
                            {
                                include_once  '../restaurant/controller/connexionBD.php';
                                $pdo = connect_to_database();

                                // Exécution de la requête
                                $stmt = $pdo->query($query);

                                // Récupération des données
                                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($data as &$elt) {

                                    echo str_replace($changes, array($elt[$changes[0]], $elt[$changes[1]], $elt[$changes[2]], $elt[$changes[3]]), $structure);
                                }
                            }
                            createElements(
                                'SELECT * FROM produit WHERE MenuJour = 1',
                                array('Nom_produit', 'Description', 'Img', 'Prix'),
                                '<div class="item item-type-zoom">
                                                <a href="#" class="item-hover">
                                                    <div class="item-info">
                                                        <div class="headline">
                                                            Nom_produit
                                                            <div class="line"></div>
                                                            <div class="dit-line">Description</div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="item-img">
                                                    <img src="Img" alt="sp-menu">
                                                </div>
                                            </div>'
                            );
                            ?>
                        </div>
                    </div>
                    <!-- end special-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end special-menu -->

    <div id="menu" class="menu-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
                            Notre Menu
                        </h2>
                        <p class="title-caption text-center">Découvrez notre menu varié de plats traditionnels de la cuisine camerounaise, préparés avec des ingrédients frais et de qualité. De délicieuses options végétariennes sont également disponibles pour répondre aux besoins de tous nos clients. Venez déguster notre cuisine authentique dans un cadre élégant et convivial chez MboaFoodies. </p>
                    </div>
                    <div class="tab-menu">
                        <div class="slider slider-nav">
                            <div class="tab-title-menu">
                                <h2>ENTREES</h2>
                                <p> <i class="flaticon-canape"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>PLATS</h2>
                                <p> <i class="flaticon-dinner"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>DESSERTS</h2>
                                <p> <i class="flaticon-desert"></i> </p>
                            </div>
                            <div class="tab-title-menu">
                                <h2>BOISSONS</h2>
                                <p> <i class="flaticon-coffee"></i> </p>
                            </div>
                        </div>
                        <div class="slider slider-single">
                            <div>
                                <?php
                                createElements(
                                    "SELECT * FROM produit WHERE Type_plat = 'entree'",
                                    array('Nom_produit', 'Description', 'Img', 'Prix'),
                                    '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                                        <div class="offer-item">
                                                            <img src="Img" alt="" class="img-responsive">
                                                            <div>
                                                                <h3>Nom_produit</h3>
                                                                <p>
                                                                    Description
                                                                </p>
                                                            </div>
                                                            <span class="offer-price">Prix€</span>
                                                        </div>
                                                    </div>'
                                );
                                ?>
                            </div>
                            <div>
                                <?php
                                createElements(
                                    "SELECT * FROM produit WHERE Type_plat = 'plat'",
                                    array('Nom_produit', 'Description', 'Img', 'Prix'),
                                    '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="offer-item">
                                            <img src="Img" alt="" class="img-responsive">
                                            <div>
                                                <h3>Nom_produit</h3>
                                                <p>
                                                    Description
                                                </p>
                                            </div>
                                            <span class="offer-price">Prix€</span>
                                        </div>
                                    </div>'
                                );
                                ?>
                            </div>
                            <div>
                                <?php
                                createElements(
                                    "SELECT * FROM produit WHERE Type_plat = 'dessert'",
                                    array('Nom_produit', 'Description', 'Img', 'Prix'),
                                    '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="offer-item">
                                            <img src="Img" alt="" class="img-responsive">
                                            <div>
                                                <h3>Nom_produit</h3>
                                                <p>
                                                    Description
                                                </p>
                                            </div>
                                            <span class="offer-price">Prix€</span>
                                        </div>
                                    </div>'
                                );
                                ?>
                            </div>
                            <div>
                                <?php
                                createElements(
                                    "SELECT * FROM produit WHERE Type_plat = 'boisson'",
                                    array('Nom_produit', 'Description', 'Img', 'Prix'),
                                    '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <div class="offer-item">
                                            <img src="Img" alt="" class="img-responsive">
                                            <div>
                                                <h3>Nom_produit</h3>
                                                <p>
                                                    Description
                                                </p>
                                            </div>
                                            <span class="offer-price">Prix€</span>
                                        </div>
                                    </div>'
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- end tab-menu -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end menu -->

    <div id="our_team" class="team-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <h2 class="block-title text-center">
                            Notre équipe
                        </h2>
                        <p class="title-caption text-center">Notre équipe passionnée est dévouée à vous offrir une expérience culinaire authentique, en explorant les saveurs et les ingrédients de la cuisine camerounaise traditionnelle. </p>
                    </div>
                    <div class="team-box">

                        <div class="row">
                            <?php
                            createElements(
                                "SELECT * FROM employe,users WHERE employe.Id_user = users.Id_user",
                                array('nom', 'preNom', 'Description', 'Img'),
                                '<div class="col-md-4 col-sm-6">
                                    <div class="sf-team">
                                        <div class="thumb">
                                            <a href="#"><img src="Img" alt=""></a>
                                        </div>
                                        <div class="text-col">
                                            <h3>preNom nom</h3>
                                            <p>Description</p>
                                            <ul class="team-social">
                                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>'
                            );
                            ?>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end team-box -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end team-main -->

    <div id="reservation" class="reservations-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="form-reservations-box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <h2 class="block-title text-center">
                                Reservations
                            </h2>
                        </div>
                        <h4 class="form-title">FORMULAIRE DE RESERVATION</h4>
                        <p>VEUILLEZ REMPLIR TOUS LES CHAMPS OBLIGATOIRES*. MERCI!</p>

                        <form method="POST" class="reservations-box" name="contactform" action="../restaurant/reservation.php">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <?php echo '<input type="text" name="form_name" id="form_name" placeholder="' . $nom . '" value="' . $nom . '" required="required" data-error="Nom est requis.">'; ?>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <?php echo '<input type="email" name="email" id="email" placeholder="E-Mail" required="required" data-error="E-mail est requis">' ?>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <?php echo '<input type="text" name="phone" id="phone" placeholder="Telephone">' ?>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <?php echo '<input type="number" name="no_persons" id="no_persons" placeholder="Nombre de personnes" required="required" maxlength="10">' ?>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <?php echo '<input type="text" name="date" id="date-picker" placeholder="Date" required="required" data-error="Date est requis" />' ?>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <?php echo '<input type="text" name="time" id="time-picker" placeholder="Heure" required="required" data-error="Time is requis" />' ?>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <select name="occasion" id="occasion" class="selectpicker">
                                        <option selected disabled>Occasion</option>
                                        <option>Marriage</option>
                                        <option>Anniversaire</option>
                                        <option>Célebration</option>
                                        <option>Classique</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-box">
                                    <select name="emplacement" id="emplacement" class="selectpicker">
                                        <option selected disabled>Emplacement</option>
                                        <option>Interieur</option>
                                        <option>Extérieur</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="reserve-book-btn text-center">
                                    <input class="hvr-underline-from-center" name="submit" type="submit" value="SEND" id="submit">
                                </div>
                            </div>
                            <!-- end col -->
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end reservations-box -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end reservations-main -->

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
    <script src="./view/js/all.js"></script>
    <script src="./view/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="./view/js/custom.js"></script>
</body>

</html>