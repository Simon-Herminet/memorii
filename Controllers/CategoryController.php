<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Entities\Question;
use App\Models\CategoryModel;
use App\Models\QuestionModel;



class CategoryController extends Controller
{

    public function index()
    {


        $userId = $_SESSION['id_user'];


        $categoryModel = new CategoryModel();

        // Appeler la méthode pour récupérer les catégories de l'utilisateur
        $categories = $categoryModel->findCatAndCount($userId);

        // Créer un tableau pour stocker les catégories avec le nombre de questions
        $uniqueCategories = [];

        // On boucle et on stocke une seul entrée par catégory
        foreach ($categories as $category) {
            $categoryId = $category['id_category'];
            // Je verifie si la catégorie a déjà été stockée
            if (!isset($uniqueCategories[$categoryId])) {
                // Si ce n'est pas le cas, Je stocke
                $uniqueCategories[$categoryId] = [
                    'id_category' => $categoryId,
                    'titre_category' => $category['titre_category'],
                    'description_category' => $category['description_category'],
                    'number_of_questions' => $category['number_of_questions']
                ];
            }
        }

        // Afficher les catégories dans la vue
        $this->render('category/index', ['categories' => $uniqueCategories]);
    }
}
