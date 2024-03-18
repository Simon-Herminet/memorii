<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- lien feuille de style -->

    <link rel="stylesheet" href="style.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



    <!--  liens font awesome et google fonts -->

</head>

<body>
    <div id="wrapper">

        <!---------- STRUCTURE HEADER --------------------- -->
        <header>
            <img id="logo" src="../public/images/Memorii.svg">
        </header>
        <!-- ------------FIN HEADER---------------------- -->


        <!-- ---------------------------------FIN NAVIGATION--------------------------------------------------------- -->
        <div id="main">

            <?php $navigation = isset($_SESSION['id_user']) ? $nav : ''; ?>
            <main>

                <?= $navigation ?>
                <?= $content ?>
            </main>



        </div>
        <!---------- STRUCTURE FOOTER --------------------- -->
        <footer>
            <div id="menuFooter">
                <ul id='listFooter'>
                    <li>
                        <p>Mentions Légales</p>
                    </li>
                    <li>
                        <p>Politique des données personnels</p>
                    </li>
                    <li>
                        <p>Plan du site</p>
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


    <!-- CONNEXION js bootstrap -->


</body>


</html>