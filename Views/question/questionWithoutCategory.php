<?php

$title = "Ajouter des question a la catégorie";

?>
<form id="addForm" class="formStyle" action="index.php?controller=question&action=assignCategory" method="post">


    <table>
        <thead>
            <tr>
                <th>
                    <p>Sélectionner</p>
                </th>
                <th>
                    <p>Titre de la question</p>
                </th>
                <th>
                    <p>Question</p>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $key => $question) :
                $rowClass = ($key % 2 == 0) ? 'impair' : 'pair'; ?>
                <tr class="<?php echo $rowClass; ?>">
                    <td class="tabQuestion">
                        <input type="checkbox" id="<?php echo $question['id_question']; ?>" name="id_question" value='<?php echo $question['id_question']; ?>' ; ?>
                    </td>
                    <td class="tabQuestion">
                        <p>
                            <label for=" titre_question "><?php echo $question['titre_question']; ?></label>
                        </p>
                    </td>
                    <td class="tabQuestion">
                        <p>
                            <label for="<?php echo $question['id_question']; ?>"><?php echo $question['question_question']; ?></label>
                        </p>
                    </td>
                    <input type="hidden" name="id_category" value="<?php echo $_GET['id']; ?>">
                </tr>

            <?php endforeach; ?>
        </tbody>

    </table>
    <button type=" submit" class="btn-envoyer btn-style">
        <p>Assigner la catégorie
        </p>
    </button>
</form>