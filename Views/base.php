<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- lien feuille de style -->
    <!-- Réécriture url style.css -->
    <!-- <link rel="stylesheet" href="http://localhost:8888/projet_MEMORii_MVC/public/style.css"> -->
    <!-- Chemin absolu du css -->
    <link rel="stylesheet" href="style.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



    <!--  liens font awesome et google fonts -->

</head>

<body>
    <div id="wrapper">

        <!---------- STRUCTURE HEADER --------------------- -->
        <header>
            <img id="logo" src="http://localhost:8888/projet_MEMORii_MVC/public/images/Memorii.svg">
        </header>
        <!-- ------------FIN HEADER---------------------- -->


        <!-- ---------------------------------FIN NAVIGATION--------------------------------------------------------- -->
        <?php if (isset($_SESSION['message'])) {
            echo "<div class='message'>" . '<h4>' . $_SESSION['message'] . '</h4>' . "</div>";
            unset($_SESSION['message']);
        }

        // Pour les messages d'erreur
        if (isset($_SESSION['error'])) {
            echo "<div class='error'>" . "<h4>" . $_SESSION['error'] . "</h4>" . "</div>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div id="main">
            <main>


                <?php

                $navigation = isset($_SESSION['id_user']) ? $nav : ''; ?>

                <?= $navigation ?>
                <?= $content ?>


            </main>



        </div>
        <!---------- STRUCTURE FOOTER --------------------- -->
        <footer>
            <div id="menuFooter">
                <ul id='listFooter'>
                    <li>
                        <a href="#">
                            <p>Mentions Légales</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <p>Politique des données personnels</p>
                        </a>
                    </li>
                    <li>
                        <a href="@">
                            <p>Plan du site</p>
                        </a>
                    </li>
                </ul>
            </div>
            <p>
                MEMORii Copyright © 2024
            </p>

        </footer>


        <!---------- FIN FOOTER --------------------- -->







    </div>
    <!-- ----- FIN DE WRAPPER------------ -->


    <!-- CONNEXION FICHIER SCRIPT.JS DANS DOSSIER JS -->
    <script src="../public/js/script.js"></script>
    <script src="../public/js/asynchQuestions.js"></script>
    <script src="../public/js/asynchCategory.js"></script>
    <script src="../public/js/burger.js"></script>
    <!-- Réécriture url pour fichier JS avec réécriture URL -->
    <!-- <script src="http://localhost:8888/projet_MEMORii_MVC/public/js/script.js"></script> -->




</body>


</html>