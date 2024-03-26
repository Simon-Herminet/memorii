<?php

$title = "Ajouter des questions à la catégorie";

?>
<form id="addForm" class="formStyle" action="index.php?controller=question&action=assignCategory" method="post">

    <table>
        <thead>
            <tr>
                <th>
                    <p>Sélectionner</p>
                </th>
                <th>
                    <p>Question</p>
                </th>
                <th>
                    <p>Reponse </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $key => $question) :
                $rowClass = ($key % 2 == 0) ? 'impair' : 'pair'; ?>
                <tr class="<?php echo $rowClass; ?>">
                    <td class="tabQuestion">
                        <input type="checkbox" id="<?php echo $question['id_question']; ?>" name="id_question[]" value='<?php echo $question['id_question']; ?>'>
                    </td>

                    <td class="tabQuestion">
                        <p>
                            <label for="<?php echo $question['id_question']; ?>"><?php echo $question['question_question']; ?></label>
                        </p>
                    </td>
                    <td class="tabQuestion">
                        <p>
                            <label for="titre_question"><?php echo $question['reponse_question']; ?></label>
                        </p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <input type="hidden" name="id_category" value="<?php echo $_GET['id']; ?>">
    <button type="submit" class="btn-envoyer btn-style">
        <p>Assigner la catégorie</p>
    </button>
</form>