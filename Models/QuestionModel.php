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
    // ************************************************ UPDATE QUESTION  ********************************************** 


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
}
