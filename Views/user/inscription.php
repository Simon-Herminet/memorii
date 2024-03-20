<?php

$title = "Inscription/Connexion";


?>
<div id="formAdd">
    <div id="addForm">
        <h1>Je m'inscris: </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" type="text" name="email_user">
            </div>
            <div class="form_group_message">
                <span id="email-message"></span>
            </div>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input id="nom" type="text" name="nom_user">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input id="prenom" type="text" name="prenom_user">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe:</label>
                <input id="mdp" type="password" name="mdp_user">
            </div>
            <div class="form_group_message">
                <span id="password-message"></span>
            </div>
            <button type="submit" name='form_inscription' class="btn-envoyer">Envoyer</button>
        </form>
    </div>
    <?php
    // var_dump($_POST['form_inscription']);
    ?>

    <div id="loginForm">
        <h1>Je me connecte: </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" type="text" name="email_user">
            </div>

            <div class="form-group">
                <label for="mdp">Mot de passe:</label>
                <input id="mdp" type="password" name="mdp_user">
            </div>
            <button type="submit" name="form_connexion" class="btn-envoyer log">Se Connecter</button>
        </form>
    </div>

</div>