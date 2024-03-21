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
}
