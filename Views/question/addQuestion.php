<!-- <?php
        $title = "J'ajoute une question";
        ?>

<div id="formAdd">
    <div id="addForm">
        <h1>J'ajoute une nouvelle question : </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <label for="titre">
                    <h4>titre :</h4>
                </label>
                <input class="textQuestion" id="titre" type="text" name="titre_question">
            </div>
            <div class="form-group">
                <label for="question">
                    <h4>Question :</h4>
                </label>
                <textarea id="question" name="question_question"></textarea>
            </div>
            <div class="form-group">
                <label for="reponse">
                    <h4>Reponse :</h4>
                </label>
                <input class="textQuestion" type="text" name="reponse_question">
            </div>
            <input type="hidden" value='<?php echo $_SESSION['id_user'] ?>' name="id_user">
            <button type="submit" name='form_add_question' class="btn-envoyer">
                <h4>Envoyer</h4>
            </button>
        </form>
    </div> -->
<!--  -->
<?php
// echo '<pre>';
// var_dump($categories);
// echo '</pre>';
?>
<div id="formAdd">
    <div id="addForm">
        <h1>J'ajoute une nouvelle question : </h1>
        <form id="envoyer" action="#" method="post">
            <div class="form-group">
                <label for="category">
                    <h4>Catégorie :</h4>
                </label>
                <select id="category" class="catSelect" name="category_id">
                    <?php foreach ($categories as $list) : ?>
                        <p>
                            <option value="<?php echo $list['id_category']; ?>">
                                <?php echo $list['titre_category']; ?>
                        </p>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="question">
                    <h4>Question :</h4>
                </label>
                <textarea id="question" name="question_question"></textarea>
            </div>
            <div class="form-group">
                <label for="reponse">
                    <h4>Reponse :</h4>
                </label>
                <input class="textQuestion" type="text" name="reponse_question">
            </div>
            <input type="hidden" value='<?php echo $_SESSION['id_user'] ?>' name="id_user">
            <button type="submit" name='form_add_question' class="btn-envoyer">
                <h4>Envoyer</h4>
            </button>
        </form>
    </div>
</div>