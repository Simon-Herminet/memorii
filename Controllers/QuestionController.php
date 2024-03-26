<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Entities\Question;
use App\Models\QuestionModel;



class QuestionController extends Controller
{

    // ***************************************** PAGE D ACCUEIL QUESTION *************************************************

    public function index()
    {
        $questionModel = new QuestionModel();
        $id_user = $_SESSION['id_user'];

        $questions = $questionModel->find($id_user);


        $this->render('question/index', ['questions' => $questions]);
    }


    // ********************************************* AJOUT QUESTION *************************************************

    public function addQuestion()
    {
        if (isset($_POST['form_add_question'])) {
            // Je recupere les données du formulaire
            $titre = $_POST['titre_question'] ?? '';
            $question = $_POST['question_question'] ?? '';
            $reponse = $_POST['reponse_question'] ?? '';
            $id_user = $_SESSION['id_user'];

            // Créer un objet Question avec les données du formulaire
            $nouvelleQuestion = new Question();
            $nouvelleQuestion->setTitre_question($this->protected_values($titre));
            $nouvelleQuestion->setQuestion_question($this->protected_values($question));
            $nouvelleQuestion->setReponse_question($this->protected_values($reponse));
            $nouvelleQuestion->setId_user($this->protected_values($id_user));

            // J'ajoute la question à la base de données
            $questionModel = new QuestionModel();
            $questionModel->add($nouvelleQuestion);

            $_SESSION['message'] = "La question a été ajouté avec succès.";
            header('Location:index.php?controller=question&action=index');
        } else {
            $this->render('question/addQuestion');
        }
    }

    // ************************************ UPDATE QUESTION **************************************************************
    public function formUpdate($id)
    {
        // Je recupere ma question grace a l'ID en GET
        $id = $_GET['id'] ?? NULL;
        $questionUpdate = new Question();
        $questionUpdate->setId_question($id);

        $questionModel = new QuestionModel();
        $list = $questionModel->formUpdate($questionUpdate);
        $this->render('question/updateQuestion', ['list' => $list]);
    }
    // ***************************************** TRAITEMENT FORM UPDATE QUESTION *********************************************
    public function update($id)
    {
        $id = $_GET['id'] ?? NULL;

        if (!empty($id)) {
            $majQuestion = new Question();
            $majQuestion->setId_question($id);

            $majQuestion->setTitre_question($this->protected_values($_POST['titre_question']));
            $majQuestion->setQuestion_question($this->protected_values($_POST['question_question']));
            $majQuestion->setReponse_question($this->protected_values($_POST['reponse_question']));
            $majQuestion->setId_user($this->protected_values($_POST['id_user']));

            $questionModel = new QuestionModel();
            $questionModel->traitementFormUpdate($majQuestion);


            $_SESSION['message'] = "La question a bien été modifiée";
            header('Location: index.php?controller=question&action=index');
        } else {
            $_SESSION['error'] = "Problème lors de la mise à jour de la question.";
            header('Location: index.php?controller=question&action=index');
        }
    }
    // ************************************ DELETE QUESTION **************************************************************

    public function deleteQuestion($id)
    {
        if ($id) {
            $questionModel = new QuestionModel();
            $questionModel->delete($id);

            $_SESSION['message'] = "La question a été supprimée avec succès.";
            header('Location: index.php?controller=question&action=index');
            exit;
        }
    }

    // ********************************** FIND QUESTION SANS CATEGORY **************************************************

    public function questionsWithoutCategory($id)
    {
        $id = $_GET['id'] ?? null;

        $userId = $_SESSION['id_user'] ?? null;
        // var_dump($userId);
        // var_dump($id);
        // die;
        if ($userId && $id) {
            $questionModel = new QuestionModel();
            $questions = $questionModel->getQuestionsWithoutCategory($userId);

            if ($questions) {

                $this->render('question/questionWithoutCategory', ['questions' => $questions]);
            } else {
                echo "Aucune question sans catégorie n'a été trouvée.";
            }
        }
    }
    public function assignCategory()
    {
        // Je declare mes variables
        $questionIds = $_POST['id_question'] ?? '';
        $categoryId = $_POST['id_category'] ?? '';

        // Je stockes mes ID dans un tableau
        if (!is_array($questionIds)) {
            $questionIds = [$questionIds];
            var_dump($questionIds);
        }

        // Je conditionne
        if (!empty($categoryId) && !empty($questionIds)) {
            $questionModel = new QuestionModel();
            // Je boucle pour pouvoir repeter la requete autant de fois que j'ai de question.
            foreach ($questionIds as $questionId) {
                $questionModel->assignCategoryToQuestion($questionId, $categoryId);
            }

            $_SESSION['message'] = "Les questions ont été assignées à la catégorie avec succès.";
            header('Location:index.php?controller=Category&action=index');
            exit();
        } else {
            $_SESSION['error'] = "Veuillez sélectionner une catégorie et au moins une question.";
        }
    }
}
