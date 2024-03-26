<?php

namespace App\Models;

use PDO;
use Exception;
use App\Core\DbConnect;
use App\Entities\Question;

class QuestionModel extends DbConnect
{

    // ************************************************ FIND QUESTION PAR ID USER ********************************************** 
    public function find($id_user)
    {
        try {
            $this->request = $this->connection->prepare(
                "SELECT * FROM question_memorii 
            WHERE id_user = :id_user"
            );
            $this->request->bindValue(':id_user', $id_user);
            $this->request->execute();

            // Retourner les résultats de la requête
            return $this->request->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // Gérer les erreurs éventuelles
            echo 'Erreur : ' . $e->getMessage();
            return [];
        }
    }

    // ************************************************ AJOUT QUESTION ********************************************************** 

    public function add(Question $question)
    {
        try {

            $this->request = $this->connection->prepare(
                "INSERT INTO question_memorii(titre_question, question_question, reponse_question, id_user)
                VALUES(:titre_question, :question_question, :reponse_question, :id_user)"
            );

            $this->request->bindValue(':titre_question', $question->getTitre_question());
            $this->request->bindValue(':question_question', $question->getQuestion_question());
            $this->request->bindValue(':reponse_question', $question->getReponse_question());
            $this->request->bindValue(':id_user', $question->getId_user());


            $this->request->execute();
        } catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }
    // ************************************************ FINDById QUESTION  ********************************************** 


    public function formUpdate(Question $questionModel)
    {
        try {
            $this->request = $this->connection->prepare("SELECT * FROM question_memorii WHERE id_question=:id_question");
            $this->request->bindValue(":id_question", $questionModel->getId_question());
            $this->request->execute();

            $list = $this->request->fetch(PDO::FETCH_ASSOC);
            return $list;
        } catch (Exception $e) {
            echo "erreur :" . $e->getMessage();
        }
    }


    // ************************************************ UPDATE QUESTION  ********************************************** 
    public function traitementFormUpdate(Question $majQuestion)
    {
        try {
            $this->request = $this->connection->prepare("UPDATE question_memorii
            SET titre_question=:titre_question , question_question=:question_question, reponse_question=:reponse_question
            WHERE id_question=:id_question");
            $this->request->bindValue(':id_question', $majQuestion->getId_question());
            $this->request->bindValue(':titre_question', $majQuestion->getTitre_question());
            $this->request->bindValue(':question_question', $majQuestion->getQuestion_question());
            $this->request->bindValue(':reponse_question', $majQuestion->getReponse_question());
            $this->request->execute();
        } catch (Exception $e) {
            echo "erreur:" . $e->getMessage();
        }
    }

    // ************************************************ DELETE QUESTION  ********************************************** 

    public function delete($id)
    {
        try {
            $this->request = $this->connection->prepare(
                "DELETE FROM question_memorii WHERE id_question = :id_question"
            );

            $this->request->bindValue(':id_question', $id);

            $this->request->execute();
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    // ********************************************** SELECT QUESTION WITHOUT CATEGORY ***********************************
    public function getQuestionsWithoutCategory($userId)
    {
        try {
            $this->request = $this->connection->prepare(
                "SELECT * FROM question_memorii WHERE id_category IS NULL AND id_user = :user_id"
            );
            $this->request->bindValue(":user_id", $userId);
            $this->request->execute();

            // Récupérer les résultats de la requête
            $questions = $this->request->fetchAll(PDO::FETCH_ASSOC);
            return $questions;
        } catch (Exception $e) {
            echo "Erreur :" . $e->getMessage();
            return false;
        }
    }

    // ******************************************* ASSIGN CATEGORIE TO QUESTION *******************************************

    public function assignCategoryToQuestion($questionId, $categoryId)
    {
        try {
            $this->request = $this->connection->prepare(
                "UPDATE question_memorii SET id_category = :id_category WHERE id_question = :id_question"
            );

            $this->request->bindValue(':id_question', $questionId);
            $this->request->bindValue(':id_category', $categoryId);

            $this->request->execute();
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    //****************************************** UPDATE CATEGORIE POUR DELETE CATEGORIE ************************************ */
    // public function deleteCategoryToQuestion(){
    //     try{
    //         $this->request=$this->connection->prepare(
    //             "UPDATE question_memorii SET id_category= NULL WHERE id_questioon=:id_question"
    //         );
    //         $this->request->bindValue('id_category', $categoryId);
    //     }
    // };
}
