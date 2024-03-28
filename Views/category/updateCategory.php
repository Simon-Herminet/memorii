<?php
$title = "Modifier une categorie";
?>

<div class="formAdd">
    <div class="addForm">
        <h1>Je modifie une categorie : </h1>
        <form id="envoyer" action="index.php?controller=category&action=update&id=<?php echo $list['id_category'] ?>" method="post">
            <div class="form-group">
                <label for="titre">
                    <h4>Titre :</h4>
                </label>
                <input class="textQuestion" id="titre" value="<?php echo $list['titre_category']; ?>" type="text" name="titre_category">
            </div>
            <div class="form-group">
                <label for="question">
                    <h4>Description :</h4>
                </label>
                <textarea id="category" name="description_category"><?php echo $list['description_category']; ?></textarea>
            </div>
            <input type="hidden" value='<?php echo $_SESSION['id_user'] ?>' name="id_user">
            <button type="submit" name='form_add_category' class="btn-envoyer">
                <h4>Envoyer</h4>
            </button>
        </form>
    </div>