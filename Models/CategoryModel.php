<?php

namespace App\Models;

use PDO;
use Exception;
use App\Core\DbConnect;
use App\Entities\Question;

class CategoryModel extends DbConnect
{


    public function findCatAndCount($userId)
    {
        try {
            $this->request = $this->connection->prepare("
            SELECT c.id_category, c.titre_category, c.description_category, COUNT(q.id_question) AS number_of_questions
            FROM category_memorii c
            INNER JOIN question_memorii q ON c.id_category = q.id_category
            INNER JOIN user_memorii u ON q.id_user = u.id_user
            WHERE u.id_user = :user_id
            GROUP BY c.id_category
        ");
            $this->request->bindValue(':user_id', $userId);
            $this->request->execute();

            $categories = $this->request->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }
}
