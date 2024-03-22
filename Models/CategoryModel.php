<?php

namespace App\Models;

use PDO;
use Exception;
use App\Core\DbConnect;
use App\Entities\Category;


class CategoryModel extends DbConnect
{

    // *********************************** Methode pour trouver / compter le nombre de question par catégorie **************************
    public function findCatAndCount($userId)
    {
        try {
            $this->request = $this->connection->prepare("
            SELECT c.id_category, c.titre_category, c.description_category, COUNT(q.id_question) AS number_of_questions
            FROM category_memorii c
            LEFT JOIN question_memorii q ON c.id_category = q.id_category
            LEFT JOIN user_memorii u ON q.id_user = u.id_user
            WHERE (u.id_user = :user_id OR c.id_user = :user_id)
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


    // ***********************************  METHODE ADD   **************************************************
    public function add(Category $category)
    {

        try {

            $this->request = $this->connection->prepare(
                "INSERT INTO category_memorii(titre_category, description_category, id_user)
                VALUES(:titre_category, :description_category, :id_user)"
            );

            $this->request->bindValue(':titre_category', $category->getTitre_category());
            $this->request->bindValue(':description_category', $category->getDescription_category());
            $this->request->bindValue(':id_user', $category->getId_user());


            $this->request->execute();
        } catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
