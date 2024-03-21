<?php

$title = "Inscription/Connexion";
?>


<div id="formAdd">
    <div id="addForm">
        <h1>Je m'inscris : </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <label for="email">
                    <h4>Email :</h4>
                </label>
                <input id="email" type="text" name="email_user">
            </div>
            <div class="form_group_message">
                <span id="email-message"></span>
            </div>
            <div class="form-group">
                <label for="nom">
                    <h4>Nom :</h4>
                </label>
                <input id="nom" type="text" name="nom_user">
            </div>
            <div class="form-group">
                <label for="prenom">
                    <h4>Prenom :</h4>
                </label>
                <input id="prenom" type="text" name="prenom_user">
            </div>
            <div class="form-group">
                <label for="mdp">
                    <h4>Mot de passe :</h4>
                </label>
                <input id="mdp" type="password" name="mdp_user">
            </div>
            <div class="form_group_message">
                <span id="password-message"></span>
            </div>
            <button type="submit" name='form_inscription' class="btn-envoyer">
                <h4>Envoyer</h4>
            </button>
        </form>
    </div>
    <?php
    // var_dump($_POST['form_inscription']);
    ?>

    <div id="loginForm">
        <h1>Je me connecte : </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <label for="email">
                    <h4>Email :</h4>
                </label>
                <input id="email" type="text" name="email_user">
            </div>

            <div class="form-group">
                <label for="mdp">
                    <h4>Mot de passe :</h4>
                </label>
                <input id="mdp" type="password" name="mdp_user">
            </div>
            <button type="submit" name="form_connexion" class="btn-envoyer log">
                <h4>Se Connecter</h4>
            </button>
        </form>
    </div>

</div>