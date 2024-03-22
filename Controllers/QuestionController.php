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
}
