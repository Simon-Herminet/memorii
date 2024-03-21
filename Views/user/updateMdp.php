<?php
$title = "Mettre a jour mon mot de passe";
?>

<div id="formAdd">
    <div id="addForm">
        <h1>Je modifie mon mot de passe : </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                <label for="email">
                    <h4>Indiquez votre mot de passe actuel :</h4>
                </label>
                <input id="oldMdp" type="password" name="old_mdp_user">
            </div>

            <div class="form-group">
                <label for="email">
                    <h4>Indiquez votre nouveau mot de passe :</h4>
                </label>
                <input class="mdp" type="password" name="new_mdp_user">
            </div>
            <div class="form-group">
                <label for="email">
                    <h4>Confirmez votre nouveau mot de passe :</h4>
                </label>
                <input id="mdp" type="password" name="confirm_new_mdp_user">
            </div>
            <div class="form_group_message">
                <span id="password-message"></span>
            </div>
            <button type="submit" class="btn-envoyer">
                <h4>Mettre à jour</h4>
            </button>
        </form>