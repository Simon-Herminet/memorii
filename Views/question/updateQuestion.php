<?php
$title = "Modifier une question";
?>
<?php
// echo '<pre>';
// var_dump($list);


// echo '</pre>';
?>
<div id="formAdd">
    <div id="addForm">
        <h1>Je modifie ma question : </h1>
        <form id="envoyer" action="index.php?controller=question&action=update&id=<?php echo $list['id_question'] ?>" method="post">

            <div class="form-group">
                <label for="category">
                    <h4>Catégorie :</h4>
                </label>
                <select id="category" class="catSelect" name="category_id">
                    <option value="">Sélectionner une catégorie (facultatif)</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['id_category']; ?>" <?php if ($category['id_category'] == $list['id_category']) echo 'selected'; ?>>
                            <?php echo $category['titre_category']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="question">
                    <h4>Question :</h4>
                </label>
                <textarea id="question" name="question_question"><?php echo $list['question_question']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="reponse">
                    <h4>Reponse :</h4>
                </label>
                <input class="textQuestion" value="<?php echo $list['reponse_question']; ?>" type="text" name="reponse_question">
            </div>
            <input type="hidden" value="<?php echo $list['id_question']; ?>" name="id_question">
            <input type="hidden" value='<?php echo $list['id_user']; ?>' name="id_user">
            <button type="submit" name='form_add_question' class="btn-envoyer">
                <h4>Envoyer</h4>
            </button>
        </form>
    </div>
</div>