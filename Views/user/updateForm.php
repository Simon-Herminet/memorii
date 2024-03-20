<?php
$title = "Modifier mes informations personnelles";
?>

<div id="formAdd">
    <div id="addForm">
        <h1>Je modifie mes informations : </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                <label for="email">
                    <h4>Email :</h4>
                </label>
                <input id="email" type="text" name="email_user" value=" <?php echo $_SESSION['email_user'] ?>">
            </div>
            <div class="form_group_message">
                <span id="email-message"></span>
            </div>
            <div class="form-group">
                <label for="nom">
                    <h4>Nom :</h4>
                </label>
                <input id="nom" type="text" name="nom_user" value=" <?php echo $_SESSION['nom_user'] ?>">
            </div>
            <div class="form-group">
                <label for="prenom">
                    <h4>Prenom :</h4>
                </label>
                <input id="prenom" type="text" name="prenom_user" value=" <?php echo $_SESSION['prenom_user'] ?>">
            </div>
            <div class="form-group">
                <a href="index.php?controller=User&action=updateMdp">
                    <h4>Modifier mon mot de passe ?</h4>
                </a>
                <div class="form_group_message">
                    <span id="password-message"></span>
                </div>
                <button type="submit" class="btn-envoyer">
                    <h4>Envoyer</h4>
                </button>
        </form>
    </div>